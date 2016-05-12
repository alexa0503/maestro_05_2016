<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>{{env("PAGE_TITLE")}}</title>
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <script src="{{asset('js/hammer.js')}}"></script>
    <script src="{{asset('js/exif.js')}}"></script>
    <script src="{{asset('js/jQueryRotate.2.2.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <!--移动端版本兼容 -->
    <script type="text/javascript">
        var phoneWidth = parseInt(window.screen.width);
        var phoneScale = phoneWidth / 640;
        var ua = navigator.userAgent;
        if (/Android (\d+\.\d+)/.test(ua)) {
            var version = parseFloat(RegExp.$1);
            if (version > 2.3) {
                document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi , user-scalable=no">');
            } else {
                document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi , user-scalable=no">');
            }
        } else {
            document.write('<meta name="viewport" content="width=640, minimum-scale=0.1, maximum-scale=1.0 , user-scalable=no" />');
        }
    </script>
    <!--移动端版本兼容 end -->
</head>
<body>
@yield('content')
        <!-- JavaScripts -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="{{asset('js/wx.js')}}"></script>
<script type="text/javascript">
    $().ready(function () {
        $.ajax({
            url: 'http://campaign.maestro.com.cn/api/wechat/index.php?c=index&m=sign',
            dataType: 'jsonp',
            jsonp: 'callback',
            data: {url: location.href},
            success: function (data) {
                data.title = '{{env("WECHAT_SHARE_TITLE")}}';
                data.desc = '{{env("WECHAT_SHARE_DESC")}}';
                data.link = '{{env("APP_URL")}}';
                data.imgUrl = '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}';
                wxShare(data);
            },
            error: function () {
            }
        })
    })
</script>
</body>
</html>
