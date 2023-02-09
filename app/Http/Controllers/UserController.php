<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $users = User::get();
  
        return view('users', compact('users'));
    }
        
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
        return back();
    }
    public function delete($id) 
    {

        User::find($id)->delete();
      
        return response()->json(['success'=>'Employee deleted successfully.']);
    }

    public function edit($id)
    {   

        echo $id;die;
        $where = array('id' => $id);
        $user  = User::where($where)->first();
      
        return Response()->json($user);
    }
}