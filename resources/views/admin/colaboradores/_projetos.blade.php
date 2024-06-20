<div class="row">
    <div class="col">
        <h5>Projetos envolvidos</h5>
    </div>
</div>
<form action="{{route('admin.colaboradores.storeAssociacao',['id'=>$user->id])}}" id="storeAssociacao">
    @csrf
<div class="row align-items-end">
    <div class="col">
        <label for="">Associar projeto</label>
        <select name="id_projeto" id="" class="form-select">
            <option value="">Selecione</option>
            @foreach($projetosDisponiveis as $k=> $pD)
                <option value="{{$pD->id}}">{{$pD->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <button type="submit" class="btn btn-primary m-0">Associar</button>
    </div>
</div>
</form>
<div id="lista-projetos">
@include('admin.colaboradores.include._lista-projetos')
</div>