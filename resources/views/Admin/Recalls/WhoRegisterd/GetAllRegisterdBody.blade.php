@extends('Masters.Admin')
@section('title','فراخوان عکس')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>{{$recallName}}</h2>
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
        @if (isset($Count) && $Count>0)
            <div class="mt-5">
                <table class="table table-striped">
                    <thead class="bg-info text-light">                        
                        <th class="text-center" style="width:100px">آیدی</th>
                        <th class="text-center">نام و نام خانوادگی</th>
                        <th class="text-center">ایمیل</th>
                    </thead>
                    <tbody>
                        @foreach ($WhoRegistered as $item)
                            <tr>
                                <td class="text-center" >{{ $item->user_id }}</td>
                                <td class="text-center" >
                                    <a href="{{route('Get_All_Works',[$item->recall_id, $item->user_id, $item->name, $item->family])}}">{{ $item->name.' '.$item->family }}</a>
                                </td>
                                <td class="text-center" >{{ $item->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        @if(isset($Count)  && $Count>0 )
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
        @else
            <div class="alert alert-warning mt-5">
                تاکنون کسی در فراخوان نام نویسی نکرده است
            </div>
        @endif    
    </div>
@endsection