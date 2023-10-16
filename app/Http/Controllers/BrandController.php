<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
     /**
     * @var Brand
     */
    private $brandModel;

    public function __construct(Brand $brandModel)
    {
        $this->brandModel = $brandModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = $this->brandModel->get();
        $logo = "image/R1JxS712DInHI5BhOkmh5xG4vB6J1DjRtCo9rxM0.png";

        return view("brand.index", compact('brand', 'logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("brand.create");
        
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
            'name_brand' => 'required',
            'image_brand' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $image_path = $request->file('image_brand')->store('image', 'public');

        $data = Brand::create([
            'name' => $data["name_brand"],
            'image' => $image_path,
        ]);

        return redirect()->back()->with(['success' => 'Operação realizada com sucesso!']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = $this->brandModel->find($id);
        return view('brand.edit', compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        $brand = $this->brandModel->find($id);

        if($request->hasFile("image_brand")){
            Storage::delete($brand->image);
            $image_path = $request->file('image_brand')->store('image', 'public');

            $brand->update([
                'image' => $image_path
        ]);
        }
        
        $brand->update([
                'name' => $data["name_brand"]
        ]);

        return redirect()->back()->with(['success' => 'Operação realizada com sucesso!']);    
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = $this->brandModel->find($id);
        $brand->delete();

        return redirect()->back()->with(['success' => 'Operação realizada com sucesso!']);

    }
}
