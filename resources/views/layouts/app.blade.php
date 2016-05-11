<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env("PAGE_TITLE")}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/lato.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @yield('scripts')
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">

    </div>
</nav>

@yield('content')

        <!-- JavaScripts -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="{{asset('js/wx.js')}}"></script>
<script type="text/javascript">
    $().ready(function () {
        $.ajax({
            url: 'http://campaign.maestro.com.cn/api/wechat/index.php?c=index&m=sign',
            dataType: 'jsonp',
            jsonp: 'callback',
            data: {url:location.href},
            success: function (data) {
                data.title = '{{env("WECHAT_SHARE_TITLE")}}';
                data.desc = '{{env("WECHAT_SHARE_DESC")}}';
                data.link = '{{env("APP_URL")}}';
                data.imgUrl = '{{env("APP_URL")}}'+'{{env("WECHAT_SHARE_IMG")}}';
                wxShare(data);
            },
            error: function () {
            }
        })
    })
</script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
