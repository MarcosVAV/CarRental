@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

{{-- @section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop --}}

@section('body')
    <div style="display: inline-flex; position: fixed; top: 0; left: 0; bottom: 0; right: 0; overflow: auto;">
        <div class="bg-black col-md-6 ">
            <div class="align-middle text-center pt-2 mt-4" style="padding-right: 4%;">
                <img class="img-fluid align-middle mt-4 pt-4" src="{{ URL::asset('/images/logo/logo.jpeg') }}" alt="profile Pic" height="500" width="500">
            </div>
        </div>
        <div class="col-md-6" style="text-align: -webkit-left; align-self: center; padding-left: 12%">
            <div class="{{ $auth_type ?? 'login' }}-box">

                {{-- Logo --}}
                <div class="{{ $auth_type ?? 'login' }}-logo">
                    <a href="{{ $dashboard_url }}">
                        {{-- <img src="{{ asset(config('adminlte.logo_img')) }}" height="50"> --}}
                        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                    </a>
                </div>

                {{-- Card Box --}}
                <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

                    {{-- Card Header --}}
                    @hasSection('auth_header')
                        <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                            <h3 class="card-title float-none text-center">
                                @yield('auth_header')
                            </h3>
                        </div>
                    @endif

                    {{-- Card Body --}}
                    <div
                        class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        @yield('auth_body')
                    </div>

                    {{-- Card Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                            @yield('auth_footer')
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
