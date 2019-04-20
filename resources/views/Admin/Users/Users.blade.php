@extends('Masters.Admin')
@section('title','اعضا')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">        
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
        <div class="col-12">
            <form onsubmit="Finduser(event)" class="form-inline my-2 my-lg-0" >
                <input onkeyup="Usersearch()" id="UserSearch" class="form-control mr-sm-2 col-5"  type="search" placeholder="جست‌وجو  اعضا" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0"  type="submit"><i class="fas fa-search"></i> </button>
                <a href="{{ route('Create_User') }}" class="btn btn-info" style="margin-right: 200px">&nbsp;عضو جدید &nbsp;<i class="fas fa-plus-circle"></i></a>
            </form>
            <h2 style="margin-top:60px">اعضا</h2>
            <div id="Spining" class="text-center" style="display:none">
                <div  class="spinner-border text-warning" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div style="margin-top:30px;min-height:300px">
                @if(count($Users) > 0)
                    <table class="table border border-warning table-hover">
                        <thead class="rounded-top bg-danger text-light">
                            <tr class=" rounded-top text-center">
                                <th scope="col"> شماره عضویت</th>
                                <th scope="col">نام و نام خانوادگی</th>
                                <th scope="col">نوع عضویت</th>
                                <th scope="col">سطح عضویت</th>
                                <th scope="col">رشته مربوطه</th>
                                <th scope="col">مرکز عضویت</th>
                                <th scope="col">
                                    <span style="direction: rtl"  class="bg-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        وضعیت
                                    </span>
                                    <div style="direction: rtl" class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('Get_User',['filter'=>'naghme_user_status','Mount'=>'1']) }}">تمدید</a>
                                        <a class="dropdown-item" href="{{ route('Get_User',['filter'=>'naghme_user_status','Mount'=>'0']) }}">عدم تمدید </a>
                                    </div>
                                </th>
                                <th scope="col">ویرایش</th>
                                <th scope="col">حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $Value)
                                <tr class=" text-center" >
                                    <td>{{ $Value->naghme_user_id_card }}</td>
                                    <td>{{ $Value->naghme_user_name.' '.$Value->naghme_user_family }}</td>
                                    <td>{{ $Value->naghme_user_kind }}</td>
                                    <td data-toggle="tooltip" data-placement="top" title="{{ $Value->naghme_user_level[1] }}"> <i style="color:{{ $Value->naghme_user_level[0] }}" class="fas fa-medal"></i></td>
                                    <td>{{ $Value->naghme_user_activity }}</td>
                                    <td>{{ $Value->naghme_user_city_id }}</td>
                                    <td id="TdStatus{{$Value->id}}" onclick="ChangeStatus('{{$Value->id}}','{{$Value->naghme_user_status}}')"  style="cursor:pointer"
                                     title=<?php echo ($Value->naghme_user_status=='red' ? 'عدم‌تمدید' : 'تمدید'); ?>
                                     ><?php echo ($Value->naghme_user_status=='red' ? '<i id="Status'.$Value->id.'" style="color:'.$Value->naghme_user_status.'" class="fas fa-times-circle"></i>' : '<i id="Status'.$Value->id.'" style="color:'.$Value->naghme_user_status.'" class="fas fa-check-circle"></i>'); ?>
                                    </td>
                                    <td>
                                        <a href="{{ route('Edit_User',$Value->id ) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>    
                                    </td>
                                    <td>
                                        <a href="{{ route('Delete_User',$Value->id) }}" data-toggle="tooltip" data-placement="top" title="حذف" ><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    @if(isset($search))
                        <div class="alert alert-warning">
                        موردی یافت نشد! 
                        </div>
                    @else
                        <div class="alert alert-warning">
                            عضوی ثبت نشده است
                        </div>
                    @endif
                    
                @endif
            </div>
            @if(isset($Count))
                <div style="margin-top:20px">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item" >
                                <?php
                                    if($Page >1)
                                    {
                                    ?>
                                        <a class="page-link" href="{{ route('Get_User','page='.($Page-1) ) }}" tabindex="-1" > << </a>
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
                                 ><a class="page-link" href="{{ route('Get_User','page='.$i ) }}">{{$i}}</a></li>
                            @endfor
                            <li class="page-item">
                                    <?php
                                    if($Page+1 <= $CPage)
                                    {
                                    ?>
                                        <a class="page-link" href="{{ route('Get_User','page='.($Page+1) ) }}"> >> </a>
                                    <?php
                                    }
                                 ?>      
                            </li>
                        </ul>
                    </nav>
                </div>
            @endif
        </div>
    </div>
    <script>const URL = "{{ config('app.url') }}";</script>
@endsection
