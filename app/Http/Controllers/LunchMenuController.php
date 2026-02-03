<?php

namespace App\Http\Controllers;

use App\Models\LunchMenu;
use App\Models\BebPartner;
use Illuminate\Http\Request;

class LunchMenuController extends Controller
{
    // Pagina per B&B con codici sconto
    public function index(Request $request)
    {
        $lunchMenus = LunchMenu::active()->ordered()->get();
        
        // Se c'è un codice sconto nell'URL, verifica se è valido
        $bebPartner = null;
        if ($request->has('code')) {
            $bebPartner = BebPartner::valid()
                ->where('code', strtoupper($request->code))
                ->first();
        }
        
        return view('pages.pranzo', compact('lunchMenus', 'bebPartner'));
    }

    // Pagina pubblica per tutti (senza codici sconto)
    public function publicIndex()
    {
        $lunchMenus = LunchMenu::active()->ordered()->get();
        
        return view('pages.menu-pranzo', compact('lunchMenus'));
    }
}
