@extends('layout')

@section('content')


    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="container">
                    <form method="post" action="{{route('addbook')}}">
                        @csrf
                        <input type="text" placeholder="titulo" name="titulo">
                        <input type="text" placeholder="autor" name="autor">
                        <input type="text" placeholder="editora" name="editora">
                        <input type="text" placeholder="categoria" name="categoria">
                        <input class="button" type="submit" value="Adicionar">
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
