@extends('layouts.user')
@section('title') Home @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th>{{ Auth::user()->name }}</th>
                <th class="text-center"><p class="btn btn-sm btn-outline-danger">Details</p></th>
            </tr>
            </thead>
        </table>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->name }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->email }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->phone }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Lab name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->lab }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">District name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->district }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
