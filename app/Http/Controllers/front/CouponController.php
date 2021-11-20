<?php

namespace App\Http\Controllers\front;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;


class CouponController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon=Coupon::where('code',$request->coupon)->first();
        $cart_details = Session::get('cart_details');
        // dd($cart_details['totalPrice']);
        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }

        $session=session()->put('coupon',[
            'name'=> $coupon->code,
            'percentage'=>$coupon->percentage,
            'discount'=>$coupon->discount($cart_details['totalPrice'])
        ]);
        // dd($session['discount']);


        // dd(Session::get('coupon'));
        // dd($request->coupon,$coupon);
        return back()->with('success_message', 'Coupon has been applied!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');
        return back()->with('success_message', 'Coupon has been removed.');    }
}
