<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Follower;
use App\Models\Profile;
use App\Models\User_Interests_Categories;
use App\Models\Profile_Statistics;
use App\Models\Profile_Picture;

use App\Models\Category;
use App\Models\Currency_Points;
use App\Models\Challenge;
use App\Models\Challenge_Progression;
use App\Models\Challenge_Badge;
use App\Models\Challenge_Set;
use App\Models\Challenge_sets_Icon;


use App\Models\Event;
use App\Models\Event_Ticket;
use App\Models\Featured_Events;
use App\Models\Event_Header;

use App\Models\Post;
use App\Models\Post_Image;
use App\Models\Post_Upvotes;
use App\Models\Post_Downvotes;


class ProfileController extends Controller
{
    function getProfileData(){
        $profiledata = [];

        $userid = Auth::user()->id;
        $user = User::find($userid);

        $profile = Profile::where('user_id', $user->id)->get()->first();

        $profilepicture = Profile_Picture::where('user_id', $user->id)->where('active', true)->get()->first();

        $profilestatistics = Profile_Statistics::where('user_id', $user->id)->get()->first();

        $currencypoints = Currency_Points::where('user_id', $user->id)->orderby('points', 'DESC')->get();

        $categories = Category::get();

        foreach($currencypoints as $cu) {
            foreach($categories as $ca) {
                if($cu->category_id === $ca->category_id){
                    $cu['category_name'] = $ca->category_name;
                    $cu['icon'] = $ca->icon;
                }
            }
        }

        $posts = Post::where('user_id', $user->id)->orderby('created_at', 'DESC')->get();
        $postimages = Post_Image::get();

        foreach($posts as $p) {
            foreach($postimages as $pi) {
                if($p->id === $pi->post_id){
                    $p['url'] = $pi->url;
                }
            }
        }

        $categories = Category::get();
        $challengesets = Challenge_Set::get();
        $challenges = Challenge::get();
        $challengebadges = Challenge_Badge::get();
        $challengeprogressions = Challenge_Progression::where('user_id', Auth::user()->id)->get();
        $icons = Challenge_sets_Icon::get();

        $challengesinfo = [];
        

        foreach($categories as $category){
            $categorysub = [];

            $categorysub['category_id'] = $category->category_id;
            $categorysub['category_name'] = $category->category_name;

            foreach($challengesets as $challengeset){

                if($challengeset->category_id == $category->category_id){
                    $challengesubset = [];
                    $completed = 0;
                    $total = 0;

                    $challengesubset['id'] = $challengeset->id;
                    $challengesubset['event_id'] = $challengeset->event_id;
                    $challengesubset['category_id'] = $challengeset->category_id;
                    $challengesubset['name'] = $challengeset->name;
                    $challengesubset['length'] = $challengeset->length;
                    $challengesubset['difficulty'] = $challengeset->difficulty;
                    $challengesubset['active_untill'] = $challengeset->active_untill;

                    foreach($icons as $icon){
                        if($icon->challenge_set_id === $challengeset->id){
                            $challengesubset['icon'] = $icon->url;
                        }
                    }

                    foreach($challenges as $challenge){

                        if($challenge->challenge_set_id === $challengeset->id){
                            $challengesub = [];

                            $challengesub['id'] = $challenge->id;
                            $challengesub['challenge_set_id'] = $challenge->challenge_set_id;
                            $challengesub['name'] = $challenge->name;
                            $challengesub['difficulty'] = $challenge->difficulty;
                            $challengesub['description'] = $challenge->description;
                            $challengesub['points'] = $challenge->points;
                            $challengesub['cans_needed_to_unlock'] = $challenge->cans_needed_to_unlock;
                            $challengesub['upvote_ratio'] = $challenge->upvote_ratio;

                            foreach($challengebadges as $challengebadge){
                                if($challengebadge->challenge_id == $challenge->id){
                                    $challengesub['badge'] = $challengebadge->url;
                                }
                            }
                            foreach($challengeprogressions as $challengeprogression){
                                if($challengeprogression->challenge_id == $challenge->id){
                                    $challengesub['progression'] = $challengeprogression;
                                    if($challengeprogression->complete){
                                        $completed++;
                                    }
                                    $total++;
                                }
                            }

                            $percentage = $completed/$total * 100;

                            $challengesubset['percentage'] = $percentage;
                            $challengesubset['completed'] = $completed;
                            $challengesubset['total'] = $total;


                            $challengesubset['challenges'][$challenge->id] = $challengesub;
                        }
                    }

                    $categorysub['challengesets'][$challengeset->id] = $challengesubset;

                }
            }

            array_push($challengesinfo, $categorysub);
        }

        
        $progressions = Challenge_Progression::where('user_id', $user->id)->where('complete', 1)->get();

        $allbadges = [];

        foreach($progressions as $p) {
            
                $badge = Challenge_Badge::where('challenge_id', $p->challenge_id)->get()->first();
                $challenge = Challenge::where('id', $p->challenge_id)->get()->first();

                $p['badge'] = $badge->url;
                $p['name'] = $challenge->name;

                $allbadges[$p->challenge_id] = $p;
            
        }

        
        $profiledata['challengesinfo'] = $challengesinfo;
        $profiledata['user'] = $user;
        $profiledata['profile'] = $profile;
        $profiledata['profilepicture'] = $profilepicture;
        $profiledata['profilestatistics'] = $profilestatistics;
        $profiledata['currencypoints'] = $currencypoints;
        $profiledata['categories'] = $categories;
        $profiledata['posts'] = $posts;
        $profiledata['allbadges'] = $allbadges;
        


        return ['profiledata' => $profiledata];
    }

