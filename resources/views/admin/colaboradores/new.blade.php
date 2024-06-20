@extends('layouts.app')

@section('title','Novo colaboradores')
@section('content')
<form action="{{route('admin.colaboradores.store')}}" id="formStore" method="POST" enctype="multipart/form-data">
                    @csrf
<div class="container-sm-fluid py-4">
        <div class="card">
            <div class="card-body">
               <div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" value="ativo" role="switch" id="flexSwitchCheckChecked" checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Ativo/Inativo</label>
                        </div>
                        </div>
                    </div>
                <div class=" row">
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Nome *:</label>
                            <input type="text" required class="form-control cad-form" name="name">
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Email:</label>
                            <input type="email" name="email" required class="form-control cad-form" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Telefone:</label>
                            <input type="text" name="telefone" class="form-control cad-form phoneMask" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Data Contratação:</label>
                            <input type="text" name="data_contratacao" class="form-control cad-form flatpicker" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Função:</label>
                            <input type="text"  class="form-control cad-form" name="funcao">
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Nível:</label>
                            <div class="d-flex gap-2 ">
                                <div class="form-check mb-3 w-100">
                                    <input class="form-check-input" type="radio" value="junior" name="nivel" required id="customRadio1">
                                    <label class="custom-control-label" for="customRadio1">Júnior</label>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" type="radio" value="pleno" name="nivel" required id="customRadio2">
                                    <label class="custom-control-label" for="customRadio2">Pleno</label>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" type="radio" value="senior" name="nivel" required id="customRadio3">
                                    <label class="custom-control-label" for="customRadio3">Sênior</label>
                                </div>
                                </div> 
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Regime:</label>
                           <select name="regime" required class="form-select">
                            <option value="">Selecione</option>
                            <option value="freelance">Freelance</option>
                            <option value="fixo">Fixo</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Salário:</label>
                            <input type="text"  class="form-control cad-form moneyMask"  name="salario">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Valor Hora:</label>
                            <input type="text"  class="form-control cad-form moneyMask"  name="valor_hora">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Horas mês:</label>
                            <input type="number"  class="form-control cad-form" required name="horas_mes">
                        </div>

                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Observações</label>
                                <textarea name="observacoes" id="" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                        <div class="col-12">
                            <div class="d-none" id="foto-user">
                                <img src="" alt="">
                                <input type="hidden" name="foto-user">
                            </div>
                        </div>
                            <div class="form-group d-flex flex-column">
                            <label for="exampleFormControlFile1">Foto:*</label>
                            <input type="file" required class="form-control-file btn btn-secondary" id="uploadArquivos">
                        </div>
                        
                    </div>
               </div>
                   

              
            </div>
        </div>
       
        <div class="card mt-3">
            <div class="card-body">
                <div class="row ">
                    <div class="col-6 text-left">
                        <a href="{{ route('admin.colaboradores.index') }}"
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

<div class="modal" id="modalProfile" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Foto Perfil</h5>
       
      </div>
      <div class="modal-body">
       <div id="upload-result"></div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveResult">Salvar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

<script>
     var $uploadCrop = $('#upload-result').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
        });
        $('body').on('change', '#uploadArquivos', function() {
			
			$(".loading").show(0);
			var data = new FormData();
			$.each($(this)[0].files, function(i, file) {
				data.append('file', file);
			});
			data.append('_token', '{{ csrf_token() }}');
     
				$.ajax({
					url: '{{route("admin.colaboradores.upload-profile")}}',
					type: 'POST',
					cache: false,
					contentType: false,
					processData: false,
					data: data,
					success: function(result) {
						console.log(result);
           
            $("#modalProfile").modal('show');
           
                          $uploadCrop.croppie('bind', {
                          url: '{{asset("storage/profiles/")}}/' + result ,
                         
                      });
                      
       
                      $(".loading").hide(0);
         
					},
          error:function(result){
            swal("Opa!", "Algo deu errado.", "info");
            $(".loading").hide(0);
          }
				});
			
		});
        $("body").on('click','.saveResult',function(e){
      $uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {
                $("#foto-user").closest('.d-none').removeClass('d-none')
                $("#foto-user img").attr('src',resp)
                $("input[name='foto-user']").val(resp)
				$("#modalProfile").modal('hide')
				
			});
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
