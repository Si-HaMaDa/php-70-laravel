@extends('admin.layouts.main')

@section('title', __('categories.create'))

@section('content')


    <div class="content">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@lang('categories.create')</h1>
            <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.categories.index') }}">Back to
                @lang('categories.plural')</a>
        </div>
        <form class="card row g-3 my-3" method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-sm-12">
                    <label for="Name" class="form-label @error('name') is-invalid @enderror">@lang('categories.name')</label>
                    <input type="text" class="form-control" id="Name" name="name" placeholder=""
                        value="{{ old('name') }}" required>
                    <div class="invalid-feedback">
                        Valid name is required.
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
            </div>
        </form>
        <a class="btn btn-secondary float-end clearfix" href="{{ route('admin.categories.index') }}">Back to
            @lang('categories.plural')</a>

    </div>


@endsection
