<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function create_seller(): View
    {
        return view('auth.register-penjual');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $isPenjual = $request->routeIs('register.penjual.store'); // gunakan ini untuk deteksi

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nik_nim' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required|string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // hanya jika penjual
            'surat_persetujuan' => $isPenjual ? 'required|file|mimes:pdf,doc,docx|max:2048' : '',
        ]);

        $filePath = null;
        if ($isPenjual && $request->hasFile('surat_persetujuan')) {
            $filePath = $request->file('surat_persetujuan')->store('persetujuan_penjual', 'public');
        }

        $role = $isPenjual ? 'penjual' : 'pembeli';

        $tipe_pembeli = null;
        if (!$isPenjual) {
            $tipe_pembeli = (str_contains($request->email, 'unud.ac.id') || preg_match('/^\d{10}$/', $request->nik_nim)) ? 'internal' : 'eksternal';
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nik_nim' => $request->nik_nim,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => $role,
            'tipe_pembeli' => $tipe_pembeli,
            'surat_persetujuan' => $filePath,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Akun berhasil dibuat. Silakan login.');
    }
}
