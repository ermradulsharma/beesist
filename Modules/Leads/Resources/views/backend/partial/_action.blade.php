<div class="d-flex align-items-center">
    @foreach ($actions as $key => $action)
        <x-action.action href="{{ $action['href'] }}" title="{{ $action['title'] }}" class="btn btn-{{ $action['btn'] }} btn-sm mr-1" icon="fas fa-{{ $action['icon'] }}" tarGet="{{ in_array($key, [0, 3]) ? '' : '_blank' }}" wireClick="{{ $key == 0 ? 'confirmApproved(' .$model->id. ')' : ($key == 3 ? 'confirmDeclined('.$model->id.')' : '') }}" ></x-action.action>
    @endforeach
</div>
