@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subcategorias</h1>

        <a href="{{ route('subcategories.create') }}" class="btn btn-primary mb-3">Nova Subcategoria</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subCategories as $subCategory)
                    <tr>
                        <td>{{ $subCategory->id }}</td>
                        <td>{{ $subCategory->name }}</td>
                        <td>{{ $subCategory->category->name }}</td>
                        <td>
                            <a href="{{ route('subcategories.show', $subCategory->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('subcategories.edit', $subCategory->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('subcategories.destroy', $subCategory->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta subcategoria?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
