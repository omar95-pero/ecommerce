<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MainCategoriesController extends Controller
{

    function index()
    {
        $default_lang = get_default_lang();
        // dd($default_lang);
        $categories = MainCategory::where('translation_lang', $default_lang)->Selection()->get();
        // dd($categories);
        return view('admin.maincategories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.maincategories.create');
    }
    public function store(MainCategoryRequest $reaquest)
    {
        // validation
        // save Data
    }
}
