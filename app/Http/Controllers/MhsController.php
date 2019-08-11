<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Informatika;

use Hash;

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
            'id' => ['required', 'string', 'max:10', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Informatika::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('mhs');
    }

    public function edit($id) {
        $mhs = Informatika::find($id);
        return view('edit', ['mhs' => $mhs]);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $mhs = Informatika::find($id);
        $mhs->name = $request->name;
        $mhs->email = $request->email;
        $mhs->password = Hash::make($request->password);
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
            $query->where('id', 'LIKE', "%$request->q%")
                    ->orWhere('name', 'LIKE', "%$request->q%")
                    ->orWhere('email', 'LIKE', "%$request->q%");
        })->paginate();
        return view('mahasiswa', ['mhs' => $mhs]);
    }
}
