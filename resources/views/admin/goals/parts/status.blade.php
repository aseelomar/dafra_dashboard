
@if($active == 0)
    <span style="cursor: pointer" href="{{ route('admin.goals.status', $id) }}" id="{{ $id }}" class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status">{{ trans('admin.unpublished') }}</span>
@elseif($active == 1)
    <span style="cursor: pointer" href="{{ route('admin.goals.status', $id) }}" id="{{ $id }}" class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status">{{ trans('admin.published') }}</span>
@endif