@extends('Masters.Admin')

@section('title','بیانیه جدید')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ایجاد بیانیه جدید</h2>
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
				    <label >:بیانیه</label>
				    <input type="text" name="New_Statement" class="form-control text-left" placeholder="بیانیه را اینجا وارد کنید">
				    <small id="" class="form-text text-muted">بدون محدودیت کارکتری</small>
				  </div>
				<a href="{{ route('Statements_Title') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
				<button class="btn btn-success">ثبت بیانیه</button>
			</form>
		</div>
	</div>
@endsection