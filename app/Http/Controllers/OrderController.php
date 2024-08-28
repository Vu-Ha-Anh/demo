<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Cart\Cart;
use App\Models\order;
use App\Models\order_detail;
use Mail;


class OrderController extends Controller
{
    //
    /** Phương thức hiển thị form đặt hàng  */
    public function checkout(Cart $cart)
    {
        $customer = auth('cus')->user();
        return view('Order/checkout', compact('cart','customer'));
    }

    /**
     * Phương thức lưu đơn ahngf
     */
    public function post_checkout(Request $req, Cart $cart)
    {
        $data = $req->only('name','email','phone','address');
        $data['customer_id'] = auth('cus')->id();

        // lưu thông tin vào bagnr orders
        if ($order = order::create($data)) {
            // duyệt gỏ hàng lưu vào order_details
            foreach($cart->items as $item) {
                $detail = [
                    'order_id' => $order->id,
                    'product_id' => $item->ma,
                    'price' => $item->price,
                    'quantity' => $item->soluong,
                ];
                order_detail::create($detail);
            }
            // hủy giỏ hàng, cho về rỗng
            $cart->clear();
            $order->update(['token' => \Str::random(40)]);
            // Gửi email 
            $customer = auth('cus')->user();
            Mail::to($customer->email)->send(new OrderMail($order, $customer));    
    
            return redirect()->back()->with('ok','Đặt hàng thành công');
        }

        return redirect()->back()->with('no','Có lỗi, vui lòng thử lại');
    }
    public function verify_order($token)
    {
        $order = order::where('token', $token)->first();

        if ($order) {
            $order->update(['status' => 1, 'token' => null]);
            return redirect()->back()->with('ok','Đặt hàng thành công');
        }

        return abort(404); // nếu không có thì báo 404
    }

    public function history()
    {
        $customer = auth('cus')->user();
        return view('Order/order_history', compact('customer'));
    }
    // phương thức hiển thị chi tiết đơn hàng
    public function detail(Order $order)
    {
        $customer = auth('cus')->user();
        return view('Order/order_detail', compact('order','customer'));
    }

    

}
