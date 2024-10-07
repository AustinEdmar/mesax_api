<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('subcategories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories',
            'category_id' => 'required|exists:categories,id'
        ]);

        SubCategory::create($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategoria criada com sucesso.');
    }

    public function show(SubCategory $subCategory)
    {
        return view('subcategories.show', compact('subCategory'));
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories,name,' . $subCategory->id,
            'category_id' => 'required|exists:categories,id'
        ]);

        $subCategory->update($request->all());
        return redirect()->route('subcategories.index')->with('success', 'Subcategoria atualizada com sucesso.');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategoria excluída com sucesso.');
    }
}
