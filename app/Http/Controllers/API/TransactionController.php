<?php

namespace App\Http\Controllers\API;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function all(Request $request)
    {
        $id         = $request->input('id');
        $limit      = $request->input('limit', 6);
        $foodId     = $request->input('foodId');
        $status     = $request->input('status');

        if($id)
        {
            $transaction = Transaction::with(['food', 'user'])->find($id);

            if($transaction)
            {
                return ResponseFormatter::success(
                    $transaction,
                    'Transaction data has found'
                );
            } else
            {
                return ResponseFormatter::error(
                    null,
                    'Data Transaction not available',
                    404
                );
            }
        }

        $transaction = Transaction::with(['food', 'user'])
                                    ->where('user_id', Auth::user()->id);

        if($foodId)
        {
            $transaction->where('name', $foodId);
        }

        if($status)
        {
            $transaction->where('status', $status);
        }



        return ResponseFormatter::success(
            $transaction->paginate($limit),
            'Data transaction has found'
        );
    }

    /**
     * @param Request $request
     * @param mixed $id
     *
     * @return [type]
     */
    public function update(Request $request, $id)
    {
        try {
            $transaction = Transaction::findOrFail($id);

            if($request->input('quantity')){
                $transaction->quantity = $request->input('quantity');
                $transaction->save();
            }

            if($request->input('total')){
                $transaction->total = $request->input('total');
                $transaction->save();
            }
            if($request->input('status')){
                $transaction->status = $request->input('status');
                $transaction->save();
            }
            if($request->input('paymentUrl')){
                $transaction->payment_url = $request->input('paymentUrl');
                $transaction->save();
            }

            return ResponseFormatter::success(
                $transaction,
                'Updated transaction is success'
            );
        } catch (Exception $error)
        {
            return ResponseFormatter::error(
                null,
                $error,
                500
            );
        }
    }

    /**
     * @param Request $request
     *
     * @return [type]
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'foodId' => 'required|exists:food,id',
            'userId' => 'required|exists:users,id',
            'quantity' => 'required',
            'total' => 'required',
            'status' => 'required'
        ]);


        $transaction = Transaction::create([
            'food_id'       => $request->foodId,
            'user_id'       => $request->userId,
            'quantity'      => $request->quantity,
            'total'         => $request->total,
            'status'        => $request->status,
            'payment_url'   => ''
        ]);

        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $transaction = Transaction::with('food', 'user')->find($transaction->id);

        $midtrans = [
            'transaction_details' => array(
                'order_id' => $transaction->id,
                'gross_amount' => (int) $transaction->total
            ),
            'customer_details' => array (
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email
            ),
            'enabled_payments' => ['gopay', 'bank_transfer']
        ];

        try {
            // get payment URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->payment_url = $paymentUrl;
            $transaction->save();

            return ResponseFormatter::success(
                $transaction,
                'Transaction success'
            );
        } catch (Exception $error)
        {
            return ResponseFormatter::error(
                $error->getMessage(),
                'Transaction failed'
            );
        }
    }
}
