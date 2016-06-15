@extends('layouts.app')
@section('content')
<style>
 body{background:url({{cdn('images/bg1.jpg')}}) center top no-repeat #062673;}
</style>
    <div class="pageOuter">
        <div class="innerDiv">
            <div class="page page4">
                <div class="h1008">
                    <div class="innerDiv">
                        <img src="{{cdn('uploads/'.$photo->image)}}"  id="edImg" class="bgImg">
                        <div class="abs page3Tag"></div>
                        <img src="{{cdn('images/logo.png')}}" class="logo">
                        <a href="{{url('/')}}" class="abs page4Btn1"><img src="{{cdn('images/page4Btn1.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            wxData.title = '快来膜拜我的新造型，一起有型造起来。';
            wxData.desc = '＃今天怎么造＃膜拜我的新造型？青春无所畏, 造点活力的 , 和我一起造起来吧！多样优惠抢起来! ';
            wxData.link = location.href;
            wxData.imgUrl = 'http:{{cdn("uploads/share/".$photo->image)}}'
            wxShare(wxData);
        });
    </script>
@endsection
