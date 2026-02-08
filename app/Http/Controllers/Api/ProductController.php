<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        try {
            $request->validate([
                'category_id' => 'required|integer|exists:categories,id',
                'page' => 'sometimes|integer|min:1',
                'sort_by' => 'sometimes|string|in:price,popularity,newest',
                'sort_order' => 'sometimes|string|in:asc,desc',
                // 'min_price' => 'sometimes|numeric|min:0',
                // 'max_price' => 'sometimes|numeric|min:0|gt:min_price'
            ], [
                'category_id.exists' => 'The selected category does not exist.',
                'max_price.gt' => 'The maximum price must be greater than the minimum price.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->getMessage()
            ], 422);
        }

        $query = Product::with(['product_images'])
            ->where('category_id', $request->category_id)
            ->where('status', 'active');

        // Price filters
        if ($request->has('min_price')) {
            $query->where('selling_price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price')) {
            $query->where('selling_price', '<=', $request->max_price);
        }

        // Sorting
        switch ($request->sort_by) {
            case 'price':
                $query->orderBy('selling_price', $request->sort_order ?? 'asc');
                break;
            case 'popularity':
                $query->orderBy('total_sales', $request->sort_order ?? 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', $request->sort_order ?? 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $perPage = $request->limit ?? 10;
        $products = $query->paginate($perPage);

        // Calculate price range for filters
        $priceRange = [
            'min' => Product::where('category_id', $request->category_id)->min('selling_price'),
            'max' => Product::where('category_id', $request->category_id)->max('selling_price')
        ];

        return response()->json([
            'status' => "success",
            'message' => 'Products retrieved successfully',
            'data' => [
                'products' => $products,
                'pagination' => [
                    'total_items' => $products->total(),
                    'current_page' => $products->currentPage(),
                    'items_per_page' => $products->perPage(),
                    'total_pages' => $products->lastPage()
                ],
                'filters' => [
                    'price_range' => $priceRange
                ]
            ]
        ]);
    }
    public function details(Request $request){
       try{
            $request->validate([
                'id'=>'required|integer|exists:products,product_uid'
            ]);
       }catch(\Exception $e){
            return response()->json([
                'status'=>'error',
                'message'=>$e->getMessage()
            ]);
       }
        try {
            // Get product with relationships
            $product = Product::with(['category', 'images'])
                ->where('status', 'active')
                ->findOrFail($request->id);

            return response()->json([
                'success' => true,
                'message' => 'Product details retrieved successfully',
                'data' => $product
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'error_code' => 'PRODUCT_NOT_FOUND'
            ], 404);
        } catch (\InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'error_code' => 'INVALID_PRODUCT_ID'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve product details',
                'error_code' => 'SERVER_ERROR'
            ], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
