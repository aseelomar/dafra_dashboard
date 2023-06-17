<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Data;

class UserController extends AdminController
{

    public function __construct()
    {
        $this->middleware('permission:users');
    }

    public function index()
    {
        return view('admin.users.view');
    }

    public function getUser()
    {
        $users = User::where('id', '!=', '1')->select();

        $count = $users->count();
        $datatable = Datatables::of($users)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.users.parts.status', $data)->render();
        });

        $datatable->editColumn('user_id', function ($row)
        {
            return $row->parent ? $row->parent->name : "";
        });

        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });

        $datatable->editColumn('name', function ($row)
        {
            $url= asset('storage/users/'.$row->image);

            return '<img src="'.$url.'" width="30" height="30" class="img-responsive rounded-circle" align="center" />' . '<h6 style="display: inline-flex;padding: 5px;"> "'.$row->name.'" </h6>';
        });

        $datatable->addColumn('actions', function ($row)
        {
            $data['id_hash'] = $row->id_hash;

            return view('admin.users.parts.actions', $data)->render();
        });

        $datatable->filter(function ($query) {
            if (request()->has('name')) {
                $query->where('name', 'like', "%" . request('name') . "%");
            }

            if(request()->has('active') && !is_null(request('active'))){
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

        $user = User::findOrFail($id);

        $user->update([ 'active' => !$user->active ]);

        $saved = $user->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }

        return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
    }

    public function add()
    {
        $roles = Role::where('id', '!=', 1)->get();
        return view('admin.users.add', compact('roles'));
    }

    public function store(UserRequest $request)
    {

        $user = new User();

        $user->fill($request->only('email', 'name', 'password', 'active'));


        $role = $request['role'];
        if (isset($role)) {

            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r);
        }

        if ($file = request()->file('image')) {
            $NewsImage = time() . '.' . $file->getClientOriginalExtension();
            request()->file('image')->storeAs(
                'public\users', $NewsImage
            );
            $user->image = $NewsImage;
        }

         $user->user_id = Auth::guard('admin')->id();
         $user->save();

        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null,null);
    }

    public function edit($id)
    {
        $id = $this->encrypt($id);

        $user = User::findOrFail($id);

        $roles = Role::where('id', '!=', 1)->get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request,$id)
    {
        $id = $this->encrypt($id);

        $user = User::findOrFail($id);
        $user->fill($request->only([
            'email', 'name', 'active'
        ]));

        $role = $request['role'];
        if (isset($role)) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r);
        }

        if ($file = request()->file('image')) {
            $NewsImage = time() . '.' . $file->getClientOriginalExtension();
            request()->file('image')->storeAs(
                'public\users', $NewsImage
            );
            $user->image = $NewsImage;
        }

        $user->user_id = Auth::guard('admin')->id();

        $update = $user->update();
        if (!$update)
        {
            return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null,null);
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null,null);

    }

}
