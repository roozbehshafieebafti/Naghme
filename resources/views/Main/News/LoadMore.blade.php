@extends('Masters.Main')
@section('title') {{$selected_news->news_title}} @endsection    
@section('content')
    @include('Partials.GeneralHeader')
    <div style="direction:rtl;margin-top:160px;">
        <div>
            <img class="read-more-news-right-shape" src="{{config('app.url').'picture/assets/shape1.svg'}}" />
        </div>
        <div class="container" >
            @if ($selected_news)
                <div class="more-news-title-container">
                    <div  style="text-align:center">
                        <img class="head-image" src="{{config('app.url').'picture/assets/head.svg'}}" alt="" style="height:150px;">
                    </div>
                    <div class="purpose-titel text-center mt-4">
                        <h2 id="purpose" style="text-align:center"> <b>{{$selected_news->news_title}}</b></h2>
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}" alt="{{$selected_news->news_title}}" title="{{$selected_news->news_title}}">
                    </div>
                </div>
                <div class="read-more-news-container mt-3 text-center ">
                    <img class="read-more-news-picture" src=" {{ config('app.url').'/'.$selected_news->news_picture }} " alt="نغمه ماندگار">
                    <span class="read-more-news-angel">asd</span>
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
