<div class="row">
	<div class="col-sm-6 d-flex justify-content-start">
		<!-- Toggle button -->
		<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4" @click="showHideNav()">
			<i class="fa fa-bars mr-2"></i>
			<small class="text-uppercase font-weight-bold">Toggle</small>
		</button>
	</div>

	<div class="col-sm-6 d-flex justify-content-end">
		<!-- Log-out button -->
		<button type="button" class="btn btn-danger bg-danger rounded-pill shadow-sm px-4 mb-4" data-toggle="modal" data-target="#logOutModal">
			<i class="fas fa-sign-out-alt mr-2"></i>
			<small class="text-uppercase font-weight-bold">Log-out</small>
		</button>
	</div>
</div>
