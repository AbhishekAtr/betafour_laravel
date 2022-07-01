<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('backend.auth.register');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:15'
        ]);
        
        $user = new User;
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = FacadesHash::make($request->password);
        $register = $user->save();
        if($register)
        {
            return redirect('/login')->with('success','Register Successfully!!!!');
        }
        else{
            return back()->with('fail','Something Wrong');
        }
        
        
    }

    public function show(Register $register)
    {
        //
    }

    public function edit(Register $register)
    {
        //
    }

    public function update(Request $request, Register $register)
    {
        //
    }

    public function destroy(Register $register)
    {
        //
    }
}