    function getAllData() {
        $user = Auth::user();

        $alldata = [];

        //Compiling User Info

        //User data
        $user = User::find(Auth::user()->id);
        $alldata["user-info"]["user"] = $user;

        //Profile data
        $profile = Profile::where('user_id', $user->id)->get()->first();
        $alldata["user-info"]["profile"] = $profile;

        //Profile Statistics
        $stats = Profile_Statistics::where('user_id', $user->id)->get()->first();
        $alldata["user-info"]["stats"] = $stats;

        //All Profile Pictures
        $profilepictures = Profile_Picture::where('user_id', $user->id)->get();
        $alldata["user-info"]["profilepictures"] = $profilepictures;

        //Compiling Followers
        $followers = Follower::where('followed', $user->id)->get();
        $alldata["user-info"]["followers"] = $followers;

        //Compiling Following
        $following = Follower::where('following', $user->id)->get();
        $alldata["user-info"]["following"] = $following;

        //Compiling Currency Points
        $points = Currency_Points::where('user_id', $user->id)->get();
        $alldata["currencypoints"] = $points;


        //Compiling Challenge Data
        $categories = Category::get();
        $challengesets = Challenge_Set::get();
        $challenges = Challenge::get();
        $challengebadges = Challenge_Badge::get();
        $challengeprogressions = Challenge_Progression::where('user_id', Auth::user()->id)->get();
        $favourites = (array) json_decode(User_interests_Categories::where('user_id', Auth::user()->id)->get()->first()->favourites);
        $icons = Challenge_sets_Icon::get();

        $currencypoints = Currency_Points::where('user_id', Auth::user()->id)->orderby('points', 'DESC')->get();

        $challengespage = [];

        foreach($currencypoints as $cu) {
            foreach($categories as $category){
                if($category->category_id == $cu->category_id){
                $categorysub = [];

                $categorysub['category_id'] = $category->category_id;
                $categorysub['category_name'] = $category->category_name;
                $categorysub['icon'] = $category->icon;
                $categorysub['points'] = $cu->points;

                if($favourites[$category->category_name]){
                    $categorysub['favourite'] = true;
                } else {
                    $categorysub['favourite'] = false;
                }

                foreach($challengesets as $challengeset){

                    if($challengeset->category_id == $category->category_id){
                        $challengesubset = [];
                        $completed = 0;
                        $total = 0;

                        $challengesubset['id'] = $challengeset->id;
                        $challengesubset['event_id'] = $challengeset->event_id;
                        $challengesubset['category_id'] = $challengeset->category_id;
                        $challengesubset['name'] = $challengeset->name;
                        $challengesubset['length'] = $challengeset->length;
                        $challengesubset['difficulty'] = $challengeset->difficulty;
                        $challengesubset['active_untill'] = $challengeset->active_untill;

                        foreach($icons as $icon){
                            if($icon->challenge_set_id === $challengeset->id){
                                $challengesubset['icon'] = $icon->url;
                            }
                        }

                        foreach($challenges as $challenge){

                            if($challenge->challenge_set_id === $challengeset->id){
                                $challengesub = [];

                                $challengesub['id'] = $challenge->id;
                                $challengesub['challenge_set_id'] = $challenge->challenge_set_id;
                                $challengesub['name'] = $challenge->name;
                                $challengesub['difficulty'] = $challenge->difficulty;
                                $challengesub['description'] = $challenge->description;
                                $challengesub['points'] = $challenge->points;
                                $challengesub['cans_needed_to_unlock'] = $challenge->cans_needed_to_unlock;
                                $challengesub['upvote_ratio'] = $challenge->upvote_ratio;

                                foreach($challengebadges as $challengebadge){
                                    if($challengebadge->challenge_id == $challenge->id){
                                        $challengesub['badge'] = $challengebadge->url;
                                    }
                                }
                                foreach($challengeprogressions as $challengeprogression){
                                    if($challengeprogression->challenge_id == $challenge->id){
                                        $challengesub['progression'] = $challengeprogression;
                                        if($challengeprogression->complete){
                                            $completed++;
                                        }
                                        $total++;
                                    }
                                }

                                $percentage = $completed/$total * 100;

                                $challengesubset['percentage'] = $percentage;
                                $challengesubset['completed'] = $completed;
                                $challengesubset['total'] = $total;

                                $challengesubset['challenges'][$challenge->id] = $challengesub;
                            }
                        }

                        $categorysub['challengesets'][$challengeset->id] = $challengesubset;

                    }
                }

                array_push($challengespage, $categorysub);
            }
        }
        
    }

        $alldata["challenge-data"]= $challengespage;
        
        //Compiling Posts
        $posts = Post::where('user_id', $user->id)->orderby('created_at', 'DESC')->get();
        $postimages = Post_Image::get();

        foreach($posts as $p) {
            foreach($postimages as $pi) {
                if($p->id === $pi->post_id){
                    $p['url'] = $pi->url;
                }
            }
        }

        $alldata["posts"] = $posts;

        //Compiling Upvotes
        $up = Post_Upvotes::where('user_id', $user->id)->get();
        foreach($up as $u){
            $post = Post::where('id', $u->post_id)->get()->first();
            $u["post"] = $post;
        } 
        $alldata["upvotes"] = $up;

        //Compiling Downvotes
        $down = Post_Downvotes::where('user_id', $user->id)->get();
        foreach($down as $d){
            $post = Post::where('id', $d->post_id)->get()->first();
            $d["post"] = $post;
        } 
        $alldata["downvotes"] = $down;

        $textfile = $this->createTextFile($alldata);

    return['data' => $alldata, 'textfile' => $textfile];
    }












