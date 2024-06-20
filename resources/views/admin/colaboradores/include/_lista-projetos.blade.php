<div class="row mt-5">
    <div class="col">
        <h6>Projetos Ativos</h6>
        @foreach($projetosAssociados as $kPro => $vPro)
            <div class="card-projetos">
                <a href="#" class="card-header">
                    <h6 class="m-0">{{$vPro->nome}}</h6>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
        @endforeach
    </div>
</div>