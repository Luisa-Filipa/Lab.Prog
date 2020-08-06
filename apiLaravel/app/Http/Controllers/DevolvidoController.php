<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevolvidoController extends Controller
{
    public function index(){
        $userId= \Auth::user()->id;

        return view('ListarRequesitados',['requesitados'=>\DB::table('requesitados')->where('idUser',$userId)->paginate(25)]);
    }

    public function edit($id){
        $bookId = $id;
        $this->update($bookId);
        return redirect('/books');

    }

    public function update($bookId){
        \DB::table('books')->where('id',$bookId)->update(['requesitado'=> 0]);
    }

    public function redirect(){
        return redirect('/home');
    }

}
