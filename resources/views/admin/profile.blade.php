@extends('layouts.admin')
@section('title') Update Profile @endsection
@section('content')
    <div class="padding-top-2x mt-2 hidden-lg-up"></div>

    <div class="table-responsive wishlist-table margin-bottom-none">
        <table class="table mb-3">
            <thead>
            <tr>
                <th><a href="{{ route('admin.dashboard') }}" style="color: black; text-decoration: none">{{ Auth::user()->name }}</a></th>
                <th class="text-center"><p class="btn btn-sm btn-outline-danger">Update profile</p></th>
            </tr>
            </thead>
        </table>
        <div class="card mt-3">
            @if(Session::get('message'))
                <p class="text-success pl-1">{{ Session::get('message') }}</p>
            @endif
            <div class="card-body">
                <form action="{{ route('store-profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Your Email</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-form-label">Your Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lab" class="col-form-label">Lab name</label>
                        <input type="text" name="lab" class="form-control" id="lab" value="{{ Auth::user()->lab }}">
                        @error('lab')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="district" class="col-form-label">District name</label>
                        <select class="form-select form-control" aria-label="Default select example" name="district" value="{{ old('district') }}" required>
                            <option selected>Previous selected <b>{{ Auth::user()->district }}</b></option>
                            <option value="Bagerhat">Bagerhat</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Kustia">Kustia</option>
                            <option value="Magura">Magura</option>
                            <option value="Meherpur">Meherpur</option>
                            <option value="Narail">Narail</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Jhalokati">Jhalokati</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Pirojpur">Pirojpur</option>
                        </select>
                        @error('district')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Update info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
