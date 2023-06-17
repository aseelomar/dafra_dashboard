<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Symfony\Component\VarDumper\Cloner\Data;

class CategoryController extends AdminController
{

    public function __construct()
    {
        $this->middleware('permission:categories');
    }

    public function index()
    {
        $category=null;
        return view('admin.categories.view',compact('category'));
    }
    public function getCategory(){
        $categories = Category::where('parent_id',null)->select();

        $count = $categories->count();

        $datatable = Datatables::of($categories)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $active = $row->active;
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.categories.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->user->name;
        });


        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });

        $datatable->editColumn('updated_at', function ($row)
        {
            return $row->updated_at->diffForHumans();
        });

        $datatable->addColumn('par_category',function ($row)
        {
            return $row->children->count();
        });

        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.categories.parts.actions', $data)->render();
        });

        $datatable->filter(function ($query) {
          if (request()->has('name')) {
                $query->where('name', 'like', "%" . request('name') . "%");
            }
        }, true);


        $datatable->setRowId(function ($row) {
            return $row->id_hash;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);

    }

    public function delete($id)
    {

        $id = $this->encrypt($id);

        $delete = Category::findOrFail($id)->delete();

        if (!$delete)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);

    }
    public function store(CategoryRequest $request){
        $data=request()->all();
        if($request->id!== null){
            $id=$request->id;
            $category = Category::findOrFail($id);
            $category->fill($data);
            $update=$category->update();
            if (!$update)
            {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
            }
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
        }else {
            $category = new Category();
            $category->fill($data);
            $category->user_id = Auth()->id();

            $add = $category->save();
            if (!$add) {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null, null);
            }
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null, null);
        }
    }
      public function edit($id){

        $id = $this->encrypt($id);
        $category = Category::findOrFail($id);
          return response()->json($category);
    }
    public function status($id)
    {
        $id = $this->decrypt($id);

        $category = Category::findOrFail($id);

        $category->update([
            'active' => ! $category->active
        ]);

        $saved = $category->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }

///////////////Sub_Category/////////////////////
    public function sub_index()
    {
        $category= Category::where('parent_id',null)->get();
        return view('admin.sub-category.view',compact('category'));
    }
    public function getSubCategory(){
        $categories = Category::whereNotNull('parent_id')->select();

        $count = $categories->count();

        $datatable = Datatables::of($categories)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.categories.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->user->name;
        });


        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });

        $datatable->editColumn('updated_at', function ($row)
        {
            return $row->updated_at->diffForHumans();
        });

        $datatable->editColumn('parent_id',function ($row)
        {
            return $row->parent->name;
        });

        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.sub-category.parts.actions', $data)->render();
        });

         $datatable->filter(function ($query) {
           if (request()->has('name')) {
                 $query->where('name', 'like', "%" . request('name') . "%");
             }
         }, true);



        $datatable->setRowId(function ($row) {
            return $row->id_hash;
        });

        $datatable->escapeColumns(['*']);
        return $datatable->make(true);
    }

}

