@extends('layouts.default')
@section('content')
    <div class="light-wrapper">
        <div class="container inner tp40 bp0">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <ul>
                        <li data-transition="fade" data-delay="9000" data-saveperformance="on"
                            data-title="Ken Burns Slide"><img src="{{ asset('assets/images/dummy.png') }}" alt=""
                                                              data-lazyload="{{ asset('assets/images/art/slider-bg1.jpg') }}"
                                                              data-bgposition="right top" data-kenburns="on"
                                                              data-duration="12000" data-ease="Power0.easeInOut"
                                                              data-bgfit="115" data-bgfitend="100"
                                                              data-bgpositionend="center bottom">

                            <div class="caption sfr title light-layer" data-x="745" data-y="400" data-speed="700"
                                 data-start="2300" data-easing="Sine.easeOut">Nature Photography
                            </div>
                            <div class="caption sfr lead light-layer" data-x="745" data-y="454" data-speed="700"
                                 data-start="2800" data-easing="Sine.easeOut">Pellentesque ornare sem lacinia quam
                            </div>
                        </li>
                        <li data-transition="slidehorizontal" data-delay="7000" data-fstransition="fade"
                            data-fsmasterspeed="1000" data-fsslotamount="7" data-saveperformance="off"
                            data-title="Video Slide"><img src="{{ asset('assets/images/art/slider-bg2.jpg') }}" alt=""
                                                          data-bgposition="center center" data-bgfit="cover"
                                                          data-bgrepeat="no-repeat">

                            <div class="tp-caption tp-fade fadeout fullscreenvideo"
                                 data-x="0"
                                 data-y="0"
                                 data-speed="1000"
                                 data-start="1100"
                                 data-easing="Power4.easeOut"
                                 data-elementdelay="0.01"
                                 data-endelementdelay="0.1"
                                 data-endspeed="1500"
                                 data-endeasing="Power4.easeIn"
                                 data-autoplay="true"
                                 data-autoplayonlyfirsttime="false"
                                 data-nextslideatend="true"
                                 data-volume="mute" data-forceCover="1" data-aspectratio="4:3" data-forcerewind="on"
                                 style="z-index: 2;">
                                <video class="" preload="none" width="100%" height="100%"
                                       poster="{{ asset('assets/images/art/slider-bg2.jpg') }}">
                                    <source src="{{ asset('assets/video/joris_schaap--dragonfly_in_ultra_slow_motion.mp4') }}"
                                            type="video/mp4"/>
                                    <source src="{{ asset('assets/video/joris_schaap--dragonfly_in_ultra_slow_motion.webm') }}"
                                            type="video/webm"/>
                                </video>
                            </div>
                            <div class="caption sfl title light-layer" data-x="45" data-y="400" data-speed="700"
                                 data-start="1500" data-easing="Sine.easeOut" style="z-index: 3;">慢动作视频
                            </div>
                            <div class="caption sfl lead light-layer" data-x="45" data-y="454" data-speed="700"
                                 data-start="2000" data-easing="Sine.easeOut" style="z-index: 3;">Donec id elit non mi
                                porta gravida
                            </div>
                        </li>
                        <li data-transition="fade" data-delay="5000"><img
                                    src="{{ asset('assets/images/art/slider-bg3.jpg') }}" alt=""
                                    data-bgfit="cover" data-bgposition="left top"
                                    data-bgrepeat="no-repeat"/>

                            <div class="caption sfb title light-layer" data-x="center" data-y="250" data-speed="700"
                                 data-start="800" data-easing="Sine.easeOut">Urban Photography
                            </div>
                            <div class="caption sfb lead light-layer" data-x="center" data-y="305" data-speed="700"
                                 data-start="1300" data-easing="Sine.easeOut">Fusce Pharetra Cras Mattis Elit
                            </div>
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.light-wrapper -->

    <div class="light-wrapper">
        <div class="container inner">
            <h1 class="intro text-center">歡迎來到財富世界！</h1>

            <p class="lead main text-left" style="text-indent: 2em">
                財富世界雜誌是香港國際商會聯合體主辦並發行的一本以財經資訊為主、文化藝術內容為輔的雜誌，其支持單位有國際商會聯合報社、世界商貿交友報社、世界品牌戰略委員會、世界華人華商華僑華裔聯合總會等。香港國際商會聯合體於2001年經香港特區政府批准註冊，並於2002年正式成立。目前本商會在全世界58個國家和地區設有代表處。</p>

            <h3 class="section-title">最新報刊</h3>

            <div class="owl-gallery">
                @foreach($newspapers as $newspaper)
                    <div class="item">
                        <figure>
                            <a href="{{ route('issues.show', array('id' => $newspaper->id)) }}">
                                <div class="text-overlay">
                                    <div class="info"><span>{{ $newspaper->title }}</span></div>
                                </div>
                                <img src="{{ asset($newspaper->thumbnail) }}" alt=""/>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="divide20"></div>
            <h3 class="section-title text-center">Let's make something great together</h3>

            <div class="text-center"><a href="{{ route('issues.newspaper') }}"
                                        class="btn btn-large fixed-width">查看更多報刊</a> <a href="{{ route('subscription.newspaper') }}"
                                                                                        class="btn btn-large btn-maroon fixed-width">訂閱報刊</a>
            </div>
        </div>
    </div>
    <!-- /.dark-wrapper -->
    <div class="parallax parallax1 customers">
        <div class="container inner text-center">
            <h3 class="section-title text-center">What Do Our Customers Think</h3>
            <div class="testimonials owl-carousel thin">
                <div class="item">
                    <blockquote>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur. Nullam dolor nibh ultricies vehicula elit vulputate tristique egestas. Praesent commodo cursus magna, vel scelerisque.<small>Nikolas Brooten</small></p>
                    </blockquote>
                </div>
                <!-- /.item -->
                <div class="item">
                    <blockquote>
                        <p>Cras justo odio, dapibus facilisis in, egestas eget quam. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. Cum sociis natoque penatibus et magnis dis parturient.<small>Coriss Ambady</small></p>
                    </blockquote>
                </div>
                <!-- /.item -->
                <div class="item">
                    <blockquote>
                        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis id vestibulum. Donec sed odio dui. Sed posuere consectetur est at lobortis. Cras justo odio, dapibus ac facilisis in, egestas eget.<small>Barclay Widerski</small></p>
                    </blockquote>
                </div>
                <!-- /.item -->
                <div class="item">
                    <blockquote>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas faucibus mollis interdum. Vivamus sagittis lacus vel augue laoreet. Donec id elit non mi porta gravida at eget metus.<small>Elsie Spear</small></p>
                    </blockquote>
                </div>
                <!-- /.item -->
            </div>
            <!-- /.testimonials -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /.parallax -->

    <div class="light-wrapper">
        <div class="container inner">
            <h3 class="section-title">最新雜誌</h3>

            <div class="owl-gallery">
                @foreach($magazines as $magazine)
                    <div class="item">
                        <figure>
                            <a href="{{ route('issues.show', array('id' => $magazine->id)) }}">
                                <div class="text-overlay">
                                    <div class="info"><span>{{ $magazine->title }}</span></div>
                                </div>
                                <img src="{{ asset($magazine->thumbnail) }}" alt=""/>
                            </a>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="divide20"></div>
            <h3 class="section-title text-center">Let's make something great together</h3>

            <div class="text-center"><a href="{{ route('issues.magazine') }}"
                                        class="btn btn-large fixed-width">查看更多雜誌</a> <a href="{{ route('subscription.magazine') }}"
                                                                                        class="btn btn-large btn-maroon fixed-width">訂閱雜誌</a>
            </div>
        </div>
    </div>
    <!-- /.light-wrapper -->
@stop