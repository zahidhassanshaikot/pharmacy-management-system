<!doctype html>
<html class="left-sidebar-panel sidebar-light" data-style-switcher-options="{'sidebarColor': 'light'}">
	
<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/layouts-left-sidebar-panel-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Aug 2018 11:39:13 GMT -->
<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield('title')</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/animate/animate.css">

		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/font-awesome/css/fontawesome-all.min.css" />
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/jquery-ui/jquery-ui.css" />		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/jquery-ui/jquery-ui.theme.css" />		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/morris/morris.css" />

		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/select2/css/select2.css" />		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />		
		<link rel="stylesheet" href="{{asset('back-end')}}/vendor/datatables/media/css/dataTables.bootstrap4.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('back-end')}}/css/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('back-end')}}/css/custom.css">

		<!-- Head Libs -->
		<script src="{{asset('back-end')}}/vendor/modernizr/modernizr.js"></script>		
		<script src="{{asset('back-end')}}/master/style-switcher/style.switcher.localstorage.js"></script>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			@include('back-end.include.header')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				@include('back-end.include.left-sidebar')
				<!-- end: sidebar -->

				@yield('content')

			</div>
            @include('back-end.include.right-sidebar')
		</section>
	<!-- Vendor -->
        <script src="{{asset('back-end')}}/vendor/jquery/jquery.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery-cookie/jquery-cookie.js"></script>		
        <script src="{{asset('back-end')}}/master/style-switcher/style.switcher.js"></script>		
        <script src="{{asset('back-end')}}/vendor/popper/umd/popper.min.js"></script>		
        <script src="{{asset('back-end')}}/vendor/bootstrap/js/bootstrap.js"></script>		
        <script src="{{asset('back-end')}}/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
        <script src="{{asset('back-end')}}/vendor/common/common.js"></script>		
        <script src="{{asset('back-end')}}/vendor/nanoscroller/nanoscroller.js"></script>		
        <script src="{{asset('back-end')}}/vendor/magnific-popup/jquery.magnific-popup.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
        <!-- Specific Page Vendor -->		
        <script src="{{asset('back-end')}}/vendor/jquery-ui/jquery-ui.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery-appear/jquery-appear.js"></script>		
        <script src="{{asset('back-end')}}/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>		
        <script src="{{asset('back-end')}}/vendor/flot/jquery.flot.js"></script>		
        <script src="{{asset('back-end')}}/vendor/flot.tooltip/flot.tooltip.js"></script>		
        <script src="{{asset('back-end')}}/vendor/flot/jquery.flot.pie.js"></script>		
        <script src="{{asset('back-end')}}/vendor/flot/jquery.flot.categories.js"></script>		
        <script src="{{asset('back-end')}}/vendor/flot/jquery.flot.resize.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jquery-sparkline/jquery-sparkline.js"></script>		
        <script src="{{asset('back-end')}}/vendor/raphael/raphael.js"></script>		
        <script src="{{asset('back-end')}}/vendor/morris/morris.js"></script>		
        <script src="{{asset('back-end')}}/vendor/gauge/gauge.js"></script>		
        <script src="{{asset('back-end')}}/vendor/snap.svg/snap.svg.js"></script>		
        <script src="{{asset('back-end')}}/vendor/liquid-meter/liquid.meter.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/jquery.vmap.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/jquery.vmap.world.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>		
        <script src="{{asset('back-end')}}/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<script src="{{asset('back-end')}}/vendor/select2/js/select2.js"></script>		
		<script src="{{asset('back-end')}}/vendor/datatables/media/js/jquery.dataTables.min.js"></script>		
		<script src="{{asset('back-end')}}/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>

		<script src="{{asset('back-end')}}/js/examples/examples.datatables.default.js"></script>
		<script src="{{asset('back-end')}}/js/examples/examples.datatables.row.with.details.js"></script>
		<script src="{{asset('back-end')}}/js/examples/examples.datatables.tabletools.js"></script>
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('back-end')}}/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="{{asset('back-end')}}/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('back-end')}}/js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
		{{-- <script>		  
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)		  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');		  ga('create', 'UA-42715764-8', 'auto');		  ga('send', 'pageview');
		</script> --}}
		<!-- Examples -->
		<script src="{{asset('back-end')}}/js/examples/examples.dashboard.js"></script>
		<script src="{{asset('back-end')}}/js/examples/examples.datatables.editable.js"></script>
<script>
function goBack() {
    window.history.back();
}

    function btnToggleFunction() {
        $('#IdToggleBtn').slideToggle(1000);
    }
    setTimeout(function() {
        $('#message').fadeOut('slow');
    }, 3000);
</script>



	</body>

<!-- Mirrored from preview.oklerthemes.com/porto-admin/2.1.1/layouts-left-sidebar-panel-light.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Aug 2018 11:39:13 GMT -->
</html>