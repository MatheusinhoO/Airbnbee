<?php

namespace App\Http\Controllers;

use App\models\localizacao;
use Illuminate\Http\Request;

class localizacaoController extends Controller
{
    public function cadastro_localizacao(Request $request)
    {
        return view('localizacao');
    }

    public function cadastrar_localizacao(Request $request)
    {
        $locacao = new localizacao;
        $locacao->endereco = $request->input('endereco');
        $locacao->entrega_chave_metodo = $request->input('entrega_chave_metodo');
        $locacao->informacao_estacionamento = $request->input('informacao_estacionamento');
        $locacao->calendario_disponibilidade = $request->input('calendario_disponibilidade');
        $locacao->duracao_estadia = $request->input('duracao_estadia');
        $locacao->save();

        return redirect('/tabela_basica');
    }

    public function atualizar_localizacao($id)
    {
        $locacao = localizacao::find($id);

        return view('atualizar_localizacao')->with('locacao', $locacao);
    }

    public function atualizar_locacao(Request $request)
    {
    
        $locacao = localizacao::find($request->id_localizacao);

        $locacao->endereco = $request->endereco;
        $locacao->entrega_chave_metodo = $request->entrega_chave_metodo;
        $locacao->informacao_estacionamento = $request->informacao_estacionamento;
        $locacao->calendario_disponibilidade = $request->calendario_disponibilidade;
        $locacao->duracao_estadia = $request->duracao_estadia;
        $locacao->save();

        return redirect('/tabela_basica');
    }

    public function deletar_localizacao($id){
        $locacao = localizacao::find($id);

        return view('deletar_localizacao')->with('locacao',$locacao);
  }

    public function deletar_locacao(request $request){
      localizacao::where('id',$request->id_localizacao)->delete();

      return redirect('/tabela_basica');
  }


    public function mostra_localizacao(Request $request){
        $locacao= localizacao::get()->all();
        return view('tabela_basica')->with('locacao',$locacao);
  }

      public function mostra_localizacao_filtro(Request $request){
        $locacao= localizacao::where('endereco','LIKE','%'.$request->sua_locacao.'%')->get()->all();
        return view('tabela_basica')->with('locacao',$locacao);
  }

}