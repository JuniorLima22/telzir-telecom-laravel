<!-- Modal -->
<div class="modal fade" id="simulatorResult" data-backdrop="static" tabindex="-1" aria-labelledby="simulatorResultLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="simulatorResultLabel">Plano FaleMais {{ $request->plan }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center">
            <div class="row">
                <div class="col-md-12 ml-auto">
                    <table class="table table-responsive ml-auto">
                        <thead>
                            <tr style= "white-space: nowrap;">
                                <th scope="col">Origem</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Tempo</th>
                                <th scope="col">Plano</th>
                                <th scope="col">Com FaleMais</th>
                                <th scope="col">Sem FaleMais</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style= "white-space: nowrap;">
                                <td>{{ $request->origin }}</td>
                                <td>{{ $request->destination }}</td>
                                <td>{{ $request->minutes }}</td>
                                <td>FaleMais {{ $request->plan }}</td>
                                <td>R$ {{ number_format($talkMoreCalculation, 2,',','.')}}</td>
                                <td>R$ {{ number_format($normalPlanCalculation, 2,',','.')}}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('index') }}" class="btn btn-secondary" role="button">Fechar</a>
        </div>
    </div>
</div>
</div>