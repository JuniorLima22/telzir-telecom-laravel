@extends('site.layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="mt-5 text-center">Simulador de custo de ligação</h1>
	
    <div class="card shadow-lg p-3 rounded">
        <div class="card-body">
            <form action="{{ route('simulator') }}">
                <div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="origin">Origem (DDD)</label>
						<select name="origin" class="custom-select @if($errors->has('origin')) is-invalid @endif" id="origin" aria-describedby="validationServerOrigin">
						  <option selected disabled value="">Selecione...</option>
						  @forelse ($cityCodes as $code)
						  	<option value="{{ $code->code }}" @if(old('origin') == $code->code) selected @endif>{{ $code->code }}</option>
						  @empty
						  	<option>Nenhum registro encontrado</option>
						  @endforelse
						</select>
						@error('origin')
							<div id="validationServerOrigin" class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="col-md-6 mb-3">
						<label for="destination">Destino (DDD)</label>
						<select name="destination" class="custom-select @if($errors->has('destination')) is-invalid @endif" id="destination" aria-describedby="validationServerDestination">
						  <option selected disabled value="">Selecione...</option>
						  @forelse ($cityCodes as $code)
						  	<option value="{{ $code->code }}" @if(old('destination') == $code->code) selected @endif>{{ $code->code }}</option>
						  @empty
						  	<option>Nenhum registro encontrado</option>
						  @endforelse
						</select>
						@error('destination')
							<div id="validationServerDestination" class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
                </div>
				
                <div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="minutes">Minutos da ligação</label>
						<input type="number" name="minutes" class="form-control @if($errors->has('minutes')) is-invalid @endif" value="{{ old('minutes') }}" id="minutes" aria-describedby="validationServerMinutes">
						@error('minutes')
							<div id="validationServerMinutes" class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="col-md-6 mb-3">
						<label for="plan">Selecione um plano</label>
						<select name="plan" class="custom-select @if($errors->has('plan')) is-invalid @endif" id="plan" aria-describedby="validationServerPlan">
							<option selected disabled value="">Selecione...</option>
							@forelse ($plans as $plan)
								<option value="{{ $plan->minutes }}" @if(old('plan') == $plan->minutes) selected @endif>{{ $plan->name }}</option>
							@empty
								<option>Nenhum registro encontrado</option>
							@endforelse
						</select>
						@error('plan')
						<div id="validationServerPlan" class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
                </div>
				
				
				<div class="d-flex align-items-center">
					<button class="btn btn-primary" type="submit">Calcular</button>
					<div class="load spinner-border ml-auto" role="status" aria-hidden="true"></div>
				</div>
            </form>
        </div>
    </div>
@endsection