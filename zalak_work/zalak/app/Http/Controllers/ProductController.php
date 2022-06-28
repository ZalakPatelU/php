<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $data = product::latest()->paginate(10);
        $datanew['newdata'] = " ";
        $jay = Category::get('cname');
        return view('product.index',compact('data','datanew','jay'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $jay = Category::get('cname');

        
        return view('product.create', compact('jay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'category_id'=>'required',
            'image'=>'required | image |mimes : jpeg,png,jpg|max:20048',
            'active'=> 'required',
        ]);

       

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('public/images'), $imageName);
        $product=$request->all();
        $product['image'] = $imageName;
        Product::create($product);

        return redirect()->route('product.index')
                        ->with('success','product Added successfully.');
    
    }
    public function show()
    {
       // return view ('product.index');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *  @param \app\models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $jay = Category::get('cname');
        return view('product.edit',compact('product','jay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \app\models\Product $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        

        if(!empty($request->image)) {

            unlink(public_path('public/images/'.$product->image));

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images'), $imageName);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->active = $request->active;

            // $product=$request->all();

            // $product['createdbyuser']=$user->id;

            $product['image'] = $imageName;

            $product->update();

            return redirect('product')

                        ->with('success','Post created successfully.');

        }else{

            $product->name = $request->name;

            $product->category_id = $request->category_id;

            $product->active = $request->active;

            // $product['createdbyuser']=$user->id;

            $product->update();

            return redirect('product') ->with('success','Post created successfully.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *@param \app\models\Product $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }
}
