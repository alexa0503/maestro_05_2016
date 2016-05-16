@extends('layouts.app')
@section('content')
    <div class="pageOuter">
        <div class="innerDiv">
            <div class="page page1">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="page1Img1 bgImg"></div>
                        <div class="scrollBlock">
                            <div class="innerDiv">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM1.png')}})" sleM="1"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM2.png')}})" sleM="2"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM3.png')}})" sleM="3"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM5.png')}})" sleM="5"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM6.png')}})" sleM="6"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM7.png')}})" sleM="7"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM4.png')}})" sleM="4"></div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="abs arrowLeft"><img src="{{asset('images/arrowLeft.png')}}"></a>
                                <a href="javascript:void(0);" class="abs arrowRight"><img src="{{asset('images/arrowRight.png')}}"></a>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="abs page1Btn1" onClick="goPage2Link('{{url('image')}}');"><img src="{{asset('images/page1Btn1.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        uploadUrl = '{{url('upload')}}';
        $(document).ready(function(){
            wxData.title = '{{env("WECHAT_SHARE_TITLE")}}';
            wxData.desc = '{{env("WECHAT_SHARE_DESC")}}';
            wxData.link = location.href;
            wxData.imgUrl = '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}';
            wxData.debug = false;
            wxShare(wxData);
            page1Swipe();
            //resizeImg();
        });
    </script>
@endsection
