@extends('layouts.default')

@section('content')
    <div class="offset2"></div>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1xdEVYy8IZdBKJGQp_QpDWaNQT7ZHGhY&sensor=false&extension=.js"></script>
    <script> google.maps.event.addDomListener(window, 'load', init);
        var map;
        function init() {
            var mapOptions = {
                center: new google.maps.LatLng(51.211215, 3.226287),
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
                ['Boudewijn Ostenstraat 2', 51.211215, 3.226287]
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
                    <h3 class="section-title">Feel Free to Drop Me a Line</h3>

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
                                               title="Name (Required)"/>
                                    </li>
                                    <li class="form-row text-input-row email-field">
                                        <input type="text" name="email" class="text-input defaultText required email"
                                               title="Email (Required)"/>
                                    </li>
                                    <li class="form-row text-input-row subject-field">
                                        <input type="text" name="subject" class="text-input defaultText"
                                               title="Subject"/>
                                    </li>
                                    <li class="form-row text-area-row">
                                        <textarea name="message" class="text-area required"></textarea>
                                    </li>
                                    <li class="form-row hidden-row">
                                        <input type="hidden" name="hidden" value=""/>
                                    </li>
                                    <li class="nocomment">
                                        <label for="nocomment">Leave This Field Empty</label>
                                        <input id="nocomment" value="" name="nocomment"/>
                                    </li>
                                    <li class="button-row">
                                        <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0"/>
                                    </li>
                                </ol>
                                <input type="hidden" name="v_error" id="v-error" value="Required"/>
                                <input type="hidden" name="v_email" id="v-email" value="Enter a valid email"/>
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.form-container -->
                </div>
                <!-- /.span8 -->
                <aside class="col-sm-4 sidebar lp20">
                    <div class="sidebox widget">
                        <h3 class="section-title widget-title">Address</h3>

                        <p>Fusce dapibus, tellus commodo, tortor mauris condimentum utellus fermentum, porta sem
                            malesuada magna. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac
                            consectetur.</p>
                        <address>
                            <strong>Finch, Inc.</strong><br>
                            Moon Street Light Avenue, 14/05 <br>
                            Jupiter, JP 80630<br>
                            <abbr title="Phone">P:</abbr> 00 (123) 456 78 90 <br>
                            <abbr title="Email">E:</abbr> <a href="mailto:#">first.last@email.com</a>
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