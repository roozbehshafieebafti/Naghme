@extends('Masters.Main')
@section('title') {{$selected_news->news_title}} @endsection    
@section('content')
    @include('Partials.GeneralHeader')
    <div class="news-readmore-parent-container" style="direction:rtl;">
        <div>
            <img class="read-more-news-right-shape" src="{{config('app.url').'picture/assets/shape1.svg'}}" />
        </div>
        <div class="container" >
            @if ($selected_news)
                <div class="more-news-title-container ">
                    <div class="d-flex justify-content-center" >
                        <img class="read-more-news-head-image" src="{{config('app.url').'picture/assets/head2.png'}}" alt="">
                    </div>
                    <div class="purpose-titel text-center mt-4 ">
                        <h2 id="purpose" style="text-align:center"> <b>{{$selected_news->news_title}}</b></h2>
                        <img class="seprator-image" src="{{config('app.url').'picture/assets/seprator.svg'}}"/>
                    </div>
                </div>
                <div class="read-more-news-container mt-3 text-center">
                    <img class="read-more-news-picture" src=" {{ config('app.url').'/'.$selected_news->news_picture }} "alt="{{$selected_news->news_title}}" title="{{$selected_news->news_title}}" />
                    <span class="read-more-news-angel">!</span>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-4 col-lg-4 col-md-5 col-12 read-more-cover-img-container">
                        <span class="read-more-news-picture-cover-border ">
                            <img class="read-more-news-picture-cover"  src="{{ config('app.url').'/'.$selected_news->news_cover_picture }}" />
                        </span>
                        <span class="read-more-news-picture-cover-elemet ">
                            <img class=""  src="{{ config('app.url').'picture/assets/newselement.svg' }}" />
                        </span>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-7 col-12 mt-5 read-more-news-text.containre" style="text-align: justify">
                        {!!html_entity_decode( $selected_news->news_description)!!}
                    </div>
                </div>
            @else 
                <div class="alert alert-warning">
                    موردی یافت نشد
                </div>
            @endif
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection
