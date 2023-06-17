<a data-url="{{ route('admin.goals.edit', ['id' => $id_hash]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill tooltips update_btn"
   data-toggle="modal" data-target="#m_modal_1" title="{{trans('admin.edit')}}">
    <i style="color: #0a8cf0" class="la la-edit"></i>
</a>
<a data-url="{{ route('admin.goals.delete',['id' => $id_hash]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill tooltips delete_btn" title="{{trans('admin.delete')}}">
    <i style="color: red" class="la la-trash-o"></i>
</a>
