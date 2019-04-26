<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ProcessUtils;


class ProductController extends Controller
{
    //for Categories
    public function getCategory(){
       // $cats=Category::all();
        $cats=Category::OrderBy('id','desc')->paginate("3");
        return view('category')->with(['cats'=>$cats]);
    }

    public function postNewCategory(Request $request){
        $this->validate($request,[
            'cat_name'=>'required|unique:categories'
        ]);
        $cat=new Category();
        $cat->cat_name=$request['cat_name'];
        $cat->save();
        return redirect()->back()->with('alert','The category has been saved');
    }

    public function getDeleteCategory($id){
        $cats=Category::where('id',$id)->firstOrFail();
        $cats->delete();
        return redirect()->back()->with('info','The selected category has been deleted');
    }

    public function postUpdateCategory(Request $request){
        $cat_id=$request['id'];
        $cat_name=$request['cat_name'];
        $cats=Category::whereId($cat_id)->firstOrFail();
        $cats->cat_name=$cat_name;
        $cats->update();
        return redirect()->back()->with('info','The category has been updated');
    }

    //for Products

    public function getProducts(){
        $pds=Product::OrderBy('id','desc')->get();
        $cats=Category::all();
        return view('product')->with(['cats'=>$cats, 'pds'=>$pds]);// to send category id to select ->product.blade
    }

    public function postNewProduct(Request $request){
        $this->validate($request,[
            'product_name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'image'=>'required|mimes:jpg,png,gif,jpeg'
        ]);

        $img_name=$request['product_name'].'.'.$request->file('image')->getClientOriginalExtension();
        $img_file=$request->file('image');

        $pd=new Product();
        $pd->product_name=$request['product_name'];
        $pd->price=$request['price'];
        $pd->category_id=$request['category_id'];
        $pd->image=$img_name;
        $pd->user_id=Auth::user()->id;
        $pd->save();
        Storage::disk('product')->put($img_name, file::get($img_file));
        return redirect()->back()->with('info','The Products have been inserted');
    }

    public function getProductImage($img_name){
        $file=Storage::disk('product')->get($img_name);
        return response($file, 200);
    }

    public function getDeleteProduct(Request $request){
        $id=$request['id'];
        $pd=Product::whereId($id)->firstOrFail();
        Storage::disk('product')->delete($pd->image);
        $pd->delete();
        return redirect()->back();
    }

//    public function postUpdateProduct(Request $request){
//        $id=$request['id'];
//        $price=$request['price'];
//        $product_name=$request['product_name'];
//        $pd=Product::whereId($id)->firstOrFail();
//        $pd->product_name=$product_name;
//        $pd->price=$price;
//        $pd->update();
//        return redirect()->back()->with('info','The Product has been updated');
//
//    }

    public function getEditProduct($id){
        $cats=Category::all();
        $pd=Product::whereId($id)->firstOrFail();
        return view("edit_product")->with(['pd'=>$pd,'cats'=>$cats]);
    }

    public function postUpdateProduct(Request $request){
        $image=$request->file('image');
        $id=$request['id'];
        $pd=Product::whereId($id)->firstOrFail();
        if(!empty($image)){
            Storage::disk('product')->delete($pd->image);
            $img_name=$request['product_name'].".".$request->file('image')->getClientOriginalExtension();
            $pd->image=$img_name;
            Storage::disk('product')->put($img_name,file::get($image));
        }
        $pd->product_name=$request['product_name'];
        $pd->price=$request['price'];
        $pd->category_id=$request['category_id'];
        $pd->update();
        return redirect()->route('products');
    }
}
