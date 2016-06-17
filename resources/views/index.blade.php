@extends('layouts.app')
@section('content')
<style>
 body{background:url({{cdn('images/loadingBg.jpg')}}) center top no-repeat #062673;}
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
                                    	<div class="swiper-slide" style="background-image:url({{cdn('images/sleM5.png')}})" sleM="5"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM1.png')}})" sleM="1"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM2.png')}})" sleM="2"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM3.png')}})" sleM="3"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM6.png')}})" sleM="6"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM7.png')}})" sleM="7"></div>
                                        <div class="swiper-slide" style="background-image:url({{cdn('images/sleM4.png')}})" sleM="4"></div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="abs arrowLeft"><img src="{{cdn('images/arrowLeft.png')}}"></a>
                                <a href="javascript:void(0);" class="abs arrowRight"><img src="{{cdn('images/arrowRight.png')}}"></a>
                            </div>
                        </div>
                        <a href="http:\/\/campaign.maestro.com.cn/music/public/image?selM=" onClick="mztrack('GAMESTART');var tLink=$(this).attr('href');ga('tt.send','event','button','click','GAMESTART');ga('send','event','button','click','GAMESTART',{'hitCallback':function(){window.location.href=tLink;}});" class="abs page1Btn1"><img src="{{cdn('images/page1Btn1.png')}}" /></a>
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
            wxData.imgUrl = 'http:{{cdn(env("WECHAT_SHARE_IMG"))}}';
            wxData.debug = false;
            wxShare(wxData);
            //resizeImg();

			var images = [];
			images.push("{{cdn('images/bg1.jpg')}}");
			images.push("{{cdn('images/page1Img1.png')}}");
			images.push("{{cdn('images/sleM1.png')}}");
			images.push("{{cdn('images/sleM2.png')}}");
			images.push("{{cdn('images/sleM3.png')}}");
			images.push("{{cdn('images/sleM4.png')}}");
			images.push("{{cdn('images/sleM5.png')}}");
			images.push("{{cdn('images/sleM6.png')}}");
			images.push("{{cdn('images/sleM7.png')}}");

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

							$('body').css('background', "url({{cdn('images/bg1.jpg')}}) center top no-repeat #062673");
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
