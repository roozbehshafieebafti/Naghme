@extends('Masters.Main')
@section('title',"جست و جو ".$name)
@section('content')
    @include('Partials.GeneralHeader')
        <div class="container" style="margin-top:250px;margin-bottom:100px;">
            @if (count($search))
                @foreach ($search as $item)
                    <div>
                        {{$item->news_title}}
                        {{$item->apst_title}}
                        {{$item->authorities_title}}
                        {{$item->authorities_family}}
                        {{$item->authorities_name}}
                    </div>
                @endforeach
            @else
                
            @endif
        </div>
    @include('Partials.GeneralFooter')
@endsection