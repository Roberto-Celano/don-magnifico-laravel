<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\LunchMenu;
use App\Models\BebPartner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::with('menuItems')->orderBy('position')->get();
        $lunchMenus = LunchMenu::ordered()->get();
        $bebPartners = BebPartner::orderBy('name')->get();
        
        return view('admin.index', compact('categories', 'lunchMenus', 'bebPartners'));
    }

    // ===== CATEGORIE =====
    
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|integer|min:0',
        ]);

        MenuCategory::create($validated);

        return redirect()->route('admin.index')->with('success', 'Categoria creata con successo!')->withFragment('categorie');
    }

    public function updateCategory(Request $request, MenuCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|integer|min:0',
        ]);

        $category->update($validated);

        return redirect()->route('admin.index')->with('success', 'Categoria aggiornata con successo!')->withFragment('categorie');
    }

    public function destroyCategory(MenuCategory $category)
    {
        // Elimina prima tutti i piatti della categoria
        $category->menuItems()->delete();
        $category->delete();

        return redirect()->route('admin.index')->with('success', 'Categoria eliminata con successo!')->withFragment('categorie');
    }

    // ===== PIATTI =====
    
    public function storeItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:menu_categories,id',
        ]);

        MenuItem::create($validated);

        return redirect()->route('admin.index')->with('success', 'Piatto creato con successo!')->withFragment('piatti');
    }

    public function updateItem(Request $request, MenuItem $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:menu_categories,id',
        ]);

        $item->update($validated);

        return redirect()->route('admin.index')->with('success', 'Piatto aggiornato con successo!')->withFragment('piatti');
    }

    public function destroyItem(MenuItem $item)
    {
        $item->delete();

        return redirect()->route('admin.index')->with('success', 'Piatto eliminato con successo!')->withFragment('piatti');
    }

    // ===== PASSWORD =====
    
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ], [
            'current_password.required' => 'La password attuale è obbligatoria.',
            'new_password.required' => 'La nuova password è obbligatoria.',
            'new_password.min' => 'La nuova password deve essere di almeno 8 caratteri.',
            'new_password.confirmed' => 'Le password non coincidono.',
        ]);

        $user = Auth::user();

        // Verifica che la password attuale sia corretta
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'La password attuale non è corretta.']);
        }

        // Aggiorna la password
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->route('admin.index')->withFragment('password')->with('success', 'Password aggiornata con successo!');
    }

    // ===== MENU PRANZO =====
    
    public function storeLunchMenu(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'courses' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        LunchMenu::create($validated);

        return redirect()->route('admin.index')->withFragment('menu-pranzo')->with('success', 'Menu pranzo creato con successo!');
    }

    public function updateLunchMenu(Request $request, LunchMenu $lunchMenu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'courses' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $lunchMenu->update($validated);

        return redirect()->route('admin.index')->withFragment('menu-pranzo')->with('success', 'Menu pranzo aggiornato con successo!');
    }

    public function destroyLunchMenu(LunchMenu $lunchMenu)
    {
        $lunchMenu->delete();

        return redirect()->route('admin.index')->withFragment('menu-pranzo')->with('success', 'Menu pranzo eliminato con successo!');
    }

    // ===== B&B PARTNER =====
    
    public function storeBebPartner(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'code' => 'required|string|max:50|unique:beb_partners,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ], [
            'code.unique' => 'Questo codice esiste già.',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['code'] = strtoupper($validated['code']);

        BebPartner::create($validated);

        return redirect()->route('admin.index')->withFragment('beb-partners')->with('success', 'B&B Partner aggiunto con successo!');
    }

    public function updateBebPartner(Request $request, BebPartner $bebPartner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'code' => 'required|string|max:50|unique:beb_partners,code,' . $bebPartner->id,
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['code'] = strtoupper($validated['code']);

        $bebPartner->update($validated);

        return redirect()->route('admin.index')->withFragment('beb-partners')->with('success', 'B&B Partner aggiornato con successo!');
    }

    public function destroyBebPartner(BebPartner $bebPartner)
    {
        $bebPartner->delete();

        return redirect()->route('admin.index')->withFragment('beb-partners')->with('success', 'B&B Partner eliminato con successo!');
    }
}
