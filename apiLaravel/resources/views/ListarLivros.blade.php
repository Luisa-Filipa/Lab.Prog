@extends('layout')

@section('content')


    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="container">
                    @if(\Auth::check())
                        @if(\Auth::user()->isadmin==true)
                            <form method="get" action="{{ route('createbook') }}">
                                @csrf
                                <input class="button" type="submit" value="Adicionar Livro">
                            </form>
                        @endif
                    @endif
                </div>
                <br>
                <div class="container">
                    <table>
                        <tr>
                            <th><h1>Título</h1></th>
                            <th><h1>Editora</h1></th>
                            <th><h1>Autores</h1></th>
                            <th><h1>Categoria</h1></th>
                            @if(\Auth::check())
                                <th><h1>Estado</h1></th>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                <form method="get" action="{{ route('bookredirect') }}">
                                    @csrf
                                    <input class="input" type="text" name="titulo" placeholder="Titulo livro">
                                    <input class="button" type="submit" value="ir">
                                </form>
                            </td>
                            <td>
                                <form method="get" action="{{ route('bookredirect') }}">
                                    @csrf
                                    <input class="input" type="text" name="editora" placeholder="Nome Editora">
                                    <input class="button" type="submit" value="ir">
                                </form>
                            </td>
                            <td>
                                <form method="get" action="{{ route('bookredirect') }}">
                                    @csrf
                                    <input class="input" type="text" name="autores" placeholder="Nome Autor">
                                    <input class="button" type="submit" value="ir">
                                </form>
                            </td>
                            <td>
                                <form method="get" action="{{ route('bookredirect') }}">
                                    @csrf
                                    <input class="input" type="text" name="categoria" placeholder="Categoria">
                                    <input class="button" type="submit" value="ir">
                                </form>
                            </td>
                            @if(\Auth::check())
                                <td>
                                    <form method="get" action="{{ route('bookredirect') }}">
                                        @csrf
                                        <select name="requesitado">
                                            <option value="0">Disponível</option>
                                            <option value="1">Requesitado</option>
                                        </select>
                                       <input class="button" type="submit" value="ir">

                                    </form>
                                </td>
                            @endif
                        </tr>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->nome}}</td>
                                <td>{{$book->editora}}</td>
                                <td>{{$book->autores}}</td>
                                <td>{{$book->categoria}}</td>
                                @if(\Auth::check())

                                    @if($book->requesitado==0)

                                    <td>
                                        <form method="post" action="{{ route('requesitar', ['id'=> $book->id]) }}">
                                            @csrf
                                            <input class="button" type="submit" value="Requesitar">
                                        </form>
                                    </td>

                                    @else
                                        <td>Requesitado</td>

                                        @if(\Auth::user()->isadmin==true)
                                            <td>
                                                <form method="post" action="{{route('devolver',['id'=> $book->id])}}">
                                                    @csrf
                                                    <div>
                                                    <input class="button" type="submit" value="Devolver">
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                    @endif

                                        @if(\Auth::user()->isadmin==true)
                                            <td>
                                                <form method="post" action="{{route('deletebook',['id'=> $book->id])}}">
                                                    @csrf
                                                    @method('delete')
                                                    <div>
                                                    <input class="button" type="submit" value="Eliminar">
                                                    </div>
                                                </form>
                                            </td>
                                        @endif
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
