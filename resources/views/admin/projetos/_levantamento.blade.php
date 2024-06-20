<div class="resum-levantamento">
<div class="row " id="res_front_end">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">Markup</div>
        <div class="col"><input type="text" class="markupMask" name="markup" value="1.7"></div>
    </div>
    <div class="font-weight-bold row text-center bg-gray-900 text-light ">
        <div class="col">Descrição</div>
        <div class="col">Custo/Hora</div>
        <div class="col">Total de Horas</div>
        <div class="col">SubTotal</div>
        <div class="col">Total</div>
    </div>
    <div class="row " id="res_front_end">
        <div class="col">FrontEnd</div>

      
        <div class="col">
            <input type="text" name="custo_hora_front_end" class="moneyMask" value="{{$projeto->levantamento->custo_hora_front_end ?? $mediaSalarial['FrontEnd']}}">
        </div>
        <div class="col">
            <input type="hidden" name="total_hora_front_end" value="{{$projeto->levantamento->total_hora_front_end ?? ''}}">
            <span class="total_hora_front_end">{{$projeto->levantamento->total_hora_front_end ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="sub_total_front_end" value="{{$projeto->levantamento->sub_total_front_end ?? ''}}">
            <span class="sub_total_front_end">{{getMoney($projeto->levantamento->sub_total_front_end) ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="total_front_end" value="{{$projeto->levantamento->total_front_end ?? ''}}">
            <span class="total_front_end">{{getMoney($projeto->levantamento->total_front_end) ?? ''}}</span>
        </div>
    </div>
    <div class="row" >
        <div class="col">BackEnd</div>
        <div class="col">
            <input type="text" name="custo_hora_back_end" class="moneyMask" value="{{$projeto->levantamento->custo_hora_back_end ?? $mediaSalarial['BackEnd']}}">
        </div>
        <div class="col">
            <input type="hidden" name="total_hora_back_end" value="{{$projeto->levantamento->total_hora_back_end ?? ''}}">
            <span class="total_hora_back_end">{{$projeto->levantamento->total_hora_back_end ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="sub_total_back_end" value="{{$projeto->levantamento->sub_total_back_end ?? ''}}">
            <span class="sub_total_back_end">{{getMoney($projeto->levantamento->sub_total_back_end) ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="total_back_end" value="{{$projeto->levantamento->total_back_end ?? ''}}">
            <span class="total_back_end">{{getMoney($projeto->levantamento->total_back_end) ?? ''}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col">UX</div>
        <div class="col">
            <input type="text" name="custo_hora_ux" class="moneyMask" value="{{$projeto->levantamento->custo_hora_ux ?? $mediaSalarial['UX']}}">
        </div>
        <div class="col">
            <input type="hidden" name="total_hora_ux" value="{{$projeto->levantamento->total_hora_ux ?? ''}}">
            <span class="total_hora_ux">{{$projeto->levantamento->total_hora_ux ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="sub_total_ux" value="{{$projeto->levantamento->sub_total_ux ?? ''}}">
            <span class="sub_total_ux">{{getMoney($projeto->levantamento->sub_total_ux) ?? ''}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="total_ux" value="{{$projeto->levantamento->total_ux ?? ''}}">
            <span class="total_ux">{{getMoney($projeto->levantamento->total_ux) ?? ''}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col">Gerenciamento</div>
        <div class="col">
            <input type="text" name="custo_hora_gerenciamento" class="moneyMask" value="{{$projeto->levantamento->custo_hora_gerenciamento ?? $mediaSalarial['Gerenciamento']}}">
        </div>
        <div class="col">
            <input type="hidden" name="total_hora_gerenciamento" value="{{$projeto->levantamento->total_hora_gerenciamento ?? '20.00'}}">
            <span class="total_hora_gerenciamento">{{$projeto->levantamento->total_hora_gerenciamento ?? '20.00'}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="sub_total_gerenciamento" value="{{$projeto->levantamento->sub_total_gerenciamento ?? '20.00'}}">
            <span class="sub_total_gerenciamento">{{getMoney($projeto->levantamento->sub_total_gerenciamento) ?? '20.00'}}</span>
        </div>
        <div class="col">
            <input type="hidden" name="total_gerenciamento" value="{{$projeto->levantamento->total_gerenciamento ?? '20.00'}}">
            <span class="total_gerenciamento">{{getMoney($projeto->levantamento->total_gerenciamento) ?? '20.00'}}</span>
        </div>
    </div>
    <div class="font-weight-bold row text-center bg-secondary text-light ">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"><input type="hidden" name="total_horas" value="{{$projeto->levantamento->total_horas ?? ''}}"><span class="total_horas">{{$projeto->levantamento->total_horas ?? ''}}</span></div>
        <div class="col"><input type="hidden" name="sub_total" value="{{$projeto->levantamento->sub_total ?? ''}}"><span class="sub_total">{{getMoney($projeto->levantamento->sub_total,'R$') ?? ''}}</span></div>
        <div class="col"><input type="hidden" name="total" value="{{$projeto->levantamento->total ?? ''}}"><span class="total">{{getMoney($projeto->levantamento->total, 'R$') ?? ''}}</span></div>
    </div>
</div>
<div class="comp-levantamento">
    
<div class="bg-dark font-weight-bold row text-center text-light mx-0">
    <div class="col-3 py-2 border-end border-start">Descrição</div>
    <div class="col py-2 border-end">FrontEnd</div>
    <div class="col py-2 border-end">BackEnd</div>
    <div class="col py-2 border-end">UX</div>
    <div class="col py-2 border-end">Gerenciamento</div>
</div>
@forelse($projeto->levantamento->grupos as $kGrupo => $vGrupo)
<div class="group">
    <div class="row bg-warning text-dark">
        <div class="col"><input type="text" placeholder="Nome Grupo" required name="group[]" value="{{$vGrupo->descricao}}" ></div>
    </div>

    @forelse($vGrupo->telas as $kTela => $vTela)
   
    <div class="row row-items">
        <div class="col-3 border-end border-start"><input type="text" required class="descricao" name="descricao[grupo_{{$kGrupo}}][]" autocomplete="off" value="{{$vTela->descricao}}" placeholder="..." ></div>
        <div class="col border-end"><input type="text" class="front_end porcMask" name="front_end[grupo_{{$kGrupo}}][]" autocomplete="off" value="{{$vTela->front_end}}" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="back_end porcMask" name="back_end[grupo_{{$kGrupo}}][]" autocomplete="off" value="{{$vTela->back_end}}" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="ux porcMask" name="ux[grupo_{{$kGrupo}}][]" value="{{$vTela->ux}}" autocomplete="off" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="gerenciamento porcMask" name="gerenciamento[grupo_{{$kGrupo}}][]" autocomplete="off" value="{{$vTela->gerenciamento}}" placeholder="0" ></div>
        <button class="addRow">
            <i class="fa-solid fa-plus"></i>
        </button>
        <button class="delRow">
        <i class="fa-solid fa-minus"></i>
        </button>
    </div>
    
    @empty
   
    <div class="row row-items">
        <div class="col-3 border-end border-start"><input type="text" required class="descricao" name="descricao[grupo_0][]" autocomplete="off" placeholder="..." ></div>
        <div class="col border-end"><input type="text" class="front_end porcMask" name="front_end[grupo_0][]" autocomplete="off" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="back_end porcMask" name="back_end[grupo_0][]" autocomplete="off"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="ux porcMask" name="ux[grupo_0][]" autocomplete="off"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="gerenciamento porcMask" name="gerenciamento[grupo_0][]" autocomplete="off"  placeholder="0" ></div>
        <button class="addRow">
            <i class="fa-solid fa-plus"></i>
        </button>
        <button class="delRow">
        <i class="fa-solid fa-minus"></i>
        </button>
    </div>
    @endforelse
    <div class="row-subtotal bg-secondary font-weight-bold row row-subtotal text-light">
        <div class="col-3 border-end border-start">Sub Total</div>
        <div class="col border-end total_group_front_end">{{$vGrupo->telas->sum('front_end')}}</div>
        <div class="col border-end total_group_back_end">{{$vGrupo->telas->sum('back_end')}}</div>
        <div class="col border-end total_group_ux">{{$vGrupo->telas->sum('ux')}}</div>
        <div class="col border-end total_group_gerenciamento">{{$vGrupo->telas->sum('gerenciamento')}}</div>
       
    </div>
    <div class="addGroup">
    <i class="fa-solid fa-plus"></i>
    </div>
    <div class="delGroup">
        <i class="fa-solid fa-minus"></i>
    </div>
</div>

    @empty
<div class="group">
    <div class="row bg-warning text-dark">
        <div class="col"><input type="text" placeholder="Nome Grupo" required name="group[]" ></div>
    </div>
    <div class="row row-items">
        <div class="col-3 border-end border-start"><input type="text" required class="descricao" name="descricao[grupo_0][]" placeholder="..." ></div>
        <div class="col border-end"><input type="text" class="front_end" name="front_end[grupo_0][]" autocomplete="false" placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="back_end" name="back_end[grupo_0][]"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="ux" name="ux[grupo_0][]"  placeholder="0" ></div>
        <div class="col border-end"><input type="text" class="gerenciamento" name="gerenciamento[grupo_0][]"  placeholder="0" ></div>
        <button class="addRow">
            <i class="fa-solid fa-plus"></i>
        </button>
        <button class="delRow">
        <i class="fa-solid fa-minus"></i>
        </button>
    </div>
    <div class="row-subtotal bg-secondary font-weight-bold row row-subtotal text-light">
        <div class="col-3 border-end border-start">Sub Total</div>
        <div class="col border-end total_group_front_end">0</div>
        <div class="col border-end total_group_back_end">0</div>
        <div class="col border-end total_group_ux">0</div>
        <div class="col border-end total_group_gerenciamento">0</div>
       
    </div>
    <div class="addGroup">
    <i class="fa-solid fa-plus"></i>
    </div>
    <div class="delGroup">
        <i class="fa-solid fa-minus"></i>
    </div>
</div>
@endforelse
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