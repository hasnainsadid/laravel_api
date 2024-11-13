<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return response()->json([
            'message' => 'Category created successfully',
            'data' => new CategoryResource($category)
        ], 200);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => new CategoryResource($category)
        ], 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
