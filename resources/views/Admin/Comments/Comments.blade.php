@extends('Masters.Admin')
@section('title','نظرات')
@section('content')
    <div>
        <div class="container" style="direction: rtl;padding: 20px 0px;">
            <div>
                <h2>نظر کاربران</h2>
                <br />
            </div>
            @if(session('success'))
                <div id="ErorrDiv" class="alert alert-success" >{{ session('success') }}</div>
            @elseif(session('error'))
                <div id="ErorrDiv" class="alert alert-danger" >{{ session('error') }}</div>
            @endif
            @if(count($errors)>0)
                <div id="ErorrDiv" class="alert alert-danger" >
                    @foreach($errors->all() as $item)
                        {{ $item }}
                    @endforeach
                </div>
            @endif
            <div class="row">                

                @foreach ($comments as $item)
                <?php 
                    $year = $item->created_at[0].$item->created_at[1].$item->created_at[2].$item->created_at[3];
                    $month = $item->created_at[5].$item->created_at[6];
                    $day = $item->created_at[8].$item->created_at[9];
                    $executeDate = \Morilog\Jalali\CalendarUtils::toJalali((int)$year, (int)$month,(int)$day);
                ?>

                <div class="col-12 mt-3">
                    <div class="bg-white col-8 card p-2">
                        <div class="row pr-3 pl-3">
                            <label class="col-3"  style="font-weight:bold">تاریخ:</label>
                            <span class="col-7">{{ $executeDate[0]."/".$executeDate[1]."/".$executeDate[2] }}</span>
                            <a href="{{route("Delete_Comment",$item->id)}}" class="text-danger col-2">حذف</a>
                        </div>
                        <div  class="row pr-3 pl-3">
                            <label class="col-3"  style="font-weight:bold">نام و نام‌خانوادگی:</label>
                            <span class="col-9">{{ $item->name." ".$item->family}}</span>
                        </div>
                        <div  class="row pr-3 pl-3">
                            <label class="col-3"  style="font-weight:bold">عنوان فعالیت:</label>
                            <span class="col-9">{{ $item->apst_title }}</span>
                        </div>
                        <div  class="row pr-3 pl-3">
                            <label class="col-3"  style="font-weight:bold">نظر:</label>
                            <span class="col-9">{{ $item->comment }}</span>
                        </div>
                        <form method="POST" action="{{ route("Check_Comment-Page") }}" autocomplete="off">
                            {{ csrf_field() }}
                            <div>                            
                                <span class="row pr-3 pl-3">
                                    <label class="col-3"  style="font-weight:bold">پاسخ:</label>
                                    <div class="col-7">
                                        <input class="form-control"  name="answer" value="{{$item->answer}}" />
                                        <input style="display: none" name="id"  value="{{$item->id}}"/>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-success">ثبت</button>
                                    </div>
                                </span>
                            </div>
                            <div>

                            </div>
                        </form>
                    </div>
                </div>                
            @endforeach
                <div class="col-8 mt-5 card p-1 pt-2">
                    <div class="d-flex justify-content-between">
                        <a href="{{route('Get_Comments',1)}}"><i class="fas fa-step-forward"></i></a>
                        <a href="{{route('Get_Comments',($id-1>0 ? $id-1 : 1))}}"><i class="fas fa-chevron-right"></i></a>
                        <span>{{$id .'   از   '.$pages }}</span>
                        <a href="{{route('Get_Comments',($id+1<=$pages ? $id+1 : $pages))}}"><i class="fas fa-chevron-left"></i></a>
                        <a href="{{route('Get_Comments',$pages)}}"><i class="fas fa-step-backward"></i></a>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
@endsection