<div class="row">
                <div class="col-8">
                    <div class="row">
                        <div class="col">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="ativo" @if($user->status == 'ativo') checked @endif role="switch" id="flexSwitchCheckChecked">
                            <label class="form-check-label" for="flexSwitchCheckChecked">Ativo/Inativo</label>
                        </div>
                        </div>
                    </div>
                <div class=" row">
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Nome *:</label>
                            <input type="text" required class="form-control cad-form" name="name" value="{{$user->name}}">
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Email:</label>
                            <input type="email" name="email" required class="form-control cad-form" value="{{$user->email}}" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Telefone:</label>
                            <input type="text" name="telefone" class="form-control cad-form phoneMask" value="{{$user->dados->name}}" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Data Contratação:</label>
                            <input type="text" name="data_contratacao" class="form-control cad-form flatpicker" value="{{$user->dados->data_contratacao}}" >
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Função:</label>
                            <input type="text"  class="form-control cad-form" name="funcao" value="{{$user->dados->funcao}}" >
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Nível:</label>
                            <div class="d-flex gap-2 ">
                                <div class="form-check mb-3 w-100">
                                    <input class="form-check-input" type="radio" value="junior" name="nivel" @if($user->dados->nivel == "junior") checked @endif required id="customRadio1">
                                    <label class="custom-control-label" for="customRadio1">Júnior</label>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" type="radio" value="pleno" name="nivel" @if($user->dados->nivel == "pleno") checked @endif required id="customRadio2">
                                    <label class="custom-control-label" for="customRadio2">Pleno</label>
                                </div>
                                <div class="form-check w-100">
                                    <input class="form-check-input" type="radio" value="senior" name="nivel" @if($user->dados->nivel == "senior") checked @endif required id="customRadio3">
                                    <label class="custom-control-label" for="customRadio3">Sênior</label>
                                </div>
                                </div> 
                        </div>
                        <div class="col-sm-6 col-12 mt-3">
                            <label for="" class="titulo">Regime:</label>
                           <select name="regime" required class="form-select">
                            <option value="">Selecione</option>
                            <option value="freelance" @if($user->dados->regime == "freelance") selected @endif>Freelance</option>
                            <option value="fixo" @if($user->dados->regime == "fixo") selected @endif>Fixo</option>
                           </select>
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Salário:</label>
                            <input type="text"  class="form-control cad-form moneyMask" value="{{$user->dados->salario}}"  name="salario">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Valor Hora:</label>
                            <input type="text"  class="form-control cad-form moneyMask" value="{{$user->dados->valor_hora}}" name="valor_hora">
                        </div>
                        <div class="col-sm-4 col-12 mt-3">
                            <label for="" class="titulo">Horas mês:</label>
                            <input type="number"  class="form-control cad-form" required value="{{$user->dados->horas_mes}}" name="horas_mes">
                        </div>

                        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Observações</label>
                                <textarea name="observacoes" id="" class="form-control">{!!$user->dados->observacoes!!}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-4">
                        <div class="col-12">
                            <div class="text-center" id="foto-user">
                                <img src="{{base64_decode($user->dados->foto)}}" class="img-thumbnail rounded-circle">
                                <input type="hidden" name="foto-user" value="{{base64_decode($user->dados->foto)}}">
                            </div>
                        </div>
                            <div class="form-group d-flex flex-column">
                            <label for="exampleFormControlFile1">Foto:*</label>
                            <input type="file" class="form-control-file btn btn-secondary" id="uploadArquivos">
                        </div>
                        
                    </div>
               </div>

               <div class="row ">
                    <div class="col-6 text-left">
                        <a href="{{ route('admin.colaboradores.index') }}"
                            class="btn btn-secondary m-0">Cancelar</a>
                    </div>
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-primary m-0">Salvar</button>
                    </div>
                </div>