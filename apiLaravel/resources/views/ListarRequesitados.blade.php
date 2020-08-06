@extends('layout')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="container">
                    <table>
                        <tr>
                            <th><h2>Título</h2></th>
                            <th><h2>Editora</h2></th>
                            <th><h2>Autores</h2></th>
                            <th><h2>Categoria</h2></th>
                            <th><h2>Data Requisição</h2></th>
                        </tr>

                        @foreach($requesitados as $requesitado)
                            <tr>
                                @php
                                    $book=\DB::table('books')->where('id',$requesitado->idLivro)->first();
                                @endphp
                                <td>{{$book->nome}}</td>
                                <td>{{$book->editora}}</td>
                                <td>{{$book->autores}}</td>
                                <td>{{$book->categoria}}</td>
                                <td>{{$requesitado->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $requesitados->links() }}
                </div>
            </div>
            <p></p>
            <div id="content">
                <div class="container">
                    <br><br>
                    <button type="submit" class="fa fa-bookmark-o" aria-hidden="true"><a href="{{route('booksavepdf')}}">Guardar PDF</a></button>
                    <button type="submit" class="fa fa-eye" aria-hidden="true"><a href="{{route('bookopenpdf')}}" target="_blank">Visualizar PDF</a> </button>
                    <button type="submit" class="fa fa-share" aria-hidden="true"><a href="{{route('booksendpdf')}}">Enviar PDF</a></button>
                    <p></p>
                </div>
            </div>

@endsection
