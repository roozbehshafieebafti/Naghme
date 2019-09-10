@extends('Masters.Main')
@section('title','ورود')
@section('content')
    @include('Partials.GeneralHeader')
    <div style="margin-top:350px;margin-bottom:200px;">
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
        <div class="d-flex justify-content-center align-items-center">
            <form class="col-6 text-center" method="POST">
                {{ csrf_field() }}
                <div class="form-group text-right" >
                    <div class="text-left">:ایمیل</div>
                    <input type="email" name="email_ng" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted text-left">آدرس ایمیل شما پیش ما محفوظ است و تحت هیچ شرایطی منتشر نمی‌شود</small>
                </div>
                <div class="form-group text-right mt-4">
                    <div class="text-left">:گذروازه</div>
                    <input type="password" name="password_ng" class="form-control mt-2" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group text-right mt-4">
                    <div class="text-left">:کد امنیتی</div>
                    <div class="text-center">
                        <span id="Captcha_Image" style="display:inline-block; width:200px; height:80px;">{!! captcha_img() !!}</span>
                        <button type="button" class="btn btn-success"  onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                    </div>
                    <input type="text" name="captcha_ng" class="form-control mt-2"  placeholder="کد امنیتی">
                </div>
                <button type="submit" class="btn btn-primary">ورود</button>
            </form>            
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <a href="">فراموشی رمز عبور</a>
            <span style="margin-right:30px;margin-left:30px">/</span>
            <a href="{{route("Register")}}">ثبت‌نام در نغمه ماندگار</a>
        </div>
    </div>
    @include('Partials.mainFooter')
@stop