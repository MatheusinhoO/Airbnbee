<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\informacoes_basicas; 

class informacao_basicaController extends Controller
{
  public function cadastro_informacoes_basicas(Request $request){
        return view('informacoes_basicas');
    }

    public function cadastrar_informacao_basicas(Request $request){
        $informacao = new informacoes_basicas();
        $informacao->propriedade_tipo = $request->input('propriedade_tipo');
        $informacao->acomodacoes_tipo = $request->input('acomodacoes_tipo');
        $informacao->capacidade_hospedes = $request->input('capacidade_hospedes');
        $informacao->quartos_quantidade = $request->input('quartos_quantidade');
        $informacao->camas_quantidade = $request->input('camas_quantidade');
        $informacao->banheiros_quantidade = $request->input('banheiros_quantidade');
        $informacao->preco_noite = $request->input('preco_noite');
        $informacao->politica_cancelamento= $request->input('politica_cancelamento');
        $informacao->save();

        return redirect('/localização');
    }  

        public function atualizar_informacao($id)
    {
        $informacao = informacoes_basicas::find($id);

        return view('atualizar_informacoes_basicas')->with('informacao', $informacao);
    }

    public function atualizar_informacao_basicas(Request $request)
    {
    
        $informacao = informacoes_basicas::find($request->id_informacao);

        $informacao->propriedade_tipo = $request->input('propriedade_tipo');
        $informacao->acomodacoes_tipo = $request->input('acomodacoes_tipo');
        $informacao->capacidade_hospedes = $request->input('capacidade_hospedes');
        $informacao->quartos_quantidade = $request->input('quartos_quantidade');
        $informacao->camas_quantidade = $request->input('camas_quantidade');
        $informacao->banheiros_quantidade = $request->input('banheiros_quantidade');
        $informacao->preco_noite = $request->input('preco_noite');
        $informacao->politica_cancelamento= $request->input('politica_cancelamento');
        $informacao->save();
        return redirect('/atualizar_localizacao/');
    }

        public function deletar_informacoes_basicas($id){
        $informacao = informacoes_basicas::find($id);

        return view('deletar_informacoes_basicas')->with('informacao', $informacao);
  }

    public function deletar_informacoes(request $request){
      informacoes_basicas::where('id',$request->id_informacao)->delete();

      return redirect('/localizacao_deletar/');
  }
}
