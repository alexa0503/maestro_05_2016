<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>{{env("PAGE_TITLE")}}</title>
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    <script>
        var wxData = {};
        var uploadUrl;
        var isWechat = false;
		var noWechatShareTitle='';//分享标题
		var noWechatSharlUrl='';//分享地址
		var noWechatShareImg='';//分享小图
		var noWechatShareTxt='';//分享文案
    </script>
    <script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{asset('js/swiper.min.js')}}"></script>
    <script src="{{asset('js/hammer.js')}}"></script>
    <script src="{{asset('js/exif.js')}}"></script>
    <script src="{{asset('js/jQueryRotate.2.2.js')}}"></script>
    <script src="{{asset('js/wx.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
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
@yield('scripts')
</body>
</html>
