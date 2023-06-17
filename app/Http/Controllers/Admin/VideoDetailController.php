<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\VideoDetail\VideoDetailUpdateRequest;
use App\Http\Requests\Admin\VideoDetail\VideoDetailRequestStore;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use App\VideoDetail;
use Illuminate\Support\Facades\URL;

class VideoDetailController extends AdminController
{
  public function index()
  {
      $categories = Category::VideoCategories()->get();
      $categoryName = Category::where('slug',collect(request()->segments())->last())->first();
      $categoryName=$categoryName->name;
      return view('admin.video-details.view', compact('categories','categoryName'));
  }


  public function getVideoDetail($slug)
  {

      if ($slug == 'videos') {
          $videoDetails = VideoDetail::query();
      } else {
          $video = Category::where('slug', $slug)->first();
          $videoDetails = $video->branches()->select();
      }

      $count = $videoDetails->count();
      $datatable = Datatables::of($videoDetails)->setTotalRecords($count);

      $datatable->editColumn('active', function ($row)
      {
          $data['active'] = $row->active;
          $data['id'] = $row->id_hash;

          return view('admin.video-details.parts.status', $data)->render();
      });

      $datatable->editColumn('user_id', function ($row)
      {
          return $row->user->name;
      });


      $datatable->editColumn('category_id', function ($row)
      {
          return $row->category->name;
      });

      $datatable->editColumn('created_at', function ($row)
      {
          return $row->created_at->diffForHumans();
      });



      $datatable->addColumn('actions', function ($row)
      {
          $data['id_hash'] = $row->id_hash;

          return view('admin.video-details.parts.actions', $data)->render();
      });

      $datatable->filter(function ($query) {
          if (request()->has('name')) {
              $query->where('name', 'like', "%" . request('name') . "%");
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

    public function status($id)
    {

        $id = $this->decrypt($id);

        $videoDetails = VideoDetail::findOrFail($id);

        $videoDetails->update([
            'active' => !$videoDetails->active
        ]);

        $saved = $videoDetails->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }
//    public function delete($id)
//    {
//
//        $id = $this->encrypt($id);
//
//        $delete = VideoDetail::findOrFail($id)->delete();
//
//        if (!$delete)
//        {
//            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
//        }
//        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);
//
//    }
    public function add()
    {
        $categories=Category::VideoCategories()->active()->get();
        return view('admin.video-details.add',compact('categories'));
    }

    public function store(VideoDetailRequestStore $request)
    {
        $data = $request->all();
        $videoDetail = new VideoDetail();
        $videoDetail->fill($data);
        if ($file = request()->file('image')) {
            $videoImage = time() . '.' . $file->getClientOriginalExtension();
            request()->file('image')->storeAs(
                'public\imageVideo', $videoImage
            );
            $videoDetail->image = $videoImage;
        }
        $videoDetail->user_id = Auth()->id();

        $add=$videoDetail->save();
        if (!$add)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
    }
    public function edit($id){
        $id = $this->encrypt($id);
        $videoDetails = VideoDetail::findOrFail($id);
        $categories=Category::VideoCategories()->active()->get();
        return view('admin.video-details.edit', compact('categories','videoDetails'));
    }

    public function update(VideoDetailUpdateRequest $request,$id){
        $videoDetail = VideoDetail::findOrFail($id);
        $videoDetail->fill($request->all());
        if ($file = request()->file('image')) {
            $videoImage = time() . '.' . $file->getClientOriginalExtension();
            request()->file('image')->storeAs(
                'public\imageVideo', $videoImage
            );
            $videoDetail->image = $videoImage;
        }
        $videoDetail->updated_id = Auth()->id();

        $update=$videoDetail->update();
        if (!$update)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }

}
