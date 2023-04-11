<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Inertia\Inertia;
use App\Models\City;
use Termwind\Components\Dd;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $properties = Property::all();
        // dd($properties);
        return Inertia::render('admin/Properties/Index', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cities = City::all();
        return Inertia::render('admin/Properties/Create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $property = new Property;
        $property->StreetAddress = $request['StreetAddress'];
        $property->ApartmentNumber = $request['ApartmentNumber'];
        $property->City = $request['City'];
        $property->PostalCode = $request['PostalCode'];
        $property->Type = $request['Type'];
        $property->Price = $request['Price'];
        $property->Bedrooms = $request['Bedrooms'];
        $property->Bathrooms = $request['Bathrooms'];
        $property->SquareFeet = $request['SquareFeet'];
        $property->Description = $request['Description'];
        $property->Image = $request['Image'];
        $property->Features = $request['Features'];
        $property->OwnerName = $request['OwnerName'];
        $property->OwnerEmail = $request['OwnerEmail'];
        $property->OwnerPhone = $request['OwnerPhone'];
        $property->save();
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cities = City::all();
        $property = Property::find($id);
        //dd($property);
        return Inertia::render('admin/Properties/Edit', ['property' => $property, 'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $property = Property::find($id);
        $property->StreetAddress = $request['StreetAddress'];
        $property->ApartmentNumber = $request['ApartmentNumber'];
        $property->City = $request['City'];
        $property->PostalCode = $request['PostalCode'];
        $property->Type = $request['Type'];
        $property->Price = $request['Price'];
        $property->Bedrooms = $request['Bedrooms'];
        $property->Bathrooms = $request['Bathrooms'];
        $property->SquareFeet = $request['SquareFeet'];
        $property->Description = $request['Description'];
        $property->Image = $request['Image'];
        $property->Features = $request['Features'];
        $property->OwnerName = $request['OwnerName'];
        $property->OwnerEmail = $request['OwnerEmail'];
        $property->OwnerPhone = $request['OwnerPhone'];
        $property->save();
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $property = Property::find($id);
        $property->delete();
        return redirect()->route('properties.index');
    }
}
