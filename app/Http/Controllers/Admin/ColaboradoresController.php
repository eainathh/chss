<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use App\Models\DadosColaboradores;
use App\Models\Projetos;
use App\Models\ProjetosDevs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Image; //Intervention Image
use Illuminate\Support\Facades\Storage; //Laravel Filesystem
use Illuminate\Support\Str;
class ColaboradoresController extends Controller
{
    public function index(){
        $colaboradores = User::where('id_empresa',Auth::user()->id_empresa)->where('role','user')->paginate();
     
        return view('admin.colaboradores.index',compact('colaboradores'));
    }
    public function new(){
        return view('admin.colaboradores.new');
    }
    public function uploadProfile(Request $request){
        $arrayFile = array();
       
        $data = $request->all();
        $file = $request->file;
      
      
		$imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];


            $e = explode(".",$file->getClientOriginalName());
            $n = str_replace(end($e), "", $file->getClientOriginalName());
            $newName =  session()->getId() . ".".end($e) ;
            $request->session()->put('foto', $newName);
			$extension = strtolower(end($e));
            $fileName =  $newName;
            $arrayFile[] = $fileName;
            $file->move("storage/profiles/",$fileName);

			if(in_array($extension, $imageExtensions))
			{
            if(@is_array(getimagesize("storage/profiles/".$fileName))){
	            Image::configure(array('driver' => 'imagick'));
	            $width = Image::make("storage/profiles/".$fileName)->width();
				if($width > 512){
		            $image = Image::make("storage/profiles/".$fileName)->resize(512, null,function ($constraint) {
		                $constraint->aspectRatio();
		            });
	           		$image->save("storage/profiles/".$fileName,85);
	             }
	            
        	}
			}
        
        return response()->json($arrayFile);
    }
    public function store(Request $request){
        $data = $request->except('_token');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'salario' => 'required',
        ]);
        $password = Str::password(10);

        $data['password'] = Hash::make($password);
        $data['id_empresa'] = Auth::user()->id_empresa;
        $user =  User::create($data);
        if($data['salario'] != ""){
            $salario = saveMoney($data['salario']);
            $valor_hora = $salario / $data['horas_mes'];
        }else{
            $salario = '0.00';
            $valor_hora =  $data['valor_hora'];
        }
        DadosColaboradores::create([
            'id_user' => $user->id,
            'salario' => $salario,
            'horas_mes' => $data['horas_mes'],
            'valor_hora' => $valor_hora,
            'funcao'=>$data['funcao'],
            'nivel'=>$data['nivel'],
            'regime'=>$data['regime'],
            'foto' => base64_encode($data['foto-user']),
            'observacoes'=>$data['observacoes'],
            'data_contratacao'=>$data['data_contratacao'],
        ]);
        
         $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
        ];

        Mail::to($user->email)->send(new UserRegistered($data));
    }
    public function update(Request $request,$id){
        $data = $request->except('_token');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'salario' => 'required',
        ]);
        $user =  User::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'status'=>$data['status'] ?? 'inativo',
        ]);
        
        if($data['salario'] != ""){
            $salario = saveMoney($data['salario']);
            $valor_hora = $salario / $data['horas_mes'];
        }else{
            $salario = '0.00';
            $valor_hora =  $data['valor_hora'];
        }
        DadosColaboradores::where('id_user',$id)->update([
            'salario' => $salario,
            'horas_mes' => $data['horas_mes'],
            'valor_hora' => $valor_hora,
            'funcao'=>$data['funcao'],
            'nivel'=>$data['nivel'],
            'regime'=>$data['regime'],
            'foto' => base64_encode($data['foto-user']),
            'observacoes'=>$data['observacoes'],
            'data_contratacao'=>$data['data_contratacao'],
        ]);
        
        return response()->json(['status'=>'ok']);
    }
    public function edit(Request $request,$id){
        $user = User::find($id);
        $projetosDisponiveis = Projetos::doesntHave('projetosDevs')->get();
        $projetosAssociados = Projetos::whereHas('projetosDevs')->get();
      
        return view('admin.colaboradores.edit',compact('user','projetosDisponiveis','projetosAssociados'));
    }

    public function storeAssociacao(Request $request,$id){
        $data = $request->except('_token');
        $request->validate([
            'id_projeto' => 'required',
            
        ]);
        ProjetosDevs::create([
            'id_projeto'=>$data['id_projeto'],
            'id_dev'=>$id
        ]);
        $projetosAssociados = Projetos::whereHas('projetosDevs')->get();

        return view('admin.colaboradores.include._lista-projetos',compact('projetosAssociados'));

    }
}
