@extends('Masters.Admin')
@section('title','فعالیت های اجرایی')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>فعالیت های اجرایی</h2>
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
        @if (count($title) > 0)
            <div>
                <br/>
                <a href="{{ route('New_Posts') }}" class="btn btn-primary" style="margin-right: 20px"><i class="fas fa-plus-circle"></i>&nbsp;فعالیت جدید</a>
            </div>
            @if(count($Posts) > 0)
                <table class="table table-hover border" style="margin-top: 30px">
                        <thead class=" bg-success text-light">
                            <th scope="col" >تاریخ</th>
                            <th scope="col" >ساعت</th>
                            <th scope="col" >عنوان فعالیت</th>
                            <th scope="col" >گالری</th>
                            <th scope="col" >ویدئو</th>
                            <th scope="col" class="text-center">عملیات</th>
                        </thead>
                    @foreach($Posts as $val)
                        <tr >
                            <td>
                                {{ \Morilog\Jalali\Jalalian::forge($val->created_at)->format('Y/m/d') }}
                            </td>
                            <td>
                                {{ \Morilog\Jalali\Jalalian::forge($val->created_at)->format('H:i:s') }}
                            </td>				
                            <td  >
                                <span style="color:blue;cursor: pointer;" data-toggle="modal" data-target="#id{{ $val->id }}">
                                    {{ $val->apst_title }}
                                </span>
                            </td> 
                            <td>
                                <a href="{{ route('Get_Post_Gallery',['id' =>$val->id , 'postName'=>$val->apst_title]) }}" ><i class="fas fa-camera-retro"></i></a>
                            </td>
                            <td>
                                <a href=""  ><i class="fas fa-video"></i></a>
                            </td>
                            <td class="text-center">
                                <span>
                                    <a href="{{ route('Edit_Post',$val->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                </span>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <span>
                                    <a href="{{ route('Delete_Post',$val->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                </span>
                            </td>
                        </tr>
                        <div style="direction: rtl" class="modal fade" id="id{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-right">
                                            {{ $val->apst_title }}
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div>
                                          <img style="width:100%" src="{{ config('app.url').'/'.$val->apst_picture_of_title }}" />
                                      </div>
                                      <div>
                                          <br />
                                          <p>
                                                <b><span>دسته‌بندی:</span></b>  
                                                {{ $val->apst_activities_title_id }}
                                          </p>
                                          <p>
                                                <b><span>زیر مجموعه:</span></b>
                                                {{ $val->apst_sub_activities_title_id }}
                                          </p>
                                            <p style="text-align:justify">
                                                <b><span>متن فعالیت:</span></b>
                                                {{ $val->apst_description }}
                                            </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    @endforeach			 
                </table>
            @else
                <div class="alert alert-warning" style="margin-top: 30px">
                    تاکنون پستی ثبت نشده است
                </div>
            @endif
            
        @else
            <div class="alert alert-warning" style="margin-top: 30px">
                تاکنون "عنوان فعالیتی" ثبت نشده است
            </div>
        @endif
        @if(isset($Count))
            <div style="margin-top:20px">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item" >
                            <?php
                                if($Page >1)
                                {
                                ?>
                                    <a class="page-link" href="{{ route('Get_Posts','page='.($Page-1) ) }}" tabindex="-1" > << </a>
                                <?php
                                }
                            ?>
                        </li>
                        <?php 
                            $CPage = ( $Count % 10 ) == 0 ? ( $Count / 10 ) : ( $Count / 10 )+1 ;
                        ?>
                        @for ($i = 1; $i <= $CPage ; $i++)
                            <li
                            <?php
                                if($Page == $i)
                                {
                                    echo 'class="page-item active"';
                                }
                                else{
                                    echo 'class="page-item"';
                                }
                            ?>
                            ><a class="page-link" href="{{ route('Get_Posts','page='.$i ) }}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item">
                                <?php
                                if($Page+1 <= $CPage)
                                {
                                ?>
                                    <a class="page-link" href="{{ route('Get_Posts','page='.($Page+1) ) }}"> >> </a>
                                <?php
                                }
                            ?>      
                        </li>
                    </ul>
                </nav>
            </div>
        @endif
		
	</div>
@endsection