<form method="post" action="{{ $model ? route('vehicle_model.update', $model) : route('vehicle_model.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($model)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $model->id }}">
    @endif
    <div class="mb-3">
        <label for="name_vechile_model" class="form-label">Nome Modelo</label>
        <input type="text" class="form-control" id="name" name="name_vechile_model" placeholder="Nome modelo"
            value="{{ $model ? $model->name : old('model', $model->name ?? '') }}">
    </div>
    <div class="mb-3">

        <select class="form-select" aria-label="Selecione a fabricante" name="brand_id">
            <option selected>Selecione a fabricante</option>
            @foreach ($brand as $brand)
                @php
                    $selected = '';
                    if ($model->brand_id == $brand->id) {
                        $selected = 'selected';
                    }
                @endphp
                <option value="{{ $brand->id }}" {{ $selected }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-primary">Salvar</button>
    </div>
</form>
