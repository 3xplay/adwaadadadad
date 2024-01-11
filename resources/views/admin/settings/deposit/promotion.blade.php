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
                                    <th>@lang('Judul')</th>
                                    <th>@lang('Deskripsi')</th>
                                    <th>@lang('Persentasi')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bonus as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->judul }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->keterangan }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->nominal . ' %' }}</span>
                                        </td>

                                        <td>
                                            <a href="{{ route('backoffice.website.depositPromotion.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline--primary">
                                                <i class="las la-pencil-alt"></i> @lang('Edit')
                                            </a>
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
                @if ($bonus->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($bonus) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('backoffice.website.depositPromotion.add') }}" class="btn btn-sm btn-outline--primary"><i
            class="fa fa-fw fa-plus"></i>@lang('Add Banner')</a>
@endpush
