<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
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

        if ($request->hasFile('pfp')) {
            $image = $request->file('pfp');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName); // simpan di folder public/storage/uploads

            // Update 'pfp' pada data pengguna
            Users::where('id', $id)->update(['pfp' => $imageName]);

            return response()->json(['success' => 'File successfully uploaded.', 'filename' => $imageName]);
        }

        return response()->json(['error' => 'File upload failed.']);
    }
}

