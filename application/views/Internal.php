<!DOCTYPE html>
<html>
  <head>    
    <meta charset="UTF-8">
	<title>Internal </title>
    <meta name="description" content="GRAPE App landing Page by Codepassenger">
    <meta name="author" content="CodePassenger">
	
	<!-- Mobile Specific Meta -->	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>template/template/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/font-awesome.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/animate.css">

    <!-- Owl-carousel style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/owl.theme.css">

    <!-- magnific style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/magnific-popup.css">

    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>template/template/assets/css/responsive.css" media="screen">

    <!-- Added google font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>template/template/assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>template/template/assets/images/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>template/template/assets/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>template/template/assets/images/icons/apple-touch-icon-114x114.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Preloader -->
      <div id="faceoff">
        <div id="preloader"></div>
        <div class="preloader-section"></div>
      </div>
    <!-- Preloader end -->
    <!-- banner start -->
    <section id="banner" class="banner-carousel">
      <div class="trans-bg">
        <div class="content-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
              	  <h3 class="banner-title">Home Login Petugas</h3>	
                  <h2><a href="" class="lg-logo">BIRO UMUM </a></h2> <!-- .lg-logo -->                   
                  <ul class="app">
                    <li><a href=""><i class="fa fa-apple"></i></a></li>
                    <li><a href=""><i class="fa fa-android"></i></a></li>
                    <li><a href=""><i class="fa fa-windows"></i></a></li>
                  </ul>
                  <div class="download-block text-center">
                    <a href="<?php echo  base_url('Authen') ?>" target="_blank" class="btn-download">Konsumsi & Pelaporan sarpras</a>
                    <a href="http://ekendaraan.jatengprov.go.id" target=_blank"" class="btn-download">Admin e Kendaraan</a>
                  </div>                              
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /.trans-bg -->       
    </section>
    <!-- banner end -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!-- <script src="https://code.jquery.com/jquery.js"></script> -->
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>template/template/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/smoothscroll.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.localScroll.min.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.nav.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/owl.carousel.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.flexslider-min.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.parallax.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/matchMedia.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/script.js"></script>
    <script src="<?php echo base_url() ?>template/template/https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/wow.js"></script>
    <script src="<?php echo base_url() ?>template/template/assets/js/easing.js"></script>
    
    <script>
    	$(document).ready(function() {
		//"use strict";
        $('#feature').parallax("50%", 0.5, true);
        $('#video').parallax("50%", 0.5, true);
        $('#subscription').parallax("50%", 0.5, true);
        $('#review').parallax("50%", 0.5, true);
        $('#download').parallax("50%", 0.5, true);
        $('#footer').parallax("50%", 0.5, true);
    	});

    </script>
    <script>
    // --------Google map---------------
       var map;
       function initialize() {  
        // Create an array of styles.
        var styles = [
          {
            stylers: [
              { hue: "#0AABE1" },
              { saturation: 0 }
            ]
          },
          {
            featureType: 'water',
            stylers: [
             { visibility: "on" },
             { color: "#9a9efd" },
             { weight: 2.2 },
             { gamma: 2.54 }
            ] 
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [
              { lightness: 100 },
              { visibility: "simplified" }
            ]
          },{
            featureType: "road",
            elementType: "labels",
            stylers: [
              { visibility: "off" }
            ]
          }
        ];

        // Create a new StyledMapType object, passing it the array of styles,
        // as well as the name to be displayed on the map type control.
        var styledMap = new google.maps.StyledMapType(styles,
          {name: "Styled Map"});

        // Create a map object, and include the MapTypeId to add
        // to the map type control.
        var losAngeles = new google.maps.LatLng(33.8030716,-118.0725641);
        var mapOptions = {
          zoom: 13,
          center: losAngeles,
          mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
          },
          scrollwheel: false,
        };
        var map = new google.maps.Map(document.getElementById('map'),
          mapOptions);
        

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('map_style', styledMap);
        map.setMapTypeId('map_style');

        // To add the marker to the map, use the 'map' property
        var image = 'assets/images/map_icon_3.png';
        var marker = new google.maps.Marker({
            position: losAngeles,
            map: map,
            title:"GRAPE App Store!",
            icon: image
        });

       }

    </script>    
       
  </body>
</html>