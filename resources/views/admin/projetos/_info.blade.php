<div class="row">
                        <div class="col-4">
                            <label for="">Cliente</label>
                            <select name="id_cliente" class="form-select">
                                <option value="">Selecione</option>
                                @foreach($clientes as $k => $cliente)
                                <option value="{{$cliente->id}}" @if($projeto->id_cliente == $cliente->id) selected @endif>{{$cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label for="" class="titulo">Nome:</label>
                            <input type="text" required class="form-control cad-form" name="nome" value="{{$projeto->nome}}">
                        </div>
                        <div class="col-4">
                            <label for="">Código</label>
                            <div class="d-flex align-items-center">
                           
                            <input type="text" class="form-control text-uppercase" name="codigo" value="{{$projeto->codigo}}">
                           
                            </div>
                        </div>
                    </div>
                    <hr class="my-3 border">
                    <div class="row">
                        <div class="col-12">
                            <label for="">Descrição</label>
                        <textarea name="descricao" id="summernote" cols="30" rows="10">{!!$projeto->descricao!!}</textarea>
                        
                        </div>
                    </div>

                    <div class="row mt-5">
                            <div class="col-6 text-left">
                                <a href="{{ route('admin.projetos.index') }}"
                                    class="btn btn-secondary m-0">Cancelar</a>
                            </div>
                            <div class="col-6 text-end">
                            <button type="submit" class="btn btn-primary m-0">Salvar</button>
                            </div>
                        </div>