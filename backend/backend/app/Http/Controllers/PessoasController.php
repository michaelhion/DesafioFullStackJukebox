<?php

namespace App\Http\Controllers;

use App\Models\Pessoas as Pessoas;
use App\Http\Resources\PessoasResource as PessoasResource;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index(){
        $pessoa = Pessoas::paginate(15);
        return PessoasResource::collection($pessoa);
    }
    
      public function show($id){
        $pessoa = Pessoas::find( $id );
        if ($pessoa != null) {
        return new PessoasResource( $pessoa );
        } else {
          return response()->json([
            'resp' => 'id não localizado'
          ], 404);
        }
        
        
      }
    
      public function store(Request $request){
        $pessoa = new Pessoas;
        $pessoa->nome = $request->input('nome');
        $pessoa->sobrenome = $request->input('sobrenome');
        $pessoa->email = $request->input('email');
        $pessoa->telefone = $request->input('telefone');
        $pessoa->pessoaJuridica = $request->input('pessoaJuridica');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->cnpj = $request->input('cnpj');
    
        if( $pessoa->save() ){
          return new PessoasResource( $pessoa );
        }
      }
    
       public function update(Request $request){
        $pessoa = Pessoas::find( $request->id );
        if ($pessoa !=null) {
          $pessoa->nome = $request->input('nome');
          $pessoa->sobrenome = $request->input('sobrenome');
          $pessoa->email = $request->input('email');
          $pessoa->telefone = $request->input('telefone');
          $pessoa->pessoaJuridica = $request->input('pessoaJuridica');
          $pessoa->cpf = $request->input('cpf');
          $pessoa->cnpj = $request->input('cnpj');
    
        if( $pessoa->save() ){
          return new PessoasResource( $pessoa );
        }
        } else {
          return response()->json([
            'resp' => 'id não localizado'
          ], 404);
        }
        
        
      } 
    
      public function destroy($id){
        $pessoa = Pessoas::find( $id );
        if ($pessoa != null) {
          if( $pessoa->delete() ){
            return new PessoasResource( $pessoa );
          }
        } else {
          return response()->json([
            'resp' => 'id não localizado'
          ], 404);
        }
        
        
    
      }
}
