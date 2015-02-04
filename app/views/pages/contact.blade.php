@extends('layouts.default')

@section('content')
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?language=zh-hk&key=AIzaSyA1xdEVYy8IZdBKJGQp_QpDWaNQT7ZHGhY&sensor=false&extension=.js"></script>
    <script> google.maps.event.addDomListener(window, 'load', init);
        var map;
        function init() {
            var mapOptions = {
                center: new google.maps.LatLng(22.2763322, 114.1537584),
                zoom: 15,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.DEFAULT,
                },
                disableDoubleClickZoom: false,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                },
                scaleControl: true,
                scrollwheel: false,
                streetViewControl: true,
                draggable: true,
                overviewMapControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [{stylers: [{saturation: -100}, {gamma: 1}]}, {
                    elementType: "labels.text.stroke",
                    stylers: [{visibility: "off"}]
                }, {
                    featureType: "poi.business",
                    elementType: "labels.text",
                    stylers: [{visibility: "off"}]
                }, {
                    featureType: "poi.business",
                    elementType: "labels.icon",
                    stylers: [{visibility: "off"}]
                }, {
                    featureType: "poi.place_of_worship",
                    elementType: "labels.text",
                    stylers: [{visibility: "off"}]
                }, {
                    featureType: "poi.place_of_worship",
                    elementType: "labels.icon",
                    stylers: [{visibility: "off"}]
                }, {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{visibility: "simplified"}]
                }, {
                    featureType: "water",
                    stylers: [{visibility: "on"}, {saturation: 50}, {gamma: 0}, {hue: "#50a5d1"}]
                }, {
                    featureType: "administrative.neighborhood",
                    elementType: "labels.text.fill",
                    stylers: [{color: "#333333"}]
                }, {
                    featureType: "road.local",
                    elementType: "labels.text",
                    stylers: [{weight: 0.5}, {color: "#333333"}]
                }, {
                    featureType: "transit.station",
                    elementType: "labels.icon",
                    stylers: [{gamma: 1}, {saturation: 50}]
                }]
            }

            var mapElement = document.getElementById('map');
            var map = new google.maps.Map(mapElement, mapOptions);
            var locations = [
                ['僑阜商業大廈香港駱克道300號', 22.2763322, 114.1537584]
            ];
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    icon: 'style/images/map-pin.png',
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });
            }
        }
    </script>
    <div class="light-wrapper">
        <div class="container inner">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="section-title">隨時給我條消息</h3>

                    <p>Maecenas vehicula condimentum consequat. Ut suscipit ipsum eget leotero convallis feugiat upsoyut
                        fermentum leo auctor consequat turpis aturo nisiper. Nulla vitae elit libero, a pharetra augue.
                        Etiam porta sem malesuada magna mollis.</p>

                    <div class="divide20"></div>
                    <div class="form-container">
                        <div class="response alert alert-success"></div>
                        <form class="forms" action="contact/form-handler.php" method="post">
                            <fieldset>
                                <ol>
                                    <li class="form-row text-input-row name-field">
                                        <input type="text" name="name" class="text-input defaultText required"
                                               title="姓名 (必填)"/>
                                    </li>
                                    <li class="form-row text-input-row email-field">
                                        <input type="text" name="email" class="text-input defaultText required email"
                                               title="電子郵件 (必填)"/>
                                    </li>
                                    <li class="form-row text-input-row subject-field">
                                        <input type="text" name="subject" class="text-input defaultText"
                                               title="主題"/>
                                    </li>
                                    <li class="form-row text-area-row">
                                        <textarea name="message" class="text-area required"></textarea>
                                    </li>
                                    <li class="form-row hidden-row">
                                        <input type="hidden" name="hidden" value=""/>
                                    </li>
                                    <li class="nocomment">
                                        <label for="nocomment">字段不能為空</label>
                                        <input id="nocomment" value="" name="nocomment"/>
                                    </li>
                                    <li class="button-row">
                                        <input type="submit" value="提交" name="submit" class="btn btn-submit bm0"/>
                                    </li>
                                </ol>
                                <input type="hidden" name="v_error" id="v-error" value="必填"/>
                                <input type="hidden" name="v_email" id="v-email" value="輸入一個有效的郵電地址"/>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.form-container -->
                </div>
                <!-- /.span8 -->
                <aside class="col-sm-4 sidebar lp20">
                    <div class="sidebox widget">
                        <h3 class="section-title widget-title">地址</h3>

                        <p>Fusce dapibus, tellus commodo, tortor mauris condimentum utellus fermentum, porta sem
                            malesuada magna. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac
                            consectetur.</p>
                        <address>
                            <strong>《財富世界》雜誌社</strong><br>
                            香港灣仔駱克道300號僑阜商業大廈<br>
                            20樓A室<br>
                            <abbr title="Phone">P:</abbr> 00 (123) 456 78 90 <br>
                            <abbr title="Email">E:</abbr> <a href="mailto:#">caifushijiezazhi@163.com</a>
                        </address>
                    </div>
                    <!-- /.widget -->
                </aside>
                <!-- /.span4 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.light-wrapper -->
@stop