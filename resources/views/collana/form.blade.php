<div class="form-group">
    <label for="collana">Collana:</label>
    <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($collane->nome)? $collane->nome : '') }}"/>
    <label for="num_albi">Numero albi:</label>
    <input type="text" class="form-control" name="num_albi" value="{{ !empty(old('num_albi')) ? old('num_albi') : (!empty($collane->num_albi)? $collane->num_albi : '') }}"/>
</div>  

