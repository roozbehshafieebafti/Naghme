@extends('Masters.Admin')
@section('title','اعضای افتخاری')
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
    </div>
@endsection
