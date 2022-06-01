<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // Midtrans configuration
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Midtrans Notification
        $notification = new Notification();

        // Assign to variable meke code easy
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Find transaction
        $transaction = Transaction::findOrFail($order_id);

        // Handle status from notification
        if($status == 'capture')
        {
            if($type == 'credit_card')
            {
                $transaction->status = "PENDING";
            } else
            {
                $transaction->status = 'SUCCESS';
            }
        }
        else if ($status == 'settlement')
        {
            $transaction->status = 'SUCCESS';
        }
        else if ($status == 'pending')
        {
            $transaction->status = 'PENDING';
        }
        else if ($status == 'deny')
        {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'expire')
        {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'cancel')
        {
            $transaction->status = 'CANCELLED';
        }

        // Save transaction
        $transaction->save();

    }

    public function success()
    {
        return view('midtrans.success');
    }

    public function unfinish()
    {
        return view('midtrans.unfinish');
    }

    public function error()
    {
        return view('midtrans.error');
    }
}
