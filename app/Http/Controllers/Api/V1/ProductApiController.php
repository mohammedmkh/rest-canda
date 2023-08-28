<?php

namespace App\Http\Controllers\Api\V1;

use Gate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\Admin\ProductResource;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;


//showing the product by resturant
   public function getProductsByResturant($resturant) {

        $products = Product::where('resturant_id',$resturant)->get();
        /* m */
        if ($products) {
        // dd($resturants->toArray());
        return ResponseHelper::success(['products' => $products], 'products retrieved successfully.', 200,);
        } else {
        return ResponseHelper::error('products not found.', 404);
        }
    }

    public function getproductbybestseller(){

        $products=Product::orderby('order_count','desc')->paginate(10);
        /* dd($products); */
        if ($products) {
        // dd($resturants->toArray());
            return ResponseHelper::success(['products' => $products], 'products retrieved successfully.', 200,);
        } else {
            return ResponseHelper::error('products not found.', 404);
        }
    }
    //showing product by category
    public function getProductsByCategory($category_id) {
        $category=ProductCategory::find($category_id);
        $products=$category->product;

        if ($products) {
        // dd($resturants->toArray());
            return ResponseHelper::success(['products' => $products], 'products retrieved successfully.', 200,);
        } else {
            return ResponseHelper::error('products not found.', 404);
        }

    }

   public function productshow($id) {

        $products = Product::find($id);
        /* $category=$products->categories()->get('id');
        $cat_id=$category->id; */
        dd($category);
        if ($products) {
            return ResponseHelper::success(['products' => $products], 'products retrieved successfully.', 200);
        } else {
            return ResponseHelper::error('products not found.', 404);
        }
    }
    //search product=>
    public function product_search($search) {

        $result = Product::where('name', 'LIKE', '%'. $search. '%')->get();
        if(count($result)){
            /* return Response()->json($result); */
            return ResponseHelper::success(['result' => $result], 'results retrieved successfully.', 200);
        }
         else
            {
                return ResponseHelper::error('results not found.', 404);
            }

    }


    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource(Product::with(['categories', 'tags', 'resturant', 'additionals'])->get());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([$request->all(),

        ]);
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));
        $product->additionals()->sync($request->input('additionals', []));

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductResource($product->load(['categories', 'tags', 'resturant', 'additionals']));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));
        $product->tags()->sync($request->input('tags', []));
        $product->additionals()->sync($request->input('additionals', []));
        if ($request->input('photo', false)) {
            if (!$product->photo || $request->input('photo') !== $product->photo->file_name) {
                if ($product->photo) {
                    $product->photo->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($product->photo) {
            $product->photo->delete();
        }

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
