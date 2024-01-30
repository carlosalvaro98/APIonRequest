@extends('menu_item.menulayout')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('onRequest Dashboard') }}
        </h2>
    </x-slot>

    <div class="wrapper"> 
        <h2>Editar Item do Menu</h2>
        <form action="{{ route('menu-items.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="input-box">
                <div class="form_name">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="menuItemName" value="{{ $menuItem->menuItemName }}" class="form-control" placeholder="Nome">
                    </div>
                </div>
                <div class="form_preco">
                    <div class="form-group">
                        <strong>Preço:</strong>
                        <input type="text" name="menuItemPrice" value="{{ $menuItem->menuItemPrice }}" class="form-control" placeholder="Preço">
                    </div>
                </div>
                <div class="formbtn">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </div>
        </form>
        <div style="text-align: center; margin-top: 10px;">
            <a class="btn btn-primary" href="{{ route('menu-items.index') }}">Voltar</a>
        </div>
    </div>
</x-app-layout>

@endsection
