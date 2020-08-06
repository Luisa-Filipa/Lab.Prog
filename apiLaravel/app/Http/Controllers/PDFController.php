<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use App\Mail\MailController;

class PDFController extends Controller
{
    public function pdf($opcao){
        $userId= \Auth::user()->id;
        $books=\DB::table('requesitados')->where('idUser',$userId)->get();
        $view=\View::make('pdf',['books'=> $books, 'user' => \Auth::user()->nome]);
        $html=$view->render();
        $pdf=new TCPDF();
        $pdf::SetTitle('Livros Requesitados');
        $pdf::AddPage();
        $pdf::writeHTML($html,true,false,true,false,'');

        if ($opcao=='D'){
            return $pdf::Output('Livros.pdf','D');
        }elseif ($opcao=='S'){
            return $pdf::Output('Livros.pdf','S');
        }else{
            return $pdf::Output('Livros.pdf');
        }
    }

    public function save(){
        if(\Auth::check()){
            $this->pdf('D');
        }else{
            return redirect('\home');
        }
    }

    public function open(){
        if(\Auth::check()){
            $this->pdf(null);
        }else{
            return redirect('\home');
        }
    }

    public function send(){
        if(\Auth::check()){
            \Mail::to(\Auth::user()->email)->send(new MailController($this->pdf('S')));
            return redirect()->back();
        }else{
            return redirect('\home');
        }
    }

}
