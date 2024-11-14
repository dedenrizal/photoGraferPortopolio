<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('dashupload', compact('photos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->photo->extension();

        $request->photo->move(public_path('images'), $imageName);

        Photo::create([
            'title' => $request->title,
            'path' => $imageName,
        ]);

        return redirect()->route('dashupload')
                         ->with('success', 'Photo uploaded successfully.');
    }
    public function destroy($id) {
    try {
        $photo = Photo::findOrFail($id);
        $imagePath = 'images/' . $photo->path; 
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        $photo->delete();
        return redirect()->route('dashupload')->with('success', 'Photo deleted successfully.');
    } catch (ModelNotFoundException $e) {
        return redirect()->route('dashupload')->with('error', 'Photo not found.');
    } catch (\Exception $e) {
        return redirect()->route('dashupload')->with('error', 'An error occurred while deleting the photo.');
    }
}

    
}
