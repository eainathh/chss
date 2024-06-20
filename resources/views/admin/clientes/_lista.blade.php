<div class="row d-none d-sm-flex border-bottom py-2 mb-2">
    <div class="col-sm-6 font-weight-bolder opacity-7 text-xs">
        Cliente
    </div>
   
    <div class="col-sm-3 font-weight-bolder opacity-7 text-xs">
        Status
    </div>
    <div class="col-sm-3 font-weight-bolder opacity-7 text-xs">
        Ações
    </div>
</div>
@forelse($clientes as $k => $item)
<div class="row">
    <div class="col-sm-6 col-12">
        <div class="d-flex flex-column justify-content-center px-2 py-1">
            <h6 class="mb-0 text-sm">{{ $item->nome }}</h6>
            <p class="text-xs text-secondary mb-0">{{ $item->telefone }}</p>
        </div>
    </div>
    
    <div class="col-sm-3 col-12">
        @if($item->status == 'ativo')
            <span class="badge badge-sm bg-gradient-success">Ativo</span>
        @else
            <span class="badge badge-sm bg-gradient-warning">Inativo</span>
        @endif
    </div>
    <div class="col-sm-3 col-12">


        <div class="dropdown">
            <a href="javascript:;" class="btn btn-light btn-icon btn-icon-only btn-sm" data-bs-toggle="dropdown"
                id="navbarDropdownMenuLink2">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                <li>
                    <a class="dropdown-item"
                        href="{{ route('admin.clientes.edit',['id'=>$item->id]) }}">
                        Editar
                    </a>
                </li>
                <li>
                    <a class="dropdown-item btn-destroy" href="{{route('admin.clientes.delete',['id'=>$item->id])}}">
                        Excluir
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
@empty
<div class="row">
    <div class="col"><h4>Nenhum cliente cadastrado</h4></div>
</div>
@endforelse
