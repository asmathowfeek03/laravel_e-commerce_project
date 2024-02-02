<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
   public function index() {
    $users = User::paginate(5);
    return view('admin.users.index',compact('users'));
   }

   public function create(){
    return view('admin.users.create');
   }

   public function store(Request $request){
        $validated = $request->validate([
            'role_id' =>['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'phone' => ['required', 'regex:/^\+[0-9]{1,15}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','min:8']
        ]);

        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'address' => $request->address,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            //'email' => Crypt::encrypt($request->email),
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/users')->with('message','User Created Successfully');
   }

     public function edit(int $userId) {
        $user = User::findOrFail($userId);

       // Decrypt the email before passing it to the view
       // $user->email = Crypt::decrypt($user->email);

        return view('admin.users.edit',compact('user'));
    }

   public function update(Request $request,int $userId){

    $validated = $request->validate([
        'role_id' =>['required','integer'],
        'name' => ['required', 'string', 'max:255'],
        'address' => ['required', 'string', 'max:255'],
        'dob' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
        'phone' => ['required', 'regex:/^\+[0-9]{1,15}$/'],
        'password' => ['required', 'string','min:8']
    ]);

    User::findOrFail($userId)->update([
        'role_id' => $request->role_id,
        'name' => $request->name,
        'address' => $request->address,
        'dob' => $request->dob,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
    ]);

    return redirect('/admin/users')->with('message','User Updated Successfully');

   }

   public function destroy(int $userId){
    $user=User::findOrFail($userId);
    $user->delete();
    return redirect('admin/users')->with('message', 'User Deleted Successfully');
    }
}
