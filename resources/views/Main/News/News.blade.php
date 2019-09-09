@extends('Masters.Main')

@section('title','اخبار')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="container-fluid" style="direction:rtl;margin-top:220px;">
        <div class="col-12">
            <div style="min-height:300px">
                @if(count($news) > 0)
                    @foreach ($news as $Value)
                        <div class="row">
                                {{-- <div class="col-2">{{ $Value->news_date }}</div> --}}
                                <div class="col-2">
                                    <div>
                                        <img style="width:100%" src="{{ config('app.url').'/'.$Value->news_picture }}" />
                                    </div>
                                </div>
                                <div class="col-10">
                                    <span class="col-12" >
                                        {{ $Value->news_title }}
                                    </span>
                                    {{-- style="max-height:50px;overflow:hidden" --}}
                                    <div class="col-12" >
                                        <div style="max-height:50px;overflow:hidden;">
                                            {!!html_entity_decode( $Value->news_description)!!}
                                        </div>
                                        <div>...</div>
                                        <div>
                                            <a href=" {{ route('News_Load_More', $Value->id) }} ">ادامه مطلب</a>
                                        </div>
                                    </div>
                                </div>                           
                            <hr class="col-12"  style="margin-right:0px"/>
                        </div>
                    @endforeach
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