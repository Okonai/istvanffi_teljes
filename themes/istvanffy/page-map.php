<?php
/*
Template Name: Map Theme
*/
?>
<?php get_header(); ?>
    <style>
        html {
            margin: 0!important;
        }

        body {
            position: relative;
            z-index: -2;
            height: 100%;
        }

        #container {
            position: static!important;
        }

        #google_map {
            width: 100%;
            height: 100vh;
            //z-index: -1;
            top: 0;
            left: 0;
        }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyC_DXZI_5PdDslgwW2gSMij6UmQzpSYmbA">
    </script>
    <script type="text/javascript">
        function initialize() {
            var styles = [{
                "stylers": [{
                    "hue": "#AEA094"
                }, {
                    "lightness": 32
                }]
            }];
            var hoverContent = '<div id="content">' + '<div id="siteNotice">' + '</div>' + '<h1 id="firstHeading" class="firstHeading">1036 Budapest, Lajos utca 36 9/c</h1>' + '<div id="bodyContent">' + '<p>Kolosy tèri piac, árkádok alatt!</p>' + '<p>Kattints a további részletekért</p>' + '</div>' + '</div>';
            var clickContent = '<div id="content">' + '<div id="siteNotice">' + '</div>' + '<h1 id="firstHeading" class="firstHeading">1036 Budapest,Lajos utca 36 9/c</h1>' + '<div id="bodyContent">' + '<h3>Nyitvatartás: </h3>' + '<h3>Hétfő: Zárva!</h3>' + '<h3>Kedd és Péntek: 11:00-15:00</h3>' + '<h3>Szerda és csütörtök: 11:00-19:00</h3>' + '<h3>Szombat és Vasárnap: Zárva!</h3>' + '<p>Telefon: +36 20 276 2875</p>' + '<p>Kolosy tèri piac, árkádok alatt!</p>' + '<p>Kapcsolat : info@istvanffi.hu, <a href="www.facebook.com/istvanffi">www.facebook.com/istvanffi</a></p>' + '</div>' + '</div>';
            var hoverWindow = new google.maps.InfoWindow({
                content: hoverContent
            });
            var clickWindow = new google.maps.InfoWindow({
                content: clickContent
            });
            var mapOptions = {
                center: new google.maps.LatLng(47.530518, 19.038124),
                zoom: 16,
                mapTypeControl: false,
                panControl: true,
                panControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                scaleControl: true,
                scaleControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                streetViewControl: true,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                }
            };
            var map = new google.maps.Map(document.getElementById("google_map"), mapOptions);
            map.setOptions({
                styles: styles
            });
            var image = '<?php echo get_template_directory_uri() ?>/assets/img/maps.png';
            var myLatLng = new google.maps.LatLng(47.528371, 19.038652);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
            })
            google.maps.event.addListener(marker, 'mouseover', function() {
                hoverWindow.open(map, marker);
                clickWindow.close(map, marker);
            });
            google.maps.event.addListener(marker, 'mouseout', function() {
                hoverWindow.close(map, marker);
            });
            google.maps.event.addListener(marker, 'click', function() {
                hoverWindow.close(map, marker);
                clickWindow.open(map, marker);
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="google_map"></div>
<?php get_footer(); ?>
