<!-- Page Head$jumlahMaterial-->
<div class="content bg-image overflow-hidden" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
	<div class="push-50-t push-15">
		<h1 class="h2 text-white animated zoomIn">Home</h1>
		<h2 class="h5 text-white-op animated zoomIn">Welcome {user_name}<br><b><?=strtoupper(statusPermission($user_permission))?><b></h2>
	</div>
</div>
<!-- END Page Header -->

<!-- Page Content -->
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<!-- Background Colored Text Tiles -->
			<div class="row">
				<div class="col-sm-6 col-lg-6">
					<a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
						<div class="block-content block-content-full bg-danger">
							<div class="h1 font-w700 text-white"><?=number_format($jumlahMaterial)?></div>
							<div class="h5 text-white-op text-uppercase push-5-t">JUMLAH MATEIAL</div>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-lg-6">
					<a class="block block-rounded block-link-hover3 text-center" href="javascript:void(0)">
						<div class="block-content block-content-full bg-success">
							<div class="h1 font-w700 text-white"><?=number_format($jumlahUser)?></div>
							<div class="h5 text-white-op text-uppercase push-5-t">JUMLAH USER</div>
						</div>
					</a>
				</div>
			</div>
			<!-- END Background Colored Text Tiles -->
		</div>
	</div>
</div>
<!-- END Page Content -->