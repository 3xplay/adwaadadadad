@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">@lang('Add New Banner Slide')</h5>
                    <form action="{{ route('backoffice.banners.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="col-xl-4">
                            <div class="form-group">
                                <label>@lang('Gambar')</label>
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url()">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="gambar"
                                                id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                            <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Judul')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Input Banner Title')"
                                        name="nama" />
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary w-100 h-45">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.banners') }}" />
@endpush
