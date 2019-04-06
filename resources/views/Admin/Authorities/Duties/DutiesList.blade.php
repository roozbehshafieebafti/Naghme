@extends('Masters.Admin')
@section('title','لیست وظایف')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>لیست وظایف    {{ $dutuTitle }}</h2>
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
				@if(count($Duties) > 0)
					<?php
						$i=0;
						foreach ($Duties as $value) {
							?>
							<input value="{{ $value->ad_authorities_duty }}" style="margin:5px" class="form-control" />
							<?php
						$i++;
						}

						for($j=$i;$j<10;$j++)
						{
							?>
							<input style="margin:5px" class="form-control" />
							<?php
						}
					?>
				@else
					<?php
						for($j=1;$j<=10;$j++)
						{
							?>
							<input style="margin:5px" class="form-control" />
							<?php
						}
					?>
				@endif
				
			<button id="Authorities_Submit" class="btn btn-success">ویرایش مسئول</button>
			</form>
		</div>
	</div>	
@endsection