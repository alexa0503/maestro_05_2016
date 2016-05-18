@extends('layouts.app')
@section('content')
<style>
 body{background:url({{asset('images/loadingBg.jpg')}}) center top no-repeat #FFF;}
</style>
    <div class="pageOuter">
        <div class="innerDiv">
        	<div class="page0">
            	<div class="loadingImg"></div>
            </div>
        
            <div class="page page1" style="display:none;">
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
	var page2Url='{{url('image')}}';
        uploadUrl = '{{url('upload')}}';
        $(document).ready(function(){
            wxData.title = '{{env("WECHAT_SHARE_TITLE")}}';
            wxData.desc = '{{env("WECHAT_SHARE_DESC")}}';
            wxData.link = location.href;
            wxData.imgUrl = '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}';
            wxData.debug = false;
            wxShare(wxData);
            //resizeImg();
			
			var images = [];
			images.push("{{asset('images/bg1.jpg')}}");
			images.push("{{asset('images/page1Img1.png')}}");
			images.push("{{asset('images/sleM1.png')}}");
			images.push("{{asset('images/sleM2.png')}}");
			images.push("{{asset('images/sleM3.png')}}");
			images.push("{{asset('images/sleM4.png')}}");
			images.push("{{asset('images/sleM5.png')}}");
			images.push("{{asset('images/sleM6.png')}}");
			images.push("{{asset('images/sleM7.png')}}");
			
			/*图片预加载*/
			var imgNum = 0;
			$.imgpreload(images,
				{
					each: function () {
						var status = $(this).data('loaded') ? 'success' : 'error';
						if (status == "success") {
						}
					},
					all: function () {
						setTimeout(function(){
							
							$('body').css('background', "url({{asset('images/bg1.jpg')}}) center top no-repeat");
							$('.page0').fadeOut(500);
							$('.page1').fadeIn(500);
							setTimeout(function(){
								page1Swipe();
								},100);
							},1000);
					}
				});
			
        });
    </script>
@endsection
