<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\traits\MyTrait;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    use MyTrait;

   public function index(){

    $category = Category::all();

    return response()->json($category);

    }

    public function categoryId(Request $request){

        $category = Category::find($request->id);

        if(!$category)
       return $this->returnError(errorNo:'001', msg:'Not Found');

        // return response()->json($category);
        return $this->returnData('category',$category);

        }
}
