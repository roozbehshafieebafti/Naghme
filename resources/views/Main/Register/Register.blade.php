@extends('Masters.Main')
@section('title',"ثبت‌نام")
@section('content')
    @include('Partials.GeneralHeader')
    <div style="margin-top:350px;margin-bottom:200px;">
            @if(count($errors)>0)
                <div class="alert alert-danger" style="margin-top: 20px">
                    @foreach($errors->all() as $val)
                        {{ $val }}
                    @endforeach
                </div>
            @endif
            <div class="d-flex justify-content-center align-items-center">
                <form onsubmit="form_registration(event)" class="col-6 text-center" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group text-right" >
                        <div class="text-left">:نام</div>
                        <input type="text" name="regiser_name" id="regiser_name" class="form-control mt-2 text-left" placeholder="نام">                        
                    </div>
                    <div class="form-group text-right" >
                        <div class="text-left">:نام‌خانوادگی</div>
                        <input type="text" name="regiser_family" id="regiser_family" class="form-control mt-2 text-left"  placeholder="نام‌خانوادگی">                        
                    </div>
                    <div class="form-group text-right" >
                        <div class="text-left">:ایمیل</div>
                        <input type="email" name="regiser_email" id="regiser_email" class="form-control mt-2" placeholder="example@example.com">
                        <small id="emailHelp" class="form-text text-muted text-left">آدرس ایمیل شما پیش ما محفوظ است و تحت هیچ شرایطی منتشر نمی‌شود</small>
                    </div>
                    <div class="form-group text-right mt-4">
                        <div class="text-left">:گذروازه</div>
                        <input type="password" name="regiser_password" id="regiser_password" class="form-control mt-2" >
                    </div>
                    <div class="form-group text-right mt-4">
                        <div class="text-left">:تکرار گذروازه</div>
                        <input type="password" name="regiser_password_re" id="regiser_password_re" class="form-control mt-2" >
                    </div>
                    <div class="form-group text-right mt-4">
                        <div class="text-left">:کد امنیتی</div>
                        <div class="text-center">
                            <span id="Captcha_Image" style="display:inline-block; width:200px; height:80px;">{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-success"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                        </div>
                        <input type="text" name="regiser_captcha" class="form-control mt-2"  placeholder="کد امنیتی">
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت‌نام</button>
                </form>            
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <a href="">فراموشی رمز عبور</a>
                <span style="margin-right:30px;margin-left:30px">/</span>
                <a href="{{route("Login")}}">ورود به نغمه ماندگار</a>
            </div>
        </div>
    @include('Partials.mainFooter')
@endsection