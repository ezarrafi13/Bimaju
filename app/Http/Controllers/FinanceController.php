<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi milik user yg login (urut terbaru)
        $transactions = Transaction::where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Hitung summary
        $income  = $transactions->where('type', 'Income')->sum('amount');
        $expense = $transactions->where('type', 'Expense')->sum('amount');
        $profit  = $income - $expense;

        return view('finance', compact('transactions', 'income', 'expense', 'profit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'   => 'required|in:Income,Expense',
            'date'   => 'required|date',
            'desc'   => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'note'   => 'nullable|string'
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'type'    => $request->type,
            'date'    => $request->date,
            'desc'    => $request->desc,
            'amount'  => $request->amount,
            'note'    => $request->note,
        ]);

        return redirect()->back()->with('success', 'Transaction added!');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $transaction->delete();

        return redirect()->back()->with('success', 'Transaction deleted!');
    }
}
