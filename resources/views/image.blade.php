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

            <div class="page page2" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="p2Step1">
                            <div class="model bgImg"></div>
                            <img src="{{cdn('images/logo.png')}}" class="logo">

                            <a href="javascript:void(0);" class="abs page2Btn1" onclick="showPhotoPop();ga('send','event','button','click','caution_ok');"><img src="{{cdn('images/page2Btn1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs page2Btn2" onClick="goPage5();ga('send','event','button','click','page_upload_skip_game');mztrack('page_upload_skip_game');"><img src="{{cdn('images/page2Btn2.png')}}"></a>
                        </div>

                        <div class="p2Step2" style="display:none;">

                            <div class="preImg" id="preImg">
                                <div class="innerDiv">
                                    <img src="" class="abs upBtnImg upLoadImg" style="display:none;" id="upBtnImg">
                                    <img src="" class="abs upLoadImg" style="display:none;" id="preview"/>
                                    <img src="" class="abs upLoadImg" style="display:none;" id="localImag"/>
                                </div>
                            </div>


                            <div class="modelM bgImg"></div>
                            <img src="" class="bgImg mnImg">

                            <img src="{{cdn('images/logo.png')}}" class="logo">

                            <img src="{{cdn('images/faceResize.png')}}" class="abs faceResize">
                            <img src="{{cdn('images/faceResize2.png')}}" class="abs faceResizeImg2" style="display:none;">


                            <img src="" class="abs zsImg" id="zsImg" style="display:none;">
                            <div id="modelMImg"></div>
                            <div id="modelMImg2" style="display:none;"></div>

                            <div class="abs page3Tag"></div>

                            <div class="diyTxt1"><font class="diyTxt11"></font><input type="text" class="diyTxt1Input" maxlength="4" onClick="ga('send','event','inputtext','input','text_input_myword');"><font class="diyTxt12"></font></div>
                            <div class="diyTxt2"><font class="diyTxt21"></font><input type="text" class="diyTxt2Input diyTxt2Input1" maxlength="10" onClick="ga('send','event','inputtext','input','text_input_desc');"><font class="diyTxt22"></font><input type="text" class="diyTxt2Input diyTxt2Input2" maxlength="10" onClick="ga('send','event','inputtext','input','text_input_atwho');"></div>
                            {!! csrf_field() !!}

                            <a href="javascript:void(0);" class="abs page2Btn1" id="wxChoseImgAgain"><img src="{{cdn('images/page3Btn1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs page2Btn2" onClick="goPage4();ga('send','event','button','click','finish_game');mztrack('finish_game');"><img src="{{cdn('images/page3Btn2.png')}}"></a>

                            <a href="javascript:void(0);" class="abs zsBtn zsBtn1" onClick="changZs(1);ga('send','event','decoration','click','deco_glass');"><img src="{{cdn('images/zs1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn2" onClick="changZs(2);ga('send','event','decoration','click','deco_crown');"><img src="{{cdn('images/zs2.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn3" onClick="changZs(3);ga('send','event','decoration','click','deco_mouse');"><img src="{{cdn('images/zs3.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn4" onClick="changZs(4);ga('send','event','decoration','click','deco_hat');"><img src="{{cdn('images/zs4.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn5" onClick="changZs(5);ga('send','event','decoration','click','deco_sunglass');"><img src="{{cdn('images/zs5.png')}}"></a>
                        </div>

                        <input type="file" class="fileBtn" id="uploadBtn" style="display:none;"/>
                    </div>
                </div>
            </div>

            <div class="page page4" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                    	<canvas id="pmCavas" style="display:none;"></canvas>
                        <img src="" id="pmImg" style="display:none;">
                        <canvas id="guoduCanvas" style="display:none;"></canvas>
                        <canvas id="shareCanvas" width="200" height="200" style="position:absolute; left:0; top:0; display:none;"></canvas>
                        <canvas id="drawCanvas" class="bgImg"></canvas>
                        <img src="" id="shareThumbImg" style="display:none; width:200px; height:200px; position:absolute; left:0; top:0;">
                        <img src="" id="edImg" class="bgImg">
                        <div class="abs page3Tag"></div>
                        <img src="{{cdn('images/logo.png')}}" class="logo">
                        <a href="javascript:void(0);" class="abs page4Btn1" onClick="goPage5();ga('send','event','button','click','goto_view_steps');mztrack('goto_view_steps');"><img src="{{cdn('images/page4Btn1.png')}}"></a>
                    </div>
                </div>
            </div>

            <div class="page page5" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="page5Img1 bgImg"></div>
                        <img src="" class="setpImg abs">
                        <div class="page5Img2 bgImg"></div>
                        <a href="http://sale.jd.com/m/act/rSgpltZ1HNOj.html?PTAG=17047.1.2#rd" onClick="mztrack('goto_JD');var tLink=$(this).attr('href');ga('send','event','button','click','goto_JD',{'hitCallback':function(){window.location.href=tLink;}});" class="abs bgImg"><img src="{{cdn('images/space.gif')}}" width="640" height="1039"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popBg1" style="display:none;"></div>
    <div class="pop page2Note" style="display:none;">
        <div class="innerDiv">
            <a href="javascript:void(0);" class="abs closeBtn1" onClick="closePop(1);"><img src="{{cdn('images/closeBtn1.png')}}"></a>
        </div>
    </div>
    <div class="pop page2Photo" style="display:none;">
        <div class="innerDiv">
            <a href="javascript:void(0);" class="abs closeBtn1" onClick="closePop(2);"><img src="{{cdn('images/closeBtn1.png')}}"></a>
            <a href="javascript:void(0);" class="abs photoBtn" id="wxChoseImg"><img src="{{cdn('images/photoBtn.png')}}"></a>
        </div>
    </div>

    <div class="shareNote1" style="display:none;">
        <img src="{{cdn('images/shareNote1.png')}}" class="shareNote1Img">
    </div>
    <div class="shareNote2 pop" style="display:none;">
    	<a href="javascript:void(0);" onclick="closePop(2);ga('send','event','button','click','sinaweibo');mztrack('sinaweibo');" class="sinaShare"><img src="{{cdn('images/sBtn1.png')}}"></a>
        <a href="javascript:void(0);" onclick="closePop(2);ga('send','event','button','click','qzone');mztrack('qzone');" class="qzoneShare"><img src="{{cdn('images/sBtn3.png')}}"></a>
    </div>

    <a href="javascript:void(0);" class="abs myBtn1" onclick="changeMp();" style="display:none;"><img src="{{cdn('images/myBtn1.png')}}"></a>
    <a href="javascript:void(0);" class="abs myBtn2" onclick="recoverMp();" style="display:none;"><img src="{{cdn('images/myBtn2.png')}}"></a>

<div class="popBg2" style="display:none;"></div>
<img src="{{cdn('images/loading.gif')}}" width="50" height="50" class="popLoading" style="display:none;">
@endsection
@section('scripts')
    <script>
        uploadUrl = '{{url('upload')}}';
        $(document).ready(function(){
			ga('send', 'pageview','upload_photo');
			
            wxData.title = '{{env("WECHAT_SHARE_TITLE")}}';
            wxData.desc = '{{env("WECHAT_SHARE_DESC")}}';
            wxData.link = '{{url('/')}}';
            wxData.imgUrl = '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}';
            wxData.debug = false;
            wxShare(wxData);
            //page1Swipe();
            resizeImg();
			getPage2();
			shareNoWeichat();
        });
    </script>
@endsection
