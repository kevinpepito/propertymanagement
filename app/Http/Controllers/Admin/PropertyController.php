<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    public function index() 
    {
        $property = Property::all();
        return view('admin.property.index', compact('property'));
    }

    public function create()
    {
        return view('admin.property.create');
    }
    
    public function store(PropertyFormRequest $request)
    {
        $data = $request->validated();

        $property = new Property;
        $property->name = $data['name'];
        $property->description = $data['description'];
        $property->price = $data['price'];

        if ($request->hasfile('image')) 
        {
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/property/', $filename);
            $property->image = $filename;
        }

        $property->status = $request->status == true ? '1':'0';
        $property->created_by = Auth::user()->id;
        $property->save();

        return redirect('admin/property')->with('message','Property Added Successfully');
    }

    public function edit($property_id)
    {
        $property = Property::find($property_id);
        return view('admin.property.edit', compact('property'));
    }

    public function update(PropertyFormRequest $request, $property_id)
    {
        $data = $request->validated();

        $property = Property::find($property_id);
        $property->name = $data['name'];
        $property->description = $data['description'];
        $property->price = $data['price'];

        if ($request->hasfile('image')) 
        {
            $destination ='uploads/property/'.$property->image;
            if(File::exists($destination)){
              File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' .$file->getClientOriginalExtension();
            $file->move('uploads/property/', $filename);
            $property->image = $filename;
        }

        $property->status = $request->status == true ? '1':'0';
        $property->created_by = Auth::user()->id;
        $property->update();

        return redirect('admin/property')->with('message','Property Updated Successfully');
    }

    public function destroy($property_id) 
    {
        $property = Property::find($property_id);
        if($property)
        {
            $destination ='uploads/property/'.$property->image;
            if(File::exists($destination)){
              File::delete($destination);
            }
            $property->delete();
            return redirect('admin/property')->with('message','Property Deleted Successfully');
        }
        else
        {
            return redirect('admin/property')->with('message','No Property ID Found');
        }
    }

}
