<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEquipaRequest;
use App\Models\Equipa;
use App\Http\Requests\NewEquipaRequest;
use Illuminate\Http\Request;

class EquipaController extends Controller
{
    public function index()
        {
            $equipa  = Equipa::all();
            
            return view('equipa', ['equipa' => $equipa]);
        }

        public function show($id){
            $equipa = Equipa::findOrFail($id);
            
            return view('detalhesEquipa',['equipa' => $equipa]);
        }


        public function create()
        
        {
            return view('createEquipa');
        }


        public function store(Request $request)
        {
            
            $nome = request('nome');
            $pilotos = request('pilotos');
            
            $img = " ";
            if($request->has('img'))
            {
                $image = $request->file('img');

                $iname = 'equip'.'_'.time();
                $folder = '/img/equipas/';
                $fileName = $iname.'.'.$image->getClientOriginalExtension();
                $filePath = $folder.$fileName;

                $image->storeAs($folder,$fileName,'public');
                $img = "/storage/".$filePath; 
            }

            $equipa = new Equipa();

            $equipa->nome = $nome;
            $equipa->pilotos = $pilotos;
            $equipa->img = $img;

            $equipa->save();

            return redirect('/equipa')->with('mssg','Equipa Criado');
            
        }



        public function destroy($id)
        {
            $equipa = Equipa::findOrFail($id);
            $equipa->delete();
            return redirect('/equipa');
        }

    

}
