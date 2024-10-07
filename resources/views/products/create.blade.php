@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Adicionar Produto</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nome do Produto</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="price">Preço</label>
            <input type="number" step="00.01" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="image">Imagem</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group mb-4">
            <label for="sub_category_id">Categoria</label>
            <select name="sub_category_id" id="sub_category_id" class="form-control" required>
            <option value="">Selecione uma categoria</option>
                    @foreach ($subcategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar Produto</button>
    </form>
</div>
@endsection
