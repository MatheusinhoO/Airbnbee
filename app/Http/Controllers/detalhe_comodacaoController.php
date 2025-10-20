<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\detalhe_c;

class detalhe_comodacaoController extends Controller
{
    public function cadastro_detalhes(Request $request){
        return view('detalhes_da_comodacao');
    }

    public function cadastrar_detalhes(Request $request){
        $detalhe = new detalhe_c();
        $detalhe->titulo = $request->input('titulo');
        $detalhe->descricao = $request->input('descricao');
        $detalhe->destaques = $request->input('destaques');
        $detalhe->comodidades_oferecidas = $request->input('comodidade_oferecidas');
        $detalhe->permite_fumar = $request->input('permite_fumar');
        $detalhe->permite_festa = $request->input('permite_festa');
        $detalhe->permite_animais = $request->input('permite_animais');
        $detalhe->horario_check_in = $request->input('horario_check_in');
        $detalhe->horario_check_out = $request->input('horario_check_out');
        $detalhe->save();

        return redirect('/informações_basicas');
    }

        public function atualizar_detalhe($id)
    {
        $detalhe = detalhe_c::find($id);

        return view('atualizar_detalhes_comodacao')->with('detalhe', $detalhe);
    }

    public function atualizar_detalhe_c(Request $request)
    {
    
        $detalhe = detalhe_c::find($request->id_detalhe);

        $detalhe->titulo = $request->input('titulo');
        $detalhe->descricao = $request->input('descricao');
        $detalhe->destaques = $request->input('destaques');
        $detalhe->comodidades_oferecidas = $request->input('comodidade_oferecidas');
        $detalhe->permite_fumar = $request->input('permite_fumar');
        $detalhe->permite_festa = $request->input('permite_festa');
        $detalhe->permite_animais = $request->input('permite_animais');
        $detalhe->horario_check_in = $request->input('horario_check_in');
        $detalhe->horario_check_out = $request->input('horario_check_out');
        $detalhe->save();

        return redirect('/anuncio');
    }

    public function deletar_detalhes_comodacoes($id){
        $detalhe = detalhe_c::find($id);

        return view('deletar_detalhes_comodacoes')->with('detalhe', $detalhe);
  }

    public function deletar_detalhe(request $request){
      detalhe_c::where('id',$request->id_detalhe)->delete();

      return redirect('/login');
  }
}
