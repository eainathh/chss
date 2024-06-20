<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/40b7169917.js" crossorigin="anonymous"></script>
  <link href="{{asset('assets/nucleo-svg.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    @include('layouts._aside')
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          
          <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
         
          <ul class="navbar-nav  ">
           
            <li class="nav-item d-flex align-items-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                   @csrf
                   <button type="submit" class="btn btn-light btn-sm">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span class="d-sm-inline d-none">Sair</span>
                </button>
            </form>
            </li>
          
          
           
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  @yield('content')
  </main>

  <!--   Core JS Files   -->

  <script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
<script src="{{asset('vendors/accounting.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
   
   var flatpicker = $(".flatpicker").flatpickr({
        altInput: true,
        altFormat: "d/m/Y",
        dateFormat: "Y-m-d",
        locale:'pt'
    });


    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('.phoneMask').mask(SPMaskBehavior, spOptions);
    $('.cepMask').mask('00000-000');
    $('.moneyMask').mask("#.##0,00", {reverse: true});
    $('.porcMask').mask("##0.00", {reverse: true});
    $('.markupMask').mask("0.0", {reverse: true});
    $('.cpfMask').mask('000.000.000-00');
    $('.cnpjMask').mask('00.000.000/0000-00');
    $("#formSerachModal select[name='cidade']").change(function(){
      var cidade = $(this).val();
      $("select[name='bairro']").val('')
      $("select[name='bairro'] option").hide();
      $("select[name='bairro'] option[data-cidade='"+cidade+"']").show();
    })

    function buscaCep(cep) {
    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
        $("input[name='endereco']").val(dados.logradouro)
        $("input[name='bairro']").val(dados.bairro)
        $("input[name='cidade']").val(dados.localidade)
        $("input[name='estado']").val(dados.uf)

    });
    }
    $("#buscaCep").change(function() {
        buscaCep($(this).val())
    });

    $("#searchCep").click(function(e) {
        e.preventDefault();
        buscaCep($("#buscaCep").val())
    })


    $(".btn-destroy").click(function(e){
      var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      $(this).closest('.row').addClass("remove-row");
      swal({
        title: "Você tem certeza?",
        text: "Você removerá permanentemente este item",
        icon: "warning",
        dangerMode: true,
        buttons:{
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "",
            closeModal: true
          }
        }
      }) .then(willDelete => {
       if (willDelete) {

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){ 
                if (willDelete) {
                    $(".remove-row").remove();
                swal("Sucesso!", "Item removido com sucesso", "success");
                }
            },
            error: function(err) {
               var erro = err.responseJSON
                swal("Atenção!", erro.error, "error");
            }
        });

        
       }
     });
    })
    function saveMoney($value) {

        if ($value === null) {
            return 0.00;
        }
        var $money = $value.replace(".", "");

        $money = $money.replace(",", ".", $money);

        return $money;
        }

        function getMoney($value, $moeda = 'pt-BR') {

        if ($value === null) {
            return '0,00';
        }

        return accounting.formatMoney($value,'', 2, ".", ",");





        }
  </script>
  @yield('scripts')

</body>

</html>