@extends('admin.layouts.main')

@section('title', __('jobs.create'))

@section('content')

    <div class="content">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@lang('jobs.create')</h1>
            <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.jobs.index') }}">Back to
                @lang('jobs.plural')</a>
        </div>
        <form class="card row g-3 my-3" method="POST" action="{{ route('admin.jobs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-sm-12">
                    <label for="title" class="form-label @error('title') is-invalid @enderror">@lang('jobs.title')</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder=""
                        value="{{ old('title') }}" required>
                    <div class="invalid-feedback">
                        Valid title is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">@lang('jobs.description')</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    <div class="invalid-feedback">
                        Please enter a valid description address for shipping updates.
                    </div>
                </div>

                <div class="col-12">
                    <label for="salary" class="form-label">@lang('jobs.salary')</label>
                    <input type="number" class="form-control" id="salary" name="salary" placeholder=""
                        value="{{ old('salary') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid salary.
                    </div>
                </div>

                <div class="col-12">
                    <label for="views" class="form-label">@lang('jobs.views')</label>
                    <input type="number" class="form-control" id="views" name="views" placeholder=""
                        value="{{ old('views') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid views.
                    </div>
                </div>

                <div class="col-12">
                    <label for="statu" class="form-label">@lang('jobs.statu')</label>
                    <select class="form-select" name="statu" id="statu" required>
                        <option @selected(old('statu') == 'pending') value="pending">@lang('jobs.status.pending')</option>
                        <option @selected(old('statu') == 'open') value="open">@lang('jobs.status.open')</option>
                        <option @selected(old('statu') == 'closed') value="closed">@lang('jobs.status.closed')</option>
                    </select>
                    <div class="invalid-feedback">
                        Valid statu is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="category_id" class="form-label">@lang('jobs.category')</label>
                    <select class="form-select" name="category_id" id="category_id" required>
                        @foreach ($categories as $category)
                            <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid category id is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="user_id" class="form-label">@lang('jobs.user')</label>
                    <select class="form-select" name="user_id" id="user_id" required>
                        @foreach ($users as $user)
                            <option @selected(old('user_id') == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid user id is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="skills" class="form-label">@lang('jobs.job_skills')</label>
                    <select class="form-select" name="skills[]" id="skills" multiple required>
                        @foreach ($skills as $skill)
                            <option @selected(in_array($skill->id, (array) old('skills')) ? 'selected' : '') value="{{ $skill->id }}">
                                {{ $skill->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid Skill is required.
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
            </div>
        </form>
        <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.jobs.index') }}">Back to
            @lang('jobs.plural')</a>

    </div>

@endsection
