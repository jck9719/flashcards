<?php

namespace App\Http\Controllers;

use App\Category;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        clearSession($request);
    }

    public function index()
    {
        if(!$this->isAdmin())
            redirect('/');

        $users = User::all();

        return view('home', ['users' => $users]);
    }

    public function update($id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $user = User::with('subcategories')->findOrFail($id);
        $roles = Role::all();
        $categories = Category::all();

        return view('admin.update', [
            'user' => $user,
            'roles' => $roles,
            'categories' => $categories
        ]);
    }

    public function put(Request $request, $id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $cats = $request->input('categories');

        $user = User::findOrFail($id);
        DB::table('permissions')->where('user_id', $user->id)->delete();
        foreach ($cats as $cat) {
            $permission = new Permission();
            $permission->user_id = $user->id;
            $permission->subcategory_id = $cat;
            $permission->save();
        }
        $roleId = $request->input('role');
        $user->role_id = $roleId;
        $user->save();

        return redirect('/home');
    }

    public function delete($id)
    {
        if(!$this->isAdmin())
            redirect('/');

        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/home');
    }

    private function isAdmin() {
        if(Auth::check() && Auth::user()->role_id == 1)
            return true;
        return false;
    }
}
