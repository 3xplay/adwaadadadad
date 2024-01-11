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
                                    <th>@lang('Gambar')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banner as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">{{ $item->nama }}</span>
                                        </td>
                                        <td>
                                            <img src="{{ ('https://files.leikesizichan.skin/ImageFile/banner/' . $item->gambar) }}"
                                                style="max-width:200px" />
                                        </td>

                                        <td>
                                            <a href="{{ route('backoffice.banners.edit', $item->id) }}"
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
                @if ($banner->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($banner) }}
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('backoffice.banners.add') }}" class="btn btn-sm btn-outline--primary"><i
            class="fa fa-fw fa-plus"></i>@lang('Add Banner')</a>
@endpush
