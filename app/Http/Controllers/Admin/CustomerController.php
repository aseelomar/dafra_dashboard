<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CustomerController extends AdminController
{

    public function index(){
        return view('admin.customers.view');
    }

    public function getCustomer()
    {
        $customer = Customer::query();


        $count = $customer->count();
        $datatable = Datatables::of($customer)->setTotalRecords($count);

        $datatable->editColumn('active', function ($row)
        {
            $data['active'] = $row->active;
            $data['id'] = $row->id_hash;

            return view('admin.customers.parts.status', $data)->render();
        });

        $datatable->editColumn('created_at', function ($row)
        {
            return $row->created_at->diffForHumans();
        });


        $datatable->filter(function ($query) {
            if (request()->has('name')) {
                $query->where('name', 'like', "%" . request('name') . "%");
            }
            if (request()->has('email')) {
                $query->where('email', 'like', "%" . request('email') . "%");
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

        $customer = Customer::findOrFail($id);

        $customer->update([
            'active' => !$customer->active
        ]);

        $saved = $customer->save();

        if ($saved) {
            return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.added'), null, null);
        }
    }

}
