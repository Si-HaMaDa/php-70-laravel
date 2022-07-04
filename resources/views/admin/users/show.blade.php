@extends('admin.layouts.main')

@section('title', __('users.singluar'))

@section('content')

<div class="content">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('users.show')</h1>
        <a class="btn btn-secondary float-end clearfix" href="{{ url('/admin/users') }}">Back to
            @lang('users.plural')</a>
    </div>

    <div class="card row g-3 my-3">
        <div class="card-body row">

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.ID')</label>
                <div class="col-md-10">
                    : {{ $user->id }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.name')</label>
                <div class="col-md-10">
                    : {{ $user->name }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.email')</label>
                <div class="col-md-10">
                    : {{ $user->email }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.role')</label>
                <div class="col-md-10">
                    : @lang('users.roles.'.$user->role)
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.gender')</label>
                <div class="col-md-10">
                    : @lang('users.genders.'.$user->gender)
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.age')</label>
                <div class="col-md-10">
                    : {{ $user->age }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.bio')</label>
                <div class="col-md-10">
                    : {{ $user->bio }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.created_at')</label>
                <div class="col-md-10">
                    : {{ $user->created_at }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.updated_at')</label>
                <div class="col-md-10">
                    : {{ $user->updated_at }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('users.image')</label>
                <div class="col-md-10">
                    : <img class="img-thumbnail m-1" width="95%" src="{{ $user->image }}" alt="{{ $user->name }}">
                </div>
            </div>

        </div>
    </div>

    <a class="btn btn-secondary float-end" href="{{ url('/admin/users') }}">Back to @lang('users.plural')</a>
</div>

@endsection
