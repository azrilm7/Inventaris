<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;

class DataUserController extends Controller
{
    public function datauser(Request $request)
    {
        $role = Auth::user()->role;
        $data = User::all();
        return view('datauser.datauser', compact('data'), [
            'role' => $role
        ]);
    }

    public function editUser(Request $request)
    {
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        
        // Daftar role yang tersedia
        $roles = Role::pluck('name')->toArray(); // Mengambil semua role dari database
        
        $data = [
            'pageTitle' => 'Edit data user',
            'user' => $user,
            'roles' => $roles
        ];
        return view('datauser.edit-user', $data);
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->id;
        $user = User::findOrFail($user_id);
        
    
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'role.required' => 'Role tidak boleh kosong'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->email = $request->email;

        // Debugging sebelum sinkronisasi role
        Log::info('Role sebelum diubah: ' . implode(', ', $user->getRoleNames()->toArray()));

        // Sinkronisasi role pengguna
        $user->syncRoles($request->role);

        // Debugging setelah sinkronisasi role
        Log::info('Role sesudah diubah: ' . implode(', ', $user->getRoleNames()->toArray()));
        
        $saved = $user->save();
    
        if($saved){
            return redirect()->route('edit-user', ['id' => $user_id])->with('success', ucfirst($request->name).' data user berhasil diperbarui');
        } else {
            return redirect()->route('edit-user', ['id' => $user_id])->with('fail', 'Ada kendala, coba lagi');
        }
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $username = $data->username;

        if ($data->delete()) {
            return redirect()->back()->with('success-delete', 'Data user ' . $username . ' berhasil dihapus');
        } else {
            return redirect()->back()->with('fail', 'Data gagal dihapus');
        }
    }
}



