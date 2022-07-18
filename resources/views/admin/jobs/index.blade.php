@extends('admin.layouts.main')

@section('title', __('jobs.plural'))

@section('content')

    <div class="content">

        @include('admin.layouts.parts.index-top-panel', ['key' => 'jobs'])

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('jobs.ID')</th>
                    <th>@lang('jobs.title')</th>
                    <th>@lang('jobs.statu')</th>
                    <th>@lang('jobs.views')</th>
                    <th>@lang('jobs.category')</th>
                    <th>@lang('jobs.user')</th>
                    <th>@lang('jobs.action')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr id="tr-row-{{ $job->id }}">
                        <td>
                            <input class="row-bulk-delete" type="checkbox" name="id[]" value="{{ $job->id }}"
                                id="input-row-{{ $job->id }}" />
                        </td>
                        <td>
                            <label for="input-row-{{ $job->id }}">
                                {{ $job->id }}
                            </label>
                        </td>
                        <td>
                            <label for="input-row-{{ $job->id }}">
                                {{ $job->title }}
                            </label>
                        </td>
                        <td>@lang('jobs.status.' . $job->statu)</td>
                        <td>{{ $job->views }}</td>
                        <td>{{ $job->category->name }}</td>
                        <td>{{ $job->user->name }}</td>
                        <td>
                            <a class="p-2 btn btn-primary show" data-id="{{ $job->id }}"
                                href="{{ route('admin.jobs.show', $job->id) }}">
                                <i data-feather="eye" class="material-icons opacity-10">visibility</i>
                            </a>
                            <a class="p-2 btn btn-warning edit" data-id="{{ $job->id }}"
                                href="{{ route('admin.jobs.edit', $job->id) }}">
                                <i data-feather="edit" class="material-icons opacity-10">edit</i>
                            </a>
                            <form class="delete-form d-inline-block" data-name="{{ $job->title }}"
                                action="{{ route('admin.jobs.destroy', $job->id) }}" method="post"
                                id="{{ $job->id }}" class="form-horizontal d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button class="p-2 btn btn-danger delete" data-id="{{ $job->id }}"
                                    data-name="{{ $job->title }}">
                                    <i data-feather="trash-2" class="material-icons opacity-10">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $jobs->appends(Request::all())->links() !!}
        {{-- {{ $jobs->links('vendor.pagination.bootstrap-5') }} --}}

    </div>

@endsection

@push('scripts')
    {{-- <script src="{{ asset('js/delete-rows-vanilla.js') }}"></script> --}}
    <script src="{{ asset('js/delete-rows-jquery.js') }}"></script>
@endpush
