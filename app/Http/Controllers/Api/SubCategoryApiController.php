<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;

class SubCategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = SubCategory::all();
        return $categories;
    }
}
