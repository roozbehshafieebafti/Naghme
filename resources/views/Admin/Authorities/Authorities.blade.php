@extends('Masters.Admin')
@section('title','مسئولین')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>لیست مسئولین</h2>
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

		@if(count($Authorities) > 0)
		<table class="table table-hover border" style="margin-top: 30px">
			    <thead class=" bg-success text-light">
				    <th scope="col" >مسئولین</th>
			    	<th scope="col" class="text-center">عملیات</th>
			    </thead>
			@foreach($Authorities as $val)
				<tr >	
						<td >
								<span style="color:blue;cursor: pointer;" data-toggle="modal" data-target="#A{{ $val->id }}">
								{{ $val->authorities_name.' '.$val->authorities_family }}
								</span>
							</td> 				
						<td class="text-center">
						<span>
							<a href="{{ route('Edit_Authorities', $val->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
						</span>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<a href="{{ route('Delete_Authorities' , $val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
						</span>
					</td>					
				</tr>
				<div style="direction: rtl" class="modal fade" id="A{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-scrollable" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title text-right">
				        	{{ $val->authorities_name.' '.$val->authorities_family }}
				        </h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <div>
				        	
				        </div>
				        <div>
				        	<ul style="list-style-type: none">
				        		<li>
				        			<img style="width:120px;height:150px;" src="{{ config('app.url').$val->authorities_picture }}">
				        		</li>
				        		<li style="margin-top:20px;">
				        			<span>
				        				واحد  :
				        			</span>
				        			<span>
				        				{{ $val->authorities_unit_title }}
				        			</span>
				        		</li>
				        		<li>
				        			<span>
				        				سمت  :
				        			</span>
				        			<span>
				        				{{ $val->authorities_title }}
				        			</span>
				        		</li>
				        		<li style="margin-top:20px;">
				        			<span>
				        				رزومه :
				        			</span>
				        			<span>
										{!!html_entity_decode($val->authorities_cv )!!}
				        			</span>
				        		</li>
				        	</ul>
				        </div>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach			 
		</table>
		@else
			<div class="alert alert-warning" style="margin-top: 30px">
				تاکنون مسئولی ثبت نشده است
			</div>
		@endif
		<div>
			<br/>
			<a href="{{ route('New_Authorities') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp;مسئول جدید</a>
		</div>
	</div>
@endsection