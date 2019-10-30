@extends('Masters.Main')
@section('title','آئین‌نامه‌ها')
    
@section('content')
    @include('Partials.GeneralHeader')
    <div class="container reulation-div-container">
        <div class="m-3">
            <div class="accordion" id="accordionExample">
                @if (count($Regulation )>0)
                    @foreach ($Regulation as $key=>$item)
                        <div class="">
                            <div class="reulation-title-container d-flex align-items-center justify-content-between" id="heading"   data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                <span>
                                    <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">    
                                </span>
                                <span style="direction: rtl" class="">
                                    <span style="color:#f6a619;font-size:25px; margin-left:30px">&#9672;</span>
                                    <b style="font-size:22px">{{$item->regulations_title}}</b>
                                </span>
                            </div>
                        
                            <div id="collapse{{$key}}" class="reulation-content-container collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="text-white text-left" style="width:100%">
                                        {{$item->regulations_description}}
                                    </div>
                                    <div class="mt-3 text-white  d-flex justify-content-start ">
                                        <a href=" {{ config('app.url').'/'.$item->regulations_file_name}}" class="text-white" style="text-decoration: none;font-size: 24px;">
                                            <img src="{{config('app.url').'picture/assets/pdfIcon.svg'}}" alt="" style="width:40px;height:40px;">
                                            <span style="margin-left:40px;font-size:22px;">دانلود</span>
                                            <div class="regulation-black-border"></div>
                                            <div class="regulation-yello-border"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger  text-center h4 ">
                        آئین‌نامه‌ای برای نمایش وجود ندارد
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection