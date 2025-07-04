<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Users::all();
        return view('admin.pengguna', [
            'title' => 'Data Pengguna',
            'pengguna' =>Users::get(),
        ], compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = Users::all();
        return view('admin.penggunas.create', compact('pengguna'),[
            'title' => 'Data Pengguna',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|max:255',
        ]);
        
    
        $pengguna = new Users; // Use singular 'pengguna' if your model follows Laravel conventions
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->role = $request->role;
        $pengguna->password = bcrypt($request->password);

        if ($request->hasFile('pfp')) {
            $file = $request->file('pfp');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName); // store the file in storage/uploads directory
            $pengguna->pfp = 'uploads/' . $fileName; // save file name with directory to database
        } else {
            // Use default pfp path if no file uploaded
            $pengguna->pfp = 'uploads/default_pfp.jpg';
        }
        
        $pengguna->save();
    
        return redirect('/pengguna')->with('status', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = Users::find($id);
        return view('admin.penggunas.edit', compact('pengguna'),[
            'title' => 'Data Pengguna',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string',
            'pfp' => 'nullable|string', // Since we store only the file name, it's not required here
        ]);

        // Find the user by ID
        $pengguna = Users::findOrFail($id);

        // Update other user details
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->role = $request->role;

        // If there's a new profile picture uploaded, update its filename
        if ($request->has('pfp')) {
            // Extract only the filename from the JSON response
            $filename = json_decode($request->pfp)->filename;
            $pengguna->pfp = 'uploads/' . $filename;
        }

        // Save the changes
        $pengguna->save();

        // Redirect back with success message
        return redirect('/pengguna')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Users::find($id);
        $pengguna->delete();
        return redirect('/pengguna')->with('status', 'Data Dihapus');
    }
}
