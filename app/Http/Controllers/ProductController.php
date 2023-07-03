<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Models\ProductPhoto;
use App\Models\BookedProduct;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productCategories = ProductCategory::all();

        return view('products', ['products' => $products, 'productCategories' => $productCategories]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        // Perform the search query using the search term
        $products = Product::where('name', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")
            ->get();

        $productCategories = ProductCategory::all(); // Assuming you have a ProductCategory model

        return view('products', compact('products', 'productCategories'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        // Apply filters based on request parameters
        if ($request->has('product_type')) {
            $query->whereIn('productCategories_id', $request->input('product_type'));
        }

        if ($request->has('purpose')) {
            $query->whereIn('purpose', $request->input('purpose'));
        }

        if ($request->has('target_audience')) {
            $query->whereIn('targetAudience', $request->input('target_audience'));
        }

        if ($request->has('application_area')) {
            $query->whereIn('applicationArea', $request->input('application_area'));
        }

        $products = $query->get();

        $productCategories = ProductCategory::all(); // Assuming you have a ProductCategory model

        return view('products', compact('products', 'productCategories'));
    }

    public function show($id)
    {
        $product = Product::with('productPhotos')->findOrFail($id);
        return view('product', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'subheading' => 'required|string|max:50',
            'productCategories_id' => 'required|exists:productCategories,id',
            'description' => 'required|string',
            'application' => 'required|string',
            'composition' => 'required|string',
            'applicationArea' => 'required|string|max:10',
            'purpose' => 'required|string|max:50',
            'targetAudience' => 'required|string|max:10',
            'price' => 'required|numeric',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->subheading = $validatedData['subheading'];
        $product->productCategories_id = $validatedData['productCategories_id'];
        $product->description = $validatedData['description'];
        $product->application = $validatedData['application'];
        $product->composition = $validatedData['composition'];
        $product->applicationArea = $validatedData['applicationArea'];
        $product->purpose = $validatedData['purpose'];
        $product->targetAudience = $validatedData['targetAudience'];
        $product->price = $validatedData['price'];
        $product->save();

        // Handle product photos
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // Save each photo and associate it with the product
                $filename = time() . '_' . $photo->getClientOriginalName(); // Generate a unique filename
                $photo->move(public_path('images'), $filename); // Save the photo in the public/images directory
                $productPhoto = new ProductPhoto();
                $productPhoto->product_id = $product->id;
                $productPhoto->photo = 'images/' . $filename; // Set the file path in the database
                $productPhoto->save();
            }
        }

        // Redirect or return a response
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function addToCart(string $id)
    {

        $productId = $id;


        $userId = auth()->user()->id; // Assuming you are using authentication

        // Retrieve the product and its price
        $product = Product::findOrFail($productId);
        $price = $product->price;

        // Create a new booked product record
        $bookedProduct = new BookedProduct();
        $bookedProduct->user_id = $userId;
        $bookedProduct->product_id = $productId;
        // $bookedProduct->quantity = 1;
        // $bookedProduct->price = $price;
        $bookedProduct->date = date('Y-m-d'); // Current date
        $bookedProduct->time = date('H:i:s'); // Current time
        $bookedProduct->save();


        return redirect()->route('booking');
    }
}
