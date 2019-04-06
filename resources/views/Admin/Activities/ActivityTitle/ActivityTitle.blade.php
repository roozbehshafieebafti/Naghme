@extends('Masters.Admin')
@section('title','عنوان فعالیت ها')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>عنوان فعالیت ها</h2>
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

		@if(count($ActTitle) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
			    	<th scope="col" class="text-center">عملیات</th>
				    <th scope="col" >مسئولین</th>
			    </thead>
			@foreach($ActTitle as $val)
				<tr >					
					<td class="text-center">
						<span>
							<a href="" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Activity',$val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>
					</td>
					<td >
						<span>
							{{ $val->at_title }}
						</span>
					</td> 
				</tr>
			@endforeach			 
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون فعالیتی ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Activity') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp;فعالیت جدید</a>
		</div>
	</div>
@endsection