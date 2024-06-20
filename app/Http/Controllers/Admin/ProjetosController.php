<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Projetos;
use App\Models\ProjetosPagamentos;
use App\Models\Telas;
use App\Models\TelasGrupos;
use App\Models\TelasLevantamento;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Auth;
class ProjetosController extends Controller
{
  
    public function index(){
        $projetos = Projetos::all();
       
        return view('admin.projetos.index',compact('projetos'));
    }
    public function lista(Request $request){
        $projetos = Projetos::orderBy('nome','asc')->paginate();
        return view('admin.projetos._lista',compact('projetos'));
    }
    public function new(Request $request){
        $clientes = Clientes::where('status','ativo')->orderBy('nome','asc')->get();
        $countProjects = Projetos::count();

        $nextCode = (str_pad(($countProjects  + 1) , 4, 0, STR_PAD_LEFT));
        return view('admin.projetos.new',compact('clientes','nextCode'));
    }
    public function edit(Request $request,$id){
        $projeto = Projetos::find($id);
        $clientes = Clientes::where('status','ativo')->orderBy('nome','asc')->get();
        $mediaSalarial = [
            'FrontEnd' => Auth::user()->empresa->mediaSalarial('FrontEnd'),
            'BackEnd' => Auth::user()->empresa->mediaSalarial('BackEnd'),
            'UX' => Auth::user()->empresa->mediaSalarial('UX'),
            'Gerenciamento' => Auth::user()->empresa->mediaSalarial('Gerenciamento'),
        ];
        $equipe = User::where('id_empresa',Auth::user()->id_empresa)->where('role','user')->doesntHave('projetos')->whereHas('dados')->get();
        
        return view('admin.projetos.edit',compact('projeto','clientes','mediaSalarial','equipe'));
    }
    public function store(Request $request){
        $data = $request->except('_token');
        $pagamentos = $data['pagamento'] ?? null;
        unset($data['pagamento']);
      
        $projeto = Projetos::create([
            'id_empresa' => Auth::user()->id_empresa,
            'nome'=>$data['nome'],
            'codigo'=>$data['pref_code'] . '-'. $data['suf_code'],
            'descricao'=>$data['descricao'],
            'id_cliente'=>$data['id_cliente'],
            'valor'=>saveMoney($data['valor']),
            'id_vendedor'=>Auth::id(),
        ]);
        TelasLevantamento::create(['id_projeto'=> Auth::user()->id_empresa]);
        if($pagamentos){
            foreach($pagamentos['valor'] as $k => $v){
                ProjetosPagamentos::create([
                    'id_projeto'    => $projeto->id,
                    'valor'         => saveMoney($pagamentos['valor'][$k]),
                    'vencimento'    => $pagamentos['vencimento'][$k],
                    
                ]);
            }
        }
        return response()->json([
            'url'   =>  route('admin.projetos.edit',['id'=>$projeto->id]),
        ]);
    }

    public function levantamento(Request $request,$id){
        $data = $request->except('_token');
    
       $levantamento = TelasLevantamento::updateOrCreate([
            'id_projeto'=>$id]
            ,[
            'markup'=>$data['markup'],
            'custo_hora_front_end'=>saveMoney($data['custo_hora_front_end']),
            'total_hora_front_end'=>saveMoney($data['total_hora_front_end']),
            'sub_total_front_end'=>saveMoney($data['sub_total_front_end']),
            'total_front_end'=>saveMoney($data['total_front_end']),
            'custo_hora_back_end'=>saveMoney($data['custo_hora_back_end']),
            'total_hora_back_end'=>saveMoney($data['total_hora_back_end']),
            'sub_total_back_end'=>saveMoney($data['sub_total_back_end']),
            'total_back_end'=>saveMoney($data['total_back_end']),
            'custo_hora_ux'=>saveMoney($data['custo_hora_ux']),
            'total_hora_ux'=>saveMoney($data['total_hora_ux']),
            'sub_total_ux'=>saveMoney($data['sub_total_ux']),
            'total_ux'=>saveMoney($data['total_ux']),
            'custo_hora_gerenciamento'=>saveMoney($data['custo_hora_gerenciamento']),
            'total_hora_gerenciamento'=>saveMoney($data['total_hora_gerenciamento']),
            'sub_total_gerenciamento'=>saveMoney($data['sub_total_gerenciamento']),
            'total_gerenciamento'=>saveMoney($data['total_gerenciamento']),
            'total_horas'=>saveMoney($data['total_horas']),
            'sub_total'=>saveMoney($data['sub_total']),
            'total'=>saveMoney($data['total']),
       ]);
       TelasGrupos::where('id_levantamento',$levantamento->id)->delete();
       foreach($data['group'] as $k => $v){
       $grupo =  TelasGrupos::create([
            'id_levantamento'=>$levantamento->id,
                'descricao'=>$v, 
            ]);
            Telas::where('id_grupo',$grupo->id)->delete();
           foreach($data['descricao']['grupo_'.$k] as $kG => $vG){
                Telas::create([
                    'id_grupo'      => $grupo->id,
                    'descricao'     => $vG,
                    'front_end'     => $data['front_end']['grupo_'.$k][$kG],
                    'back_end'      => $data['back_end']['grupo_'.$k][$kG],
                    'ux'            => $data['ux']['grupo_'.$k][$kG],
                    'gerenciamento' => $data['gerenciamento']['grupo_'.$k][$kG],
                ]);
           }
       }
    }
    public function equipe(Request $request){
        $data = $request->except('_token');
    }
}
