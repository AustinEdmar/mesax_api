@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Categorias</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Adicionar Nova Categoria</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nome</th>
                    
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        
                        <td>
                            <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
