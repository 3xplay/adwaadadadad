@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Edit Rekening') <strong>{{ $bank->nama_bank }}</strong></h5>
                    <form action="{{ route('backoffice.gateway.update', $bank->id) }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('POST')
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Nama Bank')</label>
                                    <input type="text" class="form-control" name="bank" value="{{ $bank->nama_bank }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ ('https://files.leikesizichan.skin/ImageFile/Qris/' . $bank->image_qr) }})">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="qr"
                                                    id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Qris Image')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('Nomor Rekening')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Enter your Account Number')"
                                            name="no" value="{{ $bank->no_rek }}" />
                                    </div>
                                </div>
                            </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Nama Rekening')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Enter your Account Name')"
                                        name="nama" value="{{ $bank->nama_penerima }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.gateway') }}" />
@endpush