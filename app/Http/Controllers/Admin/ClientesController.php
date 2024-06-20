<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\ClientesContatos;
use Illuminate\Http\Request;
use Auth;
class ClientesController extends Controller
{
    public function index(Request $request){
        $clientes = Clientes::orderBy('nome','asc')->paginate();
        return view('admin.clientes.index',compact('clientes'));
    }
    public function lista(Request $request){
        $clientes = Clientes::orderBy('nome','asc')->paginate();
        return view('admin.clientes._lista',compact('clientes'));
    }
    public function new(Request $request){
        return view('admin.clientes.new');
    }
    public function edit(Request $request,$id){
        $cliente = Clientes::find($id);
        return view('admin.clientes.edit',compact('cliente'));
    }
    public function delete(Request $request,$id){
        $cliente = Clientes::find($id);
        if($cliente->projetos->count() == 0){
            Clientes::where('id',$id)->delete();
        }else{
            Clientes::where('id',$id)->update(['
            status'=>'inativo']);
        }
        
    }
    public function store (Request $request){
     $data = $request->except('_token');
     $contatos = array_filter($data['contatos']) ?? null;
   
     unset($data['contatos']);
     $data['id_empresa'] = Auth::user()->id_empresa;
     $cliente = Clientes::create($data);
    
        foreach($contatos['nome'] as $k => $v){

          if($contatos['nome'][$k]){
            ClientesContatos::create([
                'id_cliente'=>$cliente->id,
                'nome'=>$contatos['nome'][$k],
                'telefone'=>$contatos['telefone'][$k],
                'celular'=>$contatos['celular'][$k],
                'email'=>$contatos['email'][$k],
                'observacoes'=>$contatos['observacoes'][$k],
            ]);
        
        }
    }
      
    }
    public function update (Request $request,$id){
     $data = $request->except('_token');
     $contatos = $data['contatos'];
     
     unset($data['contatos']);
     $cliente = Clientes::where('id',$id)->update($data);
     ClientesContatos::where('id_cliente',$id)->delete();
        foreach($contatos['nome'] as $k => $v){
            ClientesContatos::create([
                'id_cliente'=>$id,
                'nome'=>$contatos['nome'][$k],
                'telefone'=>$contatos['telefone'][$k],
                'celular'=>$contatos['celular'][$k],
                'email'=>$contatos['email'][$k],
                'observacoes'=>$contatos['observacoes'][$k],
            ]);
        }

      
    }
}
