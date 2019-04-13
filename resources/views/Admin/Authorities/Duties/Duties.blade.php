@extends('Masters.Admin')
@section('title','شرح وظایف')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>شرح وظایف</h2>
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

		@if(count($AuthoritiesTitle) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >عنوان مسئولیت</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>
			@foreach($AuthoritiesTitle as $val)
				<tr >
					<td >
						<span >
						{{ $val->authorities_title}}
						</span>
					</td> 					
					<td class="text-center">
						<span>
							<a href="{{ route('Create_Duties',$val->authorities_title) }}" data-toggle="tooltip" data-placement="top" title="تعریف وظایف" ><i class="fas fa-clipboard"></i></a>
						</span>
					</td>
				</tr>
			@endforeach			 
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون مسئولی ثبت نشده است
			</div>
		@endif

	</div>
@endsection