	<div class="form-group">
		<label for="titolo">Titolo:</label>
        <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($storia->nome) ? $storia->nome : '') }}"/>
	</div>
	<div class="form-group">
        <label for="trama">Trama:</label>
		<textarea type="text" class="form-control" name="trama">{{ !empty(old('nome')) ? old('nome') : (!empty($storia->trama) ? $storia->trama : '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="stato">Stato:</label>
        <select id="stato_select" name="stato">
            @foreach($tipo_storia_list AS $option_value => $option_description)
                <option value="{{ $option_value }}" {{ !empty(old('option_value')) && old('option_value') == $option_value ? 'selected' : (!empty($storie->stato) && $storie->stato == $option_value ? 'selected' : '') }}>{{ $option_description }}</option> 
            @endforeach
        </select>
    </div>
	<div class="form-group">
        <label for="data_lettura">Data lettura:</label>
        <input type="text" class="form-control" name="data_lettura" value="{{ !empty(old('data_lettura')) ? old('data_lettura') : (!empty($storia->data_lettura) ? date('d-m-Y', strtotime($storia->data_lettura)) : '') }}"/>
    </div>
    <script>
        $(document).ready(function(){
            $('[name=data_lettura]').datepicker({
                format: 'dd-mm-yyyy',
                todayHighlight: true
            });
        });
    </script>