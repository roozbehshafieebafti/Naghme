@extends('Masters.Main')
@section('title',$activity["apst_title"])
@section('content')
    @include('Partials.mainHeader')
        <div class="">

            <img src="{{ config('app.url').$activity["apst_picture_of_title"]}}"
                 alt="{{$activity["apst_title"]}}" 
                 title="{{$activity["apst_title"]}}" 
                 class="activity-landescape-pictuer">

            <img src="{{ config('app.url').$activity["apst_picture_of_title_mobile"]}}"
                 alt="{{$activity["apst_title"]}}" 
                 title="{{$activity["apst_title"]}}" 
                 class="activity-portrate-pictuer">

            <div class="">
                <div class="activity-mobile-header">
                    <div class="text-center mt-4">                       
                        <img src="{{config('app.url').'picture/assets/head2.png'}}" alt="" class="activity-mobile-head-img">
                    </div>
                    <div class="purpose-titel text-center mt-4 ">
                        <h2 id="purpose" style="text-align:center"> <b>{{$activity["apst_title"]}}</b></h2>
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                    </div>
                </div>
                <div class="read-activity-title row ">
                    <div class="col-xl-4 col-lg-4 col-md-12 text-center activity-left-picture">
                        @if ($activity["apst_is_cover_picture_landscape"] == 0)
                            <span class="read-more-news-picture-cover-border mt-3">
                                <img class="read-more-news-picture-cover"  
                                        src="{{ config('app.url').'/'.$activity["apst_picture_of_cover"]}}" 
                                        alt="{{$activity["apst_title"]}}" 
                                        title="{{$activity["apst_title"]}}" 
                                    />
                            </span>
                        @else
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
                        <div class="activity-desktop-header">
                            <div class="d-flex justify-content-center">
                                <img src="{{config('app.url').'picture/assets/head2.png'}}" alt="" style="height:130px;margin-top:30px">
                            </div>
                            <div class="purpose-titel text-center mt-4 ">
                                <h2 id="purpose" style="text-align:center"> <b>{{$activity["apst_title"]}}</b></h2>
                                <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                            </div>
                        </div>
                        <div class="activity-text">
                            <p style="font-family:Bnazanin !important"> 
                                {!!html_entity_decode($activity["apst_description"])!!}
                            </p>
                        </div>
                    </div>                    
                </div>
                @if (count($gallery)>0)
                    <div class="activity-img-gallery-container">
                        <div class="d-flex justify-content-center mt-5 plane-main-container">
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="" style="transform: rotate(180deg);">
                            <h2 id="plane" style="text-align:center;margin:0px 20px 0px 20px;"><b>آرشیو تصاویر</b></h2>
                            <img class="plane-image-seprator" src="{{config('app.url').'picture/assets/sec_seprator.svg'}}" alt="">
                        </div>
                        <div style="margin-top:80px;">
                            <div class="activity_picture-container d-flex justify-content-center mt-5">
                                <span class="gallery_picture_border">
                                    <span class="gallery-picture-border-content">
                                        <span id="gallery_picture_title" >{{$gallery[0]["picture_title"]}}</span>                      
                                        <img class="gallery_picture_preview" id="gallery_picture" src="{{ config('app.url').'/'.$gallery[0]["picture"]}}" alt="">
                                    </span>
                                </span>
                            </div> 
                        </div>
                        <div class="selection-gallery-container d-flex justify-content-center mt-2" style="direction:rtl">
                            @foreach ($gallery as $item)
                                <img 
                                    class="slection_gallary_picture p-2"
                                    src="{{ config('app.url').'/'.$item["picture"]}}" 
                                    onclick="PreviewPicturew(this.src,'{{ $item['picture_title']}}','gallery_picture','gallery_picture_title')"
                                >
                            @endforeach
                        </div>                        
                    </div>    
                @endif
                
                @if (count($news)>0)
                    <div class="">
                        <div class="activity-from-news-container" style="overflow:hidden">
                            <img class="activity-news-gallery-img" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >
                            <h2  class="activity-news-gallery-title" style="text-align:center"><b>از نگاه رسانه</b></h2>
                        </div>
                        <div>
                            <div class="activity-news-gallery-container">
                                <span class="gallery_picture_border">
                                    <span class="gallery-picture-border-content">
                                        <span id="news_gallery_picture_title" >{{$news[0]["attributes"]["picture_title"]}}</span>                      
                                        <img class="gallery_picture_preview" id="news_gallery_picture" src="{{ config('app.url').'/'.$news[0]["attributes"]["picture_name"]}}" alt="">
                                    </span>
                                </span>
                            </div>
                            <div style="overflow:hidden">
                                <div class="selection-news-gallery-container" style="direction:rtl">
                                    @foreach ($news as $item)
                                        <img 
                                            class="slection_gallary_picture p-2"
                                            src="{{ config('app.url').'/'.$item->picture_name}}" 
                                            onclick="PreviewPicturew(this.src,'{{ $item->picture_title}}','news_gallery_picture','news_gallery_picture_title')"
                                        >
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="container">
                    <div class="row mt-5">
                        <div class="col-3"></div>
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
                    <div style="margin-top:100px">
                        <h3>
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
                            <button {{(!$check ? "disabled" : "")}} class="activity-comment-submit-btn" type="submit" >
                                ثبت
                            </button>
                        </form>
                    </div>
            </div>
            </div>
        </div>
    @include('Partials.GeneralFooter')
@endsection