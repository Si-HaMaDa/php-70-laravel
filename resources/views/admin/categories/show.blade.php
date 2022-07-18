@extends('admin.layouts.main')

@section('title', __('categories.show'))

@section('content')

<div class="content">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@lang('categories.show')</h1>
        <a class="btn btn-secondary float-end clearfix" href="{{ url('/admin/categories') }}">Back to
            @lang('categories.plural')</a>
    </div>

    <div class="card row g-3 my-3">
        <div class="card-body row">

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('categories.ID')</label>
                <div class="col-md-10">
                    : {{ $category->id }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('categories.name')</label>
                <div class="col-md-10">
                    : {{ $category->name }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('categories.created_at')</label>
                <div class="col-md-10">
                    : {{ $category->created_at }}
                </div>
            </div>

            <div class="col-12 mb-4 row">
                <label class="col-md-2">@lang('categories.updated_at')</label>
                <div class="col-md-10">
                    : {{ $category->updated_at }}
                </div>
            </div>

        </div>
    </div>

    <a class="btn btn-secondary float-end" href="{{ url('/admin/categories') }}">Back to @lang('categories.plural')</a>
</div>

@endsection
