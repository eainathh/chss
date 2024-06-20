<div class="row">
    <div class="col-4">
        <label for="">Valor Projeto</label>
        <input type="text" name="valor" class="form-control moneyMask" value="{{$projeto->valor}}">
    </div>
    <div class="col-4">
        <label for="">Qtd parcelas</label>
        <input type="number" class="form-control" name="qtdParcelas" value="{{$projeto->pagamentos->count()}}">
    </div>
</div>
<hr>
<div class="row">
    <h6>Formas de Pagamento</h6>
</div>
<div class="row d-none d-sm-flex border-bottom py-2 mb-2 ">
    <div class="col-sm-4 flex-grow-1  font-weight-bolder opacity-7 text-xs">
        Valor
    </div>
    <div class="col-sm-4 ps-3  font-weight-bolder opacity-7 text-xs">
        Data Pagamento
    </div>
    <div class="col-sm-2 ps-3  font-weight-bolder opacity-7 text-xs">
        Status
    </div>

    <div class="col-sm-2 text-center font-weight-bolder opacity-7 text-xs">
        Ações
    </div>
</div>
<div class="list-pagamentos">
    @foreach($projeto->pagamentos as $k => $v)
    <div class="row item-pagamento">
        <div class="col-sm-4 flex-grow-1 col-12">
            <input type="text" name="pagamento[valor][]" class="form-control moneyMask" value="{{$v->valor}}">
        </div>
        <div class="col-sm-4 col-12">
            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker" value="{{$v->vencimento}}">
        </div>
        <div class="col-sm-2 col-12">
            <select name="pagamento[status][]" class="form-select">
                <option value="" >Selecione</option>
                <option value="pendente" @if($v->status == "pendente") selected @endif >Pendente</option>
                <option value="pago" @if($v->status == "pago") selected @endif >Pago</option>
                <option value="cancelado" @if($v->status == "cancelado") selected @endif >Cancelado</option>
            </select>
        </div>

        <div class="col-sm-2 col-12 text-center">
            <div class="btn btn-danger btn-icon btn-icon-only removePagamento">
                <i class="fa-regular fa-trash-can"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row mt-3">
    <div class="col">
        <div class="btn btn-sm btn-outline-primary" id="addPagamento">
            Adicionar
        </div>
    </div>
</div>