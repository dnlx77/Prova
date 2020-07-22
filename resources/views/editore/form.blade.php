<div class="form-group">
    <label for="titolo">Editore:</label>
    <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($editori->nome)? $editori->nome : '') }}"/>
</div>