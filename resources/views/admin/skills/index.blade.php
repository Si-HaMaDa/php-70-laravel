@extends('admin.layouts.main')

@section('title', __('skills.plural'))

@section('content')
<div class="content">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('skills.plural')</h1>
        <a class="btn btn-primary" href="{{ route('admin.skills.create') }}"><i data-feather="plus"></i>
            @lang('skills.create')</a>
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
                <th>@lang('skills.ID')</th>
                <th>@lang('skills.name')</th>
                <th>@lang('skills.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($skills as $skill)
            <tr id="tr-row-{{ $skill->id }}">
                <td>
                    <input class="row-bulk-delete" type="checkbox" name="id[]" value="{{ $skill->id }}"
                        id="input-row-{{ $skill->id }}" />
                </td>
                <td>
                    <label for="input-row-{{ $skill->id }}">
                        {{ $skill->id }}
                    </label>
                </td>
                <td>
                    <label for="input-row-{{ $skill->id }}">
                        {{ $skill->name }}
                    </label>
                </td>
                <td>
                    <a class="p-2 btn btn-primary show" data-id="{{ $skill->id }}"
                        href="{{ route('admin.skills.show', $skill->id) }}">
                        <i data-feather="eye" class="material-icons opacity-10">visibility</i>
                    </a>
                    <a class="p-2 btn btn-warning edit" data-id="{{ $skill->id }}" href="{{ route('admin.skills.edit', $skill->id) }}">
                        <i data-feather="edit" class="material-icons opacity-10">edit</i>
                    </a>
                    <form class="delete-form d-inline-block" data-name="{{ $skill->name }}" action="{{ route('admin.skills.destroy', $skill->id) }}" method="post"
                        id="{{ $skill->id }}" class="form-horizontal d-inline-block">
                        @method('DELETE')
                        {{-- <input type="hidden" name="_method" value="DELETE" /> --}}
                        @csrf
                        <button class="p-2 btn btn-danger delete" data-id="{{ $skill->id }}"
                            data-name="{{ $skill->name }}">
                            <i data-feather="trash-2" class="material-icons opacity-10">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $skills->appends(Request::all())->links() !!}
    {{-- {{ $skills->links('vendor.pagination.bootstrap-5') }} --}}
</div>
@endsection
