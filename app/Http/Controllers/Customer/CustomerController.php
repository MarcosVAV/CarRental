<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('Pages.Customer.CustomersIndex');
    }

    public function create()
    {
        return view('Pages.Customer.CustomersCreateAndEdit');
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente cadastrado!']);
    }

    public function edit(Customer $Customer)
    {
        return view('Pages.Customer.CustomersCreateAndEdit', compact('Customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $Customer)
    {
        $Customer->update($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente atualizado!']);
    }

    public function destroy(Customer $Customer)
    {
        $Customer->delete();

        return response()->json([
            'message' => 'Cliente excluído com sucesso!'
        ]);
    }
}