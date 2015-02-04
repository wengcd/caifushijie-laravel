<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class="full-layout">
<div class="body-wrapper animsition">
    @include('includes.header')
    <div class="offset2"></div>
    @yield('content')

    <footer class="footer black-wrapper widget-footer">
        <div class="container inner">
            <div class="thin text-center">
                <h3 class="section-title text-center">聯繫我們</h3>

                <p>《財富世界》雜誌社</p>

                <div class="divide20"></div>
                <ul class="social">
                    <li><a href="#"><i class="icon-s-rss"></i></a></li>
                    <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-s-dribbble"></i></a></li>
                    <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
                </ul>
                <div class="divide40"></div>
                <div class="contact-info"><span> 香港灣仔駱克道300號僑阜商業大廈20樓A室 </span>
                    <span>+00 (123) 456 78 90 </span> <span> <a
                                href="caifushijiezazhi@163.com">caifushijiezazhi@163.com </a></span></div>
                <!-- .contact-info -->

            </div>
            <!-- .thin -->

        </div>
        <!-- .container -->

        <div class="sub-footer">
            <div class="container">
                <p class="text-center">© 2014 財富世界. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- /footer -->
</div>

@include('includes.footer')
</body>
</html>
