<div class="Naghmeh-Menu-bar bg-dark">
  <div class="col-12">
    <div class="Naghmeh-dropdown">
        <a href="{{ route('Get_News') }}" class="nav-link text-light" role="button">
          <span>اخبار<span>
        </a>
    </div>
    <div class="Naghmeh-dropdown">
        <a class="nav-link text-light" role="button">
          <i class="fas fa-sort-down"></i> 
          <span>فعالیت ها<span>
        </a>
        <ul class="bg-dark Naghmeh-dropdown-menu">
            <li><a class="text-light" href="{{ route('Get_Activity') }}">عنوان فعالیت ها</a></li>
            <li><a class="text-light" href="">لیست فعالیت ها</a></li>
        </ul>
    </div>
    <div class="Naghmeh-dropdown">
        <a class="nav-link text-light" role="button">
          <i class="fas fa-sort-down"></i> 
          <span>مسئولین</span>
        </a>
        <ul class="bg-dark Naghmeh-dropdown-menu">
            <li><a class="text-light" href="{{ route('Get_Authorities') }}">لیست مسئولین</a></li>
            <li><a class="text-light" href="{{ route('Get_Duties') }}">شرح وظایف</a></li>
        </ul>
    </div>
    <div class="Naghmeh-dropdown">
        <a class="nav-link text-light" role="button">
          <i class="fas fa-sort-down"></i> 
          <span>نغمه ماندگار</span>
        </a>
        <ul class="bg-dark Naghmeh-dropdown-menu">
            <li><a class="text-light" href="{{ route('Get_History') }}">تاریخچه</a></li>
            <li><a class="text-light" href="{{ route('Get_Purpose') }}">اهداف</a></li>
            <li><a class="text-light" href="{{ route('Get_Forms') }}">فرم‌ها</a></li>
            <li><a class="text-light" href="{{ route('Get_Plan') }}">برنامه ها</a></li>
            <li><a class="text-light" href="{{ route('Statements_Title') }}">بیانیه ها</a></li>
            <li><a class="text-light" href="{{ route('Get_Regulations') }}">آئین نامه ها</a></li>
            <li><a class="text-light" href="{{ route('Get_Ethics') }}">منشور اخلاقی</a></li>
            <li><a class="text-light" href="{{ route('Get_Chart') }}">نمودار سازمانی</a></li>
        </ul>
    </div>
  </div>
</div>

