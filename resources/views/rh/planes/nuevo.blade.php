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
			<div class="col-md-5">
				<empresa-component></empresa-component>
			</div>

			<!-- Selección del cliente -->
			<div class="col-md-7">
                <cliente-component></cliente-component>
			</div>
		</div>

        <br>

		<div class="row">
			<!-- Nombre del plan -->
			<div class="col-md-5">
                <nombre-plan></nombre-plan>
			</div>
		</div>

        <div class="row">
            <div class="col-md-12">
                <h5>Duración del plan:</h5>
            </div>
        </div>

		<div class="row">
			<!-- Fecha de inicio -->
			<div class="col-md-4">
				<label for="inicia">De la fecha</label>
                <date-picker id="fechaInicio" name="fechaInicio"></date-picker>
			</div>

			<!-- Fecha de término -->
			<div class="col-md-4">
				<label for="termina">A la fecha</label>
                <date-picker id="fechaTermino" name="fechaTermino"></date-picker>
			</div>

            <!-- Fecha de término indeterminada -->
            <div class="col-md-4">
                <label for="indeterminada">Sin fecha de término</label>
                <div class="text-center">
                    <input class="form-check-input" type="checkbox" id="" value="">
                </div>

            </div>
		</div>

        <br>

        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-block btn-dark" @click="validarPlan()">Guardar</button>
            </div>
        </div>
	</div>

	<div class="card-footer bg-white text-center">
		<small class="text-dark">GRUPO PROMOCIONES S.A. DE C.V. ® 2014 Todos los derechos reservados.</small>
	</div>
</div>

@endsection
