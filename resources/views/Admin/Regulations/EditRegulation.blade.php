@extends('Masters.Admin')

@section('title','ویرایش آئین نامه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش آئین نامه</h2>
		<div>
			<div style="display:none" id="Alert" class="alert alert-danger">
			</div>
			<form id="RegulationForm" method="post" action="" enctype="multipart/form-data">
			  	<div class="form-group">
			    	<label >عنوان :</label>
			    	<input class="form-control" name="Regulation_title" value=" {{$EditableRecord["attributes"]["regulations_title"]}} " required="required">
			  	</div>
			  	<div class="form-group">
			    	<label >توضیحات:</label>
			    	<textarea class="form-control" name="Regulation_text" style="resize: none;" required="required">{{ $EditableRecord["attributes"]["regulations_description"] }}</textarea>
			  	</div>
			  	<div class="form-group">
			    	<label >فایل:</label>
			    	<input id="Regulation_File" type="file" onchange="checkSize()" name="Regulation_File">
			    	<br>
			    	<small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small>
			  	</div>
			  	<button id="Submit" type="submit" class="btn btn-primary" style="width:150px;">ارسال</button>
			</form>
			<div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
			  	<div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
			  	</div>
			</div>
			<script type="text/javascript">
				const RegulationUrl='{{ route("Edit_Regulation" , $EditableRecord["attributes"]["id"]) }}';
				const Regulation = '{{ route("Get_Regulations") }}';
			</script>
		</div>
	</div>
@endsection