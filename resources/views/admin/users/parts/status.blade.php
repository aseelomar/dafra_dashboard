
@if($active == 0)
    <span style="cursor: pointer" href="{{ route('admin.users.status', $id) }}" id="{{ $id }}" class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status">{{ trans('admin.disabled') }}</span>
@elseif($active == 1)
    <span style="cursor: pointer" href="{{ route('admin.users.status', $id) }}" id="{{ $id }}" class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status">{{ trans('admin.enabled') }}</span>
@endif


