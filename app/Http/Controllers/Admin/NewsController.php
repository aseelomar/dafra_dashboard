<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\NewsRequest;
use App\News;
use DataTables;
use Illuminate\Http\Request;

class NewsController extends AdminController
{

    public function __construct()
    {
        $this->middleware('permission:news');
    }

    public function index()
    {
        $categories = Category::NewsCategories()->get();
        return view('admin.news.view', compact('categories'));

    }

    public function getNews()
    {
        $news = News::query();

        $count = $news->count();
        $datatable = Datatables::of($news)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.news.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->user->name;
        });

        $datatable->editColumn('category_id', function ($row)
        {
            return $row->category->name;
        });

        $datatable->editColumn('image', function ($row)
        {
            $url= asset('storage/news/'.$row->image);

            return '<img src="'.$url.'" width="50" height="50" class="img-responsive" align="center" />';
        });


        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });

        $datatable->editColumn('description', function ($row)
        {

            return  str_limit($row->description, $limit = 50, $end = '....');
        });


        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.news.parts.actions', $data)->render();
        });

        $datatable->filter(function ($query) {
        if (request()->has('title')) {
            $query->where('title', 'like', "%" . request('title') . "%");
        }

        if (request()->has('category_id') && !is_null(request('category_id'))) {
            $query->where('category_id', request('category_id'));
        }
        if(request()->has('active')&& !is_null(request('active'))){
            $query->where('active',request('active'));
        }

        }, true);

        $datatable->setRowId(function ($row) {
            return $row->id_hash;
        });

        $datatable->escapeColumns(['*']);

        return $datatable->make(true);

    }


    public function add()
    {
        $categories = Category::NewsCategories()->active()->get();
        return view('admin.news.add',compact('categories'));

    }


    public function delete($id)
    {

        $id = $this->encrypt($id);

        $delete = News::findOrFail($id)->delete();

        if (!$delete)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);

    }

    public function store(NewsRequest $request, $status)
    {
            $data = $request->all();
            $news = new News();
            $news->fill($data);

            if ($file = request()->file('image')) {
                $NewsImage = time() . '.' . $file->getClientOriginalExtension();
                request()->file('image')->storeAs(
                    'public\news', $NewsImage
                );
                $news->image = $NewsImage;
            }

            $status == 1 ? $news->active  = 1 : $news->active = 0;

            $news->user_id = 1;

            $add = $news->save();
            if (!$add)
            {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
            }
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

        }


    public function status($id)
    {
        $id = $this->decrypt($id);

        $news = News::findOrFail($id);

        $news->update([
            'active' => !$news->active
        ]);

        $saved = $news->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }

    public function edit($id){
        $id = $this->encrypt($id);
        $news = News::findOrFail($id);
        $categories = Category::NewCategories()->active()->get();;
        return view('admin.news.edit', compact('categories','news'));
    }

    public function update(Request $request,$id){
        $id = $this->encrypt($id);
        $news = News::findOrFail($id);
        $news->fill($request->only([
            'title',
            'description',
            'category_id'
        ]));

        if ($file = request()->file('image')) {
            $NewsImage = time() . '.' . $file->getClientOriginalExtension();
            request()->file('image')->storeAs(
                'public\news', $NewsImage
            );
            $news->image = $NewsImage;
        }
        $news->update_id=1;

        $update=$news->update();
        if (!$update)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }

}
