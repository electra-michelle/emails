@extends('layouts.app')

@section('content')

    <div class="px-4 py-5 text-center">
        <h1 class="display-5 fw-bold">Success</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">You have been successfully unsubscribed from {{ config('app.name') }}</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="https://playlisters.net" class="btn btn-success  btn-lg px-4 gap-3">Visit homepage</a>
            </div>
        </div>
    </div>
@endsection
