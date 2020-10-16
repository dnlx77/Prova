<div class="form-group">
    <label for="num_pagine">Numero di pagine:</label>
    <input type="number" class="form-control" name="num_pagine" value="{{ !empty(old('num_pagine')) ? old('num_pagine') : (!empty($albo->num_pagine) ? $albo->num_pagine : '') }}"/>
</div>
<div class="form-group">
    <label for="barcode">Barcode:</label>
    <input type="text" class="form-control" name="barcode" value="{{ !empty(old('barcode')) ? old('barcode') : (!empty($albo->barcode) ? $albo->barcode : '') }}"/>
</div>
<div class="form-group">
    <label for="prezzo">Prezzo:</label>
    <input type="number" class="form-control" name="prezzo" step="any" value="{{ !empty(old('prezzo')) ? old('prezzo') : (!empty($albo->prezzo) ? $albo->prezzo : '') }}"/>
</div>
<div class="form-group">
    <label for="numero">Numero albo:</label>
    <input type="number" class="form-control" name="numero" value="{{ !empty(old('numero')) ? old('numero') : (!empty($albo->numero) ? $albo->numero : '') }}"/>
</div>
<div class="form-group">
    <label for="titolo">Titolo albo:</label>
    <input type="text" class="form-control" name="titolo" value="{{ !empty(old('titolo')) ? old('titolo') : (!empty($albo->titolo) ? $albo->titolo : '') }}"/>
</div>
<div class="form-group">
    <label for="copertina">Copertina albo:</label>
    <input type="file" class="form-control" name="copertina" value="{{ !empty(old('copertina')) ? old('copertina') : (!empty($albo->filename) ? $albo->filename : '') }}"/>
</div>
<div class="form-group">
    <label for="collana">Collana albo:</label>
    <select name="collana">
        <option value=""></option>
        @foreach ($lista_collane as $current_collana)
            <option value="{{ $current_collana->id }}" {{ !empty(old('current_collana')) && old('current_collana') == $current_collana->id ? 'selected' : '' }}>{{ $current_collana->nome }}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label for="collana">Editore albo:</label>
        <select name="editore">
            <option value=""></option>
            @foreach ($lista_editori as $current_editore)
                <option value="{{ $current_editore->id }}">{{ $current_editore->nome }}</option>
            @endforeach
        </select>
</div>