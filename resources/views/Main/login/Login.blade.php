@extends('Masters.Main')
@section('title','ورود')
@section('content')
    @include('Partials.GeneralHeader')
    <div class="login-div-main">        
        @if(session('danger'))
			<div class="alert alert-danger" style="margin-top: 30px">
				{{ session('danger') }}
			</div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger" style="margin-top: 20px">
                @foreach($errors->all() as $val)
                    {{ $val }}
                @endforeach
            </div>
        @endif
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 d-none d-sm-block float-left">
            <img src="{{config('app.url').'picture/assets/shape1.svg'}}" class="login-image-right"/>
        </div>
        <div class="col-xl-12 col-1g-12 col-md-10 p-0 d-flex justify-content-center align-items-center">            
            <form class="col-xl-8 col-lg-10 col-md-12 text-center" method="POST">
                {{ csrf_field() }}
                <div class="d-flex flex-row-reverse row text-right ml-0 ml-md-4" >
                    <div class="text-left border-bottom border-dark col-xl-2 col-lg-2 col-md-3 col-sm-2 col-5 pt-3 mr-4 ">
                        <span >:ایمیل</span>
                        <span style="color:#f6a619">&#9672;</span>
                    </div>
                    <input type="email" name="email_ng" class="form-control mt-2 col-sm-9 col-11" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted text-left col-sm-9 col-12 form-text-email">آدرس ایمیل شما پیش ما محفوظ است و تحت هیچ شرایطی منتشر نمی‌شود</small>
                </div>
                <div class="d-flex flex-row-reverse row text-right mt-4 ml-0 ml-md-4">
                    <div class="text-left border-bottom border-dark col-xl-2 col-lg-2 col-md-3 col-sm-2 col-5 pt-3 mr-4">
                        <span >:گذرواژه</span>
                        <span style="color:#f6a619">&#9672;</span>
                    </div>
                    <input type="password" name="password_ng" class="form-control mt-2 col-sm-9 col-11"  placeholder="Password">
                </div>
                <div class="row text-right mt-5 ">
                    <div class="col-md-9 col-12 captcha-container">
                        <span id="Captcha_Image" class="login-captcha-image">{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-success Captcha-refresh-key"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                    </div>
                    <div class="text-left col-xl-2 col-lg-2 col-md-2 pt-3 mr-4 d-none d-md-block">
                        <span >:کد امنیتی</span>
                        <span style="color:#f6a619">&#9672;</span>
                    </div>
                </div>
                <div class="row text-right p-0 mt-2 ml-5 col-12 form-input-capcha">
                    <input type="text" name="captcha_ng" class="form-control mt-2 col-md-9 col-sm-10 col-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                </div>
                <div class="d-flex justify-content-center align-items-center position-relative mt-5">
                    <button type="submit" class="btn btn-success pr-5 pl-5 login-button">ورود</button>
                    <span class="login-button-border-black d-none d-sm-inline-block">!</span>
                </div>
            </form>            
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <a class="text-dark text-decoration-none form-bottom-link-one" href="{{route('Forget')}}">فراموشی رمز عبور</a>
            <span style="margin-right:60px;">/</span>
            <a class="text-dark text-decoration-none form-bottom-link-two" href="{{route('Register')}}">ثبت‌نام در نغمه ماندگار</a>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <img style="width:450px;" src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
        </div>
    </div>
    @include('Partials.mainFooter')
@stop