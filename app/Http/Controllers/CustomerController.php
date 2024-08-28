<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\customer;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function login()
    {
        // gọi view hiện hị form đăng nhập
        return view('Customer/login');
    }

    public function post_login(Request $request)
{
    //$login_data = $request->only('email','password');
    $login_data = [
        'email' => $request->email,
        'password' => $request->password
    ];
    
    $check_login = Auth::guard('cus')->attempt($login_data);
    
    if($check_login){
        return redirect()->route('trangchu');
    } else {
        // return redirect()->back()->with('error','Đăng nhập không thành công vui lòng thử lại');
        return "Lỗi không đăng nhập được";
    }
    
}
    public function register()
    {
        return view('Customer/register');
    }
    public function post_register(Request $request)
    {
        $email=$request->email;
        $name=$request->name;
        $phone=$request->phone;
        $address=$request->address;
        $password=bcrypt($request->password);
        // $rules = [
        //     'name' => 'required|max:100',
        //     'email' => 'required|unique:customers|max:100',
        //     'phone' => 'required|max:10',
        //     'adress' => 'required|max:200',
        //     'password' => 'required|min:6|max:12',
        //     'password_confirmation' => 'required|same:password',
        // ];
        // $message = [
        //     // 'name.required' => 'Vui lòng nhập họ tên'
        // ];
        // $request->validate($rules,$message);
        // Lưu thông in vào bảng customer
        
        $add = customer::create([
            'email' => $email,
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'password' =>$password
        ]);
        
        // kiểm tra thêm mới thành công hay không
        if($add===false){
            return redirect()->back()->with('error','Đăng ký không thành công vui lòng thử lại');
        } else {
            return redirect()->route('customer.logon');
        }
    }
}
