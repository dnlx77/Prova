<div class="form-group">
    <label for="collana">Collana:</label>
    <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($collane->nome)? $collane->nome : '') }}"/>
    <label for="num_albi">Numero albi:</label>
    <input type="text" class="form-control" name="num_albi" value="{{ !empty(old('num_albi')) ? old('num_albi') : (!empty($collane->num_albi)? $collane->num_albi : '') }}"/>
</div>  
<div class="form-group">
    <label for="titolo">Stato:</label>
    <select id="stato_select" name="stato">
        @foreach($tipo_collana_list AS $option_value => $option_description)
            <option value="{{ $option_value }}"
            @if (old($option_value) == $option_value)
                {{ ' selected'}}
            @endif
            >{{ $option_description }}</option> 
        @endforeach
    </select>
</div>
