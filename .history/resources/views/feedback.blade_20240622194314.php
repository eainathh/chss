@extends('layouts.app')

@section('content')

<h1> Pesquisa CHSS </h1><br><br>

<!-- FORMULÁRIO DE DADOS DO USUARIO -->

<form action="" method="post">

    <h3> Informações básicas sobre você </h3>

    <div class="row">
        <div class="col">
            <label for="nome"> Seu nome: </label> <br>
            <input class="form-control" type="text" name="nome" required>
        </div>

        <div class="col">
            <label for="email">Seu email para contato</label> <br>
            <input class="form-control" type="email" name="email" required> 
        </div>

        <div class="col">
            <label for="telefone">Seu email para contato</label> <br>
            <input class="form-control" type="tel" name="telefone" required> 
        </div>

        
    </div>

    <div class="row">

        <h3> Etapa de validação </h3>

        
        <label for="positivos"> Pontos positivos </label> <br>
        <textarea class="form-control" name="positivos" > </textarea> <br><br>

        <label for="negativos"> Pontos negativos </label> <br>
        <textarea class="form-control" name="negativos" > </textarea> <br><br>

        <label for="duvidas"> Dúvidas até o momento </label> <br>
        <textarea class="form-control" name="duvidas" > </textarea> <br><br>

        <label for="sugestao">Sugestão de melhorias</label> <br>
        <textarea class="form-control" name="sugestao" > </textarea>
    
    </div>

    
    


</form>




@endsection