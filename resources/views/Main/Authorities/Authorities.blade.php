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
                    @foreach ($Authority as $item)
                        <div class="row d-flex justify-content-center mb-5">
                            <div class="authorities-image-container">
                                <img class="authorities-image" src="{{config('app.url').$item->authorities_picture}}" alt="{{ $item->authorities_name.' '.$item->authorities_family }} ">
                            </div>
                            <div class="col-8">
                                <div>
                                    <span style="color:#790000;font-size:20px;"><b>نام و نام‌خانوادگی:</b></span>
                                    <span> {{ $item->authorities_name }} </span>
                                    <span> {{ $item->authorities_family }} </span>
                                </div>
                                <p>
                                    {{ $item->authorities_cv }}
                                </p>
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