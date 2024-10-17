<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;


class AdminController extends Controller
{
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    protected function getRecentOrders()
    {
        return Order::orderBy('created_at', 'DESC')->take(5)->get();
    }

    public function index()
    {
        $recentOrders = $this->getRecentOrders();
        $orders = Order::orderBy('created_at', 'DESC')->get()->take(10);
        $dashboardDatas = DB::select("Select sum(total) As TotalAmount,
                                    sum(if(status='ordered',total,0)) As TotalOrderedAmount,
                                    sum(if(status='delivered',total,0)) As TotalDeliveredAmount,
                                    sum(if(status='canceled',total,0)) As TotalCanceledAmount,
                                    Count(*) As Total,
                                    sum(if(status='ordered',1,0)) As TotalOrdered,
                                    sum(if(status='delivered',1,0)) As TotalDelivered,
                                    sum(if(status='canceled',1,0)) As TotalCanceled
                                    From Orders
                                    ");
        return view('admin.index', compact('orders', 'dashboardDatas', 'recentOrders'));
    }
    public function categories()
    {
        // Fetch recent orders
        $recentOrders = $this->getRecentOrders();

        // Fetch categories
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        // Pass both recent orders and categories to the view
        return view("admin.categories", compact('categories', 'recentOrders'));
    }

    //Add Category
    public function category_add()
    {
        // Fetch recent orders
        $recentOrders = $this->getRecentOrders();

        // Pass recent orders to the view
        return view("admin.category-add", compact('recentOrders'));
    }

    public function GenerateCategoryThumbnailsImage($image, $imageName)
    {
        $destinationPath = public_path('uploads/categories');
        $img = Image::read($image->getRealPath());
        $img->cover(124, 124, "top");
        $img->resize(124, 124, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $image = $request->file('image');
        $file_extention = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp . '.' . $file_extention;
        $this->GenerateCategoryThumbnailsImage($image, $file_name);
        $category->image = $file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category has been Added Successfully!');
    }

    public function category_edit($id)
    {
        $category = Category::find($id);
        return view('admin.category-edit', compact('category'));
    }

    //Category Edit Function
    public function category_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $request->id,
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/categories') . '/' . $category->image)) {
                File::delete(public_path('uploads/categories') . '/' . $category->image);
            }
            $image = $request->file('image');
            $file_extention = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp . '.' . $file_extention;
            $this->GenerateCategoryThumbnailsImage($image, $file_name);
            $category->image = $file_name;
        }

