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
				<h3 class="center">e-bchod backend</h3>
			</div>
		</div>
		
		<div class="row admin-content">
			<div class="col-2 dark-grey-bg">
				<nav class="admin-menu">
					<a href="#"><i class="fa fa-shopping-cart"></i> Affiliate</a>
					<nav class="admin-submenu">
						<a href="/admin/shops/browse/">Procházet</a>
						<a href="">Přidat</a>
					</nav>
					<a href="#"><i class="fa fa-comments-o"></i> Blog</a>
					<nav class="admin-submenu">
						<a href="">Procházet</a>
						<a href="/admin/blog/add">Přidat</a>
					</nav>
					<a href=""><i class="fa fa-database"></i> Import</a>
					<a href="/admin/statistics"><i class="fa fa-pie-chart"></i> Statistiky</a>
					<a class="static"></a>
					<a href="/"><i class="fa fa-home"></i> Stránka</a>
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