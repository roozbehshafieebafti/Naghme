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
                @if(count($Authority)>0)
                    @foreach ($Authority as $key=>$item)
                        <div class="authorities-row-container row d-flex justify-content-center mb-5">
                            <div class="col-2">
                                <div class="authorities-image-container">
                                    <img class="authorities-image" src="{{config('app.url').$item->authorities_picture}}" alt="{{ $item->authorities_name.' '.$item->authorities_family }} ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div>
                                    <span style="color:#790000;font-size:20px;"><b>نام و نام‌خانوادگی:</b></span>
                                    <b><span> {{ $item->authorities_name }} </span>
                                    <span> {{ $item->authorities_family }} </span></b>
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
                                                {{ $item->authorities_cv }}
                                            </p>
                                        </div>
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div>
                @if(count($Duty)>0)
                <div class="accordion mt-5" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDuty" aria-expanded="true" aria-controls="collapseDuty">
                                شرح وظایف
                            </button>
                        </h2>
                        </div>
                    
                        <div id="collapseDuty" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                @foreach ($Duty as $item)
                                    <li> {{$item->ad_authorities_duty}} </li>
                                @endforeach
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>                    
                @endif                
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection