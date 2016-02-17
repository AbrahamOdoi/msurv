<?php
session_start();
$_SESSION['group'];
$_SESSION['fullname'];
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
	<!--<![endif]-->
	<head>
		<title>GIPC</title>

		<!-- Meta -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Bootstrap -->
		<link href="common/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Bootstrap Extended -->
		<link href="common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
		<link href="common/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
		<link href="common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

		<!-- Select2 -->
		<link rel="stylesheet" href="common/theme/scripts/plugins/forms/select2/select2.css"/>

		<!-- Notyfy -->
		<link rel="stylesheet" href="common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css"/>
		<link rel="stylesheet" href="common/theme/scripts/plugins/notifications/notyfy/themes/default.css"/>

		<!-- Gritter Notifications Plugin -->
		<link href="common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

		<!-- JQueryUI v1.9.2 -->
		<link rel="stylesheet" href="common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

		<!-- glyphicons -->
		<link rel="stylesheet" href="common/theme/css/glyphicons.css" />

		<!-- font awesome -->
		<link rel="stylesheet" href="common/theme/css/font-awesome/css/font-awesome.min.css" />

		<!-- Bootstrap Extended -->
		<link rel="stylesheet" href="common/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
		<!-- <link rel="stylesheet" href="common/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" /> -->
		<link rel="stylesheet" href="common/bootstrap/extend/bootstrap-switch/static/stylesheets/bootstrap-switch.css" />

		<!-- Uniform -->
		<link rel="stylesheet" media="screen" href="common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" />

		<!-- google-code-prettify -->
		<link href="common/theme/scripts/plugins/other/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />

		<!-- JQuery v1.8.2 -->
		<script src="common/theme/scripts/plugins/system/jquery-1.8.2.min.js"></script>

		<!-- Modernizr -->
		<script src="common/theme/scripts/plugins/system/modernizr.custom.76094.js"></script>

		<!-- MiniColors -->
		<link rel="stylesheet" media="screen" href="common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" />

		<!-- Theme -->
		<link rel="stylesheet" href="common/theme/css/style.css?1382104445" />

		<!-- LESS 2 CSS -->
		<script src="common/theme/scripts/plugins/system/less-1.3.3.min.js"></script>

		<link href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" />
		<style>
			form {
				display: block;
				margin: 20px auto;
				background: #eee;
				border-radius: 10px;
				padding: 15px
			}
			.progrezz {
				position: relative;
				width: 400px;
				border: 1px solid #ddd;
				padding: 1px;
				border-radius: 3px;
			}
			.progbar {
				background-color: #B4F5B4;
				width: 0%;
				height: 20px;
				border-radius: 3px;
			}
			.percent {
				position: absolute;
				display: inline-block;
				top: 3px;
				left: 48%;
			}
		</style>
	</head>
	<body>
		<input type="hidden" value="<?php echo date('Y-m-d')?>" id='today'/>
		<!-- Start Content -->
		<div class="first-container container fluid">

			<?php
			if ($_SESSION['group'] != 'Investor') {
				require_once ("top_bar.php");
			}
			?>

			<div id="wrapper">
				<div id="menu" class="hidden-sm hidden-print">
					<div id="menuInner">

						<!-- Scrollable menu wrapper with Maximum height -->
						<div class="slim-scroll" data-scroll-height="420px">
							<?php
							$_SESSION['active'] = 'reports';
							$_SESSION['active2'] = 'ovdue';
							if ($_SESSION[group] == 'Investor') {
								include ('sidebarinvestor.php');
							} else {
								include ('sidebar.php');
							}
							?>
						</div>

					</div>
					<!-- // Nice Scroll Wrapper END -->

				</div>
				<!-- Modal -->
				<div id="content" style="min-height:100vh;">
					<ul class="breadcrumb">
						<li>
							<a href="" class="glyphicons home">Pnding Renewals</a>
						</li>
						<!-- <li class="divider"></li>
						<li>
						Dashboard
						</li> -->
					</ul>
					<div class="separator bottom">
						<div id="rootwizard" class="wizard">
							<div class="widget widget-2">
								<!-- <div class="widget-head">
								<h4 class="heading">My Investors</h4>
								</div> -->
								<div class="widget-body">
									<div>
										Toggle column:
										<a class="toggle-vis" data-column="0">Name of Enterprise</a> - <a class="toggle-vis" data-column="1">Sector</a> - <a class="toggle-vis" data-column="2">Status</a> - <a class="toggle-vis" data-column="3">Officer</a> - <a class="toggle-vis" data-column="4">Telephone</a>
									</div>
									<div class="tab-content">
										<table id="browsetable" class="dynamicTable table table-striped table-bordered table-primary table-condensed" cellspacing="0" >
											<thead>
												<tr >
													<th>Name of Enterprise</th>
													<th>Sector</th>
													<th>Telephone</th>
													<th>Email</th>
													<th>Location</th>
													<th>Due date</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>Name of Enterprise</th>
													<th>Sector</th>
													<th>Telephone</th>
													<th>Email</th>
													<th>Location</th>
													<th>Due date</th>
												</tr>
											</tfoot>
										</table>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="innerLR">
						<div class="row">
							<div class="col-md-12">
								<div class="widget widget-4">
									<div class="widget-head"></div>
									<div class="widget-body"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="separator bottom"></div>

					<!-- End Wrapper -->
				</div>

			</div>

			<div id="themer" class="collapse">
				<div class="wrapper">
					<span class="close2">&times; close</span>
					<h4>Themer <span>color options</span></h4>
					<ul>
						<li>
							Theme: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div>
						</li>
						<li>
							Primary Color:
							<input type="text" data-type="minicolors" data-default="#ffffff" data-slider="hue" data-textfield="false" data-position="left" id="themer-primary-cp" />
							<div class="clearfix"></div>
						</li>
						<li>
							<span class="link" id="themer-custom-reset">reset theme</span>
							<span class="pull-right"><label>advanced
									<input type="checkbox" value="1" id="themer-advanced-toggle" />
								</label></span>
						</li>
					</ul>
					<div id="themer-getcode" class="hide">
						<hr class="separator" />
						<button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less">
							<i></i>Get LESS
						</button>
						<button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css">
							<i></i>Get CSS
						</button>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<!-- JQueryUI v1.9.2 -->
			<script src="common/theme/scripts/plugins/system/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>

			<!-- JQueryUI Touch Punch -->
			<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
			<script src="common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

			<!-- MiniColors -->
			<script src="common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>

			<!-- Select2 -->
			<script src="common/theme/scripts/plugins/forms/select2/select2.js"></script>

			<!-- jQuery Slim Scroll Plugin -->
			<script src="common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>

			<!-- Common Demo Script -->
			<script src="common/theme/scripts/demo/common.js?1382104445"></script>

			<!-- Holder Plugin -->
			<script src="common/theme/scripts/plugins/other/holder/holder.js"></script>
			<script>
				Holder.add_theme("dark", {
					background : "#000",
					foreground : "#aaa",
					size : 9
				})
			</script>

			<!-- Twitter Feed -->
			<script src="common/theme/scripts/demo/twitter.js"></script>

			<!-- Colors -->
			<script>
				var primaryColor = '#4a8bc2',
				    dangerColor = '#b55151',
				    successColor = '#609450',
				    warningColor = '#ab7a4b',
				    inverseColor = '#45484d';
			</script>

			<!-- Themer -->
			<script>
				var themerPrimaryColor = '#DA4C4C';
			</script>
			<script src="common/theme/scripts/plugins/system/jquery.cookie.js"></script>
			<script src="common/theme/scripts/demo/themer.js"></script>

			<!-- Global -->
			<script>
				var basePath = '',
				    commonPath = 'common/',

				// charts data
				    charts_data = {

					// 24 hours
					graph24hours : {
						from : 1381874400000,
						to : 1381960800000
					},

					// 7 days
					graph7days : {
						from : 1381356000000,
						to : 1381960800000
					},

					// 14 days
					graph14days : {
						from : 1380751200000,
						to : 1381960800000
					},

					// main dashboard graph - website traffic
					website_traffic : {
						d1 : [[1379455200000, 3759], [1379541600000, 3018], [1379628000000, 3186], [1379714400000, 2716], [1379800800000, 3482], [1379887200000, 2315], [1379973600000, 2863], [1380060000000, 3217], [1380146400000, 3574], [1380232800000, 2479], [1380319200000, 2846], [1380405600000, 3198], [1380492000000, 2721], [1380578400000, 3111], [1380664800000, 3045], [1380751200000, 2632], [1380837600000, 3877], [1380924000000, 2171], [1381010400000, 2006], [1381096800000, 3764], [1381183200000, 3740], [1381269600000, 3703], [1381356000000, 2216], [1381442400000, 2513], [1381528800000, 2671], [1381615200000, 2383], [1381701600000, 3719], [1381788000000, 3506], [1381874400000, 2772], [1381960800000, 2980]],
						d2 : [[1379455200000, 503], [1379541600000, 597], [1379628000000, 691], [1379714400000, 549], [1379800800000, 647], [1379887200000, 443], [1379973600000, 468], [1380060000000, 645], [1380146400000, 418], [1380232800000, 688], [1380319200000, 602], [1380405600000, 408], [1380492000000, 616], [1380578400000, 445], [1380664800000, 482], [1380751200000, 626], [1380837600000, 602], [1380924000000, 573], [1381010400000, 453], [1381096800000, 539], [1381183200000, 691], [1381269600000, 557], [1381356000000, 452], [1381442400000, 573], [1381528800000, 611], [1381615200000, 693], [1381701600000, 498], [1381788000000, 694], [1381874400000, 539], [1381960800000, 524]]
					}

				};
			</script>

			<!-- Resize Script -->
			<script src="common/theme/scripts/plugins/other/jquery.ba-resize.js"></script>

			<!-- Uniform -->
			<script src="common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

			<!-- Bootstrap Script -->
			<script src="common/bootstrap/js/bootstrap.min.js"></script>

			<!-- Bootstrap Extended -->
			<script src="common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
			<!-- <script src="common/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script> -->
			<script src="common/bootstrap/extend/bootstrap-switch/static/js/bootstrap-switch.min.js"></script>
			<script src="common/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
			<script src="common/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
			<script src="common/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
			<script src="common/bootstrap/extend/bootbox.js" type="text/javascript"></script>
			<script src="common/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
			<script src="common/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>

			<!-- Layout Options DEMO Script -->
			<script src="common/theme/scripts/demo/layout.js"></script>

			<!-- google-code-prettify -->
			<script src="common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>

			<!-- Gritter Notifications Plugin -->
			<script src="common/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>

			<!-- Notyfy -->
			<script type="text/javascript" src="common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>

			<!-- Bootstrap Form Wizard Plugin -->
			<script src="common/bootstrap/extend/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js"></script>

			<!-- Form Wizards Page Demo Script -->
			<script src="common/theme/scripts/demo/form_wizards.js"></script>

			<script type="text/javascript" src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
			<!-- The basic File Upload plugin -->
			<script src="js/jquery.form.js"></script>
			<script>
				function dropmod(id, enterprise) {
					$("#renewModal").modal('show');

					var body = '<div><label>Name of Enterprise: </label><span>' + enterprise + '</span></div><br /><div ><label>Payment Slip</label><input type="hidden" value="' + enterprise + '" name="type_name"/><input type="hidden" value="' + id + '" name="type_id"/><input type="hidden" value="Investor Registration" name="type"/><input type="file" name="renwNow"><br /><input type="submit" class=" btn btn-primary btn-small"  value="Submit"></div>';

					$("#loadingtxt").html(body);
				}
			</script>
			<script>
				$(document).ready(function() {
					var options4 = {
						beforeSend : function() {
							$("#progress4").show();
							//clear everything
							$("#progbar4").width('0%');
							$("#message4").html("");
							$("#percent4").html("0%");
						},
						uploadProgress : function(event, position, total, percentComplete) {
							$("#progbar4").width(percentComplete + '%');
							$("#percent4").html(percentComplete + '%');

						},
						success : function() {
							$("#progbar4").width('100%');
							$("#percent4").html('100%');
							console.log();
							location.reload();

						},
						complete : function(response) {
							$("#message4").html("<font color='green'>" + response.responseText + "</font>");
						},
						error : function() {
							$("#message4").html("<font color='red'> ERROR: unable to upload files</font>");

						}
					};
					$("#myForm").ajaxForm(options4);

				});
			</script>
			<script>
				$(document).ready(function() {

					var table = $('#browsetable').DataTable({
						"processing" : true,
						"serverSide" : true,
						"ajax" : "DataTables/examples/server_side/scripts/over_processing.php",
						"columnDefs" : [{
							'render' : function(data, type, row) {
								var today=$('#today').val();
								
									return '<a href="http://78.46.254.56/GIPC/viewinvestor.php?id='+row[6]+'" class="">'+row[0]+'</a>';
								
							},
							"targets" : 0
						},{
							"visible" : false,
							"targets" : [6]
						}]
					});

					$('a.toggle-vis').on('click', function(e) {
						e.preventDefault();

						// Get the column API object
						var column = table.column($(this).attr('data-column'));

						// Toggle the visibility
						column.visible(! column.visible());
					});

				});

			</script>
			<script>
				$(document).ready(function() {
					// Setup - add a text input to each footer cell
					$('#browsetable tfoot th').each(function() {
						var title = $('#browsetable thead th').eq($(this).index()).text();
						$(this).html('<input type="text" placeholder="Search ' + title + '" />');
					});

					// DataTable
					/* var table = $('#browsetable').DataTable({

					});*/

					// Apply the search
					table.columns().every(function() {
						var that = this;

						$('input', this.footer()).on('keyup change', function() {
							that.search(this.value).draw();
						});
					});
				});
			</script>

	</body>
</html>