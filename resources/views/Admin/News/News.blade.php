@extends('Masters.Admin')
@section('title','اخبار')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        <h2>اخبار</h2>
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
            <hr />
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 col-11" id="NewsSearch" type="search" placeholder="جست‌وجو  خبر" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">جست و جو </button>
            </form>
            <div style="margin-top:20px">
                <a href="{{ route('Create_News') }}" class="btn btn-primary" style="margin-right: 20px">&nbsp;خبر جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
            </div>
            <div style="margin-top:100px">
                    @foreach ($News as $Value)
                        <div class="row">
                                <div class="col-3">
                                    {{ $Value->news_date }}
                                </div>
                                <div class="col-6">
                                    <span style="color:blue;cursor: pointer;" data-toggle="modal" data-target="#id{{ $Value->id }}">
                                        {{ $Value->news_title }}
                                    </span>
                                </div>
                                <div class="col-3">
                                    <span>
                                        <a href="{{ route('Edit_Regulation',$Value->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <a href="{{ route('Delete_News',$Value->id) }}" data-toggle="tooltip" data-placement="top" title="حذف" ><i class="fas fa-trash-alt"></i></a>
                                    </span>
                                </div>                            
                            </div>
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
                                            {{ $Value->news_description }}
                                        </p>
                                        <p>
                                            <b><span>لینک خبر:</span></b>
                                            <a href="{{ $Value->news_link }}" target="_blank">{{ $Value->news_link_name }}</a>
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                        <hr />
                    @endforeach
            </div>
        </div>
    </div>
@endsection