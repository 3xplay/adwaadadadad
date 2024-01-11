@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backoffice.website.promotion.update', $banner_promosi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview"
                                                    style="background-image: url({{ ('https://files.leikesizichan.skin/ImageFile/banner/' . $banner_promosi->gambar) }})">
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
                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Judul')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Title')"
                                        name="nama" value="{{ $banner_promosi->nama }}" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Deskripsi')</label>
                                    <textarea name="deskripsi" rows="3" class="form-control" placeholder="@lang('Description')" required>{{ $banner_promosi->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('End Date')</label>
                                    <input type="datetime-local" class="form-control" name="batas_waktu"
                                        value="{{ $banner_promosi->batas_waktu }}" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Kategori')</label>
                                    <select class="form-control" name="kategori">
                                        <option>All</option>
                                        <option value="khusus" {{ $banner_promosi->kategori == 'khusus' ? 'selected' : '' }}>Khusus
                                        </option>
                                        <option value="sports" {{ $banner_promosi->kategori == 'sports' ? 'selected' : '' }}>Sports
                                        </option>
                                        <option value="slots" {{ $banner_promosi->kategori == 'slots' ? 'selected' : '' }}>Slots
                                        </option>
                                        <option value="casino" {{ $banner_promosi->kategori == 'casino' ? 'selected' : '' }}>Casino
                                        </option>
                                        <option value="others" {{ $banner_promosi->kategori == 'others' ? 'selected' : '' }}>Others
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn--primary w-100 h-45">@lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('backoffice.website.promotion.delete', $banner_promosi->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn--danger btn-block btn-lg"><i
                                class="fa fa-fw fa-trash"></i>@lang('Delete Banners')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <x-back route="{{ route('backoffice.website.promotion') }}" />
@endpush
