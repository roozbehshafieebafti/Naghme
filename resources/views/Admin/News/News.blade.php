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
            
            <div>

            </div>
        </div>
    </div>
@endsection