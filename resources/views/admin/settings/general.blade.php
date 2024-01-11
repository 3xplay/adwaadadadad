@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backoffice.website.setting.update', $setting->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"> @lang('Nama Web') </label>
                                    <input class="form-control form-control-lg" type="text" name="nama_web"
                                        value="{{ $setting->nama_web }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label  font-weight-bold">@lang('Running Text')</label>
                            <textarea name="running_text" rows="3" class="form-control" placeholder="@lang('Running text')" required>{{ $setting->running_text }}</textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="form-control-label font-weight-bold">@lang('Maintenance Mode')</label>
                                    <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                    data-bs-toggle="toggle" data-on="@lang('Disabled')" data-on="@lang('Disable')"
                                    data-off="@lang('Enable')" name="maintenance_mode" value="1"
                                    <?= $setting->maintenance_mode == 1 ? 'checked' : '' ?>>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Save Change')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-lib')
    <script src="{{ asset('assets/js/spectrum.js') }}"></script>
@endpush

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/css/spectrum.css') }}">
@endpush
