<a href="{{ route('admin.video_details.edit', ['id' => $id_hash]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill tooltips update_btn" title="{{trans('admin.edit')}}">
    <i class="la la-edit"></i>
</a>

<a href="{{ route('admin.videos.add', ['id' => $id_hash]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill tooltips update_btn" title="{{trans('admin.add')}}">
    <i class="la la-plus"></i>
</a>
<a href="{{ route('admin.videos.all', ['id' => $id_hash]) }}" class="m-portlet__nav-link btn m-btn m-btn--hover-info m-btn--icon m-btn--icon-only m-btn--pill tooltips update_btn view_all" title="{{trans('admin.videos')}}">
    <i class="la la-video-camera"></i>
</a>