        $category->save();
        return redirect()->route('admin.categories')->with('status', 'Category has been Updated Successfully!');
    }


    //Category Delete Function
    public function category_delete($id)
    {
        $category = Category::find($id);
        if (File::exists(public_path('uploads/categories') . '/' . $category->image)) {
            File::delete(public_path('uploads/categories') . '/' . $category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('status', 'Category has been Deleted Successfully!');
    }

    public function products()
    {
        $recentOrders = $this->getRecentOrders();
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.products', compact('products', 'recentOrders'));
    }

    public function product_add()
    {
        $recentOrders = $this->getRecentOrders();
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        return view('admin.product-add', compact('categories', 'recentOrders'));
    }

    public function GenerateProductThumbnailsImage($image, $imageName)
    {
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->getRealPath());
        $img->cover(540, 689, "top");
        $img->resize(540, 689, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imageName);

        $img->resize(104, 104, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail . '/' . $imageName);
    }

    public function product_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'short_description' => 'required',
            'description' => 'required',
            'sale_price' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sale_price = $request->sale_price;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailsImage($image, $imageName);
            $product->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if ($request->hasFile('images')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedfileExtension);
                if ($gcheck) {
                    $gfilename = $current_timestamp . "-" . $counter . "." . $gextension;
                    $this->GenerateProductThumbnailsImage($file, $gfilename);
                    array_push($gallery_arr, $gfilename);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
        }
        $product->images = $gallery_images;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('admin.products')->with('status', 'Product has been Added Successfully!');
    }

    public function product_edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        return view('admin.product-edit', compact('product', 'categories'));
    }

    public function product_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug,' . $request->id,
            'short_description' => 'required',
            'description' => 'required',
            'sale_price' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required'
        ]);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->sale_price = $request->sale_price;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        $current_timestamp = Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/products') . '/' . $product->image)) {
                File::delete(public_path('uploads/products') . '/' . $product->image);
            }
            if (File::exists(public_path('uploads/products/thumbnails') . '/' . $product->image)) {
                File::delete(public_path('uploads/products/thumbnails') . '/' . $product->image);
            }
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->extension();
            $this->GenerateProductThumbnailsImage($image, $imageName);
            $product->image = $imageName;
        }

        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if ($request->hasFile('images')) {
            foreach (explode(',', $product->images) as $ofile) {
                if (File::exists(public_path('uploads/products') . '/' . $ofile)) {
                    File::delete(public_path('uploads/products') . '/' . $ofile);
                }
                if (File::exists(public_path('uploads/products/thumbnails') . '/' . $ofile)) {
                    File::delete(public_path('uploads/products/thumbnails') . '/' . $ofile);
                }
            }

            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension, $allowedfileExtension);
                if ($gcheck) {
                    $gfilename = $current_timestamp . "-" . $counter . "." . $gextension;
                    $this->GenerateProductThumbnailsImage($file, $gfilename);
                    array_push($gallery_arr, $gfilename);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',', $gallery_arr);
            $product->images = $gallery_images;
        }
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('admin.products')->with('status', 'Product has been Updated Successfully!');
    }

    public function product_delete($id)
    {
        $product = Product::find($id);
        if (File::exists(public_path('uploads/products') . '/' . $product->image)) {
            File::delete(public_path('uploads/products') . '/' . $product->image);
        }
        if (File::exists(public_path('uploads/products/thumbnails') . '/' . $product->image)) {
            File::delete(public_path('uploads/products/thumbnails') . '/' . $product->image);
        }

        foreach (explode(',', $product->images) as $ofile) {
            if (File::exists(public_path('uploads/products') . '/' . $ofile)) {
                File::delete(public_path('uploads/products') . '/' . $ofile);
            }
            if (File::exists(public_path('uploads/products/thumbnails') . '/' . $ofile)) {
                File::delete(public_path('uploads/products/thumbnails') . '/' . $ofile);
            }
        }

        $product->delete();
        return redirect()->route('admin.products')->with('status', 'Product has been Deleted Successfully!');
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.orders', compact('orders'));
    }

    public function order_details($order_id)
    {
        $order = Order::find($order_id);
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id', $order_id)->first();
        return view('admin.order-details', compact('order', 'orderItems', 'transaction'));
    }

    public function update_order_status(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->order_status;
        if ($request->order_status == 'rejected') {
            $order->canceled_date = Carbon::now();
        } elseif ($request->order_status == 'canceled') {
            $order->canceled_date = Carbon::now();
        } elseif ($request->order_status == 'processing') {
            $order->updated_date = Carbon::now();
        } elseif ($request->order_status == 'delivered') {
            $order->delivered_date = Carbon::now();
        }
        $order->save();

        /* if ($request->order_status == 'delivered') {
            $transaction = Transaction::where('order_id', $request->order_id)->first();
            $transaction->status = 'approved';
            $transaction->save();
        } */
        return back()->with("status", "Status changed successfully!");
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('name', 'LIKE', "%{$query}%")->get()->take(8);
        return response()->json($results);
    }

    public function pending_orders()
    {
        $orders = Order::where('status', 'pending')->orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.pending-orders', compact('orders'));
    }

    public function rejected_orders()
    {
        $orders = Order::where('status', 'rejected')->orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.rejected-orders', compact('orders'));
    }

    public function canceled_orders()
    {
        $orders = Order::where('status', 'canceled')->orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.cancelled-orders', compact('orders'));
    }

    public function processing_orders()
    {
        $orders = Order::where('status', 'processing')->orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.processing-orders', compact('orders'));
    }

    public function delivered_orders()
    {
        $orders = Order::where('status', 'delivered')->orderBy('created_at', 'DESC')->paginate(12);
        return view('admin.delivered-orders', compact('orders'));
    }
}
