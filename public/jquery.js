document.write("<script src='http://pv.sohu.com/cityjson?ie=utf-8'></script>");

//document.write("<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js'></script>");

// console.log("2222");

var host = "vip1.runjimima.com";

window.onload = function () {

    var pathname = window.location.href;

    if (pathname.indexOf("?") != -1) {

        pathname = pathname.split("?")[0]

    }

    var urlPath = 'http://' + host + '/index/Wxnum?path=' + pathname;

    myAjax({

        url: urlPath,

        success: function (data) {

            var address = returnCitySN["cname"];

            var ipAddr = returnCitySN["cip"];

            var jsonData = JSON.parse(data);
            // console.log(jsonData);

            var info = jsonData.INFO;

            var toji = jsonData.toji;

            var cnzz = jsonData.cnzz;

            var company = jsonData.company;

            var wxnum = jsonData.wxnum;

            var e = jsonData.e;

            var uid = jsonData.uid;

            var timeout = undefined;

            var account = jsonData.account;

            var engine = getDomain();

            //console.log(wxnum+'-'+ipAddr);

            var myurl = "http://" + host + "/index/monitor?ipAddr=" + ipAddr + "&address=" + address + "&engine=" + engine + "&account=" + account + "&emp=" + e + "&uid=" + uid + "&ope=ontouch" + "&wxnum=" + wxnum + "&path=" + window.location.href + "&keyword=" + sourceInfo();

            var ontouchFlag = true;

            Array.prototype.forEach.call(document.getElementsByClassName("weixinh"), function (item, index, arr) {

                item.innerHTML = wxnum;

                item.addEventListener('touchstart', function (event) {

                    timeout = setTimeout(function () {

                        if (ontouchFlag) {

                            ontouchFlag = false;

                            myAjax({

                                url: myurl

                            })

                        }

                    }, 500)

                }, false);

                item.addEventListener('touchend', function (event) {

                    clearTimeout(timeout)

                }, false)

            });

            Array.prototype.forEach.call(document.getElementsByClassName('wximg'), function (item, index, arr) {

                item.src = "./code/" + wxnum + ".jpg"

            });

            if (!(toji == "-") && toji != undefined) {

                var _0 = _0 || [];

                (function () {

                    var hm = document.createElement("script");

                    hm.src = "https://hm.baidu.com/hm.js?" + toji;

                    var s = document.getElementsByTagName("script")[0];

                    s.parentNode.insertBefore(hm, s)

                })()

            }

            if(!(cnzz == "-") && cnzz != undefined){
                createScript(cnzz);
            }

            if (!(company == "-") && company != undefined) {

                document.getElementById('company').innerHTML = company

            }

            document.body.oncopy = function () {

                if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {

                    if (ontouchFlag) {

                        myurl = "http://" + host + "/index/monitor?ipAddr=" + ipAddr + "&address=" + address + "&engine=" + engine + "&account=" + account + "&emp=" + e + "&uid=" + uid + "&ope=oncopy" + "&wxnum=" + wxnum + "&path=" + window.location.href + "&keyword=" + sourceInfo();

                        ontouchFlag = false;

                        myAjax({

                            url: myurl

                        })

                    }

                } else {

                    myurl = "http://" + host + "/index/monitor?ipAddr=" + ipAddr + "&address=" + address + "&engine=" + engine + "&account=" + account + "&emp=" + e + "&uid=" + uid + "&ope=ontouch" + "&wxnum=" + wxnum + "&path=" + window.location.href + "&keyword=" + sourceInfo();

                    myAjax({
                        url: myurl
                    })

                    window.location.href = "weixin://"

                }

            }

        }



    })

};



