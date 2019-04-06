@extends('Masters.Admin')
@section('title','ایجاد برنامه جدید')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش برنامه</h2>
		<div>
			@if(count($errors)>0)
				<div class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						{{ $val }}
					@endforeach
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0">
				{{ csrf_field() }}
				 <div class="form-group">
				    <label for="exampleInputEmail1">:برنامه</label>
				    <input type="text" name="New_Plan" class="form-control text-left" value="{{ $Plan->hpp_data }}" >
				    <small id="emailHelp" class="form-text text-muted">گنجایش : حداکثر 128 کاراکتر</small>
				  </div>
				
				<button class="btn btn-success">ثبت برنامه</button>
			</form>
		</div>
	</div>
@endsection