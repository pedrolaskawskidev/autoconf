<form method="post" action="{{ $brand ? route('brand.update', $brand) : route('brand.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if ($brand)
        @method('PUT')
        <input type="hidden" name="id" value="{{ $brand->id }}">
    @endif
    <div class="mb-3">
        <label for="name_brand" class="form-label">Nome Fabricante</label>
        <input type="text" class="form-control" id="name" name="name_brand" placeholder="Nome"
        value="{{ $brand ? $brand->name : old('brand', $brand->name ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="image_brand" class="form-label">Logo</label>
        <input class="form-control" type="file" name="image_brand" id="image">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-outline-primary">Salvar</button>
      </div>
</form>
