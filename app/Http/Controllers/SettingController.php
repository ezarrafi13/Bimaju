<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        $user = Auth::user();

        $availableLocales = [
            'id' => __('Indonesian'),
            'en' => __('English'),
        ];

        $currentLocale = $user->preferred_locale ?? config('app.locale');
        $recentTransactions = Transaction::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('setting', compact('availableLocales', 'currentLocale', 'recentTransactions'));
    }

    /**
     * Update the authenticated user's language preference.
     */
    public function updateLanguage(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|in:id,en',
        ]);

        $user = $request->user();
        $user->preferred_locale = $validated['locale'];
        $user->save();

        session(['locale' => $validated['locale']]);

        return redirect()
            ->route('settings.index')
            ->with('success', __('Language preference updated.'));
    }
}
