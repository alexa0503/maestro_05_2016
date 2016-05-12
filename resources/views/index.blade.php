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
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM4.png')}})" sleM="4"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM5.png')}})" sleM="5"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM6.png')}})" sleM="6"></div>
                                        <div class="swiper-slide" style="background-image:url({{asset('images/sleM7.png')}})" sleM="7"></div>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="abs arrowLeft"><img src="{{asset('images/arrowLeft.png')}}"></a>
                                <a href="javascript:void(0);" class="abs arrowRight"><img src="{{asset('images/arrowRight.png')}}"></a>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="abs page1Btn1" onClick="goPage2();"><img src="{{asset('images/page1Btn1.png')}}"></a>
                    </div>
                </div>
            </div>

            <div class="page page2" style="display:none;">
                <div class="h1008">
                    <div class="innerDiv">
                        <div class="p2Step1">
                            <div class="model bgImg"></div>
                            <img src="{{asset('images/logo.png')}}" class="logo">

                            <a href="javascript:void(0);" class="abs page2Btn1"><img src="{{asset('images/page2Btn1.png')}}"></a>
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
                            <img src="{{asset('images/faceResize.png')}}" class="abs faceResize">
                            <img src="{{asset('images/zsImg1.png')}}" class="abs zsImg zsImg1" id="zsImg" style="display:none;">
                            <div id="modelMImg"></div>
                            <div id="modelMImg2" style="display:none;"></div>


                            <img src="{{asset('images/logo.png')}}" class="logo">

                            <div class="abs page3Tag"></div>

                            <div class="diyTxt1">从未被撞衫，造点<input type="text" class="diyTxt1Input" maxlength="2">的</div>
                            <div class="diyTxt2">我是<input type="text" class="diyTxt2Input diyTxt2Input1" maxlength="10">@<input type="text" class="diyTxt2Input diyTxt2Input2" maxlength="10"></div>
                            {!! csrf_field() !!}

                            <a href="javascript:void(0);" class="abs page2Btn1"><img src="{{asset('images/page3Btn1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs page2Btn2" onClick="goPage4();"><img src="{{asset('images/page3Btn2.png')}}"></a>

                            <a href="javascript:void(0);" class="abs zsBtn zsBtn1" onClick="changZs(1);"><img src="{{asset('images/zs1.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn2" onClick="changZs(1);"><img src="{{asset('images/zs2.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn3" onClick="changZs(1);"><img src="{{asset('images/zs3.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn4" onClick="changZs(1);"><img src="{{asset('images/zs4.png')}}"></a>
                            <a href="javascript:void(0);" class="abs zsBtn zsBtn5" onClick="changZs(1);"><img src="{{asset('images/zs5.png')}}"></a>
                        </div>

                        <input type="file" class="fileBtn" id="uploadBtn"/>
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
                        <div class="page5Step bgImg"></div>
                        <!-- 转盘 -->
                        <div class="lyOuter">
                            <div class="ly-plate">
                                <div class="begin"></div>
                                <div class="rotate-bg"></div>
                                <div class="lottery-star"><img src="{{asset('images/lotteryImg2.png')}}" id="lotteryBtn"></div>
                            </div>
                        </div>
                        <!-- 转盘 end -->
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
@endsection
