@extends('Masters.Main')

@section('title','نمودار سازمانی')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="text-center mt-3 mb-3">
                <img src="{{ config('app.url').$chart[0]->chart_picture }}" alt="" />
            </div>
            <div class="text-center mt-3">
                <p>
                    {{ $chart[0]->chart_description }}
                </p>
            </div>
        </div>
    </div>
@endsection