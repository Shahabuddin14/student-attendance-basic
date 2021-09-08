@extends('layouts.admin')
@section('title') Add Attendance @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th><a href="{{ route('admin.dashboard') }}" style="color: black; text-decoration: none">{{ Auth::user()->name }}</a></th>
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
                    <div class="col-lg-10 offset-lg-1">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $i = 1)
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $attendance->user->name }}</td>
                                    <td>{{ $attendance->date }}</td>
                                    <td><a href="{{ url('admin/details-attendance/'.$attendance->user_id) }}"><i class="fa fa-pencil-square-o btn btn-sm btn-success" aria-hidden="true"></i></a></td>
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
