<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    
    public function show_all_cars_page()
    {
        $car = Car::all();
        return view('cars' , ['cars' => $car]);
    }

    
    public function show_all_mycars_page()
    {
        $mycars = Auth::user()->cars;
        return view('mycars')->with ('mycars' , $mycars);
    }

    public function offer_page()
    {
        return view('offer');
    }

    public function new_offer_page($license_plate)
    {
        return view('new_offer', compact($license_plate));
    }

    public function submit_license_plate_as(Request $request)
    {   
        $license_plate =  $request->input('license_plate');

       
        return view('new_offer', [
            'license_plate' => $license_plate,
        ]);
    }

    public function submit_license_plate(Request $request)
    {

        $request;

        $license_plate = $request->input('license_plate');

        

        return view('new_offer', compact('license_plate'));
    }



    public function process_new_offer(Request $request)
    {
        $request;

        $newCar = new Car();

        $newCar->user_id = Auth::user()->id;
        $newCar->license_plate = $request->input('license_plate');
        $newCar->make = $request->input('brand');
        $newCar->model = $request->input('model');
        $newCar->price = $request->input('price');
        $newCar->mileage = $request->input('distance');
        $newCar->seats = $request->input('seats');
        $newCar->doors = $request->input('doors');
        $newCar->production_year = $request->input('production_year');
        $newCar->weight = $request->input('weight');
        $newCar->color = $request->input('color');

       Storage::makeDirectory('public/images');
       $src = Storage::putFile('public/images' , $request->file('image'));
       $src = str_replace('public' , 'storage' , $src);
       $newCar->photo = $src;



        $newCar->save();

        return redirect('/');


    }

    public function delete($id)
    {
        $mycars = Car::findorFail($id);
        $mycars->delete();

        return redirect('mycars/show');
    }

   
}