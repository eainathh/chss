@extends('layouts.app')

@section('styles')

@endsection

@section('title','Colaboradores')
@section('content')
<div class="container-fluid py-4">
<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a href="{{route('admin.colaboradores.new')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0" style="min-height: 50vh;">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Colaborador</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Função</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Inicio</th>
                      <th class="text-secondary text-center opacity-7">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($colaboradores as $k => $v)
                  
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="{!!base64_decode($v->dados->foto)!!}" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><a href="{{route('admin.colaboradores.edit',['id'=>$v->id])}}">{{$v->name}}</a></h6>
                            <p class="text-xs text-secondary mb-0">{{$v->email}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$v->dados->funcao}}</p>
                        <p class="text-xs text-secondary mb-0">{{$v->dados->nivel}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($v->status == 'ativo')
                        <span class="badge badge-sm bg-gradient-success">Ativo</span>
                        @else
                        <span class="badge badge-sm bg-gradient-secondary">Inativo</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$v->dados->data_contratacao->format('d/m/Y')}}</span>
                      </td>
                      <td class="align-middle text-center">
                      <div class="dropdown">
                          <button class="btn btn-icon-only btn-primary btn-rounded btn-sm icon-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa-solid fa-ellipsis-vertical"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{route('admin.colaboradores.edit',['id'=>$v->id])}}">Editar</a></li>
                            <li><a class="dropdown-item" href="#">Ativar/Inativar</a></li>
                            <li><a class="dropdown-item" href="#">Associar Projeto</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Excluir</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col">
                  {!!$colaboradores->links()!!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection