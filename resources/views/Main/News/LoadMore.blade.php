@extends('Masters.Main')
@if ($news)
    @section('title') {{$news->news_title}} @endsection    
@else
    @section('title') موردی یافت نشد @endsection
@endif
{{-- این قسمت نیاز دارد به نشان دادن محتوایی وجود ندارد --}}
@section('content')
    <div class="container-fluid" style="direction:rtl">
        <div class="container" >

            @if ($news)
                <div class="mt-3 d-flex justify-content-center">
                    <img src=" {{ config('app.url').'/'.$news->news_picture }} " alt="">
                </div>
                <p class="mt-3" style="text-align: justify">
                    {!!html_entity_decode( $news->news_description)!!}
                </p>
            @else 
                <div class="alert alert-warning">
                    موردی یافت نشد
                </div>
            @endif

        </div>
    </div>
@endsection
