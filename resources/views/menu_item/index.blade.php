@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Menu Item Index</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $menuItem)
                    <tr>
                        <td>{{ $menuItem->menuItemName }}</td>
                        <td>{{ $menuItem->menuItemPrice }}</td>
                        <td>
                            <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('menu-items.destroy', $menuItem->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
