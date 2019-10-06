@extends('Masters.Main')
@section('title',"جست و جو ".$name)
@section('content')
    @include('Partials.GeneralHeader')
        <div class="container" style="margin-top:250px;margin-bottom:100px;direction:rtl">
            @if (count($search))
                @foreach ($search as $item)
                    <div class="search-content-container col-8 d-flex justify-content-between mt-5">
                        <div class="">
                            <span class="search-picture-big-square">1</span>
                            <span class="search-picture-small-square">2</span>
                        </div>
                        @if(isset($item->news_title))
                            <div class="search-content-title">
                                {{$item->news_title}}                                
                            </div>
                            <div class="search-read-more d-flex justify-content-end">
                                <a class="read-more-link" href="{{config('app.url').'news-continue-reding/'.$item->id}}">
                                    <i class="fas fa-long-arrow-alt-left pt-1 mr-3"></i>
                                    ادامه مطلب
                                </a>
                            </div>

                        @elseif(isset($item->apst_title))
                            <div class="search-content-title">
                                {{$item->apst_title}}                              
                            </div>
                            <div class="search-read-more d-flex justify-content-end">
                                <a class="read-more-link" href="#">ادامه مطلب</a>
                            </div>

                        @elseif(isset($item->authorities_title))
                            <div class="search-content-title">
                                {{$item->authorities_name}}                                
                                {{$item->authorities_family}}
                                -
                                {{$item->authorities_title}}
                            </div>
                            <div class="search-read-more d-flex justify-content-end">
                                <a class="read-more-link" href="{{config('app.url').'authorities/'.$item->authorities_title}}">
                                    <i class="fas fa-long-arrow-alt-left pt-1 mr-3"></i>
                                    ادامه مطلب
                                </a>
                            </div>
                        @endif                                                                
                    </div>
                @endforeach
            @else
                
            @endif
        </div>
    @include('Partials.GeneralFooter')
@endsection