<div class="form-group">
    <label for="storia">Storia:</label>
    <select name="storia">
        <option value=""></option>
        @foreach ($lista_storie as $current_storia)
            <option value="{{ $current_storia->id }}">{{ $current_storia->nome }}</option>
        @endforeach
    </select>
</div>