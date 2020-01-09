@extends('Masters.Admin')
@section('title','ویدئو')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
        <h2>ویدئو " {{ $postName }} " </h2>
        <form action="" method="post">
            {{ csrf_field() }}
            <div class="d-flex justify-content-center">
                <div class="input-group input-group-lg m-5" style="direction:ltr; width: 650px">
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-lg">video script</span>
                    </div>
                    <input value="{{ $Video[0]->apst_video }}" style="font-family:Arial, Helvetica, sans-serif" name="video_script" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
            </div>
        </form>
        <div  class="d-flex justify-content-center">
            <div style="width:650px">
                {!!html_entity_decode( $Video[0]->apst_video)!!}
            </div>
        </div>
	</div>
@endsection