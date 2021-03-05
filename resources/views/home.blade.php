<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Library system</title>
</head>
<body>
@include("navbar")

<div class="row header-container justify-content-center">
    <div class="header">
        <h1>Library Management System</h1>
    </div>
</div>

@if($layout == 'index')
    <div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                    @include("bookslist")
                </section>
            </div>
        </div>
    </div>
@elseif($layout == 'create')
    <div class="container-fluid mt-4 " id="create-form">
        <div class="row">
            <section class="col-md-7">
                @include("bookslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <img src="https://media.wired.com/photos/5be4cd03db23f3775e466767/master/w_2560%2Cc_limit/books-521812297.jpg" class="card-img-top" style="border-radius: 10px;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Digite as informações do novo livro.</h5>
                        <form action="{{ url('/store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Autor</label>
                                <input name="autor" type="text" class="form-control" disabled value="{{ Auth::user()->name }}" placeholder="Enter autor">
                            </div>
                            <div class="form-group">
                                <label>Gênero</label>
                                <select name="genero" required class="form-select form-control">
                                @if($categories->isEmpty())
                                    <option disabled value="null">Nenhum gênero cadastrado</option>
                                @endif
                                    @foreach($categories as $categoria)
                                        <option value="{{ $categoria->categoria }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Editora</label>
                                <select name="nome_editora" required class="form-select form-control">
                                @if($editoras->isEmpty())
                                    <option disabled value="null">Nenhuma editora cadastrada</option>
                                @endif
                                    @foreach($editoras as $editora)
                                       <option value="{{ $editora->nome_editora }}">{{ $editora->nome_editora }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Título</label>
                                <input name="titulo" type="text" class="form-control" required placeholder="Título do livro">
                            </div>
                            <div class="form-group">
                                <label>Ano de Lançamento</label>
                                <input name="ano_lancamento" onkeypress="numbers(event)" required type="text" maxlength="4" class="form-control"  placeholder="Ano de lançamento (AAAA)">
                            </div>
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">

                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
@elseif($layout == 'show')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col">
                @include("bookslist")
            </section>
            <section class="col"></section>
        </div>
    </div>
@elseif($layout == 'edit')
    <div class="container-fluid mt-4">
        <div class="row">
            <section class="col-md-7">
                @include("bookslist")
            </section>
            <section class="col-md-5">

                <div class="card mb-3">
                    <img src="https://media.wired.com/photos/5be4cd03db23f3775e466767/master/w_2560%2Cc_limit/books-521812297.jpg" style="border-radius: 10px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Editar / Deletar informações do livro.</h5>
                        <form action="{{ url('/update/'.$book->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Autor</label>
                                <input value="{{ $book->autor }}" name="autor" type="text" class="form-control"  placeholder="Enter cne">
                            </div>
                            <div class="form-group">
                                <label>Gênero</label>
                                <select name="genero" class="form-select form-control">
                                    @foreach($categories as $categoria)
                                        <option value="{{ $categoria->categoria }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Editora</label>
                                <select name="nome_editora" class="form-select form-control">
                                    @foreach($editoras as $editora)
                                       <option value="{{ $editora->nome_editora }}">{{ $editora->nome_editora }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Título</label>
                                <input value="{{ $book->titulo }}" name="titulo" type="text" class="form-control"  placeholder="Enter the Age">
                            </div>
                            <div class="form-group">
                                <label>Ano de Lançamento</label>
                                <input value="{{ $book->ano_lancamento }}" onkeypress="numbers(event)" maxlength="4" name="ano_lancamento" type="text" class="form-control"  placeholder="Enter Sepeciality">
                            </div>
                            <input type="submit" class="btn btn-info" value="Atualizar">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                Deletar
                            </button>
                        </form>

                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModal">Tem certeza que deseja excluir "{{ $book->titulo }}"?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Essa operação não pode ser desfeita.
                                    </div>
                                    <form action="{{ url('/delete/'.$book->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Fechar</button>
                                            <input type="submit" class="btn btn-danger" value="Deletar"></input>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@elseif($layout == 'categories')
<div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                @include("categorieslist")
                </section>
            </div>
        </div>
    </div>
@elseif($layout == 'editoras')
<div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-8">
                @include("editoraslist")
                </section>
            </div>
        </div>
    </div>
@endif

<footer></footer>
<script>
function numbers(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


</script>
    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>