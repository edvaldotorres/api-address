<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $addresses = Address::simplePaginate(5);
        return $this->successWithArgs($addresses->load('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request): JsonResponse
    {
        Address::create($request->validated());
        return $this->created('Address created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $address = Address::find($id);
        if ($address->isEmpty()) {
            return $this->notFound('Address not found');
        }

        return $this->successWithArgs($address->load('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id): JsonResponse
    {
        $address = Address::find($id);
        if ($address->isEmpty()) {
            return $this->notFound('Address not found');
        }

        $address->update($request->validated());
        return $this->successWithArgs($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        $address = Address::find($id);
        if ($address->isEmpty()) {
            return $this->notFound('Address not found');
        }

        $address->delete();
        return $this->success('Address deleted successfully');
    }
}
