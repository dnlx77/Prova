<div class="form-group">
    <label for="num_pagine">Numero di pagine:</label>
    <input type="text" class="form-control" name="num_pagine" value="{{ !empty(old('num_pagine')) ? old('num_pagine') : (!empty($albo->num_pagine) ? $albo->pagine : '') }}"/>
</div>
<div class="form-group">
    <label for="barcode">Barcode:</label>
    <input type="text" class="form-control" name="barcode" value="{{ !empty(old('barcode')) ? old('barcode') : (!empty($albo->barcode) ? $albo->barcode : '') }}"/>
</div>
<div class="form-group">
    <label for="prezzo">Prezzo:</label>
    <input type="number" class="form-control" name="prezzo" value="{{ !empty(old('prezzo')) ? old('prezzo') : (!empty($albo->prezzo) ? $albo->prezzo : '') }}"/>
</div>
<div class="form-group">
    <label for="copertina">Copertina albo:</label>
    <input type="file" class="form-control" name="copertina" value="{{ !empty(old('copertina')) ? old('copertina') : (!empty($albo->copertina) ? $albo->copertina : '') }}"/>
</div>