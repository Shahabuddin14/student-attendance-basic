@extends('layouts.user')
@section('title') Add Attendance @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th><a href="{{ route('user.dashboard') }}" style="color: black; text-decoration: none">{{ Auth::user()->name }}</a></th>
                <th class="text-center"><p class="btn btn-sm btn-outline-danger">Attendance</p></th>
            </tr>
            </thead>
        </table>
        <div class="card mt-3">
            @if(Session::get('message'))
                <p class="text-success pl-3">{{ Session::get('message') }}</p>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $i = 1)
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $attendance->date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
