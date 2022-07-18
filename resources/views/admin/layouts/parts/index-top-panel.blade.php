<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">@lang($key . '.plural')</h1>
    <a class="btn btn-primary" href="{{ route('admin.' . $key . '.create') }}"><i data-feather="plus"></i>
        @lang($key . '.create')</a>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <span>
        <label class="m-0 text-white btn btn-sm btn-primary" for="select-all">
            <input type="checkbox" id="select-all" /> Select All
        </label>
    </span>
    <button data-action="{{ route('admin.' . $key . '.destroy', 0) }}" class="btn btn-sm btn-danger float-end"
        id="confirmDelete"><i data-feather="trash-2"></i> Bulk Delete</button>
</div>
