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
    <label for="data_pubblicazione">Data pubblicazione:</label>
    <input type="text" class="form-control" name="data_pubblicazione" value="{{ !empty(old('data_pubblicazione')) ? old('data_pubblicazione') : (!empty($albo->data_pubblicazione) ? date('d-m-Y', strtotime($albo->data_pubblicazione)) : '') }}"/>
</div>
<div class="form-group">
    <label for="copertina">Copertina albo:</label>
    <input type="file" class="form-control" name="copertina"/>
</div>
<div class="form-group">
    <label for="collana">Collana albo:</label>
    <select id="collana-select" name="collana">
        <option value=""></option>
        @foreach ($lista_collane as $current_collana)
            <option value="{{ $current_collana->id }}">{{ $current_collana->nome }}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label for="editore">Editore albo:</label>
        <select id="editore-select" name="editore">
            <option value=""></option>
            @foreach ($lista_editori as $current_editore)
                <option value="{{ $current_editore->id }}">{{ $current_editore->nome }}</option>
            @endforeach
        </select>
</div>
<script>
    $(document).ready(function(){
        $('[name=data_pubblicazione]').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true
        });
        $('#collana-select').select2();
            var collana_select_default = "{{ !empty(old('collana')) ? old('collana') : (!empty($albo->collana_id) ? $albo->collana_id : '') }}";
            $('#collana-select').val(collana_select_default).trigger('change');

            $('#editore-select').select2();
            var editore_select_default = "{{ !empty(old('editore')) ? old('editore') : (!empty($albo->editore_id) ? $albo->editore_id : '') }}";
            $('#editore-select').val(editore_select_default).trigger('change');
    });
</script>
