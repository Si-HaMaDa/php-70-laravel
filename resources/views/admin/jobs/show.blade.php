@extends('admin.layouts.main')

@section('title', __('jobs.show'))

@section('content')

    <div class="content">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@lang('jobs.show')</h1>
            <a class="btn btn-secondary float-end clearfix" href="{{ url('/admin/jobs') }}">Back to @lang('jobs.plural')</a>
        </div>

        <div class="card row g-3 my-3">
            <div class="card-body row">

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.ID')</label>
                    <div class="col-md-10">
                        : {{ $job->id }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.title')</label>
                    <div class="col-md-10">
                        : {{ $job->title }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.description')</label>
                    <div class="col-md-10">
                        : {{ $job->description }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.salary')</label>
                    <div class="col-md-10">
                        : {{ $job->salary }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.statu')</label>
                    <div class="col-md-10">
                        : @lang('jobs.status.' . $job->statu)
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.views')</label>
                    <div class="col-md-10">
                        : {{ $job->views }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.category')</label>
                    <div class="col-md-10">
                        : {{ $job->category->name }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.user')</label>
                    <div class="col-md-10">
                        : {{ $job->user->name }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.job_skills')</label>
                    <div class="col-md-10">
                        :
                        @forelse ($job->skills as $skill)
                            <a href="{{ route('admin.skills.show', $skill->id) }}">
                                {{ $skill->name }} <br>
                            </a>
                        @empty
                            <p>No Skills for this Job!</p>
                        @endforelse
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.created_at')</label>
                    <div class="col-md-10">
                        : {{ $job->created_at }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.updated_at')</label>
                    <div class="col-md-10">
                        : {{ $job->updated_at }}
                    </div>
                </div>

                <div class="col-12 mb-4 row">
                    <label class="col-md-2">@lang('jobs.applied_users')</label>
                    <div class="col-md-10">
                        :
                        @forelse ($job->appliedUsers as $appliedUser)
                            <a href="{{ route('admin.users.show', $appliedUser->id) }}">
                                {{ $appliedUser->name }} <br>
                            </a>
                        @empty
                            <p>User doesn't applied to any Job!</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

        <a class="btn btn-secondary float-end" href="{{ url('/admin/jobs') }}">Back to @lang('jobs.plural')</a>

    </div>

@endsection
