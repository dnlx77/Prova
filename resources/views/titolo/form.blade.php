
	<div class="form-group">
		<label for="titolo">Titolo:</label>
        <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($titolo->nome) ? $titolo->nome : '') }}"/>
	</div>
	<div class="form-group">
        <label for="titolo">Trama:</label>
		<textarea type="text" class="form-control" name="trama">{{ !empty(old('nome')) ? old('nome') : (!empty($titolo->trama) ? $titolo->trama : '') }}</textarea>
	</div>	
	<div class="form-group">
        <label for="data_lettura">Data lettura:</label>
        <input type="text" class="form-control" name="data_lettura" value="{{ !empty(old('data_lettura')) ? !empty(old('data_lettura')) : '' }}"/>
    </div>
    <script>
        $(document).ready(function(){
            $('[name=data_lettura]').datepicker({
                format: 'dd-mm-yyyy'
            });
        });
    </script>