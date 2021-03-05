<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link " href="{{url('/create')}}">Livros</a>
            <a class="nav-item nav-link " href="{{url('/category')}}">Categorias</a>
            <a class="nav-item nav-link " href="{{url('/editora')}}">Editoras</a>

        </div>
    </div>
    <li class="nav-item dropdown" style="list-style-type: none;">
        <a id="navbarDropdown" style="border-radius: 5px;" class="nav-link dropdown-toggle bg-primary text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</nav>