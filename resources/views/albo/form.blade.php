<div class="form-group">
    <label for="num_pagine">Numero di pagine:</label>
    <input type="text" class="form-control" name="num_pagine" value="{{ !empty(old('num_pagine')) ? old('num_pagine') : (!empty($albo->num_pagine) ? $albo->pagine : '') }}"/>
</div>
<div class="form-group">
    <label for="titolo">Nome:</label>
    <input type="text" class="form-control" name="nome" value="{{ !empty(old('nome')) ? old('nome') : (!empty($autore->nome) ? $autore->nome : '') }}"/>
</div>