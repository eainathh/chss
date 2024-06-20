@extends('layouts.app')

@section('title','Novo projetos')
@section('content')

        <div class="container-sm-fluid py-4">

        <div class="card">
                <div class="card-body">
                    <div class="row mx-0">
                        <div class="col">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3 col-sm-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link mb-3 " id="v-pills-info" data-bs-toggle="pill" data-bs-target="#v-info" type="button" role="tab" aria-controls="v-info" aria-selected="true">Informações</button>
                                <button class="nav-link mb-3" id="v-pills-pagamento" data-bs-toggle="pill" data-bs-target="#v-pagamento" type="button" role="tab" aria-controls="v-pagamento" aria-selected="false">Financeiro</button>
                                <button class="nav-link mb-3 " id="v-pills-levantamento" data-bs-toggle="pill" data-bs-target="#v-levantamento" type="button" role="tab" aria-controls="v-levantamento" aria-selected="false">Levantamento</button>
                                <button class="nav-link mb-3 active" id="v-pills-equipe" data-bs-toggle="pill" data-bs-target="#v-equipe" type="button" role="tab" aria-controls="v-equipe" aria-selected="false">Equipe</button>
                                
                            </div>
                            <div class="tab-content col-sm-10" id="v-pills-tabContent">
                                <div class="tab-pane fade  " id="v-info" role="tabpanel" aria-labelledby="v-pills-info" tabindex="0">
                                <form action="{{route('admin.projetos.update',['id'=>$projeto->id])}}" class="formUpdate" method="POST" enctype="multipart/form-data">
                    @csrf
                                    @include('admin.projetos._info')

                                    </form>
                                </div>
                                <div class="tab-pane fade" id="v-pagamento" role="tabpanel" aria-labelledby="v-pills-pagamento" tabindex="0">
                                    @include('admin.projetos._financ')
                                </div>
                                <div class="tab-pane fade " id="v-levantamento" role="tabpanel" aria-labelledby="v-pills-levantamento" tabindex="0">
                                <form action="{{route('admin.projetos.levantamento',['id'=>$projeto->id])}}" class="formUpdate" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @include('admin.projetos._levantamento')
                                </form>
                                </div>
                                <div class="tab-pane fade show active" id="v-equipe" role="tabpanel" aria-labelledby="v-pills-equipe" tabindex="0">
                                <form action="{{route('admin.projetos.equipe',['id'=>$projeto->id])}}" class="formUpdate" method="POST" enctype="multipart/form-data">
                                    @include('admin.projetos._equipe')
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                
                

        </div>

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
            var $clone = ` <div class="row item-pagamento">
        <div class="col-sm-4 flex-grow-1 col-12">
            <input type="text" name="pagamento[valor][]" class="form-control moneyMask" value="">
        </div>
        <div class="col-sm-4 col-12">
            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker" value="">
        </div>
        <div class="col-sm-2 col-12">
            <select name="pagamento[status][]" class="form-select">
                <option value="" >Selecione</option>
                <option value="pendente"  >Pendente</option>
                <option value="pago"  >Pago</option>
                <option value="cancelado"  >Cancelado</option>
            </select>
        </div>

        <div class="col-sm-2 col-12 text-center">
            <div class="btn btn-danger btn-icon btn-icon-only removePagamento">
                <i class="fa-regular fa-trash-can"></i>
            </div>
        </div>
    </div>`;
           
            $('.list-pagamentos').append($clone);
            $total = $('.item-pagamento').length;
            $('input[name="qtdParcelas"]').val($total)
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
        <div class="col-sm-4 flex-grow-1 col-12">
            <input type="text" name="pagamento[valor][]" class="form-control moneyMask" value="">
        </div>
        <div class="col-sm-4 col-12">
            <input type="text" name="pagamento[vencimento][]" class="form-control flatpicker" value="">
        </div>
        <div class="col-sm-2 col-12">
            <select name="pagamento[status][]" class="form-select">
                <option value="" >Selecione</option>
                <option value="pendente"  >Pendente</option>
                <option value="pago"  >Pago</option>
                <option value="cancelado"  >Cancelado</option>
            </select>
        </div>

        <div class="col-sm-2 col-12 text-center">
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

        $(".formUpdate").submit(function (e) {
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
                        //location.reload();
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
        $("body").on('click','.comp-levantamento .addRow',function(e){
            e.preventDefault();
            var $clone = $(this).closest('.row').clone();
            $clone.find('input').val('');
            $(this).closest('.row').after($clone);
            $('.moneyMask').mask("#.##0,00", {reverse: true});
         $('.porcMask').mask("##0.00", {reverse: true});
        })
       
        $("body").on('click','.comp-levantamento .delRow',function(e){
            e.preventDefault();
        if($(this).closest('.group').find('.row-items').length > 1){
           $(this).closest('.row').remove();
        }
           
        }) 
        $("body").on('click','.comp-levantamento .addGroup',function(e){
            e.preventDefault();
            var $next = $('.group').length;
            var $clone = `<div class="group">
    <div class="row bg-warning text-dark">
        <div class="col"><input type="text" placeholder="Nome Grupo" required name="group[]" ></div>
    </div>
    <div class="row row-items">
        <div class="col-3 border-end border-start"><input type="text" class="descricao" required name="descricao[grupo_`+$next+`][]" placeholder="..." ></div>
        <div class="col border-end"><input type="text" class="front_end porcMask" name="front_end[grupo_`+$next+`][]" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="back_end porcMask" name="back_end[grupo_`+$next+`][]"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="ux porcMask" name="ux[grupo_`+$next+`][]"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="gerenciamento porcMask" name="gerenciamento[grupo_`+$next+`][]"  placeholder="0" ></div>
        <button class="addRow">
            <i class="fa-solid fa-plus"></i>
        </button>
        <button class="delRow">
        <i class="fa-solid fa-minus"></i>
        </button>
    </div>
    <div class="row-subtotal bg-secondary font-weight-bold row row-subtotal text-light">
        <div class="col-3 border-end border-start">Sub Total</div>
        <div class="col border-end total_group_front_end">0</div>
        <div class="col border-end total_group_back_end">0</div>
        <div class="col border-end total_group_ux">0</div>
        <div class="col border-end total_group_gerenciamento">0</div>
       
    </div>
    <div class="addGroup">
    <i class="fa-solid fa-plus"></i>
    </div>
    <div class="delGroup">
        <i class="fa-solid fa-minus"></i>
    </div>
</div>`;
           
            $(this).closest('.group').after($clone);
            $('.moneyMask').mask("#.##0,00", {reverse: true});
            $('.porcMask').mask("##0.00", {reverse: true});
            calculalevantamento()
        })
        $("body").on('click','.delGroup',function(e){
            e.preventDefault();
           
        if($('.group').length > 1){
           $(this).closest('.group').remove();
        }
           
        }) 
        $('body').on('change','.group input',function(){
            calculalevantamento()
        })
        $('body').on('change','input[name="markup"]',function(){
            calculalevantamento()
        })
        function calculalevantamento(){
            // Atualiza os totais para cada grupo e o total geral
            const groups = document.querySelectorAll(".group");
            let markup = document.querySelector("[name='markup']").value
            let totalFrontEnd = 0;
            let totalBackEnd = 0;
            let totalUx = 0;
            let totalGerenciamento = 0;
            let totalHoras = 0;
            let subTotal = 0;
            let total = 0;


            groups.forEach(group => {
                const frontEndInputs = group.querySelectorAll(".front_end");
                const backEndInputs = group.querySelectorAll(".back_end");
                const uxInputs = group.querySelectorAll(".ux");
                const gerenciamentoInputs = group.querySelectorAll(".gerenciamento");

                let groupFrontEnd = 0;
                let groupBackEnd = 0;
                let groupUx = 0;
                let groupGerenciamento = 0;

                frontEndInputs.forEach(input => {
                    groupFrontEnd += parseFloat(input.value) || 0;
                });

                backEndInputs.forEach(input => {
                    groupBackEnd += parseFloat(input.value) || 0;
                });

                uxInputs.forEach(input => {
                    groupUx += parseFloat(input.value) || 0;
                });

                gerenciamentoInputs.forEach(input => {
                    groupGerenciamento += parseFloat(input.value) || 0;
                });

                totalFrontEnd += groupFrontEnd;
                totalBackEnd += groupBackEnd;
                totalUx += groupUx;
                totalGerenciamento += groupGerenciamento;

                // Atualiza os totais para o grupo atual
                const subtotalFrontEnd = group.querySelector(".total_group_front_end");
                const subtotalBackEnd = group.querySelector(".total_group_back_end");
                const subtotalUx = group.querySelector(".total_group_ux");
                const subtotalGerenciamento = group.querySelector(".total_group_gerenciamento");

                subtotalFrontEnd.textContent = groupFrontEnd;
                subtotalBackEnd.textContent = groupBackEnd;
                subtotalUx.textContent = groupUx;
                subtotalGerenciamento.textContent = groupGerenciamento;


                totalHoras = totalFrontEnd + totalBackEnd + totalUx + totalGerenciamento;
                
                let custoHoraFrontEnd = saveMoney(document.querySelector('[name="custo_hora_front_end"]').value);
                
                document.querySelector('[name="total_hora_front_end"]').value = totalFrontEnd;
                document.querySelector('.total_hora_front_end').innerHTML = totalFrontEnd;
                document.querySelector('[name="sub_total_front_end"]').value = getMoney(custoHoraFrontEnd * totalFrontEnd);
                document.querySelector('.sub_total_front_end').innerHTML = getMoney(custoHoraFrontEnd * totalFrontEnd);
                document.querySelector('.total_front_end').innerHTML = getMoney((custoHoraFrontEnd * totalFrontEnd) * markup);
               
                document.querySelector('[name="total_front_end"]').value = getMoney((custoHoraFrontEnd * totalFrontEnd) * markup);

                subTotal += (custoHoraFrontEnd * totalFrontEnd);
                let custoHoraBackEnd = saveMoney(document.querySelector('[name="custo_hora_back_end"]').value);
          
                document.querySelector('[name="total_hora_back_end"]').value = totalBackEnd;
                document.querySelector('.total_hora_back_end').innerHTML = totalBackEnd;
                document.querySelector('[name="sub_total_back_end"]').value = getMoney(custoHoraBackEnd * totalBackEnd);
                document.querySelector('.sub_total_back_end').innerHTML = getMoney(custoHoraBackEnd * totalBackEnd);
                document.querySelector('.total_back_end').innerHTML = getMoney((custoHoraBackEnd * totalBackEnd) * markup);
                document.querySelector('[name="total_back_end"]').value = getMoney((custoHoraBackEnd * totalBackEnd) * markup);
                subTotal += (custoHoraBackEnd * totalBackEnd)

                let custoHoraUx = saveMoney(document.querySelector('[name="custo_hora_ux"]').value);
                document.querySelector('[name="total_hora_ux"]').value = totalUx;
                document.querySelector('.total_hora_ux').innerHTML = totalUx;
                document.querySelector('[name="sub_total_ux"]').value = getMoney(custoHoraUx * totalUx);
                document.querySelector('.sub_total_ux').innerHTML = getMoney(custoHoraUx * totalUx);
                document.querySelector('.total_ux').innerHTML = getMoney((custoHoraUx * totalUx) * markup);
                document.querySelector('[name="total_ux"]').value = getMoney((custoHoraUx * totalUx) * markup);
                subTotal += (custoHoraUx * totalUx)

                let custoHoraGerenciamento = saveMoney(document.querySelector('[name="custo_hora_gerenciamento"]').value);
                document.querySelector('[name="total_hora_gerenciamento"]').value = totalGerenciamento;
                document.querySelector('.total_hora_gerenciamento').innerHTML = totalGerenciamento;
                document.querySelector('[name="sub_total_gerenciamento"]').value = getMoney(custoHoraGerenciamento * totalGerenciamento);
                document.querySelector('.sub_total_gerenciamento').innerHTML = getMoney(custoHoraGerenciamento * totalGerenciamento);
                document.querySelector('.total_gerenciamento').innerHTML = getMoney((custoHoraGerenciamento * totalGerenciamento) * markup);
                document.querySelector('[name="total_gerenciamento"]').value = getMoney((custoHoraGerenciamento * totalGerenciamento) * markup);
                subTotal += (custoHoraGerenciamento * totalGerenciamento)

                document.querySelector('.total_horas').innerHTML = totalHoras;
                document.querySelector('[name="total_horas"]').value = totalHoras;

                document.querySelector('.sub_total').innerHTML = getMoney(subTotal);
                document.querySelector('[name="sub_total"]').value = getMoney(subTotal);

                document.querySelector('.total').innerHTML = getMoney(markup * subTotal);
                document.querySelector('[name="total"]').value = getMoney(markup * subTotal);
            });
        }
    </script>
@endsection
