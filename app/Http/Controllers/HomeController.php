<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            $data = Product::paginate(6);

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            return view('frontend.index', compact('data', 'comment', 'reply', 'count', 'ocount'));
        } else {

            $data = Product::paginate(6);

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            return view('frontend.index', compact('data', 'comment', 'reply'));
        }
    }

    public function product()
    {

        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            $data = Product::paginate(12);

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            return view('frontend.product', compact('data', 'comment', 'reply', 'count', 'ocount'));
        } else {

            $data = Product::paginate(12);

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            return view('frontend.product', compact('data', 'comment', 'reply'));
        }
    }

    public function contact()
    {

        if (Auth::id()) {
            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            return view('frontend.contact', compact('count', 'ocount'));
        } else {

            return view('frontend.contact');
        }
    }

    //=====================================================================
    public function authentication()
    {

        if (Auth::id()) {

            $userType = Auth()->user()->user_type;

            if ($userType == 'user') {

                $user = Auth::user();

                $user_id = $user->id;

                $count = Cart::where('user_id', $user_id)->count();

                $ocount = Order::where('user_id', $user_id)->count();

                $data = Product::paginate(6);

                $comment = Comment::orderby('id', 'desc')->get();

                $reply = Reply::all();

                return view('frontend.index', compact('data', 'comment', 'reply', 'count', 'ocount'));
            } elseif ($userType == 'admin') {

                $totalProduct = Product::all()->count();
                $totalOrder = Order::all()->count();
                $totalUser = User::all()->count();

                $order = Order::all();

                $totalRevenue = 0;

                foreach ($order as $order) {

                    $totalRevenue = $totalRevenue + $order->price;
                }

                $totalDelivered = Order::where('delivery_status', '=', 'Delivered')->get()->count();
                $totalProcessing = Order::where('delivery_status', '=', 'Processing')->get()->count();


                return view('admin.index', compact('totalProduct', 'totalOrder', 'totalUser', 'totalRevenue', 'totalDelivered', 'totalProcessing'));
            } else {

                return redirect()->back();
            }
        }
    }

    //===============================================================
    public function product_details($id)
    {

        if (Auth::id()) {
            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            $data = Product::find($id);

            return view('frontend.product_details', compact('data', 'count', 'ocount'));
        } else {

            $data = Product::find($id);

            return view('frontend.product_details', compact('data'));
        }
    }

    //==========================================================

    public function add_to_cart(Request $request, $id)
    {

        if (Auth::id()) {

            $user = Auth::user();

            $user_id = $user->id;

            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id', '=', $id)->where('user_id', '=', $user_id)->get('id')->first();

            if ($product_exist_id) {

                $cart = Cart::find($product_exist_id)->first();

                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;

                if ($product->discount_price != null) {

                    $cart->price = $product->discount_price * $cart->quantity;
                } else {

                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();

                Alert::success('Product Added Successfully', 'Check Your Cart'); //instead of success there are other "warning,info"
                return redirect()->back();
                // return redirect()->back()->with('message', 'Product Added Successfully');
            } else {

                $cart = new Cart;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;

                $cart->product_id = $product->id;
                $cart->image = $product->image;
                $cart->title = $product->title;

                if ($product->discount_price != null) {

                    $cart->price = $product->discount_price * $request->quantity;
                } else {

                    $cart->price = $product->price * $request->quantity;
                }


                $cart->quantity = $request->quantity;

                $cart->save();

                Alert::success('Product Added Successfully', 'Check Your Cart');

                return redirect()->back();
            }
        } else {

            return redirect('login');
        }
    }
    public function show_cart()
    {

        if (Auth::id()) {

            $id = Auth::user()->id;

            $count = Cart::where('user_id', $id)->count();

            $ocount = Order::where('user_id', $id)->count();

            $cart = Cart::where('user_id', '=', $id)->get();

            return view('frontend.show_cart', compact('count', 'cart', 'ocount'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cartproduct($id)
    {

        if (Auth::id()) {

            $cart = Cart::find($id);
            $cart->delete();
            Alert::success('Product Removed Successfully', 'Add New');
            return redirect()->back();
            // return redirect()->back()->with('message', 'Product Removed Successfully');
        } else {
            return redirect('login');
        }
    }

    //Pay on Delivery
    public function cash_order()
    {

        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $user_id)->get();

            foreach ($cart as $data) {
                $order = new Order();

                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;

                $order->product_id = $data->product_id;
                $order->image = $data->image;
                $order->title = $data->title;
                $order->price = $data->price;
                $order->quantity = $data->quantity;
                $order->payment_status = 'Cash On Delivery';
                $order->delivery_status = 'Processing';

                $order->save();

                $cart_id = $data->id;
                $cart = Cart::find($cart_id);

                $cart->delete();
            }

            return redirect()->back()->with('message', 'We have Received your Order, We will connect with you soon...');


            // return view('frontend.show_cart', compact('cart'));


        } else {
            return redirect('login');
        }
    }

    //Pay on Card
    public function stripe($total_price)
    {

        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            return view('frontend.stripe', compact('total_price', 'count', 'ocount'));
        } else {
            return redirect('login');
        }
    }

    public function stripePost(Request $request, $total_price)
    {

        if ($total_price <= 0) {
            // Redirect back with an error message
            Alert::warning('Payment Unsuccessful!', 'You must add something to the cart to make a payment.');
            return redirect()->back()->with('message', 'The total price must be greater than 0 to make a payment.');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for Payment."
        ]);

        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $cart = Cart::where('user_id', '=', $user_id)->get();

            foreach ($cart as $data) {
                $order = new Order();

                $order->user_id = $data->user_id;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;

                $order->product_id = $data->product_id;
                $order->image = $data->image;
                $order->title = $data->title;
                $order->price = $data->price;
                $order->quantity = $data->quantity;
                $order->payment_status = 'Paid';
                $order->delivery_status = 'Processing';

                $order->save();

                $cart_id = $data->id;
                $cart = Cart::find($cart_id);

                $cart->delete();
            }
        } else {
            return redirect('login');
        }


        Session::flash('success', 'Payment successful!');

        Alert::success('Payment successful!', 'Shop More');

        return redirect('product');
    }

    public function show_order()
    {

        if (Auth::id()) {

            $id = Auth::user()->id;

            $count = Cart::where('user_id', $id)->count();

            $ocount = Order::where('user_id', $id)->count();

            $data = Order::where('user_id', '=', $id)->get();

            return view('frontend.show_order', compact('data', 'count', 'ocount'));
        } else {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {

        if (Auth::id()) {


            $order = Order::find($id);
            $order->delivery_status = 'You Canceled the Order';
            $order->save();

            Alert::info('You Canceled the Order', 'Order Cancelled');

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function add_comment(Request $request)
    {

        if (Auth::id()) {

            $comment = new Comment();

            $comment->name = Auth::user()->name;
            $comment->comment = $request->comment;
            $comment->user_id = Auth::user()->id;

            $comment->save();

            return redirect()->back()->with('message', 'Thanks for Your Valuable Comment');
        } else {
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {

        if (Auth::id()) {

            $reply = new Reply();

            $reply->name = Auth::user()->name;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->user_id = Auth::user()->id;

            $reply->save();

            return redirect()->back()->with('reply_message', 'You Replied To The Comment Successfully');
        } else {
            return redirect('login');
        }
    }

    public function search_product(Request $request)
    {

        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            $search_text = $request->search;

            $data = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(6);

            return view('frontend.index', compact('data', 'comment', 'reply', 'count', 'ocount'));
        } else {

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            $search_text = $request->search;

            $data = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(6);

            return view('frontend.index', compact('data', 'comment', 'reply'));
        }
    }

    public function searchProduct(Request $request)
    {
        if (Auth::id()) {

            $user_id = Auth::user()->id;

            $count = Cart::where('user_id', $user_id)->count();

            $ocount = Order::where('user_id', $user_id)->count();

            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            $search_text = $request->search;

            $data = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(6);

            return view('frontend.product', compact('data', 'comment', 'reply', 'count', 'ocount'));
        } else {
            $comment = Comment::orderby('id', 'desc')->get();

            $reply = Reply::all();

            $search_text = $request->search;

            $data = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->paginate(6);

            return view('frontend.product', compact('data', 'comment', 'reply'));
        }
    }
}
