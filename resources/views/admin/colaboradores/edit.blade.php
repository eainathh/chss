@extends('layouts.app')

@section('title','Novo colaboradores')
@section('content')

<div class="container-sm-fluid py-4">
        <div class="card">
            <div class="card-body">

            <div class="row mx-0">
                        <div class="col">
                        <div class="d-flex align-items-start nav-pills-vertical">
                            <div class="nav flex-column nav-pills me-3 col-sm-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link mb-3 " id="v-pills-info" data-bs-toggle="pill" data-bs-target="#v-info" type="button" role="tab" aria-controls="v-info" aria-selected="true">Informações</button>
                                <button class="nav-link mb-3 active" id="v-pills-projetos" data-bs-toggle="pill" data-bs-target="#v-projetos" type="button" role="tab" aria-controls="v-projetos" aria-selected="false">Projetos</button>
                                
                                
                            </div>
                            <div class="border-left border-start col-sm-10 ps-3 tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade " id="v-info" role="tabpanel" aria-labelledby="v-pills-info" tabindex="0">                 
                                <form action="{{route('admin.colaboradores.update',['id'=>$user->id])}}" id="formStore" method="POST" enctype="multipart/form-data">
                    @csrf
                                    @include('admin.colaboradores._info')

                                </form>
                                </div>
                                <div class="tab-pane fade show active" id="v-projetos" role="tabpanel" aria-labelledby="v-pills-projetos" tabindex="0">
                                @include('admin.colaboradores._projetos')
                                </div>
                              
                            </div>
                            </div>
                        </div>
                    </div>


               
                   

              
            </div>
        </div>
       
       

</div>


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
        $("#storeAssociacao").submit(function (e) {
            e.preventDefault();
            $("span.error").remove()
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                   
                    $("#lista-projetos").html(data)
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
