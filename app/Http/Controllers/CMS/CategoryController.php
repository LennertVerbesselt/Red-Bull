<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\Currency_Points;
use App\Models\User_Interests_Categories;


class CategoryController extends Controller
{
    public function index() {
      $categories = Category::get();

      return view('CMS/categories', ['categories' => $categories]);
    }

    public function addCategoryPage()
    {
      return view('CMS/addcategory');
    }

    public function addCategory(Request $request){

      //Add new category to list
      $category = new Category;
      $category->category_name = $request->name;
      $category->save();

      //Create new Currency counter for every user for new category
      $users = User::get();
      $category = Category::latest()->first();

      foreach ($users as $user){
        $currency = new Currency_Points;
        $currency->user_id = $user->id;
        $currency->category_id = $category->category_id;
        $currency->save();
      }

      //Change every user interests item
      $interests = User_Interests_Categories::get();
      foreach($interests as $interest){
        $a = json_decode($interest->favourites);
        $b = [ $category->category_name => 0];
        array_push($a, $b);
        $interest->favourites = $a;
        $interest->save();
      }
      
      $categories = Category::get();

      return view('CMS/categories', ['categories' => $categories]);
    }





}