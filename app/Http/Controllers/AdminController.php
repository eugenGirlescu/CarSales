<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Car;
use App\Models\Contact;
use DB;

class AdminController extends Controller
{
    public function redirect()
    {
        return view('redirect');
    }

    public function admin()
    {
        $all = Car::all()->count();
        
        $eur = Car::select('buyWith')
        ->where('coinType', '=', 'EUR')
        ->sum('buyWith');

        $contactMessages = Contact::all();
       
        return view('admin.admin', compact('all', 'eur', 'contactMessages'));
    }
    
    public function showChangeForm()
    {
        return view('admin.changeAdmin');
    }

    public function changeAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $mail = $request->input('email');
        $role = $request->input('role');
        DB::table('users')
            ->where('email', $mail)
            ->update(['role' => $role]);

        return redirect()->route('change')->with('success', 'User updated!');
    }
}