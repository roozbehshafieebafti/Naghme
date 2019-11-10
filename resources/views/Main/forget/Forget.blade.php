@extends('Masters.Main')
@section('title','ورود')
@section('content')
    @include('Partials.GeneralHeader')
    <div class="forget-main-div">        
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
        <div>
            <img src="{{config('app.url').'picture/assets/shape1.svg'}}" class="forget-image-right" />
        </div>
        <div class="d-flex justify-content-center align-items-center">            
            <form class="col-xl-7 col-lg-8 col-md-9 col-sm-11 text-center" method="POST">
                {{ csrf_field() }}
                <div class="forget-div-input row text-right" >
                    <div class="text-left col-md-2 col-sm-3 col-4 pt-3">
                        <div class="border-bottom border-dark" style="width:80%">
                            <span style="color:#f6a619">&#9672;</span>
                            <span>ایمیل :</span>
                        </div>
                    </div>
                    <input type="email" name="email_ng" class="form-control mt-2 col-md-10 col-sm-12 text-left" placeholder="ایمیل خود را وارد کنید">    
                </div>
                <div class="row text-right mt-5">
                    <div class="text-center col-9">
                        <span id="Captcha_Image" class="forget-capcha-image">{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-success"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                    </div>
                    <div class="d-none d-sm-none d-md-block text-left col-3 pt-3">
                        <span>:کد امنیتی</span>
                        <span style="color:#f6a619">&#9672;</span>
                    </div>
                </div>
                <div class="row text-right mt-2">
                    <input type="text" name="captcha_ng" class="form-control mt-2 col-md-10 col-sm-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                </div>
                <button disabled type="submit" class="btn btn-success mt-5 pr-5 pl-5 forget-button">ارسال رمز</button>
                <span class="forget-button-border-black d-none d-sm-inline-block">!</span>
            </form>            
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <a class="text-dark forget-buttom-link-two text-decoration-none" href="{{route('Login')}}">ورود به نغمه ماندگار</a>
            <span>/</span>
            <a class="text-dark forget-buttom-link-one text-decoration-none" href="{{route('Register')}}">ثبت‌نام در نغمه ماندگار</a>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <img style="width:400px;" src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
        </div>
    </div>
    @include('Partials.mainFooter')
@stop