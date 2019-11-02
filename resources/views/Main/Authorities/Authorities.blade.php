@extends('Masters.Main')

@section('title','مسئولین')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container-fluid" style="direction: rtl">
        <div class="container authorities-container">
            <h4> 
                <div class="authorities-title">
                    {{ $title }} 
                </div>
                <div class="authorities-title-border-yellow"></div>
                <div class="authorities-title-border-black"></div>
            </h4>

            <div class="">
                @if(count($Authorities)>0)
                    @foreach ($Authorities as $key=>$item)
                        <div class="authorities-row-container row d-flex m-0 ustify-content-center mb-5 flex-wrap">
                            <div class="col-xl-2 col-lg-2 col-12 d-flex justify-content-center authorities-div-col-2">
                                <div class="authorities-image-container">
                                    <img class="authorities-image" src="{{config('app.url').$item['authorities_picture']}}" alt="{{ $item['authorities_name'].' '.$item['authorities_family'] }} " title="{{ $item['authorities_name'].' '.$item['authorities_family'] }} ">
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-12 authorities-div-col-8">
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
    @include('Partials.GeneralFooter')
@endsection