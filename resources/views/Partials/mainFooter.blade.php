<div class="Footer">
    <div style="background-color: #790000; height:20px;"></div>
    <div class="main-footer" >
        <div class="footer-right-container" style="overflow-x: hidden;overflow-y: hidden;">
            <div class="right-yellow-div"></div>
            <div class="right-yellow-border"></div>
            <div class="right-gray-border"></div>
            <p class="right-paragraph">اطلاعات تماس</p>
        </div>
        
        <div class="footer-middle-container">
            <ul class="footer-middle-ul-list">
                <li class="footer-middle-ul-list-li">
                    <label id="footer-contact-us-text1" class="footer-contact-us-text text-white mr-5">سامانه پیامکی انجمن: 20003413871001</label>
                    <img class="footer-contact-us-pic1" src="{{ config("app.url")."picture/assets/sms.svg" }}" alt="sms" >
                </li>                
                <li class="footer-middle-ul-list-li">
                    <label id="footer-contact-us-text2" class="footer-contact-us-text text-white mr-5">روابط عمومی انجمن: 000-000-0913</label>
                    <img class="footer-contact-us-pic2" src="{{ config("app.url")."picture/assets/info.svg" }}" alt="information" >
                </li>
                <li class="footer-middle-ul-list-li">
                    <label id="footer-contact-us-text3" class="footer-contact-us-text text-white">info@naghmemandegar.com :پست الکترونیک</label>
                    <img class="footer-contact-us-pic3" src="{{ config("app.url")."picture/assets/email.svg" }}" alt="email" >
                </li>
            </ul>
        </div>

        <div class="footer-left-container">
            <div>
                <div class="pr-2 pl-2 mt-3"  style="border-bottom:solid 1px #f6a619">
                    <form autocomplete="off" action="" method="GET" onsubmit="searchAction(event)">            
                        <div class="row">
                            <button type="submit" style="border:none;background-color:inherit;cursor:pointer" class="col-2"><i class="fas fa-search" style="color:#f6a619"></i></button>
                            <input id="searchInput" class="search-input col-10 text-white" type="text" placeholder="کلمه کلیدی خود را وارد نمایید"/>
                        </div>
                    </form>
                </div>
                <div class="mt-5 ">
                    <p class="text-white follow-us-text" style="">ما را در شبکه‌های اجتماعی دنبال کنید</p>
                    <div class="d-flex justify-content-center">
                        <a href="https://www.instagram.com" target="_blank">
                            <img class="social-icons"  id="social-icon1" src="{{ config("app.url")."picture/assets/insta.svg" }}" alt="instagram" width="50px" style="margin-right: 10px">
                        </a>
                        <a href="https://www.twitter.com" target="_blank">
                            <img class="social-icons" id="social-icon2" src="{{ config("app.url")."picture/assets/tweet.svg" }}" alt="twitter" width="50px" style="margin-right: 10px">
                        </a>
                        <a href="https://www.aparat.com" target="_blank">
                            <img class="social-icons" id="social-icon3" src="{{ config("app.url")."picture/assets/aparat.svg" }}" alt="aparat" width="50px" style="margin-right: 10px">
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        const appBaseUrl = "{{config('app.url')}}";
    </script>
</div>