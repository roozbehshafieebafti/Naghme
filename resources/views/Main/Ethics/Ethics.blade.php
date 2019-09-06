@extends('Masters.Main')

@section('title','منشور اخلاقی')

@section('content')
    @include('Partials.GeneralHeader')
    <div style="direction: rtl" class="container-fluid">
        <div class="Statemants container" style="margin-top:250px;">
            <div class="">
                <ul class="">
                    @foreach ($Ethics as $key => $item)
                        <li class="mt-2 ethics-li">
                            {{ $key }}
                        </li>
                        <ol class="" style="list-style-type: none; margin-top: 20px;margin-bottom: 40px;">
                            @foreach ($item as $Colection)                                    
                                    <?php 
                                        if($Colection == '') continue;
                                        echo '<li><span style="color:#f6a619;font-size:20px;">&#9670;</span> '.$Colection.'</li>';
                                    ?>
                            @endforeach
                        </ol>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection