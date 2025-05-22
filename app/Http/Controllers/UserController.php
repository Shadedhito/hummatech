<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
 
class UserController extends Controller
{
    public function index(){
        return view('/user');
    }
 
    public function search(Request $request)
{
    if ($request->ajax()) {
        $search = $request->search;
        $users = User::where('id', 'like', "%{$search}%")
                     ->orWhere('name', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->select('id', 'name', 'email')
                     ->get();

        return response()->json($users);
    }
}
}