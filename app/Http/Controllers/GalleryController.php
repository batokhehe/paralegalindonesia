<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Gallery::all();
        return view('admin.gallery.index')
                ->with('datas', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gallery.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
        	'name' => $request->post('name'),
        	'desc' => $request->post('desc'),
        );
        $image = $request->file('image');
        $image_name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/gallery', $image_name);
        $data['image'] = $image_name;

        $result = Gallery::insert($data);

        return redirect()->route('gallery')->with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Gallery::where('id', $id)->first();
        return view('admin.gallery.edit')
                ->with('data', $data);
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
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('gallery.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'name' => $request->post('name'),
            'desc' => $request->post('desc'),
        );
        $image = $request->file('image');
        $image_name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/gallery', $image_name);
        $data['image'] = $image_name;

        $result = Gallery::where('id', $id)->update($data);

        return redirect()->route('gallery')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        Gallery::where('id', $id)->delete();
        return redirect()->route('gallery')->with('success', 'Data Deleted');
    }

    public function web()
    {
        $datas = Gallery::all();
        return view('web.layouts.gallery')
                ->with('datas', $datas);
    }
}
