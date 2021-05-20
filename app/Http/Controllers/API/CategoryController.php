<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;


class CategoryController extends Controller
{
    public function getCategories() {

        $categories = Category::get();
        return ['categories' => $categories];
    }
}