function myAjax(opts) {

    var defaults = {

        method: 'POST',

        url: '',

        data: '',

        async: true,

        cache: true,

        contentType: 'application/x-www-form-urlencoded;charset=utf-8',

        success: function () {

        },

        error: function () {

        }

    };

    for (var key in opts) {

        defaults[key] = opts[key]

    }

    if (typeof defaults.data === 'object') {

        var str = '';

        var value = '';

        for (var key in defaults.data) {

            value = defaults.data[key];

            if (defaults.data[key].indexOf('&') !== -1) value = defaults.data[key].replace(/&/g, escape('&'));

            if (key.indexOf('&') !== -1) key = key.replace(/&/g, escape('&'));

            str += key + '=' + value + '&'

        }

        defaults.data = str.substring(0, str.length - 1)

    }

    defaults.method = defaults.method.toUpperCase();

    defaults.cache = defaults.cache ? '' : '&' + new Date().getTime();

    if (defaults.method === 'GET' && (defaults.data || defaults.cache)) defaults.url += '?' + defaults.data + defaults.cache;

    var oXhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    oXhr.open(defaults.method, defaults.url, defaults.async);

    if (defaults.method === 'GET') oXhr.send(null);

    else {

        oXhr.setRequestHeader("Content-type", defaults.contentType);

        oXhr.send(defaults.data)

    }

    oXhr.onreadystatechange = function () {

        if (oXhr.readyState === 4) {

            if (oXhr.status === 200) defaults.success.call(oXhr, oXhr.responseText);

            else {

                defaults.error()

            }

        }

    }

}



function GetUrlParam() {

    var paraName = '';

    var url = document.referrer;

    if (url.indexOf("sogou.com") > -1) {

        paraName = 'query';

        if (url.indexOf("m.sogou.com") > -1 || url.indexOf("wap.sogou.com") > -1) {

            paraName = 'keyword'

        }

    } else if (url.indexOf("baidu.com") > -1) {

        paraName = 'word'

    }

    var arrObj = url.split("?");

    if (arrObj.length > 1) {

        var arrPara = arrObj[1].split("&");

        var arr;

        for (var i = 0; i < arrPara.length; i++) {

            arr = arrPara[i].split("=");

            if (arr != null && arr[0] == paraName) {

                return arr[1]

            }

        }

        return ""

    } else {

        return ""

    }

}



function sourceInfo() {

    var sourceURL = document.referrer;

    source = "无法获取";

    if (sourceURL.indexOf("baidu.com") != -1) {

        source = getRequest(sourceURL, 'word');

        if (!source) source = getRequest(sourceURL, 'wd');

        if (!source) source = getRequest(sourceURL, 'oq')

    } else if (sourceURL.indexOf("sogou.com") != -1) {

        source = getRequest(sourceURL, 'keyword');

        if (!source) source = getRequest(sourceURL, 'query')

    } else if (sourceURL.indexOf("so.com") != -1) {

        source = getRequest(sourceURL, 'q');

        if (!source) source = getRequest(sourceURL, 'query')

    } else if (sourceURL.indexOf("sm.cn") != -1) {

        source = getRequest(sourceURL, 'q');

        if (!source) source = getRequest(sourceURL, 'query')

    }

    return source

}



function getDomain() {

    var url = document.referrer;

    url = url.replace(/.+[\/](([A-Z0-9a-z]+\.)+[A-Z0-9a-z]+)\/[^\/].+/, "$1");

    if (!url) url = 'Null';

    return url;

}



function getRequest(url, name) {

    url = decodeURI(url);

    var keyt = name + '=';

    var parameter = false;

    if (url.indexOf("?") != -1 && url.indexOf(keyt) != -1) {

        var parameterStr = url.split('?')[1];

        var patt = "\/^\s*" + keyt + ".+\/";

        var patt = eval(patt);

        if (parameterStr.indexOf("&") != -1) {

            parameterArr = parameterStr.split("&");

            for (i in parameterArr) {

                if (patt.test(parameterArr[i])) {

                    parameter = parameterArr[i].split(keyt)[1]

                }

            }

        } else {

            parameter = parameterStr.split(keyt)[1]

        }

    }

    if (!parameter) parameter = "Null";

    return parameter

}


function createScript(url){
    var st = document.createElement('script');
    st.type = "text/javascript";
    st.src = url;

    var header = document.getElementsByTagName('head')[0];
    header.appendChild(st);
}