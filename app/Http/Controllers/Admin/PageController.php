<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use DataTables;

class PageController extends AdminController
{

    public function index()
    {
        return view('admin.pages.view');
    }

    public function getPage()
        {
            $page = Page::query();

            $count = $page->count();
            $datatable = Datatables::of($page)->setTotalRecords($count);



            $datatable->editColumn('content', function ($row)
            {

                return  str_limit($row->content, $limit = 50, $end = '....');
            });


            $datatable->addColumn('actions', function ($row)
            {
                $data['id_hash'] = $row->id_hash;

                return view('admin.pages.parts.actions', $data)->render();
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

    public function addPage(){
        return view('admin.pages.add');
    }
    public function store(PageRequest $request)
    {
         $data=request()->all();
            $page=new Page();
           $page->fill($data);
           $page->user_id=Auth()->id();
            $add=$page->save();
            if (!$add)
            {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
            }
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

        }
    public function edit($id){
        $id = $this->encrypt($id);
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }
    public function update(PageRequest $request,$id){
        $data= $request->all();
        $page =Page::findOrFail($id);
        $page->fill($data);
        $update=$page->update();
        if (!$update)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);


    }

}
