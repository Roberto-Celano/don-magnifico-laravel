<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        //Recupera tutte le categorie di menu con i loro elementi ordinati per posizione
        $menuCategories = \App\Models\MenuCategory::with(['menuItems' => function ($query) {
            $query->orderBy('price');
        }])->orderBy('position')->get();

        return view('pages.menu', compact('menuCategories'));
    }

    public function indexqr()
    {
        //Recupera tutte le categorie di menu con i loro elementi ordinati per posizione
        $menuCategories = \App\Models\MenuCategory::with(['menuItems' => function ($query) {
            $query->orderBy('price');
        }])->orderBy('position')->get();

        return view('pages.menuqr', compact('menuCategories'));
    }
}
