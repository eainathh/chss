@extends('layouts.app')

@section('title','Novo Clientes')
@section('content')
<form action="{{route('admin.clientes.update',['id'=>$cliente->id])}}" id="formStore" method="POST" enctype="multipart/form-data">
                    @csrf
<div class="container-sm-fluid py-4">

        <div class="card">
            <div class="card-body">
            <div class=" row">
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Nome Fantasia*:</label>
                            <input type="text" value="{{$cliente->nome}}" required class="form-control cad-form" name="nome">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Razão Social:</label>
                            <input type="text" value="{{$cliente->razao_social}}" class="form-control cad-form" name="razao_social">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">CNPJ:</label>
                            <input type="text" value="{{$cliente->cnpj}}" class="form-control cad-form cnpjMask" nam="cnpj">
                        </div>
                        <div class="col-sm-3 col-12 mt-3">
                            <label for="" class="titulo">Telefone:</label>
                            <input type="text" value="{{$cliente->telefone}}" name="telefone" class="form-control cad-form phoneMask" >
                        </div>
                        <div class="col-sm-3 col-12 mt-3">
                            <label for="" class="titulo">Email:</label>
                            <input type="email" value="{{$cliente->email}}" name="email" class="form-control cad-form" >
                        </div>
                        <div class="col-sm-3 col-12 mt-3">
                            <label for="" class="titulo">CEP:</label>

                            <div class="d-flex gap-2 mb-3">
                                <input type="text" class="form-control cepMask" value="{{$cliente->cep}}" id="buscaCep" name="cep" placeholder="00.0000-000" >
                                <button class="btn btn-outline-primary btn-icon btn-icon-only mb-0"  type="button"
                                    id="searchCep"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-sm-3 col-8 mt-3">
                            <label for="" class="titulo">Endereço:</label>
                            <input type="text" name="endereco" value="{{$cliente->endereco}}" class="form-control cad-form">
                        </div>
                        <div class="col-sm-2 col-4 mt-3">
                            <label for="" class="titulo">Número:</label>
                            <input type="text" name="numero" value="{{$cliente->numero}}" class="form-control cad-form">
                        </div>
                        <div class="col-sm-2 col-12 mt-3">
                            <label for="" class="titulo">Complemento:</label>
                            <input type="text" name="complemento" value="{{$cliente->complemento}}" class="form-control cad-form">
                        </div>
                        <div class="col-sm-3 col-12 mt-3">
                            <label for="" class="titulo">Bairro:</label>
                            <input type="text" name="bairro" value="{{$cliente->bairro}}" class="form-control cad-form">
                        </div>
                        <div class="col-sm-3 col-8 mt-3">
                            <label for="" class="titulo">Cidade:</label>
                            <input type="text" name="cidade" value="{{$cliente->cidade}}" class="form-control cad-form">
                        </div>
                        <div class="col-sm-2 col-4 mt-3">
                            <label for="" class="titulo">Estado:</label>
                            <input type="text" name="estado" value="{{$cliente->estado}}" class="form-control cad-form">
                        </div>

                        <div class="col-12">
                            <div class="col-12">
                                <label>Logo:</label>
                            </div>
                            <div class="col-6 text-center borda">
                                <input type="file" name="logo" class="form-control" id="">
                            </div>
                        </div>
                    </div>


              
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row d-none d-sm-flex border-bottom py-2 mb-2">
                    <div class="col-sm-auto flex-grow-1  font-weight-bolder opacity-7 text-xs">
                        Nome
                    </div>
                    <div class="col-sm-2 font-weight-bolder opacity-7 text-xs">
                        Telefone
                    </div>
                    <div class="col-sm-2 font-weight-bolder opacity-7 text-xs">
                        Celular
                    </div>
                    <div class="col-sm-2 font-weight-bolder opacity-7 text-xs">
                        E-mail
                    </div>
                    <div class="col-sm-2 font-weight-bolder opacity-7 text-xs">
                       Observações
                    </div>
                    <div class="col-sm-1 font-weight-bolder opacity-7 text-xs">
                        Ações
                    </div>
                </div>
                <div class="list-contatos">
                    @forelse($cliente->contatos as $k => $v)
                    <div class="row item-contato">
                        <div class="col-sm-auto flex-grow-1 col-12">
                            <input type="text" name="contatos[nome][]" value="{{$v->nome}}" class="form-control">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[telefone][]" value="{{$v->telefone}}" class="form-control phoneMask">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[celular][]" value="{{$v->celular}}" class="form-control phoneMask">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="email" name="contatos[email][]" value="{{$v->email}}" class="form-control">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[observacoes][]" value="{{$v->observacoes}}" class="form-control">
                        </div>
                        <div class="col-sm-1 col-12">
                           <div class="btn btn-danger btn-icon btn-icon-only removeContato">
                           <i class="fa-regular fa-trash-can"></i>
                           </div>
                        </div>
                    </div>
                    @empty
                    <div class="row item-contato">
                        <div class="col-sm-auto flex-grow-1 col-12">
                            <input type="text" name="contatos[nome][]" class="form-control">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[telefone][]" class="form-control phoneMask">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[celular][]" class="form-control phoneMask">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="email" name="contatos[email][]" class="form-control">
                        </div>
                        <div class="col-sm-2 col-12">
                            <input type="text" name="contatos[observacoes][]" class="form-control">
                        </div>
                        <div class="col-sm-1 col-12">
                           <div class="btn btn-danger btn-icon btn-icon-only removeContato">
                           <i class="fa-regular fa-trash-can"></i>
                           </div>
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="btn btn-sm btn-outline-primary" id="addContato">
                            Adicionar
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row ">
                    <div class="col-6 text-left">
                        <a href="{{ route('admin.clientes.index') }}"
                            class="btn btn-secondary m-0">Cancelar</a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-primary m-0">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

</div>
</form>
@endsection

@section('scripts')
<script>
        $("body").on('click','#addContato',function(e){
            var $clone = $(".list-contatos").find('.row:first-child').clone();
            $clone.find('input').val('');
            $clone.appendTo('.list-contatos');
            $('.phoneMask').mask(SPMaskBehavior, spOptions);
        })
        $("body").on('click','.removeContato',function(e){
            e.preventDefault();
        
            if($(".list-contatos .item-contato").length > 1){
                $(this).closest('.item-contato').remove()
            }else{
                $(this).closest('.item-contato').find('input').val('');
            }
        })

        $("#formStore").submit(function (e) {
            e.preventDefault();
            $("span.error").remove()
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    console.log(data);
                    swal({
                        title: "Parabéns",
                        text: "Cadastro realizado com sucesso!.",
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    });
                    $("#formStore")[0].reset();
                    $('#preview').html('');
                    $(".disabled").remove();
                    getLista();
                    modalServicos.hide();
                },
                error: function (err) {
                    console.log(err);

                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        $('#success_message').fadeIn().html(err.responseJSON.message);
                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span class="error" style="color: red;">' + error[0] +
                                '</span>'));
                        });
                    }
                }
            })
        })
    </script>
@endsection
