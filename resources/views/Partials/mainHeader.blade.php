<div class="container-fluid">
    <div class="Header-with-toggle bg-dark text-white ">
        <div class="toggle-button">
            <span onclick="openMenu()" class=""><i class="fas fa-bars h4 toggle-button-key"></i></span>
        </div>
        <div class="menu-content text-dark" id="menuContent">
            <h4>salma</h4>
            <h4>salma</h4>
            <h4>salma</h4>
            <h4>salma</h4>
        </div>
        <div class="not-menu-content" onclick="closeMenu()"></div>
    </div>

    <div class="Header-without-toggle bg-dark text-white">
        <div class="row">
            <div class="col-11">
                <div class="row">
                    <div class="header-sub-menu ">
                        <a class="text-white " role="button">
                            <span>نغمه ماندگار</span>
                        </a>
                        <ul class="header-ul-list bg-white  col-12">
                            <li><a class="text-muted" href="{{ route('Menu_History').'#history' }}">تاریخچه</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Purpose').'#purpose' }}">اهداف</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Form') }}">فرم‌ها</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Plane').'#plane' }}">برنامه ها</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Statement').'#statement' }}">بیانیه ها</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Regulations') }}">آیین نامه ها</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Ethics') }}">منشور اخلاقی</a></li>
                            <li><a class="text-muted" href="{{ route('Menu_Chart','کرمان') }}">نمودار سازمانی</a></li>
                        </ul>
                    </div>

                    <div class="header-sub-menu ">
                        <a class="text-white " role="button">
                            <span>مسئولین</span>
                        </a>
                        <ul class="header-ul-list bg-white  col-12">
                            @foreach ($_SESSION['Authorities'] as $item)
                                <li><a class="text-muted" href=" {{config('app.url').'authorities/'.$item->authorities_title}} ">{{ $item->authorities_title }}</a></li>                                
                            @endforeach
                        </ul>
                    </div>

                    <div class="header-sub-menu ">
                        <a class="text-white " role="button">
                            <span>فعالیت‌ها</span>
                        </a>
                        <ul class="accordion header-ul-list bg-white  col-12">
                            <?php $i=0 ?>
                            @foreach ($_SESSION['Activities'] as $key => $item)
                                @if(is_array($item))  
                                    <li>
                                        <span style="cursor:pointer" class="text-muted collapsed"  data-target="{{'#collapseExample'.$i}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{'collapseExample'.$i}}">
                                            {{ $key }}
                                        </span>
                                    </li>  
                                    <ul class="collapse bg-dark" id="{{'collapseExample'.$i}}" aria-labelledby="headingTwo">
                                        @foreach ($item as $val)
                                            <li class="text-light">{{ $val }}</li>    
                                        @endforeach
                                    </ul>
                                    <?php $i++; ?>                                    
                                @else
                                    <li>
                                        <a style="cursor:pointer" class="text-muted "  href="#">
                                            {{ $key }}
                                        </a>
                                    </li> 
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="header-sub-menu ">
                        <a class="text-white" href="#">
                            <span>اخبار</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-1 text-white">
                logo
            </div>
        </div>
    </div>
</div>
