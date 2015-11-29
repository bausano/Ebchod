<!DOCTYPE html>
<html>
	
	@include('partials.head')

	<body>
		
		<div class="row">
			<div class="col-2 secondary-bg big admin-alerts">
				<div class="col-4"><i class="fa fa-envelope"></i>&nbsp; <span class="bold">5</span></div>
				<div class="col-4"><i class="fa fa-commenting"></i>&nbsp; 0</div>
				<div class="col-4"><i class="fa fa-mouse-pointer"></i>&nbsp; <span class="bold">2</span></div>
			</div>
			<div class="col-10 theme-bg">
				<h3 class="center">E-bchod backend</h3>
			</div>
		</div>
		
		<div class="row admin-content">
			<div class="col-2 dark-grey-bg">
				<nav class="admin-menu">
					<a><i class="fa fa-shopping-bag"></i> Eshops</a>
					<nav class="admin-submenu">
						<a href="">Browse</a>
						<a href="">New</a>
					</nav>
					<a href=""><i class="fa fa-comments-o"></i> Blog</a>
					<nav class="admin-submenu">
						<a href="">Browse</a>
						<a href="">New</a>
					</nav>
					<a href=""><i class="fa fa-database"></i> Import</a>
					<a href=""><i class="fa fa-pie-chart"></i> Statistics</a>
					<a class="static"></a>
					<a href=""><i class="fa fa-home"></i> Site</a>
					<a class="static"></a>
					<a href="/admin/logout"><i class="fa fa-close"></i> Logout</a>
				</nav>
			</div>
			<div class="col-10 white-bg">
				<div class="area">
					@yield('main')
				</div>
			</div>
		</div>
	</body>
</html>