<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('onRequest Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #D7B150;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex justify-content-between mb-4">
                        <h3 class="text-xl font-semibold">Itens do Menu</h3>
                        <a href="{{ route('menu-items.create') }}">
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i>
                                Criar um novo menu
                            </button>
                        </a>
                    </div>

                    <!-- Tabela de Itens do Menu -->
                    <table class="table table-striped table-bordered table-hover">
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
                                <td>{{ $menuItem->menuItemPrice }} €</td>
                                <td>
                                    <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-primary">Editar</a>

                                    <form action="{{ route('menu-items.destroy', $menuItem->id) }}" method="POST" class="d-inline">
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
            </div>
        </div>
    </div>
</x-app-layout>
