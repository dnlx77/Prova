<div class="form-group">
    <label for="titolo">Ruolo:</label>
    <input type="text" class="form-control" name="descrizione" value="{{ !empty(old('descrizione')) ? old('descrizione') : (!empty($ruoli->descrizione)? $ruoli->descrizione : '') }}"/>
</div>