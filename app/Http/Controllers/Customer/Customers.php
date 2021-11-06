<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCostumerRequest;
use App\Http\Requests\UpdateCostumerRequest;
use App\Models\Costumer;

class Customers extends Controller
{
    public function index()
    {
        return view('Pages.Costumer.CostumersIndex');
    }

    public function create()
    {
        return view('Pages.Costumer.CostumersCreateAndEdit');
    }

    public function store(StoreCostumerRequest $request)
    {
        Costumer::create($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente cadastrado!']);
    }

    public function edit(Costumer $costumer)
    {
        return view('Pages.Costumer.CostumersCreateAndEdit', compact('costumer'));
    }

    public function update(UpdateCostumerRequest $request, Costumer $costumer)
    {
        $costumer->update($request->validated());

        return redirect()
            ->route('customers.index')
            ->with(['success', 'Cliente atualizado!']);
    }

    public function destroy(Costumer $costumer)
    {
        $costumer->delete();

        return response()->json([
            'message' => 'Cliente excluído com sucesso!'
        ]);
    }
}