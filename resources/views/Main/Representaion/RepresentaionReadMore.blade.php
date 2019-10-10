@extends('Masters.Main')
@section('title',"نمایندگی ".$representation[0]->representation_title)
@section('content')
@include('Partials.GeneralHeader')
    <div class="Representaion-read-more-container container">
        <h4> 
            <div class="authorities-title">
                {{ "نمایندگی ".$representation[0]->representation_title }} 
            </div>
            <div class="authorities-title-border-yellow"></div>
            <div class="authorities-title-border-black"></div>
        </h4>
        <div class="">
               {!!html_entity_decode ($representation[0]->hpp_data )!!}
        </div>
        <div class="HPP-content plane mt-5">
            <div class="text-center"> 
                <img class="head-image" src="{{config('app.url').'picture/assets/head.svg'}}" alt="">
            </div>
            <div class="purpose-titel text-center">
                <h2 id="purpose" style="text-align:center"> <b>ساختار سازمانی</b></h2>
                <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}" alt="">
            </div>
            <div class="col-8 text-center offset-2 pr-5 pl-5">
                <div class="d-flex justify-content-center mt-3 mb-3 ">
                    <img src="{{ config('app.url').$representation[0]->chart_picture }}" alt="نمودار سازمانی" title="ساختار سازمانی" />
                </div>
                <div class="text-center mt-3">
                    <p class="chart-title d-flex align-items-center justify-content-center">
                        <b>{{ $representation[0]->chart_description }}</b>
                    </p>
                    <p class="chart-sub-border"></p>
                </div>
            </div>
        </div>
        <div class="HPP-content Statemants mt-5">
            <img class="Representaion-authorities-image" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >
            <h2 class="Representaion-authorities-title" style="text-align:center"><b>همکاران</b></h2>
            <div>
                <div style="margin-top:150px;">
                    @if(count($Authorities)>0)
                        @foreach ($Authorities as $key=>$item)
                            <div class="authorities-row-container row mb-5">
                                <div class="col-2 mr-3">
                                    <div class="authorities-image-container">
                                        <img class="authorities-image" src="{{config('app.url').$item['authorities_picture']}}" alt="{{ $item['authorities_name'].' '.$item['authorities_family'] }} ">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <span style="color:#790000;font-size:22px;"><b>سمت:</b></span>
                                        <b><span> {{ $item['authorities_title']}} </span>                                    
                                    </div>
                                    <div>
                                        <span style="color:#790000;font-size:20px;"><b>نام و نام‌خانوادگی:</b></span>
                                        <b><span> {{ $item['authorities_name'] }} </span>
                                        <span> {{ $item['authorities_family'] }} </span></b>
                                    </div>
                                    <div>
                                        <div class="authorities-CV-container d-flex align-items-center justify-content-between" id="headingOne"  data-toggle="collapse" data-target="#collapseCV{{$key}}" aria-expanded="true" aria-controls="collapseCV{{$key}}">
                                            <span class="authorities-CVTitle">رزومه:</span>
                                            <span>
                                                <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">    
                                            </span>
                                        </div>
                                    
                                        <div id="collapseCV{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="authorities-CV-Text">
                                                <p>
                                                    {{ $item['authorities_cv'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>                                 
                                    <div>
                                        <div class="authorities-CV-container d-flex align-items-center justify-content-between" id="headingOne"  data-toggle="collapse" data-target="#collapseDuty{{$key}}" aria-expanded="true" aria-controls="collapseDuty{{$key}}">
                                            <span class="authorities-CVTitle">شرح سمت:</span>
                                            <span>
                                                <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">    
                                            </span>
                                        </div>
                                    
                                        <div id="collapseDuty{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <ol class="authorities-CV-Text">
                                                @foreach ($item['ad_authorities_duty'] as $value)
                                                    <li>
                                                        {{ $value }}                                                        
                                                    </li>
                                                @endforeach
                                                </ol>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('Partials.GeneralFooter')
@endsection