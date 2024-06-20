@extends('layouts.app')

@section('title','projetos')
@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <a href="{{route('admin.projetos.new')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Adicionar</a>
            </div>
            <div class="card-body  pt-0 pb-2">
              <div id="response" class="">
               @include('admin.projetos._lista')
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection

@section('sctipts')

@endsection