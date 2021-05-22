<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\User;
use App\Models\User_Interests_Categories;


class CategoryController extends Controller
{
    public function getCategories() {

        $categories = Category::get();
        $favourites = (array) json_decode(User_interests_Categories::where('user_id', Auth::user()->id)->get()->first()->favourites);
        
        $FavouriteCategories = [];

        foreach($categories as $category) {
            if($favourites[$category->category_name]){
                array_push($FavouriteCategories, $category);
            }
        }

        return ['categories' => $categories, 'favourites' => $favourites, 'favouritecategories' => $FavouriteCategories];
    }

    public function updateInterests(Request $request) {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $updatedinterests = $request->data;
        $categories = Category::get();

        $i = User_Interests_Categories::where('user_id', $user->id)->get()->first();
        $interests = (array) json_decode($i->favourites);
        

        foreach($categories as $category){  
                $interests[$category->category_name] = $updatedinterests[$category->category_name];
        }
        
        $i->favourites = json_encode($interests);
        $i->save();

    }

    public function setFavourite(Request $request) {
        $category = $request->categoryname;

        $userid = Auth::user()->id;
        $user = User::find($userid);

        $i = User_Interests_Categories::where('user_id', $user->id)->get()->first();
        $interests = (array) json_decode($i->favourites);

        $interests[$category] = !$interests[$category];

        $i->favourites = json_encode($interests);
        $i->save();

        return ['interests', $i];
    }
}
