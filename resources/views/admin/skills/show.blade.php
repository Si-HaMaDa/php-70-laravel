@extends('admin.layouts.main')

@section('title', __('skills.show'))

@section('content')

<div class="content">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('skills.show')</h1>
        <a class="btn btn-secondary float-end clearfix" href="{{ url('/admin/skills') }}">Back to
            @lang('skills.plural')</a>
    </div>

    <div class="card row g-3 my-3">
        <div class="card-body row">

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('skills.ID')</label>
                <div class="col-md-10">
                    : {{ $skill->id }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('skills.name')</label>
                <div class="col-md-10">
                    : {{ $skill->name }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('jobs.job_skills')</label>
                <div class="col-md-10">
                    :
                    @forelse ($skill->users as $user)
                        <a href="{{ route('admin.users.show', $user->id) }}">
                            {{ $user->name }} <br>
                        </a>
                    @empty
                        <p>No Users have this Skill!</p>
                    @endforelse
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('skills.created_at')</label>
                <div class="col-md-10">
                    : {{ $skill->created_at }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('skills.updated_at')</label>
                <div class="col-md-10">
                    : {{ $skill->updated_at }}
                </div>
            </div>

        </div>
    </div>

    <a class="btn btn-secondary float-end" href="{{ url('/admin/skills') }}">Back to @lang('skills.plural')</a>
</div>

@endsection
