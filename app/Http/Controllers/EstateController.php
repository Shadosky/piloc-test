<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEstateRequest;
use App\Http\Requests\UpdateEstateRequest;
use App\Models\Estate;

class EstateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function add(AddEstateRequest $request)
    {

        $estate = Estate::create([
            'name' => $request->getName(),
            'number' => $request->getNumber(),
            'street' => $request->getStreet(),
            'postcode' => $request->getPostCode(),
            'city' => $request->getCity(),
            'surface' => $request->getSurface(),
            'amount' => $request->getAmount(),
            'status' => $request->getStatus()
        ]);
        $estate->users()->attach($request->getUserId());

        return response()->json($estate, 201);
    }

    public function listAll()
    {
        $estates = Estate::all();
        return response()->json($estates, 200);
    }

    public function getOne($id)
    {
        $estate = Estate::find($id);
        $return = $estate->toArray();
        $return['landlords'] = $estate->users()->get();
        return response()->json($return, 200);
    }

    public function edit(UpdateEstateRequest $request)
    {
        $estate = Estate::find($request->getId());

        $estate->name = $request->getName();
        $estate->number = $request->getNumber();
        $estate->street = $request->getStreet();
        $estate->postcode = $request->getPostCode();
        $estate->city = $request->getCity();
        $estate->surface = $request->getSurface();
        $estate->amount = $request->getAmount();
        $estate->statuts = $request->getStatus();

        $estate->save();
        return response()->json($estate, 200);
    }

    public function delete($id)
    {
        $estates = Estate::find($id);
        $estates->delete();
        return response()->json('', 204);
    }
}
