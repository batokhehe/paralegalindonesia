<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    //
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = News::all();
        return view('admin.news.index')
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
        return view('admin.news.create');
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
            return redirect()->route('news.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
        	'name' => $request->post('name'),
        	'desc' => $request->post('desc'),
        );
        $image = $request->file('image');
        $image_name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/news', $image_name);
        $data['image'] = $image_name;

        $result = News::insert($data);

        return redirect()->route('news')->with('success', 'Data Added');
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
        $data = News::where('id', $id)->first();
        return view('admin.news.edit')
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
            return redirect()->route('news.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = array(
            'name' => $request->post('name'),
            'desc' => $request->post('desc'),
        );
        $image = $request->file('image');
        $image_name = md5($image->getClientOriginalName() . time()) . '.' . $image->getClientOriginalExtension();
        $image->move('assets/images/news', $image_name);
        $data['image'] = $image_name;

        $result = News::where('id', $id)->update($data);

        return redirect()->route('news')->with('success', 'Data Updated');
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
        News::where('id', $id)->delete();
        return redirect()->route('news')->with('success', 'Data Deleted');
    }

    public function web()
    {
        $datas = News::all();
        return view('web.layouts.news')
                ->with('datas', $datas);
    }
}
