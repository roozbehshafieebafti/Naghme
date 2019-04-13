@extends('Masters.Admin')
@section('title','اهداف')
@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>اهداف نغمه ماندگار</h2>
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

		@if(count($Purpose) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >هدف</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>			 
			@foreach($Purpose as $val)
				<tr >
					<td >{{ $val->hpp_data }}</td>
					<td class="text-center">
						<span>
							<a href="{{ route('Edit_Page_Purpose',$val->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Purpose',$val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>
					</td>					
				</tr>
			@endforeach
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون هدفی در سیستم ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Purpose') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp; ایجاد هدف جدید</a>
		</div>
	</div>
@endsection