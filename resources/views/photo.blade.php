@extends('layouts.app')
@section('content')
    <div class="pageOuter">
        <div class="innerDiv">
            <div class="page page4">
                <div class="h1008">
                    <div class="innerDiv">
                        <img src="{{asset('uploads/'.$photo->image)}}"  id="edImg" class="bgImg">
                        <div class="abs page3Tag"></div>
                        <img src="{{asset('images/logo.png')}}" class="logo">
                        <a href="{{url('/')}}" class="abs page4Btn1"><img src="{{asset('images/page4Btn1.png')}}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
