<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
   
    public function index()
    {
        return Category::all();
    }

    public function store(CategoryRequest $request)
    {
       return Category::create($request->all());
    }

    
    public function show(Category $category)
    {
        return $category;
    }
    
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return $category;
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->noContent(); //return 204
        
    }
}
