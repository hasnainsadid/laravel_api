<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return ServiceResource::collection($services);
    }

    public function store(Request $request)
    {
        $filename = '';
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'sadid'.time().'.'.$file->extension();
            $file->move(public_path('images'), $filename);
        }
        $services = Service::create([
            'title' => $request->title,
            'image' => $filename,
            'status' => $request->status,
        ]);
        return new ServiceResource($services);
    }
}
