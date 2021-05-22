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
        return ['categories' => $categories];
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
}
