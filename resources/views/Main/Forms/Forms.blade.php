@extends('Masters.Main')

@section('title','فرم ها')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container forms-main-container">
        <div class="m-3">
            <div class="accordion" id="accordionExample">
                @if (count($Form)>0)
                    @foreach ($Form as $key=>$item)
                    <div class="">
                            <div class="form-title-container d-flex align-items-center justify-content-between" id="heading"   data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                <span>
                                    <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">    
                                </span>
                                <span style="direction: rtl" class="">                                    
                                    <span style="color:#f6a619;font-size:25px; margin-left:30px">&#9672;</span>
                                    <b class="form-content-name"> {{$item->form_title}}</b>
                                </span>
                            </div>
                        
                            <div id="collapse{{$key}}" class="form-content-container collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div  class="text-white form-content">
                                        {{$item->form_description}}
                                    </div>                                
                                    <div class="mt-3 text-white  d-flex justify-content-start">
                                        <a href=" {{ config('app.url').'/'.$item->form_file1}}" class="form-content-link text-white">
                                            <img src="{{config('app.url').'picture/assets/pdfIcon.svg'}}" alt="" class="form-content-download-image">
                                            <span class="form-content-download-text">دانلود</span>
                                            <div class="form-black-border"></div>
                                            <div class="form-yello-border"></div>
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger  text-center h4 ">
                        فرمی برای نمایش وجود ندارد
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection