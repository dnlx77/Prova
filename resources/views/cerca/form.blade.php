<div class="form-group">
    <label for="cerca">Cerca per:</label>
    <select id="cerca-select" name="cerca">
        <option value=""></option>
        @foreach ($lista_campi_ricerca as $current_campo)
            <option value="{{ $current_campo }}">{{ $current_campo }}</option>
        @endforeach
    </select>

    <label for="titolo">Titolo albo da cercare:</label>
    <input type="text" class="form-control" name="titolo"/>
</div>