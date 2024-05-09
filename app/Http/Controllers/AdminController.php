<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_category()
    {

        if (Auth::id()) {

            $data = Category::all();
            return view('admin.category', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function store_category(Request $request)
    {

        if (Auth::id()) {


            $data = new Category;

            $data->category_name = $request->category_name;

            $data->save();

            return redirect()->back()->with('message', 'Category Added Successfully');
        } else {
            return redirect('login');
        }
    }

    public function delete_category($id)
    {

        if (Auth::id()) {

            $data = Category::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        } else {
            return redirect('login');
        }
    }

    //========================================================================

    public function view_product()
    {

        if (Auth::id()) {

            $data = Category::all();
            return view('admin.product', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function store_product(Request $request)
    {

        if (Auth::id()) {


            $data = new Product;

            $image = $request->file('image');
            // echo "<pre>";
            // print_r($image->toArray());
            // die;
            $imageName = time() . '-rabi.' . $image->extension();

            $request->image->move('backend/product-images', $imageName);

            $data->image = $imageName;

            $data->title = $request->title;
            $data->description = $request->description;
            $data->category = $request->category;
            $data->quantity = $request->quantity;
            $data->price = $request->price;
            $data->discount_price = $request->discount_price;

            $data->save();

            return redirect()->back()->with('message', 'Product Added Successfully');
        } else {
            return redirect('login');
        }
    }

    public function show_product()
    {

        if (Auth::id()) {


            $data = Product::all();
            return view('admin.show_product', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function delete_product($id)
    {

        if (Auth::id()) {

            $data = Product::find($id);
            $data->delete();
            return redirect()->back()->with('message', 'Product Deleted Successfully');
        } else {
            return redirect('login');
        }
    }

    public function edit_product($id)
    {

        if (Auth::id()) {

            $cdata = Category::all();
            $data = Product::find($id);
            return view('admin.edit_product', compact('data', 'cdata'));
        } else {
            return redirect('login');
        }
    }

    public function update_product(Request $request, $id)
    {

        if (Auth::id()) {


            $data = Product::find($id);

            $image = $request->file('image');

            if ($image) {
                $imageName = time() . '-rabi.' . $image->extension();

                $request->image->move('backend/product-images', $imageName);

                $data->image = $imageName;
            }
            $data->title = $request->title;
            $data->description = $request->description;
            $data->category = $request->category;
            $data->quantity = $request->quantity;
            $data->price = $request->price;
            $data->discount_price = $request->discount_price;

            $data->save();

            return redirect()->back()->with('message', 'Product Updated Successfully');
        } else {
            return redirect('login');
        }
    }

    public function view_order()
    {

        if (Auth::id()) {

            $data = Order::all();
            return view('admin.show_order', compact('data'));
        } else {
            return redirect('login');
        }
    }
    public function order_delivered($id)
    {

        if (Auth::id()) {


            $order = Order::find($id);

            $order->payment_status = 'Paid';
            $order->delivery_status = 'Delivered';

            $order->save();
            return redirect()->back()->with('message', 'Delivery Status Changes to Delivered Successfully');
        } else {
            return redirect('login');
        }
    }
    public function print_PDF($id)
    {

        if (Auth::id()) {

            $order = Order::find($id);

            $pdf = PDF::loadView('admin.pdf', compact('order'));
            return $pdf->download('order_details.pdf');
        } else {
            return redirect('login');
        }
    }

    public function send_email($id)
    {

        if (Auth::id()) {

            $order = Order::find($id);


            return view('admin.email_info', compact('order'));
        } else {
            return redirect('login');
        }
    }
    public function send_user_email(Request $request, $id)
    {

        if (Auth::id()) {


            $order = Order::find($id);

            $details = [

                'greeting' => $request->greeting,
                'first_line' => $request->first_line,
                'mail_body' => $request->mail_body,
                'mail_button' => $request->mail_button,
                'mail_url' => $request->mail_url,
                'last_line' => $request->last_line,

            ];

            Notification::send($order, new EmailNotification($details));

            return redirect('admin.email_info')->with('message', 'Email sent Successfully');
        } else {
            return redirect('login');
        }
    }

    public function search_data(Request $request)
    {

        if (Auth::id()) {

            $searchText = $request->search;

            $data = Order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('title', 'LIKE', "%$searchText%")->get();

            return view('admin.show_order', compact('data'));
        } else {
            return redirect('login');
        }
    }
}
