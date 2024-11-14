<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('dashhome', compact('homes'));
    }

    public function edit()
    {
        $home = Home::first();
        return view('homeedit', compact('home'));
    }

    public function update(Request $request)
    {
        $home = Home::first();

        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old photo
            if ($home->photo) {
                Storage::disk('public')->delete('images/' . $home->photo);
            }

            // Upload the new photo
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);
            $home->photo = $imageName;
        }

        $home->title = $request->title;
        $home->description = $request->desc;
        $home->save();

        return redirect()->route('home.edit')->with('success', 'Home page updated successfully!');
    }
}
