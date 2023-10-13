<?php

namespace App\Http\Controllers;

use App\Entities\Plan;
use App\Entities\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller {
    public function checkout(Request $request)
    {
        $plan = Plan::query()->findOrFail($request->get('plan_id'));

        $session = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $sale=Sale::create([
            'customer_id' => Auth::id(),
            'plan_id' => $plan->id,
            'price' => $plan->price * 100,
            'session_id' => $session,
        ]);

        $sale->customer->wallet->increment('credits', $sale->plan->credits);
        return redirect()->route('wallet.index')->with('danger', "Se ha agregado correctamente su credito");
        #return to_route('wallet.index')->session()->flash('danger', "You already have the book in your library, <a href='" . route('library.index') . "'>see library.</a>");

    }

    public function success(Request $request)
    {

        $session = ($request->get('session_id'));

        $sale = Sale::query()
            ->with(['customer.wallet', 'plan'])
            ->where('session_id', $session)
            ->first();

        $sale->customer->wallet->increment('credits', $sale->plan->credits);

        return to_route('wallet.index');
    }
}
