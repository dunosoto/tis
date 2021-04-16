@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse">
        <a href="/" class="navbar-brand">
            <img src="imagenes/umss.png" atl="" class="d_inline-block aling-top" height="70"
            width="50">
        Universidad Mayor de San Simon
        </a>
        </div>
</nav>
@csrf
<br>
<div  class="fw-bold">
	<h2>Registro de Usuarios</h2>
<br>
<br>
<div class="container">
  <div class="form-check-inline">
	<form class="row g-3">
	<div class="col-md-4">
		<label for="inputEmail4" class="form-label">Email</label>
		<input type="email" class="form-control" id="inputEmail4">
	</div>
	<div class="col-md-4">
		<label for="inputPassword4" class="form-label">Contraseña</label>
		<input type="password" class="form-control" id="inputPassword4">
	</div>
	<div class="col-8">
		<label for="inputName" class="form-label">Apellido</label>
		<input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos">
	</div>
	<div class="col-8">
		<label for="inputTelf" class="form-label">Telefono</label>
		<input type="tel" class="form-control" id="inputTelf" placeholder="Telefono">
	</div>
	<br>
	<br>
	<br>
		<div class="col-md-8">
			<label for="inputRol" class="form-label">Seleccione Rol</label>
				<select class="form-select" >
					<option selected></option>
					<option value="1">Administrador</option>
					<option value="2">Unidad Administrativa</option>
					<option value="3">Unidad de Gastos</option>
				</select>

		</div>
 
		</div>
		<div class="col-12">
			<button type="submit" class="btn btn-primary">Registrar</button>
		</div>
	</form>
	</div>
</div>
@endsection