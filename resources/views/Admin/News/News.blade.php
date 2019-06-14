@extends('Masters.Admin')
@section('title','اخبار')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        @if(session('success'))
            <div class="alert alert-success" style="margin-top: 30px">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" style="margin-top: 30px">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-12">
            <form onsubmit="SearchNews(event)" class="form-inline my-2 my-lg-0" >
                <input onkeyup="FindNews()" id="NewsSearch" class="form-control mr-sm-2 col-5"  type="search" placeholder="جست‌وجو  خبر" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0"  type="submit"><i class="fas fa-search"></i> </button>
                <a href="{{ route('Create_News') }}" class="btn btn-info" style="margin-right: 200px">&nbsp;خبر جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
            </form>
            <h2 style="margin-top:60px">اخبار</h2>
            <div style="margin-top:30px;min-height:300px">
                @if(count($News) > 0)
                    @foreach ($News as $Value)
                        <div class="row">
                                <div class="col-2">{{ $Value->news_date }}</div>
                                <div class="col-3">
                                    <span style="color:blue;cursor: pointer;" data-toggle="modal" data-target="#id{{ $Value->id }}">
                                        {{ $Value->news_title }}
                                    </span>
                                </div>
                                <div class="col-2">
                                    <span>
                                        <a href="{{ route('Edit_News',$Value->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <a href="{{ route('Delete_News',$Value->id) }}" data-toggle="tooltip" data-placement="top" title="حذف" ><i class="fas fa-trash-alt"></i></a>
                                    </span>
                                    @if($Value->news_file != null)
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span>
                                            <a target="_blank" href="{{ config('app.url').'/'.$Value->news_file }}" data-toggle="tooltip" data-placement="top" title="file" ><i class="fas fa-file"></i></i></a>
                                        </span>
                                    @endif
                                </div>                            
                            <hr class="col-7"  style="margin-right:0px"/>
                            <div style="direction: rtl" class="modal fade" id="id{{ $Value->id }}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-right">
                                          {{ $Value->news_title }}
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div>
                                          <img style="width:100%" src="{{ config('app.url').'/'.$Value->news_picture }}" />
                                      </div>
                                      <div>
                                          <br />
                                        <p style="text-align:justify">
                                            <b><span>متن خبر:</span></b>
                                            {!!html_entity_decode( $Value->news_description)!!}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
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
                                        <a class="page-link" href="{{ route('Get_News','page='.($Page-1) ) }}" tabindex="-1" > << </a>
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
                                 ><a class="page-link" href="{{ route('Get_News','page='.$i ) }}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item">
                                    <?php
                                    if($Page+1 <= $CPage)
                                    {
                                    ?>
                                        <a class="page-link" href="{{ route('Get_News','page='.($Page+1) ) }}"> >> </a>
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
    <script>const URL = "{{ config('app.url') }}";</script>
@endsection
