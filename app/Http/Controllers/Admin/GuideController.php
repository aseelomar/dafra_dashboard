<?php

namespace App\Http\Controllers\Admin;

use App\Guide;
use Illuminate\Http\Request;
use DataTables;

class GuideController extends AdminController
{

    public function __construct()
    {
        $this->middleware('permission:guide');
    }


    public function index()
    {
        $videos = \App\VideoDetail::all();
        $guides = Guide::orderBy('id', 'ASC')->get();
        return view('admin.guide', compact('videos', 'guides'));

    }

    public function store(Request $request)
    {
        $guides = $request->only('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday');


        foreach($guides as $key => $value) {
           $guide =  Guide::where('day_en', $key)->first();
           $guide->properties = json_encode($value);
           $guide->save();
        }

        return back();

    }

}
