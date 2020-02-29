<div class="Naghmeh-Menu-bar bg-white">
  <div class="col-12">
    <div class="Naghmeh-dropdown  text-center"  style="width:15%">
        <a class="nav-link text-muted " role="button">
          <i class="fas fa-sort-down"></i> 
          <span>نغمه ماندگار</span>
        </a>
        <ul class="bg-white Naghmeh-dropdown-menu text-left">
            <li><a class="text-muted" href="{{ route('Get_History') }}">تاریخچه</a></li>
            <li><a class="text-muted" href="{{ route('Get_Purpose') }}">اهداف</a></li>
            <li><a class="text-muted" href="{{ route('Get_Forms') }}">فرم‌ها</a></li>
            <li><a class="text-muted" href="{{ route('Get_Plan') }}">برنامه ها</a></li>
            <li><a class="text-muted" href="{{ route('Statements_Title') }}">بیانیه ها</a></li>
            <li><a class="text-muted" href="{{ route('Get_Regulations') }}">آیین نامه ها</a></li>
            <li><a class="text-muted" href="{{ route('Get_Ethics') }}">منشور اخلاقی</a></li>
            <li><a class="text-muted" href="{{ route('Get_Chart') }}">نمودار سازمانی</a></li>
        </ul>
    </div>
    |
    <div class="Naghmeh-dropdown text-center"  style="width:15%">
        <a class="nav-link text-muted " role="button">
          <i class="fas fa-sort-down"></i> 
          <span>مسئولین</span>
        </a>
        <ul class="bg-white Naghmeh-dropdown-menu text-left">
            <li><a class="text-muted" href="{{ route('Get_Authorities') }}">لیست مسئولین</a></li>
            <li><a class="text-muted" href="{{ route('Get_Duties') }}">شرح وظایف</a></li>
        </ul>
    </div>
    |
    <div class="Naghmeh-dropdown text-center" style="width:15%">
        <a class="nav-link text-muted" role="button">
          <i class="fas fa-sort-down"></i> 
          <span>فعالیت ها<span>
        </a>
        <ul class="bg-white Naghmeh-dropdown-menu text-left">
            <li><a class="text-muted" href="{{ route('Get_Activity') }}">عنوان فعالیت ها</a></li>
            <li><a class="text-muted" href="{{ route('Get_Posts') }}">فعالیت های اجرایی</a></li>
            <li><a class="text-muted" href="{{ route('Get_Recalls') }}">فراخوان عکس</a></li>
            <li><a class="text-muted" href="{{ route('Get_All_Reports') }}">پرسشنامه‌ها</a></li>
        </ul>
    </div>
    |
    <div class="Naghmeh-dropdown  text-center" style="width:15%">
        <a  class="nav-link text-muted" role="button">
          <i class="fas fa-sort-down"></i> 
          <span>عضویت<span>
        </a>
        <ul class="bg-white Naghmeh-dropdown-menu text-left">
          <li><a class="text-muted" href="{{ route('Get_User') }}">اعضا</a></li>
          <li><a class="text-muted"  href="{{ route('Get_Score') }}" > مزایا و امتیازات</a></li>
          <li><a class="text-muted"  href="{{ route('Get_All_Members') }}" > اعضای افتخاری</a></li>
      </ul>
    </div>
    |
    <div class="Naghmeh-dropdown text-center" style="width:15%">
        <a href="{{ route('Get_News') }}" class="nav-link text-muted" role="button">
          <span>اخبار<span>
        </a>
    </div>
    |
    <div class="Naghmeh-dropdown text-center" style="width:15%">
      <a href="{{ route('Get_Representation') }}" class="nav-link text-muted" role="button">
        <span>نمایندگی<span>
      </a>
  </div>
  </div>
</div>

