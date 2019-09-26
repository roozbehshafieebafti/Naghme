@extends('Masters.Main')

@section('title','اخبار')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container" style="direction:rtl;margin-top:220px;">
        <div class="col-12">
            <div style="min-height:300px">
                @if(count($news) > 0)
                <div class="row">
                    @foreach ($news as $Value)
                        <div class="col-xl-6 col-lg-6 mb-5 col-container">
                            <div class="col-12 " style="overflow:hidden">
                                <img class="news-cover-image" src="{{ config('app.url').'/'.$Value->news_cover_picture }}" />
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
                <div style="margin-top:20px">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" >
                                <?php
                                    if($Page >1)
                                    {
                                    ?>
                                        <a class="page-link" href="{{ route('Get_All_News','page='.($Page-1) ) }}" tabindex="-1" > << </a>
                                    <?php
                                    }
                                 ?>
                            </li>
                            <?php 
                                $CPage = ( $Count % 10 ) == 0 ? ( $Count / 10 ) : ( $Count / 10 )+1 ;
                            ?>
                            @for ($i = 1; $i <= $CPage ; $i++)
                                <li
                                <?php
                                    if($Page == $i)
                                    {
                                        echo 'class="page-item active"';
                                    }
                                    else{
                                        echo 'class="page-item"';
                                    }
                                ?>
                                 ><a class="page-link" href="{{ route('Get_All_News','page='.$i ) }}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item">
                                    <?php
                                    if($Page+1 <= $CPage)
                                    {
                                    ?>
                                        <a class="page-link" href="{{ route('Get_All_News','page='.($Page+1) ) }}"> >> </a>
                                    <?php
                                    }
                                 ?>      
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection