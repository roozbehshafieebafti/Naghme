@extends('Masters.Main')
@section('title',"ثبت‌نام")
@section('content')
    @include('Partials.GeneralHeader')
    <div class="register-main-div">
            @if(count($errors)>0)
                <div class="alert alert-danger container" style="margin-top: 20px">
                    @foreach($errors->all() as $val)
                        {{ $val }}
                    @endforeach
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger container" style="margin-top: 30px">
                    {{ session('danger') }}
                </div>
            @endif
            <div>
                <img src="{{config('app.url').'picture/assets/shape1.svg'}}" class="register-image-right" />
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <form autocomplete="off" onsubmit="form_registration(event)" class="col-lg-7 col-md-10 col-sm-12 text-center" method="POST">
                    {{ csrf_field() }}
                    <div class="register-div-input row text-right" >
                        <div class="text-left col-md-3 col-sm-4 col-5 pt-3">
                            <div class="border-bottom border-dark" style="width:80%">
                                <span style="color:#f6a619">&#9672;</span>
                                <span >نام :</span>
                            </div>
                        </div>
                        <input type="text" name="regiser_name" id="regiser_name" class="form-control mt-2 col-md-9 col-sm-12 text-left" placeholder="نام">
                    </div>
                    <div class="register-div-input row text-right" >
                        <div class="text-left col-md-3 col-sm-4 col-5 pt-3">
                            <div class="border-bottom border-dark" style="width:80%">
                                <span style="color:#f6a619">&#9672;</span>
                                <span >نام‌خانوادگی :</span>
                            </div>
                        </div>
                        <input type="text" name="regiser_family" id="regiser_family" class="form-control mt-2 col-md-9 col-sm-12 text-left"  placeholder="نام‌خانوادگی">                        
                    </div>
                    <div class="register-div-input row text-right" >
                        <div class="text-left col-md-3 col-sm-4 col-5 pt-3">
                            <div class="border-bottom border-dark" style="width:80%">
                                <span style="color:#f6a619">&#9672;</span>
                                <span >ایمیل :</span>
                            </div>
                        </div>                        
                        <input autocomplete="off" type="email" name="regiser_email" id="regiser_email" class="form-control mt-2 col-md-9 col-sm-12 text-right" placeholder="example@example.com">
                        {{-- <small id="emailHelp" class="form-text text-muted text-left  col-9">آدرس ایمیل شما پیش ما محفوظ است و تحت هیچ شرایطی منتشر نمی‌شود</small> --}}
                    </div>
                    <div class="register-div-input row text-right ">
                        <div class="text-left col-md-3 col-sm-4 col-5 pt-3">
                            <div class="border-bottom border-dark" style="width:80%">
                                <span style="color:#f6a619">&#9672;</span>
                                <span >گذروازه :</span>
                            </div>
                        </div>
                        <input type="password" name="regiser_password" id="regiser_password" class="form-control mt-2 col-md-9 col-sm-12 text-left" >
                    </div>
                    <div class="register-div-input row text-right">
                        <div class="text-left col-md-3 col-sm-4 col-5 pt-3">
                            <div class="border-bottom border-dark" style="width:80%">
                                <span style="color:#f6a619">&#9672;</span>
                                <span >تکرار گذروازه :</span>
                            </div>
                        </div>
                        <input type="password" name="regiser_password_re" id="regiser_password_re" class="form-control mt-2 col-md-9 col-sm-12 text-left" >
                    </div>
                    <div class="row text-right mt-4">
                        <div class="text-center col-9">
                            <span id="Captcha_Image" class="register-capcha-image">{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-success"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                        </div>
                        <div class="d-none d-sm-block text-left col-3 pt-3">
                            <span >:کد امنیتی</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="col-sm-12 row text-right mt-2 p-0">
                        <input type="text" name="regiser_captcha" id="regiser_captcha" class="form-control mt-2 col-xl-10 col-md-9 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                    </div>
                    <button type="submit" class="btn btn-success mr-2 mr-sm-2 mr-md-0 mt-5 pr-5 pl-5 register-button">ثبت‌ نام</button>
                    <span class="register-button-border-black d-none d-sm-inline-block">!</span>
                </form>            
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <a class="text-dark register-buttom-link-two text-decoration-none" href="{{route('Forget')}}">فراموشی رمز عبور</a>
                <span>/</span>
                <a class="text-dark register-buttom-link-one text-decoration-none" href="{{route('Login')}}">ورود به نغمه ماندگار</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img style="width:400px;" src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
            </div>
        </div>
    @include('Partials.mainFooter')
@endsection