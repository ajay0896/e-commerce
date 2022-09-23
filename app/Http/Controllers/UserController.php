<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\detailtransaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\produk;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class UserController extends Controller
{
    public function home()
    {
        $data = produk::all();
        return view('welcome' , compact('data'));
    }

    public function detail(produk $produk)
    {
        return view('main', compact('produk'));
    }

    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $log = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($log)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.produk')->with('status', 'Selamt Datang Admin : ' .$user->name);
            } else {
                return redirect()->route('home')->with('status', 'Selamt Datang ' .$user->name);
            }
        }
        return back()->with('status', 'Email atau Password Salah');
    }

    public function register()
    {
        return view('register');
    }

    public function postregister(Request $request)
    {
        $reg = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->name),
            'role'=>'customer',
        ]);
  
            return redirect()->route('login')->with('alert','Berhasil Registrasi');

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function postkeranjang(Request $request, Produk $produk)
    {
        $request->validate([
            'qty'=>'required'
        ]);
        detailtransaksi::create([
            'qty'=>$request->qty,
            'user_id'=>Auth::id(),
            'produk_id'=>$produk->id,
            'status'=>'keranjang',
            'totalharga'=>$produk->harga * $request->qty,
        ]);

        return redirect()->route('home')->with('status', 'Ditambahkan kedalam Keranjang');
    }

    public function updatekeranjang(Request $request, detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'qty'=>'required'
        ]);
        $detailtransaksi->update([
            'qty'=>$request->qty,
            'totalharga'=>$detailtransaksi->produk->harga * $request->qty,
        ]);

        return back();

    }

    public function deletekeranjang(detailtransaksi $detailtransaksi)
    {
     $detailtransaksi->delete();
     return back()->with('');
    }

    public function keranjang(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id' ,auth()->id())->where('status', 'keranjang')->with('produk')->get();
        return view('keranjang', compact('detailtransaksi'));
    }

    public function bayar(detailtransaksi $detailtransaksi , produk $produk)
    {
        $produk = $detailtransaksi->produk;
        return view('bayar', compact('detailtransaksi', 'produk'));
    }

    public function prosesbayar(Request $request, detailtransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi'=>'required|file'
        ]);

        $transaksi = transaksi::create([
            'user_id'=>Auth::id(),
            'totalharga'=>$detailtransaksi->totalharga,
            'kode'=>'INV'.Str::random(8),
        ]);

        $detailtransaksi->update([
            'transaksi_id'=>$transaksi->id,
            'status'=>'cekoot',
            'bukti_transaksi'=>$request->bukti_transaksi->store('images'),
        ]);

        return redirect()->route('summary')->with('status','Berhasil checkout/ update bukti');

    }

    public function summary(Request $request)
    {
        $detailtransaksi = detailtransaksi::where('user_id' ,auth()->id())->where('status', 'cekoot')->get();

        return view('summary', compact('detailtransaksi'));
    }
}
