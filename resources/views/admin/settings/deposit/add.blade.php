@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Deposit Promotion Add')</h5>
                    <form action="{{ route('backoffice.website.depositPromotion.upload') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('POST')
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Judul')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Title')"
                                        name="judul" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Deskripsi')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Note')"
                                        name="keterangan" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Persentasi')</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="@lang('Percentage')"
                                            name="nominal" value="">
                                            <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.website.depositPromotion') }}" />
@endpush