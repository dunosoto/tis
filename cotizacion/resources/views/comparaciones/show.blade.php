@extends('users.ua.layout')

@section('mycontent')

<h2 class= "transformacion1 text-center font-weight-bold">Cuadro comparativo</h2>
<div class="container">
	<div class="card border-dark mb-3">
		<div class="card-body">
			<div class="row align-items-start">
    			<div class="col">
					<p class="font-weight-bold" style = "float: left"> ID solicitud:</p>
					<p>&nbsp {{$petition->id}} </p>
				</div>
				<div class="col">
					<p class="font-weight-bold" style = "float: left"> Emision: </p>
					<p>&nbsp{{$petition->created_at}} </p>
				</div>
			</div>
			<div class="row align-items-start">
				<div class="col">
					<p class="font-weight-bold" style = "float: left">Unidad solicitante:</p>
					<p class="text-capitalize"> &nbsp{{$petition->unit->name}} </p>
				</div>
				<div class="col">
					<p class="font-weight-bold" style = "float: left">Nombre solicitante:</p>
					<p class="text-capitalize">&nbsp {{$petition->user->name}} {{$petition->user->last_name}} </p>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div>
		<h2 class= "transformacion1 font-weight-bold">Tabla comparativa</h2>
		<br>
		<table class="table table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Detalles</th>
				<th>Unidad</th>
				@foreach ($quotations as $quotation)
				<th >{{$quotation->company->name}}</th>
				@endforeach
				</tr>
			</thead>
				<tbody>
				@foreach ($petition->acquisitions as $acquisition)
				<?php
					foreach ($quotations as $k => $v) {
						$tArray[$k] = $v['total'];
					}
					$min_value = min($tArray);
					$max_value = max($tArray);
				?>
				
					<tr>
					
						<td>{{$acquisition->name}}</td>
						<td>{{$acquisition->quantity}}</td>
						<td>{{$acquisition->details}}</td>
						<td>{{$acquisition->unit_type}}</td>
						@endforeach	
						@foreach($quotations as $quotation)
							@if($min_value == $quotation->total)
							<td class="table-success" >{{$quotation->total}}</td>
							@else
							<td >{{$quotation->total}}</td>
							@endif
						@endforeach
					
					</tr>
				</tbody>
		</table>
	</div>
	<br>
	<div>
	<h3 class= "transformacion1 font-weight-bold">Cotizaciones Realizadas</h3>
	<br>
	@foreach($quotations as $quotation)
	<?php
		foreach ($quotations as $k => $v) {
			$tArray[$k] = $v['total'];
		}
		$min_value = min($tArray);
		$max_value = max($tArray);
	?>
	@if($min_value == $quotation->total)		
	
				<div  class="card border-dark  mb-3" border-width="3px">
					
					<div class="card-header text-white bg-success">
						<p class="font-weight-bold" style = "float: left">Empresa: </p>
						<p> &nbsp{{ $quotation->company_name }}</p>
						</div>
						
				<div class="card-body">		
				
				<div>
					<table class= "table table-hover  table-bordered"  >
						<thead class="table-success">
							<tr>
								<th>N°</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Detalles</th>
								<th>Precio Unitario</th>
								<th>Precio total</th>
							</tr>
						</thead>
						<tbody>	
							@foreach($quotation->items as $item)
								<tr>
								<td>  </td>
									<td> {{$item->quantity}} </td>
									<td> {{$item->type_unit}} </td>
									<td> {{$item->details}} </td>
									<td> {{$item->unit_value}} </td>
									<td> {{$item->total_value}} </td>
								</tr>
							@endforeach
							<tr>
								
								<td colspan="5">TOTAL:</td>
								<td >{{ $quotation->total }}</td>
							</tr>
						</tbody>
					</table>
				
					</div>		
				</div>
				</div>
			@else
			<div  class="card border-dark mb-3">
					
					<div class="card-header">
						<p class="font-weight-bold" style = "float: left">Empresa: </p>
						<p> &nbsp{{ $quotation->company_name }}</p>
						</div>
						
				<div class="card-body">		
				
				<div>
					<table class= "table table-hover table-bordered"  >
						<thead class="thead-dark">
							<tr>
								<th>N°</th>
								<th>Cantidad</th>
								<th>Unidad</th>
								<th>Detalles</th>
								<th>Precio Unitario</th>
								<th>Precio total</th>
							</tr>
						</thead>
						<tbody>	
							@foreach($quotation->items as $item)
								<tr>
								<td>  </td>
									<td> {{$item->quantity}} </td>
									<td> {{$item->type_unit}} </td>
									<td> {{$item->details}} </td>
									<td> {{$item->unit_value}} </td>
									<td> {{$item->total_value}} </td>
								</tr>
							@endforeach
							<tr>
								
								<td class="table-dark" colspan="5">TOTAL:</td>
								<td class="table-dark">{{ $quotation->total }}</td>
							</tr>
						</tbody>
					</table>
				
					</div>		
				</div>
				</div>
			@endif
			@endforeach
		
		<div>
		<br>
		<br>
		
		<div class="text-center justufy-content-center">
			<select class="form-select  form-control" aria-label=".form-select-lg example"name="">
				<option selected>Selecciona a la empresa ganadora:</option>
				@foreach($quotations as $quotation)
					<option value="{{$quotation->company->name}}">{{$quotation->company->name}}</option>
				@endforeach
				
			</select>
		
			<br> <br>
			<div class="d-grid gap-2 d-md-flex justify-content-md-center">
				<div style="padding-right: 5px">
					<a class="btn btn-primary" style="background-color: rgb(46, 46, 46)" href="{{route('comparaciones.index')}}">Atrás</a>
				</div>
				<button class="btn btn-primary" style="background-color: rgb(46, 46, 46)">Enviar</button>
			</div>
		</div>
		</div>

</div>
</div>
<script type="text/javascript">
	var input = document.getElementById("valorTotal").style.color="black"; 				
</script>

@stop
