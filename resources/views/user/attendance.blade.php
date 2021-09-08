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
                    <div class="col-lg-5">
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

                    <div class="col-lg-7">
                        <div class="card">
                            <form action="{{ route('attendance-store') }}" method="POST" class="p-4">
                                @csrf
                                <div class="form-group">
                                    <label for="date" class="col-form-label">Select date</label>
                                    <input type="date" name="date" class="form-control" id="date" max="<?=date('Y-m-d')?>" required />
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">Add attendance</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
