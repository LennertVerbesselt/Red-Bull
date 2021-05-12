<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\User;
use App\Models\Currency_Points;


class CategoryController extends Controller
{
    public function index()
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
      }

      
      return view('CMS/addcategory');
    }





}