<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Location;
use App\Models\Year;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'brand_id' => 'nullable|intiger|min:1',
            'color_id' => 'nullable|intiger|min:1',
            'year_id' => 'nullable|intiger|min:1',
            'location_id' => 'nullable|intiger|min:1',
        ]);
        $brandId = $request->has('brand_id') ? $request->brand_id : null;
        $colorId = $request->has('color_id') ? $request->color_id : null;
        $yearId = $request->has('year_id') ? $request->year_id : null;
        $locationId = $request->has('location_id') ? $request->location_id : null;

        $cars = Car::when($brandId, function ($query, $brandId){
            $query->where('brand_id', $brandId);
        })
            ->when($colorId, function ($query, $colorId){
                $query->where('color_id', $colorId);
            })
            ->when($yearId, function ($query, $yearId){
                $query->where('year_id', $yearId);
            })
            ->when($locationId, function ($query, $locationId){
                $query->where('location_id', $locationId);
            })
            ->with(['brand', 'color', 'year', 'location'])
            ->orderBy('id', 'desc')
            ->simplePaginate(50);

        $cars = $cars->appends([
            'brand_id' => $brandId,
            'color_id' => $colorId,
            'year_id' => $yearId,
            'loction_id' => $locationId,
        ]);

        $brands = Brand::orderBy('name')
            ->get();
        $colorId = Color::orderBy('name')
            ->get();
        $yearId = Year::orderBy('name')
            ->get();
        $locationId = Location::orderBy('name')
            ->get();

        return view('car.index')
            ->with([
                'cars' => $cars,
                'brands' => $brands,
                'colors' => $colors,
                'years' => $years,
                'locations' => $locations,
                'brand_id' => $brandId,
                'color_id' => $colorId,
                'year_id' => $yearId,
                'location_id' => $locationId,
            ]);
    }


    public function show($id)
    {

    }
}
