@extends('menu_item.menulayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Menu Item Operations</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <ul>
                <li><a href="{{ route('menu-items.create') }}">Adicionar Novo Item</a></li>
                <li><a href="{{ route('menu-items.index') }}">Listar Itens</a></li>
            </ul>
        </div>
    </div>
@endsection
