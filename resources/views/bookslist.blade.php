<div class="card mb-3">
    <img src="https://public.oed.com/wp-content/uploads/rainbow-research-reading-blog-header-1130x400.jpg" class="card-img-top" style="border-radius: 10px;" alt="...">
    <div class="card-body">
        <h5 class="card-title">Lista de livros</h5>
        <p class="card-text">Aqui você pode encontrar todas as informações sobre livros no sistema.</p>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Autor</th>
                <th scope="col">Gênero</th>
                <th scope="col">Editora</th>
                <th scope="col">Título</th>
                <th scope="col">Lançamento</th>
                <th scope="col">Operações</th>

            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->autor }}</td>
                    <td>{{ $book->genero }}</td>
                    <td>{{ $book->editora }}</td>
                    <td>{{ $book->titulo }}</td>
                    <td>{{ $book->ano_lancamento }}</td>
                    <td>

                        <a href="{{ url('/edit/'.$book->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>