    function createTextFile($a){
        $tt = "ALL DATA: " . $a["user-info"]["user"]["name"];

        $tt .= "\n";
        $tt .= "\n";
        $tt .= "\t";
        $tt .= "General Info:" . "\n"; 

        $tt .= "Username: " . $a["user-info"]["user"]["name"] . "\n"; 
        $tt .= "Email: " . $a["user-info"]["user"]["email"] . "\n";
        $tt .= "First Name: " . $a["user-info"]["profile"]["first_name"] . "\n";
        $tt .= "Last Name: " . $a["user-info"]["profile"]["last_name"] . "\n";
        $tt .= "Created account: " . $a["user-info"]["user"]["created_at"] . "\n";

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Profile Statistics:" . "\n"; 

        $tt .= "Followers:" . $a["user-info"]["stats"]["followers"] . "\n"; 
        $tt .= "Following:" . $a["user-info"]["stats"]["following"] . "\n"; 
        $tt .= "Number of Posts:" . $a["user-info"]["stats"]["amount_of_posts"] . "\n"; 
        $tt .= "Total Cans Scanned:" . $a["user-info"]["stats"]["total_cans_scanned"] . "\n"; 

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Profile Pictures:" . "\n";
        $tt .= "\n"; 

        foreach($a["user-info"]["profilepictures"] as $p){
            $tt .= "Filename:" . $p["filename"] . "\n";
            $tt .= "URL:" . $p["url"] . "\n";  
            $tt .= "Active:" . $p["active"] . "\n"; 
            $tt .= "\n";
        }

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Followers:" . "\n";
        $tt .= "\n";
        
        foreach($a["user-info"]["followers"] as $f){
            $fp = Profile::where('user_id', $f["following"])->get()->first();

            $tt .= "Username:" .  $fp->username . "\n"; 
            $tt .= "First Name:" . $fp->first_name . "\n";
            $tt .= "Last Name:" . $fp->last_name . "\n";
            $tt .= "\n";
        }

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Following:" . "\n";
        $tt .= "\n";
        
        foreach($a["user-info"]["followers"] as $f){
            $fp = Profile::where('user_id', $f["followed"])->get()->first();

            $tt .= "Username:" .  $fp->username . "\n"; 
            $tt .= "First Name:" . $fp->first_name . "\n";
            $tt .= "Last Name:" . $fp->last_name . "\n";
            $tt .= "\n";
        } 

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Currency Points:" . "\n";
        $tt .= "\n";

        foreach($a["challenge-data"] as $c){
            $tt .= "Category:" . $c["category_name"] . "\n"; 
            $tt .= "Points:" . $c["points"] . "\n";
            $tt .= "\n";
        }

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Challenges Overview By Category:" . "\n";
        $tt .= "\n"; 

        $tt .= "Categories:" . "\n";
        $tt .= "\n";

        foreach($a["challenge-data"] as $c){

        $tt .= "\n";
        $tt .= "\t" . "Category Name:" . $c["category_name"] . "\n";
        $tt .= "\t" . "Category Icon:" . $c["icon"] . "\n";

        $tt .= "\n";

        $tt .= "\t" . "\t" . "Challenge Sets:" . "\n";

        $tt .= "\n";
        
        $challengesets = Challenge_Set::where('category_id', $c["category_id"])->get();
        foreach($challengesets as $cs){

        $tt .= "\t" . "\t" . "\t" . "Challenge Set Name:" . $cs["name"] . "\n";
        $tt .= "\t" . "\t" . "\t" . "Challenge Set Description:" . $cs["description"] . "\n";
        $tt .= "\t" . "\t" . "\t" . "Challenge Set Length:" . $cs["length"] . "\n";
        $tt .= "\t" . "\t" . "\t" . "Challenge Set Difficulty:" . $cs["difficulty"] . "\n";
        $tt .= "\t" . "\t" . "\t" . "Challenge Set Icon:" . $cs["icon"] . "\n";
        $tt .= "\t" . "\t" . "\t" . "Challenge Set Amount of Challenges:" . $cs["total"] . "\n";
        $tt .= "\n";

        $tt .= "\t" . "\t" . "\t" . "\t" . "Challenges:" . "\n";

        $tt .= "\n";

        $challenges = Challenge::where('challenge_set_id', $cs->id)->get();
        foreach($challenges as $ci){

        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Name:" . $ci->name . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Description:" . $ci->description . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Difficulty:" . $ci->difficulty . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Points:" . $ci->points . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Cans To Unlock:" . $ci->cans_needed_to_unlock . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Upvote Ratio:" . $ci->upvote_ratio . "\n";

        $p = Challenge_Progression::where('challenge_id', $ci->id)->where('user_id', Auth::user()->id)->get()->last();

        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Cans Scanned:" . $p->cans_scanned . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Locked:" . $p->locked . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Unlocked:" . $p->unlocked . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Pending:" . $p->pending . "\n";
        $tt .= "\t" . "\t" . "\t" . "\t" . "\t" . "Challenge Complete:" . $p->complete . "\n";
        $tt .= "\n";
        $tt .= "\n";
        }
        $tt .= "\n";
        $tt .= "\n";
        }
        $tt .= "\n";
        $tt .= "\n";
        }


        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Posts:" . "\n"; 

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Upvotes:" . "\n"; 

        $tt .= "\n";
        $tt .= "\t";
        $tt .= "Downvotes:" . "\n"; 

        return $tt;


    }
}
