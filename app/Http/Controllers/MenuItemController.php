<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        //JSON POSTMAN
        //$menuItems = MenuItem::all();
        //JSON POSTMAN
       // return response()->json($menuItems);
        //return view('menu_items.index', compact('menuItems'));
        $menuItems = MenuItem::all();
        return view('dashboard', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menuItemName' => 'required',
            'menuItemPrice' => 'required|numeric',
        ]);


        //$menuItem = MenuItem::create($request->all());

        $menuItem = MenuItem::create([
            'menuItemName' => $request->menuItemName,
            'menuItemPrice' => $request->menuItemPrice,
        ]);

        //JSON POSTMAN
        //return response()->json($menuItem, 201);
        return redirect()->route('menu-items.index')->with('success', 'Menu criado com sucesso');
    }

    public function create()
    {
        return view('menu_item.create');
    }

    public function edit(MenuItem $menuItem)
    {
        return view('menu_item.edit', compact('menuItem'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'menuItemName' => 'required',
            'menuItemPrice' => 'required|numeric',
        ]);

        $menuItem->update([
            'menuItemName' => $request->menuItemName,
            'menuItemPrice' => $request->menuItemPrice,
        ]);

        return redirect()->route('menu-items.index')->with('success', 'Menu atualizado com sucesso');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-items.index')->with('success', 'Menu excluído com sucesso');
    }
}
