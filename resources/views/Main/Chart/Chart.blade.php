@extends('Masters.Main')

@section('title','نمودار سازمانی')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container-fluid">
        <div class="container" style="margin-top:250px">
            <div class="text-center mt-3 mb-3">
                <img src="{{ config('app.url').$chart[0]->chart_picture }}" alt="ساختار سازمانی" title="ساختار سازمانی" />
            </div>
            <div class="text-center mt-3">
                <p class="chart-title d-flex align-items-center justify-content-center">
                    <b>{{ $chart[0]->chart_description }}</b>
                </p>
                <p class="chart-sub-border"></p>
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection