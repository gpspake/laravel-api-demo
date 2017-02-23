<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Widget;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $widgets = Widget::all();
        return response()->json($widgets);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $widget = json_decode( $request->header('data'));

        $newWidget = new Widget;
        $newWidget->name = $widget->name;
        $newWidget->price = $widget->price;
        $newWidget->description = $widget->description;
        $newWidget->save();

    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $widget = Widget::whereSlug($slug)->firstOrFail();
        return response()->json($widget);

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
        $widget = json_decode($request->header('data'));

        $updatedWidget = Widget::find($id);
        $updatedWidget->name = $widget->name;
        $updatedWidget->slug = str_slug($widget->name);
        $updatedWidget->price = $widget->price;
        $updatedWidget->description = $widget->description;
        $updatedWidget->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $widget = Widget::findOrFail($id);
        $widget->delete();

    }
}
