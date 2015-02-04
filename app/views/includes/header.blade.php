<div class="navbar default centered">
    <div class="navbar-header">
        <div class="container basic-wrapper"><a class="btn responsive-menu pull-right" data-toggle="collapse"
                                                data-target=".navbar-collapse"><i></i></a>

            <div class="navbar-brand text-center"><a href="{{ route('issues.index') }}"><img src="{{ asset('assets/images/logo.png') }}" alt=""
                                                                            data-src="{{ asset('assets/images/logo.png') }}"
                                                                            data-ret="{{ asset('assets/images/logo@2x.png') }}"
                                                                            class="retina"/></a></div>
        </div>
        <!--/.container -->
        <nav class="collapse navbar-collapse text-center">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('issues.index') }}">首頁</a></li>
                <li><a href="{{ route('pages.about') }}">關於我們</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle js-activated">我們的期刊</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('issues.newspaper') }}">國際商會聯合報</a></li>
                        <li><a href="{{ route('issues.magazine') }}">財富世界雜誌</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('pages.services') }}">服務</a></li>
                <li><a href="{{ route('pages.contact') }}">聯繫我們</a></li>
            </ul>
        </nav>
    </div>
    <!--/.navbar-header -->

</div>