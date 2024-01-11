@extends('admin.layouts.app')

@section('panel')

    <div class="row gy-4">


        @foreach($themes as $them)

            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-header bg--primary d-flex justify-content-between flex-wrap">
                        <h4 class="card-title text-white"> {{ $them->name }} </h4>
                        @if($setting->themes == $them['name'])
                        <button type="submit" name="themes" value="{{ $them->name }}" class="btn btn--info">
                            @lang('Selected')
                        </button>
                        @else
                        <form action="{{ route('backoffice.website.themes.update', $setting->id) }}" method="post">
                            <input type="hidden" name="themes" value="{{ $them->name }}">
                            @method('POST')
                            @csrf
                            <button type="submit" name="themes" value="{{ $them->name }}" class="btn btn--success w-100 chngthme">
                                @lang('Select Themes')
                            </button>
                        </form>
                        @endif
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ $them->image }}" alt="@lang('Template')" class="w-100">
                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endsection
