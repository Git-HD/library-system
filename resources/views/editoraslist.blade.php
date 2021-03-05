<div class="card mb-3">
    <img src="https://www.thebalancecareers.com/thmb/LGgrdb8lr1coHQyT7AVAS6_pzlQ=/800x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/book_store-636177590-5a8983611f4e1300364fc238.jpg" class="card-img-top" style="border-radius: 10px; border: 2px solid #003366" alt="...">
    <div class="card-body">
        <h5 class="card-title">Editoras</h5>
        <p class="card-text">Adicione novas editoras e encontre editoras já cadastradas.</p>
            <div class="card-body">
                <h5 class="card-title">Adicionar Editora.</h5>
                <form action="{{ url('/addEditora') }}" method="post">
                @csrf
                    <div class="form-group">
                        <label>Editora</label>
                        <input name="nome_editora" type="text" class="form-control" required  placeholder="Nome da editora">
                    </div>
                    <input type="submit" class="btn btn-info" value="Adicionar">
                </form>
            </div>
            <div class="card-body">
                <h5 class="card-title">Editoras Existentes.</h5>
                <div class="form-group">
                    <select class="form-select form-control">
                    @if($editoras->isEmpty())
                        <option disabled value="null">Nenhuma editora cadastrada</option>
                    @endif
                            @foreach($editoras as $editora)
                                <option value="{{ $editora->id }}">{{ $editora->nome_editora }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
    </div>
</div>






