<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;
use DataTables;

class SettingController extends AdminController
{
    public function __construct()
    {
        $this->middleware('permission:settings');
    }



    public function index()
    {
        $setting = Setting::get();
        return view('admin.settings.view',compact('setting'));
    }
    public function getSetting()
    {
        $setting = Setting::get();
        if (!empty($setting)) {
            $count = $setting->count();

        }else{
            $count=0;
        }


        $datatable = Datatables::of($setting)->setTotalRecords($count);

        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.settings.parts.actions', $data)->render();
        });

        $datatable->editColumn('value', function ($row)
        {

            return  str_limit($row->value, $limit = 110, $end = '....');
        });


        $datatable->setRowId(function ($row) {
            return $row->id_hash;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);
    }
    public function edit($id)
    {
        $id = $this->encrypt($id);
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }
    public function update(SettingRequest $request,$id)
    {
        $data= $request->all();
        $setting = setting::findOrFail($id);
        $setting->fill($data);
        $update=$setting->update();
        if (!$update)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }
    public function add()
    {
        return view('admin.settings.add');
    }

    public function store(SettingRequest $request)
    {

        $data=request()->all();
        $setting=new setting();
        $setting->fill($data);
        $add=$setting->save();
        if (!$add)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }
    public function delete($id)
    {

        $id = $this->encrypt($id);

        $delete =Setting::findOrFail($id)->delete();

        if (!$delete)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);

    }



    //////////************  For customer admin   *********************/////

    public function view()
    {
        return view('admin.settings.view_editable');

    }

    public function updateByKey(Request $request)
    {
        $settings = $request->all();

        foreach($settings as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }

}
