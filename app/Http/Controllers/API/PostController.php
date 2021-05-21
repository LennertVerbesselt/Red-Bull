<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\User_Interests_Categories;
use App\Models\Profile_Statistics;
use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Profile_Picture;
use App\Models\Post;
use App\Models\Post_Image;
use App\Models\Follower;


class PostController extends Controller
{
    public function getFeaturedPosts(){
        $posts = Post::get();
        $postimg = Post_Image::get();
        $users = User::get();
        $profiles = Profile::get();
        $profilepictures = Profile_Picture::get();
        $following = Follower::get();

        $featuredposts = [];
        $featuredpost = [];
        
        foreach($posts as $post){

            //add post Item to featured post
            $featuredpost['post'] = $post;

            //add User to featured post
            $user = User::find($post->user_id);
            $featuredpost['user'] = $user;

            //add Profile to featured post
            $profile = Profile::where('user_id', $user->id)->get();
            $featuredpost['profile'] = $profile;

            //add Post Image to featured post
            $postimg = Post_Image::where('post_id', $post->id)->get()-first();
            $featuredpost['postimage'] = $postimg;

            //add Profile Picture to featured post
            $profilepicture = Profile_Picture::where('user_id', $user->id)->where('active', 1)->get()->first();
            $featuredpost['profilepicture'] = $profilepicture;

            //Check if following
            $following = Follower::where('followed', $post->user_id)->where('following', Auth::user()->id)->get()->first();
            if($following === null){
                $featuredpost['following'] = False;
            } else {
                $featuredpost['following'] = True;
            }

            array_push($featuredposts, $featuredpost);
        }

        return ['featuredposts' => $featuredposts];
    }
}
