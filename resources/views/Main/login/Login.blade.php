@extends('Masters.Main')
@section('title','ورود')
@section('content')
    <div class="d-flex justify-content-center align-items-center bg-dark text-light" style="position:fixed;bottom:0px;top:0px;right:0px;left:0px;">
        <form class="col-6 text-center" method="POST">
            {{ csrf_field() }}
            <div class="form-group text-right" >
                <label for="exampleInputEmail1">Email address:</label>
                <input type="email" name="email_ng" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group text-right">
                <label for="exampleInputPassword1">Password:</label>
                <input type="password" name="password_ng" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop