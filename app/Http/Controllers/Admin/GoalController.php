<?php

namespace App\Http\Controllers\Admin;

use App\Goal;
use App\Http\Requests\Admin\GoalRequest;
use Illuminate\Http\Request;
use DataTables;

class GoalController extends AdminController
{

    public function __construct()
    {
        $this->middleware('permission:goals');
    }


    public function index()
    {
        $goals=Goal::all();
        return view('admin.goals.view', compact('goals'));

    }


    public function getGoals()
    {
        $goals = Goal::query();

        $count = $goals->count();

        $datatable = Datatables::of($goals)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.goals.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->user ? $row->user->name : "";
        });

        $datatable->editColumn('description', function ($row)
        {
            return str_limit($row->description, $limit = 50, $end = '....');
        });



        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });
       $datatable->editColumn('updated_at', function ($row)
        {
            return $row->updated_at->diffForHumans();
        });

        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.goals.parts.actions', $data)->render();
        });


        $datatable->setRowId(function ($row) {
            return $row->id_hash;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);

    }



        public function store(GoalRequest $request){
        $goals = Goal::count();
        $data = request()->all();

            if($request->id!== null){
                $id=$request->id;
                $goal = Goal::findOrFail($id);
                $goal->fill($data);
                $goal->updated_user = Auth()->id();
                $update=$goal->update();
                if (!$update)
                {
                    return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
                }
                return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
            }else{

                if($goals < 4) {
                    $goal = new Goal();
                     $goal->fill($data);
                     $goal->user_id = Auth()->id();
                    $add = $goal->save();
                    if (!$add) {
                         return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null, null);
                    }
                 return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null, null);
                     } else {
                  return $this->respondGeneral(true, trans('alert.error'), trans('messages.error'), null, null);

                }}
    }


    public function delete($id)
    {

        $id = $this->encrypt($id);

        $delete =Goal::findOrFail($id)->delete();

        if (!$delete)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);

    }


    public function status($id)
    {
        $id = $this->decrypt($id);

        $goals = Goal::findOrFail($id);

        $goals->update([
            'active' => !$goals->active
        ]);

        $saved = $goals->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }




    public function edit($id)
    {
        $id = $this->encrypt($id);
        $Goal = Goal::findOrFail($id);
        return response()->json($Goal);
    }

}
