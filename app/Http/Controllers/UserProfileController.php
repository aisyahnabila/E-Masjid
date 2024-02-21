<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit($id)
    {
        return view('userprofile_edit');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|email|max:150',
            'password' => 'required|max:20',
        ]);
        // untuk mengubah data dari variabel name dan email ke dalam array
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        }
        $user = auth()->user();
        $user->fill($data);
        $user->save();
        flash('Data Berhasil Diubah')->success();
        return back();
    }

    public function show($id)
    {
        $title = 'Profile Pengguna'; // Judul halaman
        return view('profile.show', compact('title'));
    }

}
