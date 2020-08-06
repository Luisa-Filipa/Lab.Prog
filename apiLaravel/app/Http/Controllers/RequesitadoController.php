<?php

namespace App\Http\Controllers;

use App\Mail\MailController;
use Auth;
use Illuminate\Http\Request;

class RequesitadoController extends Controller
{
    public function index(){
        if(\Auth::check()){
            $userId= \Auth::user()->id;

            return view('ListarRequesitados',['requesitados'=>\DB::table('requesitados')->where('idUser',$userId)->paginate(25)]);
        }

        return redirect('/books');

    }

    public function indexadmin(){
        if(\Auth::check()){
            if(\Auth::user()->isadmin==true){
                return view('ListarTodosRequesitados',['requesitados'=>\DB::table('requesitados')->paginate(25)]);
            }
            return view('livrosrequesitados',['requesitados'=>\DB::table('requesitados')->paginate(25)]);
        }
        return redirect('/books');
    }

    public function edit($id){
        if(\Auth::check()){

            $userId= \Auth::user()->id;
        $bookId = $id;
        $this->update($userId,$bookId);
        return redirect('/books');
        }
        return redirect('/books');
    }

    public function update($userId,$bookId){
        $created_at=now();
        \DB::table('books')->where('id',$bookId)->update(['requesitado'=> 1]);
        \DB::table('requesitados')->insert(['idUser'=> $userId,'idLivro'=> $bookId,'created_at' => $created_at, 'updated_at' => $created_at]);
    }

    public function redirect(){
        return redirect('/home');
    }
}
