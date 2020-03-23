<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct() {
        $this->middleware('APIToken')->except([
            'index', 'show'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // calling category model to get all data from category table
        $category = Category::all();

        // creating http response
        $response = [
            'message' => 'All Categories Data',
            'category' => $category
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $categoryName = $request->category_name;
        $categoryDescription = $request->category_description;

        $category = new Category([
            'category_name' => $categoryName,
            'category_description' => $categoryDescription
        ]);

        if ($category->save()) {
            $successMessage = [
                'message' => 'Category Data Created',
                'category' => $category
            ];
            return response()->json($successMessage, 201);
        }

        $errorMessage = [ 
            'message' => 'Error during creation' 
        ];

        return response()->json($errorMessage, 404);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //validation
        $this->validate($request, [
            'category_name' => 'required'
        ]);

        $category = Category::findOrFail($category->category_id);

        $categoryName = $request->category_name;
        $categoryDescription = $request->category_description;

        $category->update([
            'category_name' => $categoryName
        ]);

        if (!$category->update()) {
            return response()->json([
                'message' => 'Error during update data'
            ], 404);
        }

        $response = [
            'message' => 'Category Updated',
            'category_data' => [
                'category_name' => $categoryName,
                'category_description' => $categoryDescription
            ]
        ];

        return response()->json(
            $response, 200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categoryId = Category::findOrFail($category->category_id);

        if (!$category->delete()) {
            return response()->json([
                'message' => 'Deletion Failed'
            ], 404);
        }

        return response()->json([
            'message' => 'Category Deleted'
        ], 200);
    }
    
}
