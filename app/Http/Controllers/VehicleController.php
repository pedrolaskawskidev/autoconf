<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleModel;

use Illuminate\Http\Request;


class VehicleController extends Controller
{
    /**
     * @var Brand
     */
    private $brandModel;

    /**
     * @var VehicleModel
     */
    private $vehicleModel;

    /**
     * @var Vehicle
     */
    private $vehicle;



    public function __construct(Brand $brandModel, VehicleModel $vehicleModel, Vehicle $vehicle)
    {
        $this->brandModel = $brandModel;
        $this->vehicleModel = $vehicleModel;
        $this->vehicle = $vehicle;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = "image/R1JxS712DInHI5BhOkmh5xG4vB6J1DjRtCo9rxM0.png";
        $brands = $this->brandModel->get();
        $models = $this->vehicleModel->get();
        $vehicles = $this->vehicle->get();
        // dd($vehicles);

        return view('vehicle.index', compact('brands', 'models', 'vehicles', 'logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = $this->brandModel->get();
        $model = $this->vehicleModel->get();
        return view("vehicle.create", compact('brand', 'model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $this->validate($request, [
            "name_vehicle" =>  'required',
            "brand_id" => 'required',
            "vehicle_model_id" => 'required',
            "doors_vehicle" => 'required',
            "color_vehicle" => 'required',
            "manufacturing_year_vehicle" => 'required',
            "year_vehicle" => 'required',
            "plate_vehicle" => 'required',
            "motor_vehicle" => 'required',
            "mileage_vehicle" => 'required',
            'image_vehicle' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image_vehicle')->store('image', 'public');

        $data = Vehicle::create([
            'name' => $data["name_vehicle"],
            'fuel' => $data["fuel_vehicle"],
            'color' => $data["color_vehicle"],
            'price' => $data["price_vehicle"],
            'doors' => $data["doors_vehicle"],
            'manufacturing_year' => $data["manufacturing_year_vehicle"],
            'model_year' => $data["year_vehicle"],
            'plate' => $data["plate_vehicle"],
            'motor' => $data["motor_vehicle"],
            'mileage' => $data["mileage_vehicle"],
            'brand_id' => $data["brand_id"],
            'vehicle_model_id' => $data["vehicle_model_id"],
            'image' => $image_path,
        ]);
       

        return redirect()->back()->with(['success' => 'Operação realizada com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = $this->vehicle->find($id);
        $brand = $this->brandModel->get();
        $model = $this->vehicleModel->get();
        return view("vehicle.edit", compact('vehicle','brand', 'model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = $this->vehicle->find($id);
        $vehicle->delete();
        return redirect()->route('model.index')->with(['success' => 'Operação realizada com sucesso!']);
    }
}
