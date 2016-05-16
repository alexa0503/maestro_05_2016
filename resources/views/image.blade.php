@extends('layouts.app')
@section('content')
    <div class="pageOuter">
        <div class="innerDiv">
            <div class="page page2">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="p2Step1">
                            <div class="model bgImg"></div>
                            <img src="{{asset('images/logo.png')}}" class="logo">

                            <a href="javascript:void(0);" class="abs page2Btn1" onclick="showPhotoPop();"><img src="{{asset('images/page2Btn1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs page2Btn2" onClick="goPage5();"><img src="{{asset('images/page2Btn2.png')}}"></a>
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
                            
                            <img src="{{asset('images/logo.png')}}" class="logo">
                            
                            <img src="{{asset('images/faceResize.png')}}" class="abs faceResize">
                            <img src="" class="abs zsImg" id="zsImg" style="display:none;">
                            <div id="modelMImg"></div>
                            <div id="modelMImg2" style="display:none;"></div>

                            <div class="abs page3Tag"></div>

                            <div class="diyTxt1"><font class="diyTxt11"></font><input type="text" class="diyTxt1Input" maxlength="4"><font class="diyTxt12"></font></div>
                            <div class="diyTxt2"><font class="diyTxt21"></font><input type="text" class="diyTxt2Input diyTxt2Input1" maxlength="10"><font class="diyTxt22"></font><input type="text" class="diyTxt2Input diyTxt2Input2" maxlength="10"></div>
                            {!! csrf_field() !!}

                            <a href="javascript:void(0);" class="abs page2Btn1" id="wxChoseImgAgain"><img src="{{asset('images/page3Btn1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs page2Btn2" onClick="goPage4();"><img src="{{asset('images/page3Btn2.png')}}"></a>

                            <a href="javascript:void(0);" class="abs zsBtn zsBtn1" onClick="changZs(1);"><img src="{{asset('images/zs1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn2" onClick="changZs(2);"><img src="{{asset('images/zs2.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn3" onClick="changZs(3);"><img src="{{asset('images/zs3.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn4" onClick="changZs(4);"><img src="{{asset('images/zs4.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn5" onClick="changZs(5);"><img src="{{asset('images/zs5.png')}}"></a>
                        </div>

                        <input type="file" class="fileBtn" id="uploadBtn" style="display:none;"/>
                    </div>
                </div>
            </div>

            <div class="page page4" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                        <canvas id="guoduCanvas" style="display:none;"></canvas>
                        <canvas id="drawCanvas" class="bgImg"></canvas>
                        <img src="" id="edImg" class="bgImg">
                        <div class="abs page3Tag"></div>
                        <img src="{{asset('images/logo.png')}}" class="logo">
                        <a href="javascript:void(0);" class="abs page4Btn1" onClick="goPage5();"><img src="{{asset('images/page4Btn1.png')}}"></a>
                    </div>
                </div>
            </div>

            <div class="page page5" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="page5Img1 bgImg"></div>
                        <img src="" class="setpImg abs">
                        <div class="page5Img2 bgImg"></div>
                        <a href="http://www.jd.com" class="abs page5Btn"><img src="{{asset('images/space.gif')}}" width="405" height="70"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popBg1" style="display:none;"></div>
    <div class="pop page2Note" style="display:none;">
        <div class="innerDiv">
            <a href="javascript:void(0);" class="abs closeBtn1" onClick="closePop(1);"><img src="{{asset('images/closeBtn1.png')}}"></a>
        </div>
    </div>
    <div class="pop page2Photo" style="display:none;">
        <div class="innerDiv">
            <a href="javascript:void(0);" class="abs closeBtn1" onClick="closePop(2);"><img src="{{asset('images/closeBtn1.png')}}"></a>
            <a href="javascript:void(0);" class="abs photoBtn" id="wxChoseImg"><img src="{{asset('images/photoBtn.png')}}"></a>
        </div>
    </div>

    <div class="shareNote1" style="display:none;">
        <img src="{{asset('images/shareNote1.png')}}" class="shareNote1Img">
    </div>
    <div class="shareNote2" style="display:none;">
        <img src="{{asset('images/shareNote2.png')}}" class="shareNote2Img">
    </div>
@endsection
@section('scripts')
    <script>
        uploadUrl = '{{url('upload')}}';
        $(document).ready(function(){
            wxData.title = '{{env("WECHAT_SHARE_TITLE")}}';
            wxData.desc = '{{env("WECHAT_SHARE_DESC")}}';
            wxData.link = '{{url('/')}}';
            wxData.imgUrl = '{{env("APP_URL")}}' + '{{env("WECHAT_SHARE_IMG")}}';
            wxData.debug = false;
            wxShare(wxData);
            //page1Swipe();
            resizeImg();
			getPage2();
        });
    </script>
@endsection
