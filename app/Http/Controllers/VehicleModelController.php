<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{

    /**
     * @var Brand
     */
    private $brandModel;

    /**
     * @var VehicleModel
     */
    private $vehicleModel;



    public function __construct(Brand $brandModel, VehicleModel $vehicleModel)
    {
        $this->brandModel = $brandModel;
        $this->vehicleModel = $vehicleModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = "image/R1JxS712DInHI5BhOkmh5xG4vB6J1DjRtCo9rxM0.png";
        $models = $this->vehicleModel->get();
        $brands = $this->brandModel->get();

        foreach ($models as &$model) {
            foreach ($brands as $brand) {
                if ($model->brand_id == $brand->id) {
                    $model["brand_image"] = $brand->image;
                    break;
                }
            }
        }

        return view('vehicle_model.index', compact('models', 'logo'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = $this->brandModel->get();
        return view("vehicle_model.create", compact('brand'));
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

        $this->validate($request, [
            'name_vechile_model' => 'required',
            'brand_id' => 'required',
        ]);

        $data = VehicleModel::create([
            'name' => $data["name_vechile_model"],
            'brand_id' => $data['brand_id'],
        ]);

        return redirect()->route('model.index')->with(['success' => 'Operação realizada com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $model = $this->vehicleModel->find($id);
        $brand = $this->brandModel->get();
        return view('vehicle_model.edit', compact('model', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $model = $this->vehicleModel->find($id);

        $model->update([
            'name' => $data["name_vechile_model"],
            'brand_id' => $data["brand_id"]
        ]);

        return redirect()->route('model.index')->with(['success' => 'Operação realizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->vehicleModel->find($id);
        $model->delete();
        return redirect()->route('model.index')->with(['success' => 'Operação realizada com sucesso!']);
    }
}
