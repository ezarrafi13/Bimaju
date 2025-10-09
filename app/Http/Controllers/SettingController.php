<?php

namespace App\Http\Controllers;

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

        return view('setting', compact('availableLocales', 'currentLocale'));
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

