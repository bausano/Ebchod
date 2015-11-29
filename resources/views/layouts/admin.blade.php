<html>
	
	@include('partials.head')

	<body>
		<div id="page">
			<div class="header">
				<div class="left-column alerts">
					<div><i class="fa fa-envelope"></i>&nbsp; <span class="notify">5</span></div>
					<div><i class="fa fa-commenting"></i>&nbsp; 0</div>
					<div><i class="fa fa-mouse-pointer"></i>&nbsp; <span class="notify">2</span></div>
				</div>
				<div class="right-column info"> <span onclick="window.location.href='/admin/';"> E-bchod backend </span> </div>
			</div>

			<div class="content">
				<div class="menu left-column">
					<ul>
						<li><span class="notselectable"><i class="fa fa-shopping-bag"></i>Eshops</span></li>
							<ul class="scrollable">
								<li>Browse</li>
								<a href="/admin/add"><li>New</li></a>
							</ul>
						<li><span class="notselectable"><i class="fa fa-comments-o"></i>Blog</span></li>
							<ul class="scrollable">
								<li>Browse</li>
								<a href="/admin/blog/add"><li>New</li></a>
							</ul>
						<li><span><i class="fa fa-database"></i>Import</span></li>
						<li><span><i class="fa fa-pie-chart"></i>Statistics</span></li>

						<a href="/"><li class="gap"><span><i class="fa fa-home"></i>Site</span></li></a>

						<a href="/admin/logout"><li class="gap"><span><i class="fa fa-close"></i>Logout</span></li></a>
					</ul>
				</div>

				<div class="results right-column">
					<div class="prepare">
						@yield('main')
					</div>
				</div>
			</div>
		</div>
	</body>
</html>