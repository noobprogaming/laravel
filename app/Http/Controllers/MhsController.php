<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Informatika;

class MhsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index () {
        //$mhs = Informatika::all();
        $mhs = Informatika::paginate(5);
        return view('mahasiswa', ['mhs' => $mhs]);
    }

    public function tambah() {
        return view('tambah');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        Informatika::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('mhs');
    }

    public function edit($id) {
        $mhs = Informatika::find($id);
        return view('edit', ['mhs' => $mhs]);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $mhs = Informatika::find($id);
        $mhs->name = $request->name;
        $mhs->email = $request->email;
        $mhs->password = $request->password;
        $mhs->save();
            
        return redirect('mhs');
    }

    public function delete($id) {        
        $mhs = Informatika::find($id);
        $mhs->delete();
        return redirect()->back();
    }

    public function cari(Request $request) {
        $mhs = Informatika::when($request->q, function($query) use ($request) {
            $query->where('name', 'LIKE', "%$request->q%");
        })->paginate();
        return view('mahasiswa', ['mhs' => $mhs]);
    }
}
