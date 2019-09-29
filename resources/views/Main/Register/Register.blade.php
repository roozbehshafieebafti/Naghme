@extends('Masters.Main')
@section('title',"ثبت‌نام")
@section('content')
    @include('Partials.GeneralHeader')
    <div style="margin-top:250px;margin-bottom:100px;">
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
                <img src="{{config('app.url').'picture/assets/shape1.svg'}}" style="position:absolute;right:0px;" />
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <form autocomplete="off" onsubmit="form_registration(event)" class="col-6 text-center" method="POST">
                    {{ csrf_field() }}
                    <div class="row text-right" >
                        <input type="text" name="regiser_name" id="regiser_name" class="form-control mt-2 col-9 text-left" placeholder="نام">                        
                        <div class="text-left col-3 pt-3">
                            <span >:نام</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="row text-right" >
                        <input type="text" name="regiser_family" id="regiser_family" class="form-control mt-2 col-9 text-left"  placeholder="نام‌خانوادگی">                        
                        <div class="text-left col-3 pt-3">
                            <span >:نام‌خانوادگی</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="row text-right" >                        
                        <input autocomplete="off" type="email" name="regiser_email" id="regiser_email" class="form-control mt-2 col-9 text-right" placeholder="example@example.com">
                        <div class="text-left col-3 pt-3">
                            <span >:ایمیل</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                        {{-- <small id="emailHelp" class="form-text text-muted text-left  col-9">آدرس ایمیل شما پیش ما محفوظ است و تحت هیچ شرایطی منتشر نمی‌شود</small> --}}
                    </div>
                    <div class="row text-right ">
                        <input type="password" name="regiser_password" id="regiser_password" class="form-control mt-2 col-9 text-left" >
                        <div class="text-left col-3 pt-3">
                            <span >:گذروازه</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="row text-right">
                        <input type="password" name="regiser_password_re" id="regiser_password_re" class="form-control mt-2 col-9 text-left" >
                        <div class="text-left col-3 pt-3">
                            <span >:تکرار گذروازه</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="row text-right mt-4">
                        <div class="text-center col-9">
                            <span id="Captcha_Image" style="display:inline-block; width:200px; height:80px;">{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-success"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                        </div>
                        <div class="text-left col-3 pt-3">
                            <span >:کد امنیتی</span>
                            <span style="color:#f6a619">&#9672;</span>
                        </div>
                    </div>
                    <div class="row text-right mt-2">
                        <input type="text" name="regiser_captcha" id="regiser_captcha" class="form-control mt-2 col-9 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                    </div>
                    <button type="submit" class="btn btn-success mt-5 pr-5 pl-5" style="position:relative;z-index: 10;">ثبت‌ نام</button>
                    <span style="display:inline-block;border:solid 1px black; width:135px;position:relative;right:150px;top:30px; z-index: 2; border-radius:3px;height:35px;">!</span>
                </form>            
            </div>
            <div class="d-flex justify-content-center align-items-center mt-5">
                <a class="text-dark" href="{{route("Forget")}}">فراموشی رمز عبور</a>
                <span style="margin-right:10px;margin-left:10px">/</span>
                <a class="text-dark" href="{{route("Login")}}">ورود به نغمه ماندگار</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <img style="width:330px;" src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
            </div>
        </div>
    @include('Partials.mainFooter')
@endsection