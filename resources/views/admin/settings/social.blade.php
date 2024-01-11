@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backoffice.website.extension.update', $social->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold"> @lang('WhatsApp') </label>
                                    <input class="form-control form-control-lg" type="text" name="wa" value="{{ $social->wa }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Telegram')</label>
                                    <input class="form-control form-control-lg" type="text" name="tele" value="{{ $social->tele }}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Livechat Links') </label>
                                    <input class="form-control form-control-lg" type="url" name="live_chat" value="{{ $social->live_chat }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label class="form-control-label  font-weight-bold">@lang('Livechat Code') ( For Desktop Mode )</label>
                                  <textarea name="live_chat_js" rows="5" class="form-control" placeholder="@lang('Livechat Code')">{{ $social->live_chat_js }}</textarea>
                              </div>
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

