<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\InvoiceItem;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Validator;

class ProductController extends AppBaseController
{
    /**
     * @var ProductRepository
     */
    public $productRepository;

    /**
     * @param  ProductRepository  $productRepo
     */
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * @param  Request  $request
     * @return Application|Factory|View
     *
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new ProductDataTable())->get())->make(true);
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view('products.create', compact('categories'));
    }

    /**
     * @param  CreateProductRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateProductRequest $request): RedirectResponse
    {
        $rules = array(
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $input = $request->all();
        $this->productRepository->store($input);
        Flash::success('Product created successfully.');

        return redirect()->route('products.index');
    }

    /**
     * @param  Product  $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $product->load('category');
        $image = DB::table('media')->where('model_id', $product->id)->get();

        return view('products.edit', compact('product', 'categories', 'image'));
    }

    /**
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product = Product::where('id',$request->productId)->update([
                'name' => $request->name,
                'code' => $request->code,
                'category_id' =>  $request->category_id,
                'unit_price' =>  $request->unit_price,
                'description' =>  $request->description,
                'shippingPolicy' =>  $request->shippingPolicy,
            ]);

            if($request->image){
                $exsistImage_remove = DB::table('media')->where(['id'=> $request->imageID0,'model_id'=> $request->productId, 'collection_name'=> 'product'])->first();
                $path = public_path().'/uploads/'.$request->imageID0."/".$exsistImage_remove->file_name;
                unlink($path);
                $imageName = "Image".time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/'.$request->imageID0), $imageName);
                $media = DB::table('media')->where(['id'=> $request->imageID0,'model_id'=> $request->productId, 'collection_name'=> 'product'])->update([
                    'file_name' => $imageName,
                ]);
            }

            if($request->image1){
                $exsistImage_remove = DB::table('media')->where(['id'=> $request->imageID1,'model_id'=> $request->productId, 'collection_name'=> 'product'])->first();
                $path = public_path().'/uploads/'.$request->imageID1."/".$exsistImage_remove->file_name;
                unlink($path);
                $imageName = "Image".time().'.'.$request->image1->extension();
                $request->image1->move(public_path('uploads/'.$request->imageID1), $imageName);
                $media = DB::table('media')->where(['id'=> $request->imageID1,'model_id'=> $request->productId, 'collection_name'=> 'product'])->update([
                    'file_name' => $imageName,
                ]);
            }

            if($request->image2){
                $exsistImage_remove = DB::table('media')->where(['id'=> $request->imageID2,'model_id'=> $request->productId, 'collection_name'=> 'product'])->first();
                $path = public_path().'/uploads/'.$request->imageID2."/".$exsistImage_remove->file_name;
                unlink($path);
                $imageName = "Image".time().'.'.$request->image2->extension();
                $request->image2->move(public_path('uploads/'.$request->imageID2), $imageName);
                $media = DB::table('media')->where(['id'=> $request->imageID2,'model_id'=> $request->productId, 'collection_name'=> 'product'])->update([
                    'file_name' => $imageName,
                ]);
            }


            if($request->image3){
                $exsistImage_remove = DB::table('media')->where(['id'=> $request->imageID3,'model_id'=> $request->productId, 'collection_name'=> 'product'])->first();
                $path = public_path().'/uploads/'.$request->imageID3."/".$exsistImage_remove->file_name;
                unlink($path);
                $imageName = "Image".time().'.'.$request->image3->extension();
                $request->image3->move(public_path('uploads/'.$request->imageID3), $imageName);
                $media = DB::table('media')->where(['id'=> $request->imageID3,'model_id'=> $request->productId, 'collection_name'=> 'product'])->update([
                    'file_name' => $imageName,
                ]);
            }


            Flash::success('Product updated   successfully.');
            return redirect()->route('products.index');

        } catch (Exception $e) {
            return $e->getMessage();

        }

    }

    /**
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        $invoiceModels = [
            InvoiceItem::class,
        ];
        $result = canDelete($invoiceModels, 'product_id', $product->id);
        if ($result) {
            return $this->sendError(__('messages.flash.product_cant_deleted'));
        }
        $product->delete();

        return $this->sendSuccess('Product Deleted successfully.');
    }

    /**
     * @param  Product  $product
     * @return Application|Factory|View
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }
}
