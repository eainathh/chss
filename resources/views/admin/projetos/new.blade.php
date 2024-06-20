@extends('layouts.app')

@section('title','Novo projetos')
@section('content')
<form action="{{route('admin.projetos.store')}}" id="formStore" method="POST" enctype="multipart/form-data">
                    @csrf
<div class="container-sm-fluid py-4">

        <div class="card">
            <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="">Cliente</label>
                            <select name="id_cliente" class="form-select">
                                <option value="">Selecione</option>
                                @foreach($clientes as $k => $cliente)
                                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label for="" class="titulo">Nome:</label>
                            <input type="text" required class="form-control cad-form" name="nome">
                        </div>
                        <div class="col-4">
                            <label for="">Código</label>
                            <div class="d-flex align-items-center">
                           
                            <input type="text" class="form-control text-uppercase" name="pref_code">
                            <div class="px-3">-</div>
                            <input type="text" class="form-control" name="suf_code" value="{{$nextCode}}">
                            </div>
                        </div>
                    </div>
                    <hr class="my-3 border">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Descrição</label>
                        <textarea name="descricao" id="summernote" cols="30" rows="10"></textarea>
                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="">Valor Projeto</label>
                            <input type="text" name="valor" class="form-control moneyMask">
                        </div>
                        <div class="col-4">
                            <label for="">Qtd parcelas</label>
                            <input type="number" class="form-control" name="qtdParcelas">
                        </div>
                    </div>


              
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <h6>Formas de Pagamento</h6>
                </div>
                <div class="row d-none d-sm-flex border-bottom py-2 mb-2  w-50">
                    <div class="col-sm-5 flex-grow-1  font-weight-bolder opacity-7 text-xs">
                        Valor
                    </div>
                    <div class="col-sm-5 ps-3  font-weight-bolder opacity-7 text-xs">
                       Data Pagamento
                    </div>
                   
                    <div class="col-sm-2 text-center font-weight-bolder opacity-7 text-xs">
                        Ações
                    </div>
                </div>
                <div class="list-pagamentos w-50">
                    <div class="row item-pagamento">
                        <div class="col-sm-5 flex-grow-1 col-12">
                            <input type="text" name="pagamento[valor][]" class="form-control moneyMask">
                        </div>
                        <div class="col-sm-5 col-12">
                            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker">
                        </div>
                       
                        <div class="col-sm-2 col-12">
                           <div class="btn btn-danger btn-icon btn-icon-only removePagamento">
                           <i class="fa-regular fa-trash-can"></i>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="btn btn-sm btn-outline-primary" id="addPagamento">
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
                        <a href="{{ route('admin.projetos.index') }}"
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>

$(document).ready(function() {
        $('#summernote').summernote({
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ]
        });
    });
        $("body").on('click','#addPagamento',function(e){
            var $clone = `<div class="row item-pagamento">
                        <div class="col-sm-5 flex-grow-1 col-12">
                            <input type="text" name="pagamento[valor][]" class="form-control moneyMask">
                        </div>
                        <div class="col-sm-5 col-12">
                            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker">
                        </div>
                       
                        <div class="col-sm-2 col-12">
                           <div class="btn btn-danger btn-icon btn-icon-only removePagamento">
                           <i class="fa-regular fa-trash-can"></i>
                           </div>
                        </div>
                    </div>`;
           
            $('.list-pagamentos').append($clone);
          
            $(".flatpicker").flatpickr({
                altInput: true,
                altFormat: "d/m/Y",
                dateFormat: "Y-m-d",
                locale:'pt'
            });
           
        })
        $("body").on('change','input[name="qtdParcelas"]',function(e){
            var $clone = $(".list-pagamentos").find('.row:first-child').clone();
            var $html = `<div class="row item-pagamento">
                        <div class="col-sm-5 flex-grow-1 col-12">
                            <input type="text" name="pagamento[valor][]" class="form-control moneyMask">
                        </div>
                        <div class="col-sm-5 col-12">
                            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker">
                        </div>
                       
                        <div class="col-sm-2 col-12">
                           <div class="btn btn-danger btn-icon btn-icon-only removePagamento">
                           <i class="fa-regular fa-trash-can"></i>
                           </div>
                        </div>
                    </div>`;
            var qtd = $(this).val() - 1;
            var total = $(".item-pagamento").length;
            if(qtd > total){
               for(var i = total; i <= qtd; i++){
                        $(".list-pagamentos").append($html);
                }
            }else{
                console.log($(this).val(),total)
                for(var i = $(this).val(); i < total; i++){
                        $(".item-pagamento:last-child").remove();
                }
            }
            $(".flatpicker").flatpickr({
                altInput: true,
                altFormat: "d/m/Y",
                dateFormat: "Y-m-d",
                locale:'pt'
            });
            $('.moneyMask').mask("#.##0,00", {reverse: true});
        })
        $("body").on('click','.removePagamento',function(e){
            e.preventDefault();
        
            if($(".list-pagamentos .item-pagamento").length > 1){
                $(this).closest('.item-pagamento').remove()
            }else{
                $(this).closest('.item-pagamento').find('input').val('');
            }
            $total = $('.item-pagamento').length;
            $('input[name="qtdParcelas"]').val($total)
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
                        window.location.href = data.url
                    });
                  
                  
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
