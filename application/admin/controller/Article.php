<?php

    namespace app\admin\controller;

    use app\admin\model\ArticleModel;
    use app\admin\model\ArticleCateModel;
    use app\admin\model\MonitorModel;
    use think\Session;
    use think\Db;


    class Article extends Base
    {

        /**
         * [index 列表]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function index()
        {
            if (session('uid') == 1) {
                $key = input('key');
                $map = [];
                if ($key && $key !== "") {
                    $map['path'] = ['like', "%" . $key . "%"];
                }
                $Nowpage = input('get.page') ? input('get.page') : 1;
                $limits = config('list_rows');// 获取总条数
                $count = Db::name('article')->where($map)->count();//计算总页面
                $allpage = intval(ceil($count / $limits));
                $article = new ArticleModel();
                $lists = $article->getArticleByWhere($map, $Nowpage, $limits);
            } else {
                $key = input('key');
                $map = [];
                $map['e'] = session('uid');
                if ($key && $key !== "") {
                    $map['path'] = ['like', "%" . $key . "%"];
                }
                $Nowpage = input('get.page') ? input('get.page') : 1;
                $limits = config('list_rows');// 获取总条数
                $count = Db::name('article')->where($map)->count();//计算总页面
                $allpage = intval(ceil($count / $limits));
                $article = new ArticleModel();
                $lists = $article->getArticleByWhere($map, $Nowpage, $limits);
            }
            $this->assign('Nowpage', $Nowpage); //当前页
            $this->assign('allpage', $allpage); //总页数
            $this->assign('count', $count);
            $this->assign('val', $key);
            if (input('get.page')) {
                return json($lists);
            }
            return $this->fetch();

        }


        /**
         * [add_article 添加]
         * @return [type] [description]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function add_article()
        {
            if (request()->isAjax()) {

                $param = input('post.');
                $article = new ArticleModel();
                $flag = $article->insertArticle($param);
                return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            }

            return $this->fetch();
        }


        /**
         * [edit_article 编辑]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function edit_article()
        {
            $article = new ArticleModel();
            if (request()->isAjax()) {

                $param = input('post.');
                $flag = $article->updateArticle($param);
                return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
            }

            $id = input('param.id');
            $this->assign('article', $article->getOneArticle($id));
            return $this->fetch();
        }

        /**
         * [del_article 删除]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function del_article()
        {
            $id = input('param.id');
            $cate = new ArticleModel();
            $flag = $cate->delArticle($id);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        /**
         * [details 详情]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function details()
        {
            $map = [];
            $map['uid'] = input("param.id");
            $time = strtotime(input("get.time"));
            $where['createtime'] =  array('between', array($time, $time+24*60*60));
            $Nowpage = input('get.page') ? input('get.page') : 1;
            $limits = config('list_rows');// 获取总条数
            $count = Db::name('monitor')->where($map)->count();//计算本周总页面
            $allpage = intval(ceil($count / $limits));
            $monitor = new MonitorModel();
            $data = $monitor->getDetailsByWhere($map, $Nowpage, $limits);
            //查询今天微信号复制数
            $today = Db::name('monitor')->field("*,count(*) as total")->whereTime('createtime', 'today')->where($map)->group('wxnum')->select();
            //查询昨天微信号复制数
            $yesterday = Db::name('monitor')->field("*,count(*) as total")->whereTime('createtime', 'yesterday')->where($map)->group('wxnum')->select();
            //查询本周微信号复制数
            $week = Db::name('monitor')->field("*,count(*) as total")->whereTime('createtime', 'week')->where($map)->group('wxnum')->select();
            //缓存今天数据
            $toData = Db::name('monitor')->where($map)->whereTime('createtime', 'today')->select();
            //缓存昨天数据
            $lastData = Db::name('monitor')->where($map)->whereTime('createtime', 'yesterday')->select();
            //缓存数据
            $xlsData = Db::name('monitor')->where($map)->select();

            $this->assign('Nowpage', $Nowpage); //当前页
            $this->assign('allpage', $allpage); //总页数
            $this->assign('count', $count);
            $this->assign('list', $today);
            $this->assign('list1', $yesterday);
            $this->assign('week', $week);
            $this->assign('data', $data);
            cache('data1', $toData);
            cache('data2', $lastData);
            cache('data', $xlsData);
            return $this->fetch();
        }

        /**
         * [excel 下载今天数据]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function today()
        {
            $xlsData = cache('data1');
            Vendor('PHPExcel.PHPExcel');//调用类库,路径是基于vendor文件夹的
            Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');
            Vendor('PHPExcel.PHPExcel.Writer.Excel2007');
            $objExcel = new \PHPExcel();
            //set document Property
            $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

            $objActSheet = $objExcel->getActiveSheet();
            $key = ord("A");
            $letter = explode(',', "A,B,C,D,E,F,G,H");
            $arrHeader = array('IP地址', 'IP地区', '微信号', '复制动作', '关键字', '搜索引擎', 'URL链接', '时间');
            //填充表头信息
            $lenth = count($arrHeader);
            for ($i = 0; $i < $lenth; $i++) {
                $objActSheet->setCellValue("$letter[$i]1", "$arrHeader[$i]");
            };
            //填充表格信息
            foreach ($xlsData as $k => $v) {
                $k += 2;
                $objActSheet->setCellValue('A' . $k, $v['ipAddr']);
                $objActSheet->setCellValue('B' . $k, $v['address']);
                $objActSheet->setCellValue('C' . $k, $v['wxnum']);
                $objActSheet->setCellValue('D' . $k, $v['ope']);
                $objActSheet->setCellValue('E' . $k, $v['keyword']);
                $objActSheet->setCellValue('F' . $k, $v['engine']);
                $objActSheet->setCellValue('G' . $k, $v['url']);
                $objActSheet->setCellValue('H' . $k, date('Y-m-d H:i:s', $v['createtime']));
                // 表格高度
                $objActSheet->getRowDimension($k)->setRowHeight(20);
            }

            $width = array(5, 15, 20, 25, 30, 40);
            //设置表格的宽度
            $objActSheet->getColumnDimension('A')->setWidth($width[1]);
            $objActSheet->getColumnDimension('B')->setWidth($width[2]);
            $objActSheet->getColumnDimension('C')->setWidth($width[2]);
            $objActSheet->getColumnDimension('D')->setWidth($width[3]);
            $objActSheet->getColumnDimension('E')->setWidth($width[3]);
            $objActSheet->getColumnDimension('F')->setWidth($width[4]);
            $objActSheet->getColumnDimension('G')->setWidth($width[5]);
            $objActSheet->getColumnDimension('H')->setWidth($width[4]);


            $outfile = "微信号_" . date("Y_m_d", time()) . ".xls";
            ob_end_clean();
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header('Content-Disposition:inline;filename="' . $outfile . '"');
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Pragma: no-cache");
            $objWriter->save('php://output');
        }

        /**
         * [excel 下载今天数据]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function yesterday()
        {
            $xlsData = cache('data2');
            Vendor('PHPExcel.PHPExcel');//调用类库,路径是基于vendor文件夹的
            Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');
            Vendor('PHPExcel.PHPExcel.Writer.Excel2007');
            $objExcel = new \PHPExcel();
            //set document Property
            $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

            $objActSheet = $objExcel->getActiveSheet();
            $key = ord("A");
            $letter = explode(',', "A,B,C,D,E,F,G,H");
            $arrHeader = array('IP地址', 'IP地区', '微信号', '复制动作', '关键字', '搜索引擎', 'URL链接', '时间');
            //填充表头信息
            $lenth = count($arrHeader);
            for ($i = 0; $i < $lenth; $i++) {
                $objActSheet->setCellValue("$letter[$i]1", "$arrHeader[$i]");
            };
            //填充表格信息
            foreach ($xlsData as $k => $v) {
                $k += 2;
                $objActSheet->setCellValue('A' . $k, $v['ipAddr']);
                $objActSheet->setCellValue('B' . $k, $v['address']);
                $objActSheet->setCellValue('C' . $k, $v['wxnum']);
                $objActSheet->setCellValue('D' . $k, $v['ope']);
                $objActSheet->setCellValue('E' . $k, $v['keyword']);
                $objActSheet->setCellValue('F' . $k, $v['engine']);
                $objActSheet->setCellValue('G' . $k, $v['url']);
                $objActSheet->setCellValue('H' . $k, date('Y-m-d H:i:s', $v['createtime']));
                // 表格高度
                $objActSheet->getRowDimension($k)->setRowHeight(20);
            }

            $width = array(5, 15, 20, 25, 30, 40);
            //设置表格的宽度
            $objActSheet->getColumnDimension('A')->setWidth($width[1]);
            $objActSheet->getColumnDimension('B')->setWidth($width[2]);
            $objActSheet->getColumnDimension('C')->setWidth($width[2]);
            $objActSheet->getColumnDimension('D')->setWidth($width[3]);
            $objActSheet->getColumnDimension('E')->setWidth($width[3]);
            $objActSheet->getColumnDimension('F')->setWidth($width[4]);
            $objActSheet->getColumnDimension('G')->setWidth($width[5]);
            $objActSheet->getColumnDimension('H')->setWidth($width[4]);


            $outfile = "微信号_" . date("Y_m_d", time()) . ".xls";
            ob_end_clean();
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header('Content-Disposition:inline;filename="' . $outfile . '"');
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Pragma: no-cache");
            $objWriter->save('php://output');
        }


        /**
         * [excel 下载数据]
         * @author 【zero】 [1056258716@qq.com]
         */
        public function excel()
        {
            $xlsData = cache('data');
            Vendor('PHPExcel.PHPExcel');//调用类库,路径是基于vendor文件夹的
            Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');
            Vendor('PHPExcel.PHPExcel.Writer.Excel2007');
            $objExcel = new \PHPExcel();
            //set document Property
            $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');

            $objActSheet = $objExcel->getActiveSheet();
            $key = ord("A");
            $letter = explode(',', "A,B,C,D,E,F,G,H");
            $arrHeader = array('IP地址', 'IP地区', '微信号', '复制动作', '关键字', '搜索引擎', 'URL链接', '时间');
            //填充表头信息
            $lenth = count($arrHeader);
            for ($i = 0; $i < $lenth; $i++) {
                $objActSheet->setCellValue("$letter[$i]1", "$arrHeader[$i]");
            };
            //填充表格信息
            foreach ($xlsData as $k => $v) {
                $k += 2;
                $objActSheet->setCellValue('A' . $k, $v['ipAddr']);
                $objActSheet->setCellValue('B' . $k, $v['address']);
                $objActSheet->setCellValue('C' . $k, $v['wxnum']);
                $objActSheet->setCellValue('D' . $k, $v['ope']);
                $objActSheet->setCellValue('E' . $k, $v['keyword']);
                $objActSheet->setCellValue('F' . $k, $v['engine']);
                $objActSheet->setCellValue('G' . $k, $v['url']);
                $objActSheet->setCellValue('H' . $k, date('Y-m-d H:i:s', $v['createtime']));
                // 表格高度
                $objActSheet->getRowDimension($k)->setRowHeight(20);
            }

            $width = array(5, 15, 20, 25, 30, 40);
            //设置表格的宽度
            $objActSheet->getColumnDimension('A')->setWidth($width[1]);
            $objActSheet->getColumnDimension('B')->setWidth($width[2]);
            $objActSheet->getColumnDimension('C')->setWidth($width[2]);
            $objActSheet->getColumnDimension('D')->setWidth($width[3]);
            $objActSheet->getColumnDimension('E')->setWidth($width[3]);
            $objActSheet->getColumnDimension('F')->setWidth($width[4]);
            $objActSheet->getColumnDimension('G')->setWidth($width[5]);
            $objActSheet->getColumnDimension('H')->setWidth($width[4]);


            $outfile = "微信号_" . date("Y_m_d", time()) . ".xls";
            ob_end_clean();
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header('Content-Disposition:inline;filename="' . $outfile . '"');
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Pragma: no-cache");
            $objWriter->save('php://output');
        }


    }