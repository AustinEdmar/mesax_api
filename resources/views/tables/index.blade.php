@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mesas</h1>
        <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Adicionar Nova Mesa</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Número</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $table->id }}</td>
                        <td>{{ $table->number }}</td>
                        <td>{{ $table->status }}</td>
                        <td>
                            <a href="{{ route('tables.show', $table->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('tables.destroy', $table->id) }}" method="POST" style="display:inline-block;">
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
