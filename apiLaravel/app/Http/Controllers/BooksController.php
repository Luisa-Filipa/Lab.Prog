<?php

namespace App\Http\Controllers;

use App\books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        return view('ListarLivros',['books'=> \DB::table('books')->paginate(25)]);
    }

    public function booksredirect(Request $params){
        if($params->titulo!=null){
            return view('ListarLivros',['books'=> \DB::table('books')-> where('nome',$params->titulo)->paginate(25)]);
        }elseif ($params->autores!=null){
            return view('ListarLivros',['books'=> \DB::table('books')-> where('autores',$params->autores)->paginate(25)]);
        }elseif ($params->editora!=null) {
            return view('ListarLivros', ['books' => \DB::table('books')->where('editora', $params->editora)->paginate(25)]);
        }elseif ($params->categoria!=null) {
            return view('ListarLivros', ['books' => \DB::table('books')->where('categoria', $params->categoria)->paginate(25)]);
        }elseif ($params->requesitado!=null && \Auth::check()) {
            return view('ListarLivros', ['books' => \DB::table('books')->where('requesitado', $params->requesitado)->paginate(25)]);
        }else{
            return view('ListarLivros',['books'=> \DB::table('books')->paginate(25)]);
        }
    }


    public function delete($id)
    {
        \DB::table('books')->where(['id' => $id])->delete();
        \DB::table('requesitados')->where(['idLivro' => $id,])->delete();
        return view('ListarLivros',['books'=> \DB::table('books')->paginate(25)]);
    }

    public function create(){
        if(\Auth::check()) {
            if (\Auth::user()->isadmin == true) {
                return view('CreateBook');
            } else {
                return redirect('/home');
            }
        }
        return redirect('/home');
    }

    public function insert(){
        if(\Auth::user()->isadmin==true){
            $book=new books();
            $book->nome=request('titulo');
            $book->editora=request('editora');
            $book->autores=request('autor');
            $book->categoria=request('categoria');
            $book->save();
            return redirect('/home');
        }else{
            return redirect('/home');
        }
    }

    public function redirect(){
        return redirect('/home');
    }
}
