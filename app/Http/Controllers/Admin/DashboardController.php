<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function registred()
    {
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }
    public function registredit(Request $request, $id)
    {
        $users= User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request, $id)
    {
         $users = User::find($id);
         $users->name= $request->input('username');
         $users->usertype= $request->input('usertype');
         $users->update();
         return redirect('/role-register')->with('status','Bien modifier');
    }
    public function registerdelete($id)
    {
        $users= User::findOrFail($id);
        $users->delete();
        return redirect('/role-register')->with('status','Bien Supprimer');


    }
}
