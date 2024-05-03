<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserInterfaceController extends Controller
{
    public function getCategories(Request $request)
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getTypes(Request $request, int $categoryId)
    {
        $types = Category::findOrFail($categoryId)->types()->get();
        return response()->json($types);
    }

    public function getProducts(Request $request, int $categoryId, int $typeId)
    {
        $products = Category::findOrFail($categoryId)
            ->types()
            ->findOrFail($typeId)
            ->products()
            ->get();
        return response()->json($products);
    }

    public function getProductDetails(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }
}
