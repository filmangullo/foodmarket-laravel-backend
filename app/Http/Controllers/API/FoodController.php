<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function all(Request $request)
    {
        $id     = $request->input('id');
        $limit  = $request->input('limit', 6);
        $name   = $request->input('name');
        $types  = $request->input('types');


        $priceFrom  = $request->input('priceFrom');
        $priceTo    = $request->input('priceTo');

        $rateFrom   = $request->input('rateFrom');
        $rateTo     = $request->input('rateTo');

        if($id)
        {
            $food = Food::find($id);

            if($food)
            {
                return ResponseFormatter::success(
                    $food,
                    'Food data has found'
                );
            } else
            {
                return ResponseFormatter::error(
                    null,
                    'Data Food not available',
                    404
                );
            }
        }

        $food = Food::query();

        if($name)
        {
            $food->where('name', 'like', '%' . $name . '%');
        }

        if($types)
        {
            $food->where('types', 'like', '%' . $types . '%');
        }

        if($priceFrom)
        {
            $food->where('price', '>=', $priceFrom);
        }

        if($priceTo)
        {
            $food->where('price', '<=', $priceTo);
        }

        if($rateFrom)
        {
            $food->where('rate', '>=', $rateFrom);
        }

        if($rateTo)
        {
            $food->where('rate', '<=', $rateTo);
        }

        return ResponseFormatter::success(
            $food->paginate($limit),
            'Data food has found'
        );
    }
}
