<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): View
    {
        $services = Service::get();


        return view('services.index',compact('services'));
    }

    public function create(): View
    {
        return view('services.create');
    }

    public function edit($id): View
    {
        $service = Service::find($id);

        return view('services.edit',compact('service'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'service' => 'required',
            'price' => 'required',
            'points' => 'required',
        ]);

        $input = $request->all();

        $user = Service::create($input);

        return redirect()->route('services.index')
                        ->with('success','Delatnost uspešno unešena');
    }

    public function update(Request $request, $id): RedirectResponse
    {


        $this->validate($request, [
            'service' => 'required',
            'price' => 'required',
            'points' => 'required',
        ]);

        $input = $request->all();

        $data = Service::find($id);
        $data->update($input);

        return redirect()->route('services.index')
                        ->with('success','Delatnost uspešno promenjena');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table("services")->where('id',$id)->delete();
        return redirect()->route('services.index')
                        ->with('success','Delatnost uspešno izbrisana');
    }
}
