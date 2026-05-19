<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->orderBy('is_admin', 'desc')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function edit(int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) return redirect()->route('admin.users.index')->with('error', 'Kullanıcı bulunamadı.');
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'balance' => 'required|numeric|min:0',
        ]);

        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'balance' => $request->balance,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Müşteri bilgileri güncellendi.');
    }

    // HOCA İSTERİ: İşte eksik olan o fonksiyon bu!
    public function toggleStatus(int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if ($user && $user->is_admin == 0) {
            $currentStatus = $user->status ?? 'active';
            $newStatus = ($currentStatus === 'active') ? 'passive' : 'active';

            DB::table('users')->where('id', $id)->update(['status' => $newStatus]);
            
            $message = $newStatus === 'passive' ? 'Kullanıcı hesabı donduruldu!' : 'Kullanıcı hesabı aktifleştirildi!';
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('error', 'Admin hesapları dondurulamaz veya kullanıcı bulunamadı.');
    }

    public function destroy(int $id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if ($user && $user->is_admin == 0) {
            DB::table('users')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Kullanıcı sistemden silindi.');
        }
        
        return redirect()->back()->with('error', 'Admin hesabı silinemez.');
    }
}