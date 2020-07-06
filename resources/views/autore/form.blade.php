<div class="form-group">
    <label for="titolo">Cognome:</label>
    <input type="text" class="form-control" name="cognome" value="{{ !empty(old('cognome')) ? old('cognome') : (!empty($autore->cognome) ? $autore->cognome : '') }}"/>
</div>
<div class="form-group">
    <label for="titolo">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($autore->nome) ? $autore->nome : '') }}"/>
</div>