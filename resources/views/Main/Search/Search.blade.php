@extends('Masters.Main')
@section('title',"جست و جو ".$name)
@section('content')
    @include('Partials.GeneralHeader')
        <div class="container search-main-container" style="direction:rtl">
            @if (count($search))
                @foreach ($search as $item)
                    <div class="search-content-container col-xl-10 col-12 mt-5">                        
                        <div class="serach-result-container row ">
                            <div class="">
                                <span class="search-picture-big-square">1</span>
                                <span class="search-picture-small-square">2</span>
                            </div>
                            <div class="search-content-title">
                                @if(isset($item->news_title))
                                    {{$item->news_title}}
                                @elseif(isset($item->apst_title))
                                    {{$item->apst_title}} 
                                @elseif(isset($item->authorities_unit_title))
                                    {{$item->authorities_name}}
                                    {{$item->authorities_family}}
                                    -
                                    {{$item->authorities_unit_title}}
                                @endif 
                            </div>
                        </div>
                        <div class="search-black-border"></div>
                        <div class="d-flex justify-content-end">
                            <span class="search-read-more-link-cont d-flex justify-content-between">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <a class="read-more-link" href="<?php
                                    if(isset($item->news_title)){
                                        echo config('app.url').'news-continue-reding/'.$item->id;
                                    }
                                    elseif(isset($item->apst_title)){
                                        echo config('app.url').'read-activity/'.$item->id;
                                    }
                                    elseif(isset($item->authorities_unit_title)){
                                        if($item->authorities_city_id>1){
                                            echo config('app.url').'representaion-continue-reding/'.$item->representation_title.'#co_worker'.$item->id;
                                        }
                                        else{
                                            echo config('app.url').'authorities/'.$item->authorities_unit_title.'#co_worker'.$item->id;
                                        } 
                                    }
                                ?>">
                                    ادامه مطلب
                                </a>
                            </span>
                        </div>                                                                    
                    </div>
                @endforeach
            @else
                <div class="d-flex justify-content-center align-items-center" style="height:200px;">
                    <h2 class="text-right">متاسفانه جست‌وجوی شما نتیجه‌ای نداشت.</h2>
                </div>
            @endif
        </div>
    @include('Partials.GeneralFooter')
@endsection