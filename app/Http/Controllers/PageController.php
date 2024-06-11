<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sepatu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function sepatu()
    {
        $sepatu = Sepatu::orderBy('id', 'desc')->get();
        return view("sepatu", ["key" => "sepatu", "spt" => $sepatu]);
    }

    public function formaddsepatu()
    {
        return view("form-add", ["key" => "sepatu"]);
    }

    public function savesepatu(Request $request)
    {  
        $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
        $path = $request->file('gambar')->storeAs('gambar', $file_name,'public');

        Sepatu::create([
            'merek' => $request->merek,
            'jenis' => $request->jenis,
            'bahan' => $request->bahan,
            'harga' => $request->harga,
            'ukuran'=> $request->ukuran,
            'gambar' => $path
        ]);
        return redirect('/sepatu')->with('alert', 'Data Berhasil di Simpan');
    }


    public function formeditsepatu($id)
    {
    $sepatu = Sepatu::find($id);
    return view("form-edit", ["key" => "sepatu", "spt" => $sepatu]);
    }

    public function updatesepatu($id, Request $request)
    {
    $sepatu = Sepatu::find($id);
    $sepatu->merek = $request->merek;
    $sepatu->jenis = $request->jenis;
    $sepatu->bahan = $request->bahan;
    $sepatu->harga = $request->harga;
    $sepatu->ukuran = $request->ukuran;

    if ($request->gambar)
    {
        if ($sepatu->gambar){
        storage::disk('public')->delete($sepatu->gambar);
    }
    $file_name = time().'-'.$request->file('gambar')->getClientOriginalName();
    $path = $request->file('gambar')->storeAs('gambar', $file_name,'public');
    $sepatu->gambar = $path;
}
    $sepatu->save();
    return redirect("/sepatu")->with('alert', 'Data berhasil diubah');
    }

    public function deletesepatu($id)
    {
        $sepatu = Sepatu::find($id);
        
        if($sepatu->gambar)
        {
            Storage::disk('public')->delete($sepatu->gambar);
        }

        $sepatu->delete();

        return redirect("/sepatu")->with('alert', 'Data berhasil dihapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key" => ""]);
    }

    
public function updateuser(Request $request)
{
    // Check if the new password and confirmation password match
    if ($request->password_baru == $request->konfirmasi_password) 
    {
        $user = Auth::user();

        // Verify the old password
        if (Hash::check($request->password_lama, $user->password)) 
        {
            // Update the password
            $user->password = Hash::make($request->password_baru);
            $user->save();

            return redirect("/user")->with("info", "Password berhasil diubah");
        } 
        else 
        {
            return redirect("/user")->with("info", "Password lama tidak cocok");
        }
    } 
    else 
    {
        return redirect("/user")->with("info", "Konfirmasi password tidak sesuai");
    }
}
    public function keranjang()
    {
        return view("keranjang", ["key" => "keranjang"]);
    }

    public function tentang()
    {
        return view("tentang", ["key" => "tentang"]);
    }
}
