<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function nextStep($id)
    {
        $order = Order::findOrFail($id);
        
        $steps = [
            'tedarik ediliyor', 
            'ürünleriniz kutulanıyor', 
            'ürünleriniz kargoya veriliyor', 
            'ürünleriniz size doğru yola çıktı', 
            'ürünleriniz size teslim edilmiştir'
        ];

        $currentIndex = array_search($order->status, $steps);

        if ($currentIndex !== false && $currentIndex < count($steps) - 1) {
            $order->status = $steps[$currentIndex + 1];
            $order->save();
        }

        return redirect()->back()->with('success', 'Süreç başarıyla güncellendi.');
    }
}
    