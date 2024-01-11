@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-md-12 mb-30">
            <div class="card bl--5-primary">
                <div class="card-body">
                    <p class="text--primary">@lang('If the logo and favicon are not changed after you update from this page, please') <span class="text--danger">@lang('clear the cache')</span> @lang('from your browser. As we keep the filename the same after the update, it may show the old image for the cache. usually, it works after clear the cache but if you still see the old logo or favicon, it may be caused by server level or network level caching. Please clear them too.')</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backoffice.website.setting.logo.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="form-group col-xl-6">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="profilePicPreview logoPicPrev" style="background-image: url({{ ('https://files.leikesizichan.skin/ImageFile/logo/' . $setting['logo']) }})">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" id="profilePicUpload1" name="logo" accept="image/png, image/jpg, image/jpeg, video/gif, video/mp4">
                                            <label for="profilePicUpload1" class="bg--primary">@lang('Upload Logo')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-xl-6">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="profilePicPreview logoPicPrev" style="background-image: url({{ ('https://files.leikesizichan.skin/ImageFile/logo/' . $setting['favicon']) }})">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" id="profilePicUpload2" name="favicon" accept="image/png, image/jpg, image/jpeg" name="favicon">
                                            <label for="profilePicUpload2" class="bg--primary">@lang('Upload Favicon')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary w-100 h-45">@lang('Save Change')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
