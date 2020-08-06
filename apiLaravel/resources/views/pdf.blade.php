<div class="container">
    <h1>
        Livros Requesitados
    </h1>

    <table autosize="1">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editora</th>
            <th>Categoria</th>
            <th>Data Requisição</th>
        </tr>

        @foreach($books as $requesitado)
            <tr>
                @php
                    $book=\DB::table('books')->find($requesitado->idLivro);
                @endphp
                <td>{{$book->nome}}</td>
                <td>{{$book->editora}}</td>
                <td>{{$book->autores}}</td>
                <td>{{$book->categoria}}</td>
                <td>{{$requesitado->created_at}}</td>
            </tr>
        @endforeach

    </table>
</div>
