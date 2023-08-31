@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('admin.projects.index')}}" class="btn btn-sm btn-primary">Push for see the Projects</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Technologies') }}</div>

                <div class="card-body">
                    <a href="{{ route('admin.technologies.index')}}" class="btn btn-sm btn-primary">Push for see the technologies</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
