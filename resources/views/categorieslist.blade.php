<div class="card mb-3">
    <img src="https://images.creativemarket.com/0.1.0/ps/5344653/910/607/m1/fpnw/wm0/cm1-.png?1541764681&s=00be6afa22d5a6c32f63ed178c37c404&fmt=webp" class="card-img-top" style="border-radius: 10px; border: 2px solid #000" alt="...">
    <div class="card-body">
        <h5 class="card-title">Gêneros literários</h5>
        <p class="card-text">Adicione novos tipos de gêneros literários e encotre os gêneros existentes.</p>
            <div class="card-body">
                <h5 class="card-title">Adicionar gênero.</h5>
                <form action="{{ url('/addCategory') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label>Gênero</label>
                        <input name="categoria" type="text" class="form-control" required  placeholder="Ex: Ficção">
                    </div>
                    <input type="submit" class="btn btn-info" value="Adicionar">
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title">Categorias Existentes.</h5>
                <div class="form-group">
                    <select class="form-select form-control">
                    @if($categories->isEmpty())
                        <option disabled value="null">Nenhum gênero cadastrado</option>
                    @endif
                        @foreach($categories as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </div>
</div>






