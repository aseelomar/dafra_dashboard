<?php

namespace App\Http\Controllers\Admin;

use App\Constant;
use App\Http\Requests\Admin\ConstantRequest;
use Illuminate\Http\Request;

class ConstantController extends AdminController
{

    public function index()
    {
       $constant = Constant::all();
       return view('admin.constants.view',compact('constant'));
    }

    public function store(ConstantRequest $request)
    {

        $data = $request->all();
        $idDark=$request->idDark;
       $idDay=$request->idDay;
        if ($idDark) {
            $constant = Constant::findOrFail($idDark);
            if ($file = request()->file('imageDark')) {
                $constantImage = time() . '.' . $file->getClientOriginalExtension();
                request()->file('imageDark')->storeAs(
                'public\constant', $constantImage
                );
                $constant->image = $constantImage;
            }
            $update = $constant->update();
            if (!$update) {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null, null);
            }
        }
        if ($idDay) {
            $constant = Constant::findOrFail($idDay);
            if ($file = request()->file('imageDay')) {
                $constantImage = time() . '.' . $file->getClientOriginalExtension();
                request()->file('imageDay')->storeAs(
                    'public\constant', $constantImage
                );
                $constant->image = $constantImage;
            }
            $update = $constant->update();
            if (!$update) {
                return $this->respondGeneral(true, 500, trans('alert.error'), trans('messages.error'), null, null);
            }
        }
        return $this->respondGeneral(true, 200, trans('alert.success'), trans('messages.add'), null, null);

    }

}
