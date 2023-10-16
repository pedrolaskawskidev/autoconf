<form method="post" action="{{ $vehicle ? route('vehicle.update', $vehicle) : route('vehicle.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($vehicle)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $vehicle->id }}">
    @endif
    <div class="mb-3">
        <label for="name_vehicle" class="form-label">Nome Versão</label>
        <input type="text" class="form-control" id="name" name="name_vehicle" placeholder="Nome versão"
            value="{{ $vehicle ? $vehicle->name : old('model', $vehicle->name ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="image_vehicle" class="form-label">Foto</label>
        <input class="form-control" type="file" name="image_vehicle" id="image_vehicle">
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Selecione a fabricante" name="brand_id">
            <option selected>Selecione o fabricante</option>
            @foreach ($brand as $brand)
                @php
                    $selected = '';
                    if (!empty($vehicle->brand_id) && $vehicle->brand_id == $brand->id) {
                        $selected = 'selected';
                    }
                @endphp
                <option value="{{ $brand->id }}" {{ $selected }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Selecione a fabricante" name="vehicle_model_id">
            <option selected>Selecione o modelo</option>
            @foreach ($model as $model)
                @php
                    $selected = '';
                    if (!empty($vehicle->vehicle_model_id) && $vehicle->vehicle_model_id == $model->id) {
                        $selected = 'selected';
                    }
                @endphp
                <option value="{{ $model->id }}" {{ $selected }}>{{ $model->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Selecione a quantidade de portas" name="doors_vehicle">
            <option selected>Portas</option>
            <option value="2" {{ $vehicle && $vehicle->doors == 2 ? 'selected' : '' }}>2</option>
            <option value="4" {{ $vehicle && $vehicle->doors == 4 ? 'selected' : '' }}>4</option>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" aria-label="Selecione o combustível" name="fuel_vehicle">
            <option selected>Combustível</option>
            <option value="gasolina" {{ $vehicle && $vehicle->fuel == 'gasolina' ? 'selected' : '' }}>Gasolina</option>
            <option value="alcool" {{ $vehicle && $vehicle->fuel == 'alcool' ? 'selected' : '' }}>Alcool</option>
            <option value="total_flex" {{ $vehicle && $vehicle->fuel == 'total_flex' ? 'selected' : '' }}>Total Flex</option>
            <option value="diesel" {{ $vehicle && $vehicle->fuel == 'diesel' ? 'selected' : '' }}>Diesel</option>
            <option value="eletrico" {{ $vehicle && $vehicle->fuel == 'eletrico' ? 'selected' : '' }}>Elétrico</option>
            <option value="hibrido" {{ $vehicle && $vehicle->fuel == 'hibrido' ? 'selected' : '' }}>Hibrído</option>

        </select>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col">
                <label for="color_vehicle" class="form-label">Cor</label>
                <input type="text" class="form-control" id="name" name="color_vehicle" placeholder="Cor"
                    value="{{ $vehicle ? $vehicle->color : old('vehicle', $vehicle->color ?? '') }}">
            </div>
            <div class="col">
                <label for="price_vehicle" class="form-label">Valor</label>
                @php
                $price = 0;
                if (!empty($vehicle->price)) {
                    $price = $vehicle->price;
                }
            @endphp
                <input type='text' placeholder='Valor' name='price_vehicle' value="{{ number_format($price, 2, ',', '.') }}">
            </div>
            <div class="col">
                <label for="manufacturing_year_vehicle" class="form-label">Ano Fabricação</label>
                <input type="text" class="form-control" id="name" name="manufacturing_year_vehicle"
                    placeholder="Ano"
                    value="{{ $vehicle ? $vehicle->manufacturing_year : old('vehicle', $vehicle->manufacturing_year ?? '') }}">
            </div>
            <div class="col">
                <label for="year_vehicle" class="form-label">Ano Modelo</label>
                <input type="text" class="form-control" id="name" name="year_vehicle" placeholder="Ano"
                    value="{{ $vehicle ? $vehicle->model_year : old('vehicle', $vehicle->model_year ?? '') }}">
            </div>
            <div class="col">
                <label for="plate_vehicle" class="form-label">Placa</label>
                <input type="text" class="form-control" id="name" name="plate_vehicle" placeholder="Placa"
                    value="{{ $vehicle ? $vehicle->plate : old('vehicle', $vehicle->plate ?? '') }}">
            </div>
            <div class="col">
                <label for="motor_vehicle" class="form-label">Motor</label>
                <input type="text" class="form-control" id="name" name="motor_vehicle" placeholder="Ex: 3.2 V16"
                    value="{{ $vehicle ? $vehicle->motor : old('vehicle', $vehicle->motor ?? '') }}">
            </div>
            <div class="col">
                <label for="mileage_vehicle" class="form-label">Quilometragem</label>
                <input type="text" class="form-control" id="name" name="mileage_vehicle" placeholder="123000"
                    value="{{ $vehicle ? $vehicle->mileage : old('vehicle', $vehicle->mileage ?? '') }}">
            </div>

        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-primary">Salvar</button>
    </div>
</form>

{{-- @push('js')
    <script>
        $(document).ready(function() {

            var currencyInput = document.getElementById('currencyInput');
            var currency = 'BRL';

            currencyInput.addEventListener('focus', onFocus);
            currencyInput.addEventListener('blur', onBlur);

            function localStringToNumber(s) {
                return Number(String(s).replace(/[^0-9.,-]+/g, ''));
            }

            function onBlur(e) {
                var value = e.target.value;

                var options = {
                    maximumFractionDigits: 2,
                    currency: currency,
                    style: 'currency',
                    currencyDisplay: 'symbol'
                };

                e.target.value = (value || value === 0) ?
                    localStringToNumber(value).toLocaleString(undefined, options) :
                    '';
            }
        });
    </script>
@endpush --}}
