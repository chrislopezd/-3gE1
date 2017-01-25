<?php /* Smarty version Smarty-3.1.13, created on 2016-05-20 05:35:13
         compiled from "application_content\views\templates\chrisDash.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28237573e697856e920-37590989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b148aa3b35326b0c0601675ec927d91be3e0a08a' => 
    array (
      0 => 'application_content\\views\\templates\\chrisDash.tpl',
      1 => 1463715311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28237573e697856e920-37590989',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_573e697867a918_82258219',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573e697867a918_82258219')) {function content_573e697867a918_82258219($_smarty_tpl) {?>
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
		<title>Bemat Admin v1 - Dashboard</title>
		

		<!-- Bootstrap Core CSS - Include with every page -->
		<link href="resources/css/bootstrap.min.css" rel="stylesheet">

		<!-- Bemat Admin CSS - Include with every page -->
		<link href="resources/css/admin.min.css" rel="stylesheet" id="theme-switcher">

		<!-- Documentation Prettify -->
		<link href="resources/css/prettify-tomorrow.css" rel="stylesheet" />

		<!-- Dashboard Level NVD3 Charts -->
		<script src="resources/js/sistema/d3/d3.v3.js" charset="utf-8"></script>
		<script src="resources/js/sistema/d3/nv.d3.js" type="text/javascript"></script>
		<link href="resources/js/sistema/d3/nv.d3.css" rel="stylesheet">
		<script src='resources/js/sistema/d3/cumulativeLine.js' type='text/javascript'> </script>
	</head>

	<body class=" container-fluid">
		<div id="page-wrapper">
		
			<section id="right-content">
				<header class="header-container">
					<div class="header-wrapper">
						<div id="header-toolbar">
							<ul class="toolbar toolbar-left">
								<li style="padding:5px;margin-top: -5px;">
									<!--a id="sidebar-toggle" data-state="open" href="#"><i class="material-icons">menu</i></a-->
									<a href="inicio">
									<img src="resources/images/logoSegey.png" width="120px" title="SEGEY">
									</a>
								</li>
							</ul>

							<div id="searchbox">
								<h3>Sistema de Cancelación / Creación</h3>
							</div>

							<ul class="toolbar toolbar-right">
								<li>
									<a href="#" id="fullscreen-toggle" data-toggle="tooltip" data-placement="bottom" title="Toggle Fullscreen"><i class="material-icons">fullscreen</i></a>
								</li>
								<li id="user-profile" class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<div class="avatar">
											<img src="resources/img/avatar.png" class="img-circle img-responsive" />
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
							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body no-padding">
										<div class="mini-card mini-card-primary">
											<div class="mini-card-left">
												<span>Today Sales</span>
												<h2>1,541</h2>
											</div>
											<div class="mini-card-right">
												<div class="bemat-mini-chart bemat-mini-chart-primary">
													<span class="peity-line">5,3,9,6,5,9,7,3,5,8</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body no-padding">
										<div class="mini-card mini-card-success">
											<div class="mini-card-left">
												<span>Today Earnings</span>
												<h2>$801,124</h2>
											</div>
											<div class="mini-card-right">
												<div class="bemat-mini-chart bemat-mini-chart-success">
													<span class="peity-bar">4,3,5,2,5,3,8,3,4,9</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body no-padding">
										<div class="mini-card mini-card-info">
											<div class="mini-card-left">
												<span>Today Orders</span>
												<h2>2,457</h2>
											</div>
											<div class="mini-card-right">
												<div class="bemat-mini-chart bemat-mini-chart-info">
													<span class="peity-line">4,3,5,6,5,4,6,3,2,6</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-body no-padding">
										<div class="mini-card mini-card-danger">
											<div class="mini-card-left">
												<span>Average time</span>
												<h2>43 sec.</h2>
											</div>
											<div class="mini-card-right">
												<div class="bemat-mini-chart bemat-mini-chart-danger">
													<span class="peity-bar">4,3,5,6,5,4,6,3,2,6</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>
											Live Statistics
											<span class="label label-primary pull-right">1024 users online</span>
										</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body">
										<div class="statistics">
											<div class="row">
												<div class="col-lg-4">
													<div class="row">
														<div class="col-lg-12">
															<div class="stat-wrapper">
																<h4 class="no-margin-top margin-bottom-2">Total Visits: <span class="pull-right">18,547</span></h4>
																<div class="linear-progress-demo " data-toggle="linear-progress" data-mode="determinate" data-type="primary" data-value="30"></div>
															</div>
														</div>
														<div class="col-lg-12">
															<div class="stat-wrapper margin-vertical-4">
																<h4 class="no-margin-top margin-bottom-2">Pageviews: <span class="pull-right">108,421</span></h4>
																<div class="linear-progress-demo " data-toggle="linear-progress" data-mode="indeterminate" data-type="primary" data-value="57"></div>
															</div>
														</div>
														<div class="col-lg-12">
															<div class="stat-wrapper">
																<h4 class="no-margin-top margin-bottom-2">Complete Purchase: <span class="pull-right">1,501/2,000</span></h4>
																<div class="linear-progress-demo " data-toggle="linear-progress" data-mode="determinate" data-type="primary" data-value="75"></div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="row">
														<div class="col-lg-12">
															<div id="chart">
																<svg class="height-5"></svg>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-lg-3 col-sm-6">
													<div class="micro-stats layout layout-row layout-align-center margin-top-3">
														<div class="micro-chart-1" data-toggle="simple-pie-chart" data-percent="52" data-type="danger" data-size="45" data-line-width="3"></div>
														<div class="micro-stats_title flex padding-horizontal-2">Server Load</div>
														<div class="micro-stats_icons"><span class="label label-danger"><i class="material-icons">trending_up</i></span></div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="micro-stats layout layout-row layout-align-center margin-top-3">
														<div class="micro-chart-1" data-toggle="simple-pie-chart" data-percent="87" data-type="warning" data-size="45" data-line-width="3"></div>
														<div class="micro-stats_title flex padding-horizontal-2">Disk Space</div>
														<div class="micro-stats_icons"><span class="label label-warning"><i class="material-icons">report_problem</i></span></div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="micro-stats layout layout-row layout-align-center margin-top-3">
														<div class="micro-chart-1" data-toggle="simple-pie-chart" data-percent="25" data-type="success" data-size="45" data-line-width="3"></div>
														<div class="micro-stats_title flex padding-horizontal-2">Bandwidth</div>
														<div class="micro-stats_icons"><span class="label label-success"><i class="material-icons">trending_down</i></span></div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="micro-stats layout layout-row layout-align-center margin-top-3">
														<div class="micro-chart-1" data-toggle="simple-pie-chart" data-percent="57" data-type="primary" data-size="45" data-line-width="3"></div>
														<div class="micro-stats_title flex padding-horizontal-2">Traffic</div>
														<div class="micro-stats_icons"><span class="label label-primary"><i class="material-icons">trending_up</i></span></div>
													</div>
												</div>												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>Orders</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body no-top-padding">
										<div class="layout layout-align-center-vertical">
											<div class="bemat-pie-chart" data-toggle="simple-pie-chart" data-percent="14" data-type="primary"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>New Messages</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body no-top-padding">
										<div class="layout layout-align-center-vertical">
											<div class="bemat-pie-chart" data-toggle="simple-pie-chart" data-percent="73" data-type="success"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>New Users</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body no-top-padding">
										<div class="layout layout-align-center-vertical">
											<div class="bemat-pie-chart" data-toggle="simple-pie-chart" data-percent="41" data-type="info"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>Live Update</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body no-top-padding">
										<div class="layout layout-align-center-vertical">
											<div class="bemat-pie-chart-live-update" data-toggle="simple-pie-chart" data-percent="37" data-type="primary"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="panel panel-default panel-divider">
									<div class="panel-heading">
										<header>Your Task List</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body no-padding">
										<div class="tasks-list" data-toggle="subheader" data-class="height-5">
											<section>
												<div class="list-subheader" data-mode="sticky">To Do Tasks</div>
												<ul class="list">
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Release Bemat Admin v1</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Delete Task"><i class="material-icons">delete</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Confirm Updates with David</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Delete Task"><i class="material-icons">delete</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Make daily backup</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Delete Task"><i class="material-icons">delete</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Buy bread and butter</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Delete Task"><i class="material-icons">delete</i></button>
													</li>
												</ul>
											</section>	
											<section>
												<div class="list-subheader" data-mode="sticky">Completed Tasks</div>
												<ul class="list">
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Release Bemat Admin v1</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Archive Task"><i class="material-icons">archive</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Confirm Updates with David</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Archive Task"><i class="material-icons">archive</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Make daily backup</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Archive Task"><i class="material-icons">archive</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Buy bread and butter</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Archive Task"><i class="material-icons">archive</i></button>
													</li>
													<li class="list-item list-1-line">
														<div class="list-icon">
															<input class="checkbox checkbox-primary" type="checkbox" />
														</div>
														<div class="list-item-text layout-column">
															<h3>Buy bread and butter</h3>
														</div>
														<button type="button" class="secondary-container btn btn-default btn-icon-toggle" data-toggle="tooltip" data-placement="left" title="Archive Task"><i class="material-icons">archive</i></button>
													</li>
												</ul>
											</section>	
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<header>Statistics</header>

										<div class="panel-heading-tools">
											<div class="btn-group">
												<a class="btn btn-icon-toggle panel-tools-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#">Refresh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel-body height-5 no-padding">
										<div class="ct-chart"></div>
									</div>
								</div>
							</div>
						</div>


					</section><!--- /#page-content -->

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
		<script src="resources/js/sistema/admin-demo-chartist.min.js"></script>
		<script src="resources/js/sistema/admin-demo-dashboard.min.js"></script>
	</body>
</html><?php }} ?>