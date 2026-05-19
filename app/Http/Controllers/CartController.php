<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $product = DB::table('products')->where('id', $id)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Ürün bulunamadı!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image ?? 'default.jpg'
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Ürün başarıyla sepete eklendi!');
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Ürün sepetten çıkarıldı!');
        }
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Sepetiniz boş!');
        }
        return view('cart.checkout', compact('cart'));
    }

    public function processOrder(Request $request)
    {
        $user = auth()->user();
        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Sepetiniz boş!');
        }

        $totalAmount = 0;
        foreach($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $paidFromBalance = 0;
        
        if ($user->balance > 0) {
            if ($user->balance >= $totalAmount) {
                $paidFromBalance = $totalAmount;
                DB::table('users')->where('id', $user->id)->decrement('balance', $totalAmount);
            } else {
                $paidFromBalance = $user->balance;
                DB::table('users')->where('id', $user->id)->update(['balance' => 0]);
            }
        }

        // HATA BURADAYDI: total_amount yerine orijinal olan total_price yazıldı
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $user->id,
            'total_price' => $totalAmount, 
            'status' => 'Hazırlanıyor',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', "Siparişiniz başarıyla alındı! Cüzdanınızdan $paidFromBalance TL kullanıldı.");
    }
}