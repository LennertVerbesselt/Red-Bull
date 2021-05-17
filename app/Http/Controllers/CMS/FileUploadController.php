<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

class FileUploadController extends Controller
{
    public function index() {
        return view('CMS/fileupload');
    }

    public function uploadProfilePicturePage() {
        $users = User::get();
        return view('CMS/fileupload', ['users' => $users]);
    }

    public function uploadProfilePicture(Request $request) {

        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');

            $name = time().$file->getClientOriginalName();

            $filepath = $name;

            Storage::disk('s3')->put($filepath, file_get_contents($file));
        }

        return back()->with('succes', 'Image uploaded successfully');

        return view('CMS/users');
    }
}
