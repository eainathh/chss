<div class="row align-items-end">
    <div class="col-sm-4">
        <label for="">Colaboradores</label>
        <select name="" class="form-select" id="">
            <option value="">Selecione</option>
            @foreach($equipe as $k => $m)
            <option value="{{$m->id}}">{{$m->name}}</option>
            @endforeach

        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-primary m-0">Adicionar</button>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card border my-3">
            <div class="card-body">
                @foreach($projeto->projetosDevs as $k => $team)
                <div class="row align-items-center">
                    <div class="col-sm-auto">
                        <img src="{{base64_decode($team->user->dados->foto)}}" class="avatar avatar-md">
                    </div>
                    <div class="col">
                        <label for="">{{$team->user->name}}</label>
                    </div>
                    <div class="col">
                        <label for="">{{$team->user->dados->funcao}}</label>
                    </div>
                    <div class="col">
                        <div class="progress-wrapper">
                            <div class="progress-info">
                                <div class="progress-percentage">
                                    <span class="text-sm font-weight-bold">60%</span>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60"
                                    aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>