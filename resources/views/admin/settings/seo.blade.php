@extends('admin.layouts.app')


@section('panel')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backoffice.website.setting.seo.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview" style="background-image: url({{ 'https://files.leikesizichan.skin/ImageFile/banner/' . $setting->seo_banner }})">
                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="seo_banner" id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 mt-xl-0 mt-4">
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Social Title')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Social Share Title')" name="seo_social_title" value="{{ $setting->seo_social_title }}" required/>
                                </div>
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Meta Keywords')</label>
                                    <small class="ml-2 mt-2 text-facebook">@lang('Separate multiple keywords by') <code>,</code>(@lang('comma')) @lang('or') <code>@lang('enter')</code> @lang('key')</small>
                                    <input name="seo_meta_keywords" class="form-control" value="{{ $setting->seo_meta_keywords }}"  multiple="multiple" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Meta Description')</label>
                                    <textarea name="seo_description" rows="3" class="form-control" placeholder="@lang('SEO meta description')" required>{{ $setting->seo_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label  font-weight-bold">@lang('Social Description')</label>
                                    <textarea name="seo_social_description" rows="3" class="form-control" placeholder="@lang('Social Share  meta description')" required>{{ $setting->seo_social_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection