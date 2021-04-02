@extends('layouts.app')

@section('content')

<div class="card shadow">
	<div class="card-header bg-white">
		<h2>Planes</h2>
	</div>

	<div class="card-body">
		<h3>Alta de un nuevo plan</h3>
		<p>Ingrese la información indicada para dar de alta un nuevo plan.</p>

		<div class="row">
			<!-- Selección de la empresa -->
			<div class="col-md-6">
				<empresa-component></empresa-component>
			</div>

			<!-- Selección del cliente -->
			<div class="col-md-6">
			</div>
		</div>

		<div class="row">
			<!-- Nombre del plan -->
			<div class="col-md-8">
				<label for="nombre">Ingrese el nombre del plan</label>
				<input type="text">
			</div>
		</div>

		<div class="row">
			<!-- Fecha de inicio -->
			<div class="col-md-4">
				<label for="inicia">Ingrese la fecha de inicio</label>
				<input type="text">
			</div>

			<!-- Fecha de término -->
			<div class="col-md-4">
				<label for="termina">Ingrese la fecha de cierre</label>
				<input type="text">
			</div>
		</div>
	</div>

	<div class="card-footer bg-white text-center">
		<small class="text-dark">GRUPO PROMOCIONES S.A. DE C.V. ® 2014 Todos los derechos reservados.</small>
	</div>
</div>

@endsection