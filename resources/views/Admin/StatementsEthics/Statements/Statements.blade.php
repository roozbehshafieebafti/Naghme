@extends('Masters.Admin')
@section('title','بیانیه ها')
@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
		<h2>بیانیه ها</h2>
		<br />
		<div>
			@if(session('success'))
				<div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
			@elseif(session('error'))
				<div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
			@endif
			@if(count($StatementsTitle)>0)
			<table class="table border table-hover ">
				<thead>
					<tr class="bg-success text-light">
						<th class="">بیانیه</th>
						<th class="text-center">عملیات</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($StatementsTitle as $value)
						<tr>
							<td><a style="text-decoration:none;" href="{{ route('Statements_List',$value->id) }}"> {{ $value->set_title }} </a> </td>
							<td class="text-center" >
								<span>
									<a href=" {{ route('Edit_Statements' , $value->id) }} " data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
								</span>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<span>
									<a href=" {{ route('Delete_Statements' , $value->id) }} " data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
								</span>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@else
				<div class="alert alert-warning">
					تاکنون بیانیه ای ثبت نشده است
				</div>
			@endif
			<div>
				<a href=" {{ route('New_Statements') }} " class="btn btn-primary text-light" style="margin-right: 20px;">&nbsp;بیانیه جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
			</div>
		</div>
	</div>
@endsection