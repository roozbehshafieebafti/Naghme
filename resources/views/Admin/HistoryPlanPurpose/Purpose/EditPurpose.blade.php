@extends('Masters.Admin')

@section('title','ویرایش هدف')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش هدف</h2>
		<div>
			@if(count($errors)>0)
				<div class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						{{ $val }}
					@endforeach
				</div>
			@endif
			<form class="form col-12" method="post" action="" style="padding: 20px 0">
				{{ csrf_field() }}
				 <div class="form-group container">
				    <label for="exampleInputEmail1">هدف: </label>
				    <input type="text" name="New_Purpose" class="form-control text-left" value="{{ $editableRecord['attributes']['hpp_data'] }}">
				    <small id="emailHelp" class="form-text text-muted">گنجایش : حداکثر 128 کاراکتر</small>
				  </div>
				
				<button class="btn btn-success">ثبت هدف</button>
			</form>
		</div>
	</div>
@endsection