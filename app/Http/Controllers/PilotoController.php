<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPilotoRequest;
use App\Models\Piloto;
use App\Http\Requests\NewPilotoRequest;
use Illuminate\Http\Request;


class PilotoController extends Controller
{
    public function index()
        {
            $piloto  = Piloto::all();
            
            return view('piloto', ['piloto' => $piloto]);
        }

        public function show($id){
            $piloto = Piloto::findOrFail($id);
            
            return view('detalhesPiloto',['piloto' => $piloto]);
        }


        public function create()
        {

            $user = auth()->user();
            $userPilotos=$user->pilotos;
            if($userPilotos->count()>=env('MAX_PILOTOS'))
            {
                return redirect('/home')->with('mssg','Não pode criar mais pilotos');
            }

            return view('createPiloto');
        }

        public function edit($id)
        {
            $piloto = Piloto::findOrFail($id);

            return view('createPiloto',['piloto'=>$piloto]);
        }


        public function store(Request $request)
        {
            
            $nome = request('nome');
            $nacionalidade = request('nacionalidade');
            $idade = request('idade');
            $equipa = request('equipa');
            
            $img = " ";
            if($request->has('img'))
            {
                $image = $request->file('img');

                $iname = 'pilo'.'_'.time();
                $folder = '/img/pilotos/';
                $fileName = $iname.'.'.$image->getClientOriginalExtension();
                $filePath = $folder.$fileName;

                $image->storeAs($folder,$fileName,'public');
                $img = "/storage/".$filePath; 
            }
            
            

            $piloto = new Piloto();

            $piloto->nome = $nome;
            $piloto->nacionalidade = $nacionalidade;
            $piloto->idade = $idade;
            $piloto->equipa = $equipa;
            $piloto->img = $img;

            $piloto->save();

            return redirect('/piloto')->with('mssg','Piloto Criado');
            
        }


        public function update($id,EditPilotoRequest $request)
        {
            $nome = request('nome');
            $nacionalidade = request('nacionalidade');
            $idade = request('idade');
            $equipa = request('equipa');

            $changed = request('changed');

            $piloto = Piloto::findOrFail($id);

            if($changed=='true')
            {
                $img = " ";
                if($request->has('img'))
                {
                    $image = $request->file('img');

                    $iname = 'pilo'.'_'.time();
                    $folder = '/img/pilotos/';
                    $fileName = $iname.'.'.$image->getClientOriginalExtension();
                    $filePath = $folder.$fileName;

                    $image->storeAs($folder,$fileName,'public');
                    $img = "/storage/".$filePath; 
                }
                
                $piloto->img=$img;
            }
            


            $piloto->nome = $nome;
            $piloto->nacionalidade = $nacionalidade;
            $piloto->idade = $idade;
            $piloto->equipa = $equipa;

            $piloto->save();

            return redirect("/piloto/$id")->with('mssg','Piloto Criado');
            
        }


        public function destroy($id)
        {
            $piloto = Piloto::findOrFail($id);
            $piloto->delete();
            return redirect('/piloto');
        }

    

}
