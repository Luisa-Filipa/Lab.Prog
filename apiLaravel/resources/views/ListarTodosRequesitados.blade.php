@extends('layout')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="container">
                    <button type="submit" class="fa fa-bookmark-o" aria-hidden="true"><a href="{{route('booksavepdf')}}">Guardar PDF</a></button>
                    <button type="submit" class="fa fa-eye" aria-hidden="true"><a href="{{route('bookopenpdf')}}" target="_blank">Visualizar PDF</a></button>
                    <button type="submit" class="fa fa-share" aria-hidden="true"><a href="{{route('booksendpdf')}}">Enviar PDF</a></button>
                </div>

                <div class="container">
                    <table>
                        <tr>
                            <th>Título</th>&nbsp;
                            <th>Editora</th>&nbsp;
                            <th>Autores</th>&nbsp;&nbsp;&nbsp;
                            <th>Categoria</th>&nbsp;
                            <th>Data Requisição</th>&nbsp;
                            <th>Utilizador</th>&nbsp;
                            <th>Email</th>&nbsp;
                        </tr>

                        @foreach($requesitados as $requesitado)
                            <tr>
                                @php
                                    $book=\DB::table('books')->where('id',$requesitado->idLivro)->first();
                                    $user=\DB::table('users')->where('id',$requesitado->idUser)->first();
                                @endphp
                                <td>{{$book->nome}}</td>
                                <td>{{$book->editora}}</td>
                                <td>{{$book->autores}}</td>
                                <td>{{$book->categoria}}</td>
                                <td>{{$requesitado->created_at}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $requesitados->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
