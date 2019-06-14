@extends('Masters.Main')

@section('title','مسئولین')

@section('content')
    <div class="container-fluid" style="direction: rtl">
        <div class="container">
            <h3> {{ $title }} </h3>

            <div class="">
                @if(count($Authority)>0)
                    @foreach ($Authority as $item)
                        <div class="row">
                            <div class="col-3">
                                <img class="col-12" src="{{config('app.url').$item->authorities_picture}}" alt="{{ $item->authorities_name.' '.$item->authorities_family }} ">
                            </div>
                            <div class="col-8">
                                <ul>
                                    <li> {{ $item->authorities_name }} </li>
                                    <li> {{ $item->authorities_family }} </li>
                                </ul>
                                <p>
                                    {{ $item->authorities_cv }}
                                </p>
                            </div>
                        </div>
                        <hr />
                    @endforeach
                @endif
            </div>

            <div>
                @if(count($Duty)>0)
                <div class="accordion" id="accordionExample">
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
@endsection