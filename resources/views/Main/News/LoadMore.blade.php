@extends('Masters.Main')
@section('title') {{$selected_news->news_title}} @endsection    
{{-- این قسمت نیاز دارد به نشان دادن محتوایی وجود ندارد --}}
@section('content')
    @include('Partials.GeneralHeader')
    <div class="container-fluid" style="direction:rtl;margin-top:160px;">
        <div class="container" >
            @if ($selected_news)
                <div class="more-news-title-container">
                    <div  style="text-align:center">
                        <img class="head-image" src="{{config('app.url').'picture/assets/head.svg'}}" alt="" style="height:150px;">
                    </div>
                    <div class="purpose-titel text-center mt-4">
                        <h2 id="purpose" style="text-align:center"> <b>{{$selected_news->news_title}}</b></h2>
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}" alt="">
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <img src=" {{ config('app.url').'/'.$selected_news->news_picture }} " alt="">
                </div>
                <p class="mt-3" style="text-align: justify">
                    {!!html_entity_decode( $selected_news->news_description)!!}
                </p>
            @else 
                <div class="alert alert-warning">
                    موردی یافت نشد
                </div>
            @endif
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection
