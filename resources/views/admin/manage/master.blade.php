@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Username')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Phone Numbers')</th>
                                    <th>@lang('Role')</th>
                                    <th>@lang('Created Date')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_member as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->name }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->email }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->telp }}</span>
                                        </td>

                                        <td>
                                            @if ($item->level == 1)
                                            <span class="fw-bold">@lang('Admin')</span>
                                            @elseif ($item->level == 2)
                                            <span class="fw-bold">@lang('Master')</span>
                                            @else
                                            <span class="fw-bold">@lang('Member')</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->created_at }}</span>
                                        </td>

                                        <td>
                                            <form action="{{ route('backoffice.admin.delete', $item->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-sm btn-outline--danger delusr">
                                                <i class="las la-user-cog"></i> @lang('Delete')
                                            </button>
                                        </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">@lang('Data Not Found')</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($data_member->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($data_member) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection



@push('breadcrumb-plugins')
    <x-search-form placeholder="Username / Email" />
@endpush
