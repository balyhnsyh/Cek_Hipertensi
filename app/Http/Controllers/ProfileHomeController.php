<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileHomeController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('pfp')) {
            // Hapus gambar lama jika ada
            if ($user->pfp) {
                Storage::delete($user->pfp); // Hapus gambar lama dari storage
            }

            // Upload gambar baru
            $image = $request->file('pfp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName); // Simpan di folder public/storage/uploads
            $user->pfp = 'uploads/' . $imageName;
        }

        $user->save();

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
