@extends('Masters.Main')

@section('title','اخبار')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container news-parent-continer" style="direction:rtl">
        <div class="col-12">
            <div style="min-height:300px">
                @if(count($news) > 0)
                <div class="row">
                    @foreach ($news as $Value)
                        <div class="col-xl-6 col-lg-6 col-12 mb-5 col-container">
                            <div class="col-12 news-image-container" style="overflow:hidden">
                                <img class="news-cover-image" src="{{ config('app.url').'/'.$Value->news_cover_picture }}" alt="{{ $Value->news_title }}" title="{{ $Value->news_title }}" />
                                <div class="news-angel">!</div>
                            </div>
                            <div class="news-title-container col-12">
                                <div class="news-title-text-container" >
                                    <b>{{ $Value->news_title }}</b>
                                </div>
                                <div class="news-title-text-angel">!</div>
                            </div>                           
                            <div class="news-text-container" >
                                <img class="news-text-background-container" src="{{ config('app.url')."/picture/assets/newsBackground.svg"}}" />
                                <div class="news-text-sumery">
                                    {!!html_entity_decode( $Value->news_description)!!}
                                </div>
                                <div class="news-read-more-container">
                                    <a class="news-read-more-text" href="{{ route('News_Load_More', $Value->id) }}">بیشتر بخوانید</a>
                                </div>
                            </div>
                            <div class="news-date-container">
                                <div class="news-date-text" >
                                        {{ $Value->news_date }}
                                    </div>
                                <div class="news-date-angel">!</div>
                            </div>
                        </div>    
                    @endforeach
                </div>
                @else
                    @if(isset($search))
                        <div class="alert alert-warning">
                        موردی یافت نشد! 
                        </div>
                    @else
                        <div class="alert alert-warning">
                            خبری ثبت نشده است
                        </div>
                    @endif
                    
                @endif
            </div>
            @if(isset($Count))
                <div class="pagination-container text-center">
                    <div class="d-flex justify-content-center">
                        <div class="pagination-number-container d-flex justify-content-center" ></div>
                    </div>
                    <img src="{{config('app.url').'/picture/assets/pageNumberLine.svg'}}" />
                </div>
            @endif
        </div>
        <script>
            const paginationCount = "<?php echo $Count; ?>",
                paginationPage = "<?php echo $Page; ?>", 
                paginationRoute = "<?php echo config('app.url').'news/' ?>",
                paginationLimit = "<?php echo $Limit; ?>";
            // const paginationCount = 40, paginationPage =1 , paginationRoute= "<?php echo config('app.url').'news/' ?>";
        </script>
    </div>
    @include('Partials.GeneralFooter')
@endsection