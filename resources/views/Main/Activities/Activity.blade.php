@extends('Masters.Main')
@section('title',$activity["apst_title"])
@section('content')
    @include('Partials.mainHeader')
        {{-- master div, it does not need class --}}
        <div>
            {{-- عکس سربرگ در زمان دسکتاپ یا تبلت --}}
            <img src="{{ config('app.url').$activity["apst_picture_of_title"]}}"
                 alt="{{$activity["apst_title"]}}" 
                 title="{{$activity["apst_title"]}}" 
                 class="activity-landescape-pictuer" />
            {{-- عکس سربرگ در زمان موبایل --}}
            <img src="{{ config('app.url').$activity["apst_picture_of_title_mobile"]}}"
                 alt="{{$activity["apst_title"]}}" 
                 title="{{$activity["apst_title"]}}" 
                 class="activity-portrate-pictuer" />
            <div class="container-fluid">
                {{-- عنوان فعالیت --}}
                <div>
                    <div class="text-center mt-4">                       
                        {{-- عکس 7 مربع --}}
                        <img src="{{config('app.url').'picture/assets/head2.png'}}" alt="انجمن نغمه ماندگار" class="activity-head-title-img">
                    </div>
                    <div class="purpose-titel text-center mt-4 ">
                        <h2 class="activity-main-title" style="text-align:center"> <b>{{$activity["apst_title"]}}</b></h2>
                        {{-- عکس جدا کننده زیر عنوان --}}
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                    </div>
                </div>
                <div class="read-activity-title row ">
                    {{-- قسمت عکس کاور --}}
                    <div class="col-xl-4 col-lg-4 col-md-12 text-center activity-left-picture mb-4">
                        {{-- در زمان تصویر عمودی --}}
                        @if ($activity["apst_is_cover_picture_landscape"] == 0)
                            <span class="read-more-news-picture-cover-border mt-3">
                                <img class="read-more-news-picture-cover"  
                                        src="{{ config('app.url').'/'.$activity["apst_picture_of_cover"]}}" 
                                        alt="{{$activity["apst_title"]}}" 
                                        title="{{$activity["apst_title"]}}" 
                                    />
                            </span>
                        @else
                        {{-- در زمان تصویر افقی --}}
                            <span class="read-more-activity-picture-cover-border mt-3">
                                <img class="read-more-activity-picture-cover"  
                                        src="{{ config('app.url').'/'.$activity["apst_picture_of_cover"]}}" 
                                        alt="{{$activity["apst_title"]}}" 
                                        title="{{$activity["apst_title"]}}" 
                                    />
                            </span>
                        @endif
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        {{-- متن اولیه فعالیت --}}
                        <div class="activity-text">
                            <p style="font-family:Bnazanin !important"> 
                                {!!html_entity_decode($activity["apst_description"])!!}
                            </p>
                        </div>
                    </div>                    
                </div>
                {{--  متن دوم --}}
                @if ($activity["apst_second_description"] != null)
                    <div class="read-activity-title">
                        <div class="activity-text">
                            <p style="font-family:Bnazanin !important"> 
                                {!!html_entity_decode($activity["apst_second_description"])!!}
                            </p>
                        </div>
                    </div>
                @endif
                {{-- آرشیو تصاویر --}}
                @if ($gallery[0]["picture"] != null)
                    <div class="activity-img-gallery-container">
                        {{-- سر برگ --}}
                        <div class="d-flex justify-content-center mt-5 plane-main-container">
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="" style="transform: rotate(180deg);">
                            <h2 id="plane" style="text-align:center;margin:0px 20px 0px 20px;"><b>آرشیو تصاویر</b></h2>
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="">
                        </div>
                        {{-- نمایش تصویر --}}
                        <div style="margin-top:80px;">
                            <div class="activity_picture-container d-flex justify-content-center mt-5">
                                <span class="gallery_picture_border">
                                    <span class="gallery-picture-border-content">
                                        <a id="activity_picture_link" href="{{ config('app.url').'/'.$gallery[0]["picture"]}}" target="_blank">
                                            <img class="gallery_picture_preview" id="gallery_picture" src="{{ config('app.url').'/'.$gallery[0]["picture"]}}" alt="">
                                        </a>
                                    </span>
                                </span>
                            </div> 
                        </div>
                        {{-- انتخاب از میان عکس ها --}}
                        <div class="selection-gallery-container mt-2" style="direction:rtl">
                            <div class="inner-selection-gallery-container">
                                @foreach ($gallery as $item)
                                    <img 
                                        class="slection_gallary_picture p-2"
                                        src="{{ config('app.url').'/'.$item["picture"]}}" 
                                        onclick="PreviewPicturew(this.src,'gallery_picture','activity_picture_link')"
                                    >
                                @endforeach
                            </div>
                        </div>                                               
                    </div>    
                @endif
                {{-- نمایش ویدئو --}} 
                @if ($activity["video"] != null)               
                    <div class="activity-video-container">
                        <div class="d-flex justify-content-center mt-5 plane-main-container">
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="" style="transform: rotate(180deg);">
                            <h2 id="plane" style="text-align:center;margin:0px 20px 0px 20px;"><b>نمایش ویدئو</b></h2>
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <div class="activity-video-main">
                            {!!html_entity_decode($activity["video"])!!}
                        </div>
                    </div>
                @endif
                {{-- نگاه رسانه --}}
                @if (count($news)>0)
                    <div class="">
                        {{-- تصویر سمت چپ --}}
                        <div class="activity-from-news-container" style="overflow:hidden">
                            <img class="activity-news-gallery-img" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >
                            <h2  class="activity-news-gallery-title" ><b>از نگاه رسانه</b></h2>
                        </div>
                        {{-- گالری اخبار --}} 
                        <div>
                            <div class="activity-news-gallery-container">
                                <span class="gallery_picture_border">
                                    <span class="gallery-picture-border-content">
                                        <a id="activity_news_picture" href="{{ config('app.url').'/'.$news[0]["attributes"]["picture_name"]}}" target="_blank">                                     
                                            <img class="gallery_picture_preview" id="news_gallery_picture" src="{{ config('app.url').'/'.$news[0]["attributes"]["picture_name"]}}" alt="">
                                        </a>
                                    </span>
                                </span>
                            </div>
                            <div style="overflow:hidden"  class="selection-news-gallery-container-over">
                                <div class="selection-news-gallery-container" style="direction:rtl">
                                    @foreach ($news as $item)
                                        <img 
                                            class="slection_gallary_picture p-2"
                                            src="{{ config('app.url').'/'.$item->picture_name}}" 
                                            onclick="PreviewPicturew(this.src,'news_gallery_picture','activity_news_picture')"
                                        >
                                    @endforeach
                                </div>
                            </div>
                        </div>                       
                    </div>
                @endif
                {{-- دیدگاه‌ها --}}
                <div class="activity-main-comments">
                    <div class="activity-main-comments-row row mt-5">
                        <div class="col-xl-3 col-lg-3 activity-comment-shapes">
                            <img class="activity-comment-shapes-img" src="{{config('app.url').'picture/assets/shape1.svg'}}"/>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-12 activity-comment-container">
                            <div>
                                <h3 class="comment-h3-header">
                                    <span>دیدگاه‌ها</span>
                                    <span style="color:#f6a619;"> &#9672; </span> 
                                </h3>
                                @foreach ($comments as $item)
                                    <div class="comment-container">
                                        <span class="comment-owner">
                                            <span style="color: #790000">:</span>
                                            <i style="color: #790000">{{$item->name." ".$item->family}}</i>
                                            <i class="fas fa-comment-dots" style="font-size:14px"></i>
                                        </span>
                                        <div style="direction: rtl">
                                            {{$item->comment}}
                                        </div>
                                    </div>
                                    @if ($item->answer != null)
                                        <div class="comment-answer-container">
                                            <span >:</span>
                                            <b>پاسخ</b>
                                            <div style="direction: rtl">
                                                {{$item->answer}}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if (count($comments)==0)
                                    <div class="text-center mt-4">
                                        <h5 class="no-comment">تاکنون دیدگاهی برای این پست ثبت نشده است</h5>
                                    </div>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <div class="activity-main-comments-contents" style="margin-top:100px">
                        <h3 class="comment-h3-header">
                            <span>ثبت دیدگاه</span>
                            <span style="color:#f6a619;"> &#9672; </span> 
                        </h3>
                        @if(session('success'))
                            <div class="text-success" style="">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('danger'))
                            <div class="text-danger" style="">
                                {{ session('danger') }}
                            </div>
                        @endif
                        <?php $check = Illuminate\Support\Facades\Auth::check() ?>
                        <form action="{{route("Set_comment",$activity["id"])}}" method="POST">
                            {{ csrf_field() }}
                            <textarea 
                                class="activity-comment-text-box text-left"
                                id="activity_comment_textbox"
                                name="coment_value"
                                onclick="commentClick(this,'{{$check}}')"
                            ><?php
                                if($check){
                                    echo 'لطفا دیدگاه خود را در اینجا ثبت نمایید';
                                }
                                else{
                                    echo 'لطفا برای ثبت دیدگاه خود وارد شوید';
                                }                         
                                ?></textarea>
                            <input name="comment_id" value="{{$activity["id"]}}" style="display:none"/>
                            <?php
                                 echo   $check ?
                                    '<button class="activity-comment-submit-btn" type="submit">ثبت</button>'
                                    :
                                    '<button class="activity-comment-submit-btn" type="button"  data-toggle="modal" data-target="#exampleModalCenter">ورود</button>';
                            ?>
                            {{-- <button {{(!$check ? "disabled" : "")}} class="activity-comment-submit-btn" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">
                                ثبت
                            </button> --}}
                        </form>
                    </div>
                    {{-- مدال ورود و ثبت نام --}}
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" id="Actvity_Moadal_content" style="direction: rtl">
                                <div class="modal-header d-flex justify-content-between">
                                    <div>
                                        <h5 class="modal-title" id="exampleModalCenterTitle">ورود به سایت</h5>
                                    </div>
                                    <div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                    
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form class="" method="GET" id="loginFormContent">
                                        <div class="row d-flex justify-content-between pr-2 pl-2 mb-3" >
                                            <div class="mb-3" style="position:relative;top:10px">
                                                <span style="color:#f6a619;position:relative;top:4px;">&#9672;</span>
                                                <span >ایمیل:</span>
                                            </div>
                                            <input type="email" name="email_ng" class="form-control mt-2 col-sm-9 col-12 text-right" placeholder="Enter email">                                            
                                        </div>
                                        <div class="row d-flex justify-content-between pr-2 pl-2">
                                            <div class="mb-3"  style="position:relative;top:10px">
                                                <span style="color:#f6a619;position:relative;top:4px;">&#9672;</span>
                                                <span >گذرواژه:</span>
                                            </div>
                                            <input type="password" name="password_ng" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="Password">
                                        </div>
                                        <div class="row text-right mt-2">
                                            <div style="position:relative;top:22px;" class="text-left col-md-4">
                                                <span style="color:#f6a619">&#9672;</span>
                                                <span >کد امنیتی:</span>
                                            </div>
                                            <div class="col-md-8 col-12 captcha-container">
                                                <span id="Captcha_Image" class="login-captcha-image">{!! captcha_img() !!}</span>
                                                <button type="button" class="btn btn-success mr-5" style="width:38px;height:38px;position:relative;top:15px;right:20px" onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                                            </div>                                            
                                        </div>
                                        <div class="row d-flex justify-content-between pr-2 pl-2">
                                            <div class="mb-3"  style="position:relative;top:10px">
                                                <span style="color:#FFF;position:relative;top:4px;">&#9672;</span>
                                                <span style="color:#FFF">کپچا:</span>
                                            </div>
                                            <input type="text" name="captcha_ng"  class="form-control mt-2 col-sm-9 col-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                                        </div>
                                        <div id="Modal_Alert" class="alert alert-danger mt-2" style="display:none"></div>
                                        <div class="d-flex justify-content-center mt-4">
                                            <button id="login_btn_activity" onclick="handleSubmit()" type="button" type="button" class="btn btn-success ml-3">ورود</button>
                                            <button type="button" type="submit" onclick="showRegisterPage()" class="btn mr-3">ثبت‌نام</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    @include('Partials.GeneralFooter')
    <script> 
        const captchaUrl = "<?php echo route('Refresh_Capthca_Route') ?>"; 
        const loginUrl = "<?php echo route('Do_Login') ?>"; 
        const registerUrl = "<?php echo route('Do_register') ?>"; 
    </script>
@endsection