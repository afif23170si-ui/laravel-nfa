<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // 🔹 GET /api/transactions (hanya admin)
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        return response()->json([
            'status' => 'success',
            'data' => $transactions
        ]);
    }

    // 🔹 GET /api/transactions/{id} (hanya customer yang login)
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $transaction]);
    }

    // 🔹 POST /api/transactions (hanya customer)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // ✅ Ambil user yang sedang login (pakai Sanctum)
        $user = Auth::user();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        $book = Book::findOrFail($validated['book_id']);
        $total = $book->price * $validated['quantity'];

        // ✅ Simpan transaksi otomatis dengan user login
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'book_id' => $validated['book_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $total,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaction created successfully',
            'data' => $transaction,
        ], 201);
    }

    // 🔹 PUT /api/transactions/{id} (customer)
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($transaction->book_id);
        $transaction->update([
            'quantity' => $validated['quantity'],
            'total_price' => $book->price * $validated['quantity'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Transaction updated successfully',
            'data' => $transaction,
        ]);
    }

    // 🔹 DELETE /api/transactions/{id} (admin)
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['status' => 'success', 'message' => 'Transaction deleted successfully']);
    }
}
