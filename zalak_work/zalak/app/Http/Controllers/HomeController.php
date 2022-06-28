<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dashboard()
    {
        $data = product::latest()->paginate(5);
        $datanew['newdata'] = " ";
        $jay = Category::get('cname');
        return view('dashboard',compact('data','datanew','jay'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            }
            else{
            $products = $query->where(['category_id' => $request->category])->get();
            }
            return response()->json($products);
        }
    }
   
}
