@extends('admin.layouts.main')

@section('title', __('users.create'))

@section('content')


    <div class="content">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@lang('users.create')</h1>
            <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.users.index') }}">Back to
                @lang('users.plural')</a>
        </div>
        <form class="card row g-3 my-3" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-sm-12">
                    <label for="Name" class="form-label @error('name') is-invalid @enderror">@lang('users.name')</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder=""
                        value="{{ old('name') }}" required>
                    <div class="invalid-feedback">
                        Valid name is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="email" class="form-label">@lang('users.email')</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
                        value="{{ old('email') }}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="col-12">
                    <label for="password" class="form-label">@lang('users.password')</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                    <div class="invalid-feedback">
                        Please enter a valid password.
                    </div>
                </div>

                <div class="col-12">
                    <label for="password_confirmation" class="form-label">@lang('users.password_confirmation')</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="" required>
                    <div class="invalid-feedback">
                        Please enter a valid password_confirmation.
                    </div>
                </div>

                <div class="col-12">
                    <label for="role" class="form-label">@lang('users.role')</label>
                    <select class="form-select" name="role" id="role" required>
                        <option @selected(old('role') == 'user') value="user">@lang('users.roles.user')</option>
                        <option @selected(old('role') == 'admin') value="admin">@lang('users.roles.admin')</option>
                    </select>
                    <div class="invalid-feedback">
                        Valid Role is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="gender" class="form-label">@lang('users.gender')</label>
                    <select class="form-select" name="gender" id="gender" required>
                        <option @selected(old('gender') == 'm') value="m">@lang('users.genders.m')</option>
                        <option @selected(old('gender') == 'f') value="f">@lang('users.genders.f')</option>
                    </select>
                    <div class="invalid-feedback">
                        Valid Gender is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="age" class="form-label">@lang('users.age')</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder=""
                        value="{{ old('age') }}" required>
                    <div class="invalid-feedback">
                        Valid age is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="bio" class="form-label">@lang('users.bio')</label>
                    <input type="text" class="form-control" id="bio" name="bio" placeholder=""
                        value="{{ old('bio') }}" required>
                    <div class="invalid-feedback">
                        Valid bio is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="skills" class="form-label">@lang('users.user_skills')</label>
                    <select class="form-select" name="skills[]" id="skills" multiple required>
                        @foreach ($skills as $skill)
                            <option @selected(in_array($skill->id, (array) old('skills'))) value="{{ $skill->id }}">
                                {{ $skill->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Valid Skill is required.
                    </div>
                </div>

                <div class="col-12">
                    <label for="image" class="form-label">@lang('users.image')</label>
                    <input type="file" class="form-control" id="image" name="image" aria-label="Image"
                        value="{{ old('image') }}">
                    <div class="invalid-feedback">
                        Valid Image is required.
                    </div>
                </div>



                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
            </div>
        </form>
        <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.users.index') }}">Back to
            @lang('users.plural')</a>

    </div>


@endsection
