@extends('Masters.Admin')
@section('title','فراخوان عکس')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>فراخوان عکس</h2>
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
        <div>

        </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success text-white mr-4" href="{{route("Create_Recall_page")}}">فراخوان جدید</a>
            </div>
        @if (isset($Count) && $Count[0]->total>0)
            <div class="mt-5">
                <table class="table table-striped">
                    <thead class="bg-info text-light">
                        <th class="text-center" style="width:100px">تاریخ</th>
                        <th class="text-center">نام</th>
                        <th class="text-center" style="width:100px">مشاهده</th>
                        <th class="text-center" style="width:100px">فعال</th>
                        <th class="text-center" style="width:100px">عملیات</th>
                    </thead>
                    <tbody>
                        @foreach ($Recalls as $item)
                            <?php 
                                $year = $item->created_at[0].$item->created_at[1].$item->created_at[2].$item->created_at[3];
                                $month = $item->created_at[5].$item->created_at[6];
                                $day = $item->created_at[8].$item->created_at[9];
                                
                                $executeDate = \Morilog\Jalali\CalendarUtils::toJalali((int)$year, (int)$month,(int)$day);
                            ?>
                            <tr>
                                <td class="text-center" >{{ $executeDate[0]."/".$executeDate[1]."/".$executeDate[2] }}</td>
                                <td class="text-center" >
                                    <a href="{{route('Get_All_Bodys',[$item->id, $item->name])}}">{{$item->name}}</a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('Get_Reacll',[$item->id,$item->name]) }}" target="_blank"> <i class="far fa-eye"></i> </a>
                                </td>
                                <td class="text-center" >
                                    <a href="{{route('Recall_Activation',[$item->id , $item->activation])}}">
                                        <?php echo $item->activation == 0 ? '<i class="far fa-square"></i>' : '<i class="fas fa-check-square"></i>' ; ?>
                                    </a>
                                </td>
                                <td class="text-center" >
                                    <span>
                                        <a href="{{ route('Edit_Recalls',$item->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش" ><i class="far fa-edit"></i></a>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>
                                        <a href="{{ route('Delete_Recall',$item->id) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fas fa-trash-alt"></i></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        @if(isset($Count)  && $Count[0]->total>0 )
            <div style="margin-top:20px" class="mt-5">
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
                            $CPage = ( $Count[0]->total % 10 ) == 0 ? ( $Count[0]->total / 10 ) : ( $Count[0]->total / 10 )+1 ;
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
            <div class="alert alert-warning mt-5">
                تاکنون فراخوانی ثبت نشده است
            </div>
        @endif    
        {{-- <script>const URL = "{{ config('app.url') }}";</script> --}}
    </div>
@endsection