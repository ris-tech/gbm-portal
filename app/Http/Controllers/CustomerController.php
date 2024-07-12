<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPoints;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(Request $request): View
    {
        $customers = Customer::orderBy('lastName','ASC')->get();
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function edit($id): View
    {
        $customer = Customer::where('id', $id)->first();

        return view('customers.edit', compact('customer'));
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'Ime mora biti ispunjeno!',
            'lastName.required' => 'Prezime mora biti ispunjeno!',
            'cardId.required' => 'Kartice je već iskoriščenja',
        ];
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'cardId' => 'required|unique:customers,cardId',
        ], [
            'firstName.required' => 'Ime mora biti unešeno!',
            'lastName.required' => 'Prezime mora biti unešeno!',
            'cardId.required' => 'Kartice mora biti unešena!',
            'cardId.unique' => 'Kartice je već iskoriščenja',
        ]);


        $input = $request->all();

        $customer = Customer::create($input);

        return redirect()->route('customers.index')
                        ->with('success','Mušterija uspešno unešena');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'cardId' => 'required|unique:customers,cardId',
        ], [
            'firstName.required' => 'Ime mora biti unešeno!',
            'lastName.required' => 'Prezime mora biti unešeno!',
            'cardId.required' => 'Kartice mora biti unešena!',
            'cardId.unique' => 'Kartice je već iskoriščenja',
        ]);

        $input = $request->all();

        $data = Customer::find($id);
        $data->update($input);

        return redirect()->route('customers.index')
                        ->with('success','Mušterija uspešno promenjena');
    }
    public function showCustomer(Request $request)
    {

        $customer = Customer::where('cardId', $request->cardId)->first();

        if($customer) {
            $services = Service::get();
            $customerPoints = DB::table('customer_points')->select(DB::raw('SUM(points) as total_points, SUM(price) as total_price'))->where('customerId', $customer->id)->first();
            return view('customers.showCustomer', compact('customer','services', 'customerPoints'));
        }


        //return back()->with('error', 'Something went wrong!');
        return back()->withErrors(['email' => 'Kartica nije registrovana'])->withInput();
    }

    public function showOrders($id): View
    {
        $customer = Customer::where('id', $id)->first();

        $customerPoints = DB::table('customer_points')->select(DB::raw('SUM(points) as total_points, SUM(price) as total_price'))->where('customerId', $id)->first();

        $orders = CustomerPoints::where('customerId', $id)->with('customer')->with('service')->get();

        return view('customers.orders', compact('customer', 'orders', 'customerPoints'));
    }

}
