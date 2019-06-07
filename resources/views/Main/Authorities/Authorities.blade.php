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
                            <div class="col-4">
                                <img src="{{config('app.url').$item->authorities_picture}}" alt="{{ $item->authorities_name.' '.$item->authorities_family }} ">
                            </div>
                            <div class="col-8">
                                <ul>
                                    <li> {{ $item->authorities_name }} </li>
                                    <li> {{ $item->authorities_family }} </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <p>
                                {{ $item->authorities_cv }}
                            </p>
                        </div>
                    @endforeach
                @endif
            </div>

            <div>
                @if(count($Duty)>0)
                    <h4>شرح وظایف</h4>
                    <ul>
                        @foreach ($Duty as $item)
                            <li> {{$item->ad_authorities_duty}} </li>
                        @endforeach
                    </ul>
                @endif                
            </div>
        </div>
    </div>
@endsection