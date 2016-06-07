<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <title>{{env("PAGE_TITLE")}}</title>
    <link rel="stylesheet" href="{{cdn('css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{cdn('css/common.css')}}">
    <script>
        var wxData = {};
        var uploadUrl;
        var isWechat = false;
		var noWechatShareTitle='';//分享标题
		var noWechatSharlUrl='';//分享地址
		var noWechatShareImg='';//分享小图
		var noWechatShareTxt='';//分享文案
    </script>
    <script src="{{cdn('js/jquery-2.1.1.min.js')}}"></script>
    <script src="{{cdn('js/swiper.min.js')}}"></script>
    <script src="{{cdn('js/hammer.js')}}"></script>
    <script src="{{cdn('js/exif.js')}}"></script>
    <script src="{{cdn('js/jQueryRotate.2.2.js')}}"></script>
    <script src="{{cdn('js/wx.js')}}"></script>
    <script src="{{cdn('js/jquery.imgpreload.js')}}"></script>
    <script src="{{cdn('js/glfx.js')}}"></script>
    <script src="{{cdn('js/common.js')}}"></script>
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

	var isIOS=false;
	try{
		if (/iPhone|iPod|iPad/i.test(navigator.userAgent)) {
		//移动端
		isIOS=true;
		}else{
		//pc端
		}
	}catch(e){}
    </script>
    <!--移动端版本兼容 end -->
</head>
<body>
@yield('content')
@yield('scripts')

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78899122-2', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>
