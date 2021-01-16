<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use PayPal;
class PaymentController extends Controller
{
   public function pagamento()
    {
       $provider = new PayPalClient;

       
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 112,
                'desc'  => 'Running shoes for Men',
                'qty' => 2
            ]
        ];
  
        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('sucessopagamento');
        $product['cancel_url'] = route('cancelapagamento');
        $product['total'] = 224;
  
        
  
        $res = $provider->setExpressCheckout($product);
        $res = $provider->setExpressCheckout($product, true);
  
        return redirect($res['paypal_link']);
    }
}
