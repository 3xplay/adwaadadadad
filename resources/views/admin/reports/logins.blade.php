@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('No')</th>
                                    <th>@lang('Username')</th>
                                    <th>@lang('Login at')</th>
                                    <th>@lang('IP Address')</th>
                                    <th>@lang('City')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('Country Code')</th>
                                    <th>@lang('OS')</th>
                                    <th>@lang('Browser')</th>
                                    <th>@lang('longitude')</th>
                                    <th>@lang('Latitude')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loginLogs as $log)
                                    <tr>

                                        <td>
                                            <span class="fw-bold">{{ $loop->iteration }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->user->name }}</span>
                                        </td>

                                        <td>
                                            {{ showDateTime($log->created_at) }} <br> {{ diffForHumans($log->created_at) }}
                                        </td>

                                        <td>
                                            <span class="fw-bold">
                                                <a
                                                    href="{{ route('backoffice.members.login.IpHistory', $log->user_ip) }}">{{ $log->user_ip }}</a>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->city }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->country }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->country_code }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->os }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->browser }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->longitude }}</span>
                                        </td>

                                        <td>
                                            <span class="fw-bold">{{ $log->latitude }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">Data Not Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($loginLogs->hasPages())
                    <div class="card-footer py-4">
                        {{ paginateLinks($loginLogs) }}
                    </div>
                @endif
            </div><!-- card end -->
        </div>
    </div>
@endsection



@push('breadcrumb-plugins')
    @if (request()->routeIs('backoffice.members.login.history'))
        <x-search-form placeholder="Enter Username" />
    @endif
@endpush
 @if (request()->routeIs('backoffice.members.login.IpHistory'))
    @push('breadcrumb-plugins')
        <a href="https://www.ip2location.com/{{ $ip }}" target="_blank"
            class="btn btn--primary">@lang('Lookup IP') {{ $ip }}</a>
    @endpush
@endif 
