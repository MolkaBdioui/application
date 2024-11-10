<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function accounts(){
        $accounts = DB::table('users')->get();
        return view('admin.accounts.index', ['accounts' => $accounts]);
    }

    public function delete($id){
        if(DB::table('users')->where('id', $id)->delete()){
            return redirect()->route('accounts')->with('success', "Account deleted successfully !");
        }
    }

    public function detail($id){
        $account = DB::table('users')->where('id', $id)->first();
        return view('admin.accounts.detail', ['account' => $account]);
    }

    public function projects(){
        return view('admin.projects.index');
    }
    
    public function add(){
        return view('admin.accounts.add');
    }

    public function addProject(){
        return view('admin.projects.add');
    }

    public function saveProject(Request $request){
        $inputs = $request->validate([
            'label' => 'required',
            'manager' => 'required',
            'startAt' => 'required',
            'endAt' => 'required'
        ]);
        $inputs['password'] = Hash::make("secret");
        DB::table('users')->insert($inputs);
        return redirect()->route('accounts')->with('success',"The account is added successfully !");
    }

    public function save(Request $request){
        $inputs = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'position' => 'required'
        ]);
        $inputs['password'] = Hash::make("secret");
        DB::table('users')->insert($inputs);
        return redirect()->route('accounts')->with('success',"The account is added successfully !");
    }
}
