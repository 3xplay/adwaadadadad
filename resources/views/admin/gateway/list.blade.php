@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two custom-data-table">
                            <thead>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Nama Bank')</th>
                                    <th>@lang('Nama Rekening')</th>
                                    <th>@lang('Nomor Rekening')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            @foreach ($bank as $item)
                              <tbody>
                                    <tr>
                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->nama_bank }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->nama_penerima }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $item->no_rek }}</span>
                                        </td>

                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge--success">@lang('Active')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Disabled')</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('backoffice.gateway.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline--primary ms-1">
                                                <i class="la la-pencil"></i> @lang('Edit')
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection