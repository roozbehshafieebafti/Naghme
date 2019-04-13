@extends('Masters.Admin')
@section('title','فرم‌ها')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>عنوان فرم‌ها</h2>
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

        @if(count($Forms) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >عنوان فعالیت</th>
					<th scope="col" >توضیحات</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>
			@foreach($Forms as $val)
				<tr >					
					<td >
						<span>
							{{ $val->form_title }}
						</span>
					</td> 
					<td>
						{{ $val->form_description }}
					</td>
					
					<td class="text-center">						
						<span>
							<a href="{{ config('app.url').'/'.$val->form_file1 }}" data-toggle="tooltip" data-placement="top" title="pdf" ><i class="fas fa-file-pdf"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;
						<?php
							if($val->form_file2 !=null)
							{
							?>
								<span>
									<a href="{{ config('app.url').'/'.$val->form_file2 }}" data-toggle="tooltip" data-placement="top" title="word" ><i class="fas fa-file-word"></i></a>
								</span>
							<?php
							}
						?>
						&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Edit_Form' , $val->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Form' , $val->id ) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>		
					</td>
				</tr>
			@endforeach			 
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون فرمی ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Form') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp;فرم جدید</a>
		</div>
    </div>
@endsection