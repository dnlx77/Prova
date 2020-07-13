<div class="form-group">
    <label for="titolo">Autore:</label>
    <select name="autore">
        <option value=""></option>
        @foreach ($lista_autori as $current_autore)
            <option value="{{ $current_autore->id }}">{{ $current_autore->nome . ' ' . $current_autore->cognome }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="titolo">Ruolo:</label>
    <select id="ruolo_select" name="ruolo[]" multiple="multiple">
        <option value=""></option>
        @foreach ($lista_ruoli as $current_ruolo)
            <option value="{{ $current_ruolo->id }}">{{ $current_ruolo->descrizione }}</option>
        @endforeach
    </select>
</div>
