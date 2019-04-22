@extends('Masters.Admin')
@section('title','ویرایش امتیاز')
@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش امتیاز</h2>
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
				    <label for="exampleInputEmail1">امتیاز:</label>
				    <input type="text" name="New_Score" class="form-control text-left" value=" {{ $UserScore->score_description }} ">
				  </div>
				
				<button class="btn btn-success">ویرایش امتیاز</button>
			</form>
		</div>
	</div>
@endsection