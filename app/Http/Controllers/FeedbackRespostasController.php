<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\FeedbackRespostas;
use App\Models\FeedbackPessoas;

class FeedbackRespostasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:225',
            'email' => 'required|email|max:225',
            'telefone' => 'required|string|max:20',
            'positivos' => 'nullable|string',
            'negativos' => 'nullable|string',
            'duvidas' => 'nullable|string',
            'sugestoes' => 'nullable|string',
        ]);

        $pessoa = FeedbackPessoas::create([
            
            'nome' => $validatedData['nome'],
            'email' => $validatedData['email'],
            'telefone' => $validatedData['telefone']
        ]);


        $feedback = new FeedbackRespostas([

            'positivos' => $validatedData['positivos'],
            'negativos' => $validatedData['negativos'],
            'duvidas' => $validatedData['duvidas'],
            'sugestoes' => $validatedData['sugestoes'],
            'id_pessoa' => $pessoa->id,
            'id_pessoa' => 1

        ]);
      
        
        $pessoa->feedbackRespostas()->save($feedback);

        return redirect()->route('admin.feedbacks.index')->with('sucess','Feedback enviado com sucesso');
        
    }
}
