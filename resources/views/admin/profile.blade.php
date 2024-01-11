@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">

            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary">
                        <div class="avatar avatar--lg">
                            <img src="https://files.leikesizichan.skin/ImageFile/profileusers_rxrepjhyAKkkda99.jpg"
                                alt="@lang('Image')">
                        </div>
                        <div class="ps-3">
                            <h4 class="text--white">{{ $user->name }}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Name')
                            <span class="fw-bold">{{ $user->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Mobile Number')
                            <span class="fw-bold">{{ $user->telp }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span class="fw-bold">{{ $user->email }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Role')
                            @if (Auth::user()->id >= 1)
                                @php
                                    $jabatan = 'Master';
                                @endphp
                            @else
                                @php
                                    $jabatan = 'Admin';
                                @endphp
                            @endif
                            <span class="fw-bold">{{ $jabatan }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 border-bottom pb-2">@lang('Profile Information')</h5>

                    <form action="{{ route('backoffice.account.profile.update' ,$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-6">
                                <div class="form-group ">
                                    <label>@lang('Username')</label>
                                    <input class="form-control" type="text" name="username" value="{{ $user->name }}" readonly
                                        required>
                                </div>

                                <div class="form-group ">
                                    <label>@lang('Mobile Number')</label>
                                    <input class="form-control" type="text" name="telp" value="{{ $user->telp }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('backoffice.account.profile.password') }}" class="btn btn-sm btn-outline--primary"><i
            class="las la-key"></i>@lang('Password Setting')</a>
@endpush
