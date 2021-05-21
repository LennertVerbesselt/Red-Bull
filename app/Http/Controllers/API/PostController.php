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
use App\Models\Post_Upvotes;
use App\Models\Post_Downvotes;
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
            $postimg = Post_Image::where('post_id', $post->id)->get()->first();
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

            //Check if user has already upvoted
            $upvoted = Post_Upvotes::where('post_id', $post->id)->where('user_id', Auth::user()->id)->get()->first();
            if($upvoted === null) {
                $featuredpost['upvoted'] = False;
            } else {
                $featuredpost['upvoted'] = True;
            }

            //Check if user has already downvoted
            $downvoted = Post_Downvotes::where('post_id', $post->id)->where('user_id', Auth::user()->id)->get()->first();
            if($downvoted === null) {
                $featuredpost['downvoted'] = False;
            } else {
                $featuredpost['downvoted'] = True;
            }

            array_push($featuredposts, $featuredpost);
        }

        return ['featuredposts' => $featuredposts];
    }

    public function getVotes(Request $request){
        $postid = $request->postid;
        $post = Post::find($postid);

        $upvotes = $post->upvotes;
        $downvotes = $post->downvotes;

        return ['upvotes' => $upvotes, 'downvotes' =>$downvotes];
    }

    public function upvote(Request $request){
        $user = User::find(Auth::user()->id);
        $postid = $request->postid;
        $post = Post::find($postid);

        $alreadyupvoted = Post_Upvotes::where('post_id', $post->id)->where('user_id', $user->id)->get()->first();

        if($alreadyupvoted == null) {
            $postupvote = new Post_Upvotes;
            $postupvote->post_id = $post->id;
            $postupvote->user_id = $user->id;
            $postupvote->save();

            $post->increment('upvotes');

            //Check if user had downvoted this post, if so, delete it
            $downvoted = Post_Downvotes::where('post_id', $post->id)->where('user_id', $user->id)->get()->first();
            if($downvoted != null) {
                $downvoted->delete();
                $post->decrement('downvotes');
            }

            return['upvote' => $post];
        } else {
            $alreadyupvoted->delete();
            $post->decrement('upvotes');
            return['removedupvote' => $alreadyupvoted];
        }

    }

    public function downvote(Request $request){
        $user = User::find(Auth::user()->id);
        $postid = $request->postid;
        $post = Post::find($postid);

        $alreadydownvoted = Post_Downvotes::where('post_id', $post->id)->where('user_id', $user->id)->get()->first();

        if($alreadydownvoted == null) {
            $postdownvote = new Post_Downvotes;
            $postdownvote->post_id = $post->id;
            $postdownvote->user_id = $user->id;
            $postdownvote->save();

            $post->increment('downvotes');

            
            //Check if user had upvoted this post, if so, delete it
            $alreadyupvoted = Post_Upvotes::where('post_id', $post->id)->where('user_id', $user->id)->get()->first();
            if($alreadyupvoted != null) {
                $alreadyupvoted->delete();
                $post->decrement('upvotes');
            }

            return['downvote' => $post];
        } else {
            $alreadydownvoted->delete();
            $post->decrement('downvotes');
            return['removeddownvote' => $alreadydownvoted];
        }
    }
}
