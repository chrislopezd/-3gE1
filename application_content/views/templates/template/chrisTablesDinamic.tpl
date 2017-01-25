
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
		<title>Bemat Admin v1 - Forms - Basic</title>
		

		<!-- Bootstrap Core CSS - Include with every page -->
		<link href="resources/css/bootstrap.min.css" rel="stylesheet">

		<!-- Bemat Admin CSS - Include with every page -->
		<link href="resources/css/admin.min.css" rel="stylesheet" id="theme-switcher">
		
		<!-- Documentation Prettify -->
		<link href="resources/css/prettify-tomorrow.css" rel="stylesheet" />
	</head>

<body class="container-fluid ">
	<div id="page-wrapper">			
			
			<section id="right-content">
				<header class="header-container">
					<div class="header-wrapper">
						<div id="header-toolbar">
							<ul class="toolbar toolbar-left">
								<li>
									<a id="sidebar-toggle" data-state="open" href="#"><i class="material-icons">menu</i></a>
								</li>
							</ul>

							<div id="searchbox">
								<span class="search-icon"><i class="material-icons">search</i></span>
								<input id="search-input" placeholder="Search" type="text" />
							</div>

							<ul class="toolbar toolbar-right">
								<li>
									<a href="#" id="fullscreen-toggle" data-toggle="tooltip" data-placement="bottom" title="Toggle Fullscreen"><i class="material-icons">fullscreen</i></a>
								</li>
								<li id="user-profile" class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<div class="avatar">
											<img src="img/avatar.png" class="img-circle img-responsive" />
										</div>
										<div class="user">
											<span class="username">John Doe</span>
										</div>
										<span class="expand-ico"><i class="material-icons">expand_more</i></span>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#"><i class="material-icons">person</i>Your Profile</a></li>
										<li><a href="#"><i class="material-icons">settings</i>Settings</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="material-icons">lock</i> Lock</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="material-icons">exit_to_app</i> Log Out</a></li>
									</ul>
								</li><!-- /#user-profile -->
							</ul><!-- /.navbar-right -->					


						</div>
					</div><!-- /#header-toolbar -->
				</header>
				<section id="right-content-wrapper">
				

					<section class="page-content">
						

						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="panel-table-inner-offset">
											<table id="tableDataTables11" class="table">
												<thead>
													<tr>
														<th class="text-right">Carbs (g)</th>
														<th class="text-right">Protein (g)</th>
														<th class="text-right">Sodium (mg)</th>
														<th class="text-right">Calcium %...</th>
														<th class="text-right">Iron %...</th>
													</tr>
												</thead>
												<tbody>
													<tr class="text-right">
														<td>24</td>
														<td>4.0</td>
														<td>87</td>
														<td>14%</td>
														<td>1%</td>
													</tr>
													<tr class="text-right">
														<td>37</td>
														<td>4.3</td>
														<td>129</td>
														<td>8%</td>
														<td>1%</td>
													</tr>
													<tr class="text-right">
														<td>24</td>
														<td>6.0</td>
														<td>337</td>
														<td>6%</td>
														<td>7%</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						
					</section><!-- /#page-content -->

				</section><!-- /#right-content -->
			</section><!-- /#right-content-wrapper -->

		</div>




		<!-- Core Scripts - Include with every page -->
		<script src="resources/js/sistema/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="resources/js/sistema/jquery-ui.custom.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/bootstrap.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/modernizr-2.6.2-respond-1.1.0.min.js" type="text/javascript"></script>
	
		<!-- Page-Level Plugin Scripts - Dashboard -->
		<script src="resources/js/sistema/google-code-prettify/prettify.js" type="text/javascript"></script>
		<script src="resources/js/sistema/perfectscrollbar/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/iCheck/icheck.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/DataTables/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/DataTables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/DataTables/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/fullscreen/jquery.fullscreen-min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/fullcalendar/moment.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/peity/jquery.peity.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/chartist/chartist.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/summernote/summernote.min.js" type="text/javascript"></script>
		<script src="resources/js/sistema/ckeditor/ckeditor.js" type="text/javascript"></script>
		<script src="resources/js/sistema/wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

		<!-- Cerocreativo Plugins -->
		<script src="resources/js/sistema/materialRipple/jquery.materialRipple.js" type="text/javascript"></script>
		<script src="resources/js/sistema/snackbar/jquery.snackbar.js" type="text/javascript"></script>
		<script src="resources/js/sistema/toasts/jquery.toasts.js" type="text/javascript"></script>
		<script src="resources/js/sistema/speedDial/jquery.speedDial.js" type="text/javascript"></script>
		<script src="resources/js/sistema/circularProgress/jquery.circularProgress.js" type="text/javascript"></script>
		<script src="resources/js/sistema/linearProgress/jquery.linearProgress.js" type="text/javascript"></script>
		<script src="resources/js/sistema/subheader/jquery.subheader.js" type="text/javascript"></script>
		<script src="resources/js/sistema/simplePieChart/jquery.simplePieChart.js" type="text/javascript"></script>

		<!-- Bemat Admin Scripts - Included with every page -->		
		<script src="resources/js/sistema/admin-common.min.js"></script>
		<script src="resources/js/sistema/admin-demo.min.js"></script>


	</body>
</html>