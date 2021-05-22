<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post_Image;
use App\Models\Challenge;
use App\Models\Challenge_Progression;



class UploadController extends Controller
{
    public function uploadPost(Request $request){

        if($request->challengeid){

            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:4096'
            ]);

            $challengeid = $request->challengeid;
            $challenge = Challenge::find($challengeid);
            $description = $request->description;
            $userid = Auth::user()->id;
            $user = User::find($userid);
            $progression = Challenge_Progression::where('challenge_id', $challengeid)->where('user_id', $userid)->get()->first();

            //Create & Save new Post object
            $post = new Post;
            $post->user_id = $user->id;
            $post->challenge_id = $challenge->id;
            $post->challenge_progression_id = $progression->id;
            $post->description = $request->description;
            $post->upvotes = 0;
            $post->downvotes = 0;
            $post->text = "";
            $post->datetime = date("Y-m-d H:i:s");
            $post->save();

            //Change Challenge Progression to pending
            $progression->unlocked = 0;
            $progression->pending = 1;
            $progression->save();

            $post = Post::latest()->first();

            //Generate Filename
            $FileNameValueLength = 40;
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $fileName = '';
            for($i = 0; $i < $FileNameValueLength; $i++) {
                $number = random_int(0, 36);
                $character = base_convert($number, 10, 36);
                $fileName .= $character;
            }
    
            //Compile image name with generated name and readable data for debugging
            $imageName = Auth::user()->id . "-" . Auth::user()->name . "-" . $challenge->id . "-" . $challenge->name . "-" . $fileName . ".jpg";
    
            //Save image to AWS
            $path = Storage::disk('s3')->putFileAs('/Posts',$request->file,$imageName);
    
            //Set image on AWS public
            Storage::disk('s3')->setVisibility($path, 'public');
    
            //Create & Save new Post Image object
            $img = new Post_Image;
            $img->post_id = $post->id;
            $img->filename = $path;
            $img->url = Storage::disk('s3')->url($path);
            $img->save();

            $post = Post::latest()->first();
            return['post' => $post];

        } 
        
        else {

            $request->validate([
                'file' => 'required'
            ]);

            $description = $request->description;
            $userid = Auth::user()->id;
            $user = User::find($userid);

            //Create & Save new Post object
            $post = new Post;
            $post->user_id = $user->id;
            $post->challenge_id = 0;
            $post->challenge_progression_id = 0;
            $post->description = $request->description;
            $post->upvotes = 0;
            $post->downvotes = 0;
            $post->text = "";
            $post->datetime = date("Y-m-d H:i:s");
            $post->save();


            $post = Post::latest()->first();

            //Generate Filename
            $FileNameValueLength = 40;
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $fileName = '';
            for($i = 0; $i < $FileNameValueLength; $i++) {
                $number = random_int(0, 36);
                $character = base_convert($number, 10, 36);
                $fileName .= $character;
            }
    
            //Compile image name with generated name and readable data for debugging
            $imageName = Auth::user()->id . "-" . Auth::user()->name . "-" . $post->id . "-" . $fileName . ".jpg";
    
            //Save image to AWS
            $path = Storage::disk('s3')->putFileAs('/Posts',$request->file,$imageName);
    
            //Set image on AWS public
            Storage::disk('s3')->setVisibility($path, 'public');
    
            //Create & Save new Post Image object
            $img = new Post_Image;
            $img->post_id = $post->id;
            $img->filename = $path;
            $img->url = Storage::disk('s3')->url($path);
            $img->save();

            $post = Post::latest()->first();
            return['post' => $post];
        }
    }
}
