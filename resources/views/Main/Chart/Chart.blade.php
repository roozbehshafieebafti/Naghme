@extends('Masters.Main')

@section('title','نمودار سازمانی')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container-fluid">
        <div style="margin-top:150px">
            <div class="text-center mb-3">
                <img width="100%" src="{{ config('app.url').$chart[0]->chart_picture }}" alt="ساختار سازمانی" title="ساختار سازمانی" />
            </div>
            <div class="text-center mt-3">
                <p class="chart-title d-flex align-items-center justify-content-center" style="direction: rtl">
                    <b>{{ $chart[0]->chart_description }}</b>
                </p>
                <p class="chart-sub-border"></p>
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection