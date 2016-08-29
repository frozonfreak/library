<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;
use Redirect;

class PaymentController extends Controller
{

    public function stripePayment()
    {
        $user = Auth::user();
    
        $data = Input::only('stripeToken','book_id','amount_due');

        //$customer = $user->subscription()->createStripeCustomer($data['stripeToken'], ['email' => $user->email]);

       //$user->setStripeId($customer->id);
       //$user->save();

       //$user->charge($data['amount_due'], ['currency' => 'usd', 'description' => 'A charge for something']);

        
        $user->books()->detach($data['book_id']);

        return Redirect::back()->with('success', 'Book returned back');
    }
}
