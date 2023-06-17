<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Video\VideoStoreRequest;
use App\Http\Requests\Admin\Video\VideoUpdateRequest;
use App\Video;
use App\VideoDetail;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class
VideoController extends AdminController
{
    public function index($id)
    {
        $id = $this->encrypt($id);
        $videoDetails = VideoDetail::where('id',$id)->first();
        return view('admin.videos.view', compact('videoDetails'));
    }
    public function getVideo($id)
    {
        $id = $this->encrypt($id);
        $video = Video::where('video_details_id',$id)->select();
        $videoCateguory = Video::where('video_details_id',$id)->select();

        $count = $video->count();
        $datatable = Datatables::of($video)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.videos.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->user->name;
        });



        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });

//        if($videoCateguory->category->slug == 'movies') {
//            $datatable->removeColumn('episode');
//        }
        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.videos.parts.actions', $data)->render();
        });

        $datatable->filter(function ($query) {

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
    public function add($id)
    {
        $id = $this->encrypt($id);
        $videoDetails = VideoDetail::where('id',$id)->first();
        return view('admin.videos.add',compact('videoDetails'));
    }
    public function store(VideoStoreRequest $request)
    {
        $data = $request->all();
        $video = new Video();
        $video->fill($data);
        $video->video_details_id=$data['video_details_id'];
        $video->user_id = Auth()->id();

        $add=$video->save();
        if (!$add)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);
    }
    public function status($id)
    {
        $id = $this->decrypt($id);

        $video = Video::findOrFail($id);

        $video->update([
            'active' => !$video->active
        ]);

        $saved = $video->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }
    public function delete($id)
    {

        $id = $this->encrypt($id);

        $delete = Video::findOrFail($id)->delete();

        if (!$delete)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.deleted'), null,null);

    }
    public function edit($id)
    {
        $id = $this->encrypt($id);

        $video = Video::findOrFail($id);


        return view('admin.videos.edit', compact('video'));
    }
    public function update(VideoUpdateRequest $request,$id){
        $video = Video::findOrFail($id);
        $video->fill($request->all());
        $video->updated_id = Auth()->id();
        $add=$video->save();
        if (!$add)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }


}
