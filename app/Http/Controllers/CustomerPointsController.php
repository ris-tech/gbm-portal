<?php

namespace App\Http\Controllers;

use App\Models\CustomerPoints;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerPointsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'customerId' => 'required',
            'serviceId' => 'required',
            'points' => 'required',
            'price' => 'required',
        ]);


        $input = $request->all();

        $customer = CustomerPoints::create($input);
        return back()->with('success','Uspešno unešeno');
    }

    public function destroy($id): RedirectResponse
    {
        $customer = CustomerPoints::where('id', $id)->first();
        DB::table("customer_points")->where('id',$id)->delete();
        return redirect()->route('customers.showOrders',$customer->customerId)
                        ->with('success','Uspešno izbrisana');
    }
}
