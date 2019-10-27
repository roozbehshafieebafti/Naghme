<div class="Footer">
    <div style="background-color: #790000; height:20px;"></div>
    <div class="main-footer" >
        <div class="footer-right-container" style="overflow-x: hidden;overflow-y: hidden;">
            <div class="right-yellow-div"></div>
            <div class="right-yellow-border"></div>
            <div class="right-gray-border"></div>
            <p class="right-paragraph">اطلاعات تماس</p>
        </div>
        
        <div class="footer-middle-container mt-5">
            <ul class="footer-middle-ul-list">
                <li>
                    <label class="text-white mr-5">سامانه پیامکی انجمن: 20003413871001</label>
                    <img src="{{ config("app.url")."picture/assets/sms.svg" }}" alt="sms" width="70px">
                </li>                
                <li>
                    <label class="text-white mr-5">روابط عمومی انجمن: 000-000-0913</label>
                    <img src="{{ config("app.url")."picture/assets/info.svg" }}" alt="info" width="48px" style="margin-right: 20px">
                </li>
                <li>
                    <label class="text-white">info@naghmemandegar.com :پست الکترونیک</label>
                    <img src="{{ config("app.url")."picture/assets/email.svg" }}" alt="email" width="50px" style="margin-right: 10px">>
                </li>
            </ul>
        </div>

        <div class="footer-left-container mt-5 mr-3">
            <div class="pr-2 pl-2 mt-3"  style="border-bottom:solid 1px #f6a619">
                <form autocomplete="off" action="" method="GET" onsubmit="searchAction(event)">            
                    <div class="row">
                        <button type="submit" style="border:none;background-color:inherit;cursor:pointer" class="col-2"><i class="fas fa-search" style="color:#f6a619"></i></button>
                        <input id="searchInput" class="search-input col-10 text-white" type="text" placeholder="کلمه کلیدی خود را وارد نمایید"/>
                    </div>
                </form>
            </div>
            <div class="mt-5 ">
                <p class="text-white" style="border-bottom:solid 3px #f6a619">مارا در شبکه‌های اجتماعی دنبال کنید</p>
                <div class="d-flex justify-content-center">
                    <a href="https://www.instagram.com" target="_blank">
                        <img class="social-icons" src="{{ config("app.url")."picture/assets/insta.svg" }}" alt="instagram" width="50px" style="margin-right: 10px">
                    </a>
                    <a href="https://www.twitter.com" target="_blank">
                        <img class="social-icons" src="{{ config("app.url")."picture/assets/tweet.svg" }}" alt="twitter" width="50px" style="margin-right: 10px">
                    </a>
                    <a href="https://www.aparat.com" target="_blank">
                        <img class="social-icons" src="{{ config("app.url")."picture/assets/aparat.svg" }}" alt="aparat" width="50px" style="margin-right: 10px">
                    </a>
                    
                </div>
            </div>
        </div>

    </div>
    <script>
        const appBaseUrl = "{{config('app.url')}}";
    </script>
</div>