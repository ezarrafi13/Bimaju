<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Tampilkan daftar resep premium.
     */
    public function index(Request $request)
    {
        $tab      = $request->get('tab', 'all');
        $search   = $request->get('search');
        $category = $request->get('category', 'Semua');

        // ==== Query awal resep ====
        $query = Recipe::query();

        // --- Filter tab "Resep Dibeli" ---
        if ($tab === 'bought') {
            $recipeIds = Transaction::where('user_id', auth()->id())
                ->where('type', 'Expense')
                ->where('note', 'like', 'recipe_id:%')
                ->pluck('note')
                ->map(fn ($note) => (int) str_replace('recipe_id:', '', $note));

            $query->whereIn('id', $recipeIds);
        }

        // --- Filter kategori ---
        if ($category !== 'Semua') {
            $query->where('category', $category);
        }

        // --- Pencarian ---
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Ambil juga steps & tips biar modal unlocked bisa langsung pakai
        $recipes = $query->with(['steps', 'tips'])->get();

        // Ambil semua ID resep yang sudah dibeli user (untuk tombol "Lihat Resep")
        $boughtRecipeIds = Transaction::where('user_id', auth()->id())
            ->where('type', 'Expense')
            ->where('note', 'like', 'recipe_id:%')
            ->pluck('note')
            ->map(fn ($note) => (int) str_replace('recipe_id:', '', $note))
            ->toArray();

        // Jika request AJAX (filter/tab/search), kirim ulang view yang sama
        if ($request->ajax()) {
            return view('recipe', compact('recipes', 'boughtRecipeIds'))->render();
        }

        return view('recipe', compact('recipes', 'boughtRecipeIds'));
    }

    /**
     * Proses pembelian resep
     */
    public function buy(Recipe $recipe)
    {
        $user = auth()->user();

        // Cek apakah sudah dibeli
        $alreadyBought = Transaction::where('user_id', $user->id)
            ->where('type', 'Expense')
            ->where('note', 'recipe_id:' . $recipe->id)
            ->exists();

        if ($alreadyBought) {
            return response()->json(['message' => 'Resep sudah dibeli sebelumnya'], 400);
        }

        Transaction::create([
            'user_id' => $user->id,
            'type'    => 'Expense',
            'desc'    => 'Beli Resep ' . $recipe->title,
            'date'    => now()->toDateString(),
            'amount'  => $recipe->price,
            'note'    => 'recipe_id:' . $recipe->id,
        ]);

        return response()->json(['message' => 'Resep berhasil dibeli']);
    }
}
