@extends('site.layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mt-5 text-center">Simulador de custo de ligação</h1>
	
    <div class="card shadow-lg p-3 rounded">
        <div class="card-body">
            <form>
                <div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="origin">Origem (DDD)</label>
						<select name="origin" class="custom-select is-invalid" id="origin" aria-describedby="validationServerOrigin">
						  <option selected disabled value="">Selecione...</option>
						  <option>...</option>
						</select>
						<div id="validationServerOrigin" class="invalid-feedback">
							Selecione o DDD de origem
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label for="destiny">Destino (DDD)</label>
						<select name="destiny" class="custom-select is-invalid" id="destiny" aria-describedby="validationServerDestiny">
						  <option selected disabled value="">Selecione...</option>
						  <option>...</option>
						</select>
						<div id="validationServerDestiny" class="invalid-feedback">
						  Selecione o DDD de destino
						</div>
					</div>
                </div>

                <div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="minutes">Minutos da ligação</label>
						<input type="number" name="minutes" class="form-control is-invalid" id="minutes" aria-describedby="validationServerMinutes">
						<div id="validationServerMinutes" class="invalid-feedback">
							Forneça os minutos da ligação
						</div>
					</div>

					<div class="col-md-6 mb-3">
						<label for="plan">Selecione um plano</label>
						<select name="plan" class="custom-select is-invalid" id="plan" aria-describedby="validationServerPlan">
							<option selected disabled value="">Selecione...</option>
							<option>...</option>
						</select>
						<div id="validationServerPlan" class="invalid-feedback">
							Selecione um plano
						</div>
					</div>
                </div>
				
                <button class="btn btn-primary" type="submit">Calcular</button>
            </form>
        </div>
    </div>
@endsection