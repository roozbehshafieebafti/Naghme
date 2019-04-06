@extends('Masters.Admin')
@section('title','بیانیه ها | ویرایش زیر بیانیه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش زیر بیانیه</h2>
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
				    <label >:زیربیانیه</label>
				    <input type="text" name="New_Statement_list" class="form-control text-left" value=" {{ $EditableRecord['attributes']['sel_description'] }} ">
				    <small id="" class="form-text text-muted">بدون محدودیت کارکتری</small>
				  </div>
				
				<button class="btn btn-success">ثبت زیربیانیه</button>
			</form>
		</div>
	</div>
@endsection