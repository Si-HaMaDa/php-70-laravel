@extends('admin.layouts.main')

@section('title', __('categories.plural'))

@section('content')
<div class="content">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('categories.plural')</h1>
        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}"><i data-feather="plus"></i>
            @lang('categories.create')</a>
    </div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <span>
            <label class="m-0 text-white btn btn-sm btn-primary" for="select-all">
                <input type="checkbox" id="select-all" /> Select All
            </label>
        </span>
        <button data-action="" class="btn btn-sm btn-danger float-end" id="confirmDelete"><i data-feather="trash-2"></i>
            Bulk Delete</button>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('categories.ID')</th>
                <th>@lang('categories.name')</th>
                <th>@lang('categories.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr id="tr-row-{{ $category->id }}">
                <td>
                    <input class="row-bulk-delete" type="checkbox" name="id[]" value="{{ $category->id }}"
                        id="input-row-{{ $category->id }}" />
                </td>
                <td>
                    <label for="input-row-{{ $category->id }}">
                        {{ $category->id }}
                    </label>
                </td>
                <td>
                    <label for="input-row-{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </td>
                <td>
                    <a class="p-2 btn btn-primary show" data-id="{{ $category->id }}"
                        href="{{ route('admin.categories.show', $category->id) }}">
                        <i data-feather="eye" class="material-icons opacity-10">visibility</i>
                    </a>
                    <a class="p-2 btn btn-warning edit" data-id="{{ $category->id }}" href="{{ route('admin.categories.edit', $category->id) }}">
                        <i data-feather="edit" class="material-icons opacity-10">edit</i>
                    </a>
                    <form class="delete-form d-inline-block" data-name="{{ $category->name }}" action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                        id="{{ $category->id }}" class="form-horizontal d-inline-block">
                        @method('DELETE')
                        {{-- <input type="hidden" name="_method" value="DELETE" /> --}}
                        @csrf
                        <button class="p-2 btn btn-danger delete" data-id="{{ $category->id }}"
                            data-name="{{ $category->name }}">
                            <i data-feather="trash-2" class="material-icons opacity-10">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $categories->appends(Request::all())->links() !!}
    {{-- {{ $categories->links('vendor.pagination.bootstrap-5') }} --}}
</div>
@endsection
