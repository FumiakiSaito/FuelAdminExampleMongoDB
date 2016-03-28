<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title . ' - ' . Config::get('title'); ?></title>
	<meta name="viewport" content="width=device-width,minimum-scale=1">

	<?php echo Asset::css(array(
		'bootstrap.min.css',
		'bootstrap-responsive.min.css',
		'dashboard.css',
		'prettyCheckable.css',
	)); ?>

	<!--自分専用スタイルシート-->
		<style type="text/css">
		body {
			padding-top: 60px;
			padding-bottom: 40px;
		}
		.sidebar-nav {
			padding: 9px 0;
		}

		@media (max-width: 980px) {
			/* Enable use of floated navbar text */
			.navbar-text.pull-right {
				float: none;
				padding-left: 5px;
				padding-right: 5px;
			}
		}
		.footer {
			text-align:right;
			margin-right:2%;
		}
	</style>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<?php echo Asset::js(array(
		'html5shiv.min.js',
		'respond.min.js',
	)); ?>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
				<a href="" class="navbar-brand"><i class="glyphicon glyphicon-edit"></i>&nbsp;<?php echo Config::get('title'); ?></a>
				<div class="navbar-collapse collapse">
				<?php if (Auth::check()) : ?>
					<p class="navbar-text pull-right">
						ようこそ&nbsp;&nbsp;<?php echo Auth::get_screen_name(); ?>&nbsp;さん&nbsp;&nbsp;
						<?php echo Html::anchor('admin/logout/','<input type="button" class="btn btn-success" value="ログアウト" />'); ?>
					</p>
				<?php endif; ?>
				</div><!--/.nav-collapse -->
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">

			<?php if (Auth::check()): ?>
				<h4><i class="glyphicon glyphicon-th-list"></i>&nbsp;メニュー一覧</h4>
				<ul class="nav nav-sidebar">
					<li class="<?php echo Uri::segment(2) == 'index' ? 'active' : '' ?>"><?php echo Html::anchor('admin/index/','<i class="glyphicon glyphicon-home"></i>&nbsp;ホーム') ?></li>
				</ul>
				<ul class="nav nav-sidebar">
					<li class="<?php echo Uri::segment(2) == 'staff' ? 'active' : '' ?>"><?php echo Html::anchor('admin/staff/index/','<i class="glyphicon glyphicon-user"></i>&nbsp;社員管理') ?></li>
				</ul>
			<?php endif; ?>

			</div>

			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<!--ここにコンテンツを表示します。-->
				<?php if (isset($content)) {echo $content;} ?>
			</div>
		</div><!--/row-->
		<hr>
	</div><!--/.fluid-container-->

	<footer class="footer">
		<p><?php echo Config::get('copyright'); ?></p>
	</footer>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php echo Asset::js(array(
		'jquery-1.11.1.min.js',
		'bootstrap.min.js',
		'prettyCheckable.min.js',
		'main.js',
	)); ?>

	</body>
</html>