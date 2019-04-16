@extends('Masters.Admin')
@section('title','ویرایش مسئولین')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>ویرایش مسئول</h2>
		<div>
			<div id="Alert" class="alert alert-danger" style="display: none;">
				
			</div>
			@if(count($errors)>0)
				<div class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						{{ $val }}
					@endforeach
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0" enctype="multipart/form-data">
				{{ csrf_field() }}
				  <div class="form-group">
				    <label >نام:</label>
				    <input required="required" type="text" name="Authorities_name" class="form-control text-left" value ="{{ $EditableAuthorities->authorities_name }}" >
				  </div>
				  <div class="form-group">
				    <label >نام خانوادگی:</label>
				    <input required="required" type="text" name="Authorities_family" class="form-control text-left" value ="{{ $EditableAuthorities->authorities_family }}" >
				    
				  </div>
				  <div class="form-group">
				    <label >سمت</label>
				    <input required="required" type="text" name="Authorities_title" class="form-control text-left" value ="{{ $EditableAuthorities->authorities_title }}" >
				    
				  </div>
				  <div class="form-group">
				    <label >رزومه:</label>
				    <textarea style="resize: none" required="required" name="Authorities_cv" class="form-control text-left" >{{ $EditableAuthorities->authorities_cv }}</textarea>
				  </div>
				  <div class="form-group">
				    <label >عکس:</label>
				    <input id="Authorities_picture" type="file" name="Authorities_picture" onchange="AuthoritiesPicture(event)" class="form-control" >
				    <small id="" class="form-text text-muted">حداکثر سایز 300 کیلو بایت</small>
				    <small id="" class="form-text text-muted">نام تصویر حتما باید انگلیسی یا عدد باشد</small>
				  </div>
				
				<button id="Authorities_Submit" class="btn btn-success">ویرایش مسئول</button>
			</form>
		</div>
	</div>
@endsection