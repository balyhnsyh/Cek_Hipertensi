<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Handle the profile picture upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadProfile(Request $request, $id)
    {
        $request->validate([
            'pfp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Hapus gambar lama jika ada
        if ($user->pfp) {
            Storage::delete($user->pfp); // Hapus gambar lama dari storage
        }

        // Upload gambar baru
        $image = $request->file('pfp');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $imageName); // Simpan di folder public/storage/uploads

        // Update 'pfp' pada data pengguna
        $user->pfp = 'uploads/' . $imageName;
        $user->save();

        return response()->json(['success' => 'File successfully uploaded.', 'filename' => $imageName]);
    }
}
