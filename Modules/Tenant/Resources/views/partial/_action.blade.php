<div class="d-flex align-items-center">

    @foreach ($actions as $key => $action)
        <x-action.tenant href="{{ $action['href'] }}" title="{{ $action['title'] }}" class="btn btn-{{ $action['btn'] }} btn-sm mr-1" icon="fas fa-{{ $action['icon'] }}" wireClick="{{ $action['action'] }}({{ $model->id }})" ></x-action.tenant>
    @endforeach
</div>
