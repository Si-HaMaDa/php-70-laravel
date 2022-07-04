@extends('admin.layouts.main')

@section('title', __('users.plural'))

@section('content')

<div class="content">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('users.plural')</h1>
        <a class="btn btn-primary" href=""><i data-feather="plus"></i>
            @lang('users.create')</a>
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
                <th>@lang('users.ID')</th>
                <th>@lang('users.name')</th>
                <th>@lang('users.email')</th>
                <th>@lang('users.age')</th>
                <th>@lang('users.image')</th>
                <th>@lang('users.role')</th>
                <th>@lang('users.action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>

                <td>
                    <input class="row-bulk-delete" type="checkbox" name="id[]" value="{{ $user->id }}"
                        id="input-row-{{ $user->id }}" />
                </td>

                <td>
                    <label for="input-row-{{ $user->id }}">
                        {{ $user->id }}
                    </label>
                </td>

                <td>
                    <label for="input-row-{{ $user->id }}">
                        {{ $user->name }}
                    </label>
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->age }}
                </td>
                <td>
                    <img src="{{ url($user->image) }}" alt="" srcset="">
                </td>
                <td>
                    {{ $user->role }}
                </td>
                <td>
                    <a class="p-2 btn btn-primary show" data-id="{{ $user->id }}"
                        href="{{ url('admin/users/'.$user->id) }}">
                        <i data-feather="eye" class="material-icons opacity-10">visibility</i>
                    </a>
                    <a class="p-2 btn btn-warning edit" data-id="{{ $user->id }}" href="">
                        <i data-feather="edit" class="material-icons opacity-10">edit</i>
                    </a>
                    <form class="delete-form d-inline-block" data-name="{{ $user->name }}" action="" method="post"
                        id="{{ $user->id }}" class="form-horizontal d-inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="p-2 btn btn-danger delete" data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}">
                            <i data-feather="trash-2" class="material-icons opacity-10">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    {!! $users->links() !!}
</div>

@endsection
