@extends('layouts.admin')
@section('title') Update Password @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th><a href="{{ route('admin.dashboard') }}" style="color: black; text-decoration: none">{{ Auth::user()->name }}</a></th>
                <th class="text-center"><p class="btn btn-sm btn-outline-danger">Update password</p></th>
            </tr>
            </thead>
        </table>
        <div class="card mt-3">
            @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
            @endif
            <div class="card-body">
                <form action="{{ route('store-password') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="old_password" class="col-form-label">Old password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Old password">
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password" class="col-form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="new password">
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"  placeholder="Re-Type password">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
