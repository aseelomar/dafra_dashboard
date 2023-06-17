<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">{{ trans('admin.add_new_goal') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-portlet__body" action="{{ route('admin.goals.store') }}" id="add_goals"method="POST">
                    @csrf
                        <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label class="form-control-label">{{ trans('admin.title_goals') }}</label>
                        <input type="text" class="form-control" value="" placeholder="{{ trans('admin.title_goals') }}" id="name" name="name" >
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">{{ trans('admin.description_goals') }}</label>
                        <input type="text" class="form-control" value="" placeholder="{{ trans('admin.description_goals') }}" id="description" name="description" >
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-clear" data-dismiss="modal">{{ trans('admin.cancel') }}</button>
                <button type="submit" class="btn btn-primary save">{{ trans('admin.save') }}</button>
            </div>

            </form>

        </div>
    </div>
</div>
