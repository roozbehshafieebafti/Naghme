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
                <img class="Representaion-read-more-head-image" src="{{config('app.url').'picture/assets/head2.png'}}" alt="">
            </div>
            <div class="Representaion-read-more-titel text-center">
                <h2 id="purpose" style="text-align:center"> <b>ساختار سازمانی</b></h2>
                <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}" alt="">
            </div>
            <div class="col-12">
                <div class="">
                    <img class="Representaion-read-more-chart-img" src="{{ config('app.url').$representation[0]->chart_picture }}" alt="نمودار سازمانی" title="ساختار سازمانی" />
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
            <div class="row  statement-image-container-row" >
                <div class="statement-image-container">
                    <img class="statement-image2" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >    
                    <h2 class="statement-title2" style="text-align:center"><b>همکاران</b></h2>
                </div>
            </div>
            <div class="Representaion-read-more-img-container">
                <img class="statement-image" src="{{config('app.url').'picture/assets/middel_hpp.svg'}}" alt="" >
                <h2 id="statement" class="statement-title" style="text-align:center"><b>همکاران</b></h2>
            </div>
            <div >
                <div class="Representaion-read-more-authorities">
                    @if(count($Authorities)>0)
                        @foreach ($Authorities as $key=>$item)
                            <div id="co_worker{{$item['id']}}" class="authorities-row-container row d-flex justify-content-start m-0 mb-5 flex-wrap">
                                <div class="col-xl-2 col-lg-2 col-12 d-flex justify-content-center ">
                                    <div class="authorities-image-container">
                                        <img class="authorities-image" src="{{config('app.url').$item['authorities_picture']}}" alt="{{ $item['authorities_name'].' '.$item['authorities_family'] }} " title="{{ $item['authorities_name'].' '.$item['authorities_family'] }} ">
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-12 authorities-div-col-8">
                                    <div>
                                        <span style="color:#790000;font-size:22px;"><b>سمت:</b></span>
                                        <b><span> {{ $item['authorities_title']}} </span>                                    
                                    </div>
                                    <div>
                                        <span style="color:#790000;font-size:22px;"><b>نام و نام‌خانوادگی:</b></span>
                                        <b><span> {{ $item['authorities_name']}} </span>
                                        <span> {{ $item['authorities_family'] }} </span></b>
                                    </div>
                                    <div>
                                        <div class="authorities-CV-container d-flex align-items-center justify-content-between mt-2" id="headingOne"  data-toggle="collapse" data-target="#collapseCV{{$key}}" aria-expanded="true" aria-controls="collapseCV{{$key}}">
                                            <span class="authorities-CVTitle">رزومه:</span>
                                            <span>
                                                <img src="{{config('app.url').'picture/assets/moreicon.svg'}}" alt="" style="width:20px;">    
                                            </span>
                                        </div>
                                    
                                        <div id="collapseCV{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="authorities-CV-Text">
                                                <p>
                                                    {!!html_entity_decode($item['authorities_cv'])!!}
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="authorities-CV-container d-flex align-items-center justify-content-between mt-2" id="headingOne"  data-toggle="collapse" data-target="#collapseDuty{{$key}}" aria-expanded="true" aria-controls="collapseDuty{{$key}}">
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
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@include('Partials.GeneralFooter')
@endsection