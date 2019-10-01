@extends('Masters.Main')
@section('title','ورود')
@section('content')
    @include('Partials.GeneralHeader')
    <div style="margin-top:250px;margin-bottom:100px;">        
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
            <img src="{{config('app.url').'picture/assets/shape1.svg'}}" style="position:absolute;right:0px;" />
        </div>
        <div class="d-flex justify-content-center align-items-center">            
            <form class="col-6 text-center" method="POST">
                {{ csrf_field() }}
                <div class="row text-right" >
                    <input type="email" name="email_ng" class="form-control mt-2 col-10 text-left" placeholder="ایمیل خود را وارد کنید">
                    <div class="text-left col-2 pt-3">
                        <span >:ایمیل</span>
                        <span style="color:#f6a619">&#9672;</span>
                    </div>    
                </div>
                <div class="row text-right mt-5">
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
                    <input type="text" name="captcha_ng" class="form-control mt-2 col-10 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                </div>
                <button disabled type="submit" class="btn btn-success mt-5 pr-5 pl-5" style="position:relative;z-index: 10;">ارسال رمز</button>
                <span style="display:inline-block;border:solid 1px black; width:140px;position:relative;right:160px;top:30px; z-index: 2; border-radius:3px;height:35px;">!</span>
            </form>            
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <a class="text-dark" href="{{route("Login")}}">ورود به نغمه ماندگار</a>
            <span style="margin-right:10px;margin-left:10px">/</span>
            <a class="text-dark" href="{{route("Register")}}">ثبت‌نام در نغمه ماندگار</a>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <img style="width:330px;" src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
        </div>
    </div>
    @include('Partials.mainFooter')
@stop