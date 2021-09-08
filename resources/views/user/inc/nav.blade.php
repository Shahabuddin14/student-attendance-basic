<nav class="list-group">
    <a class="list-group-item with-badge" href="{{ route('user.attendance') }}"><i class=" fa fa-th"></i>Attendance</a>
    <a class="list-group-item" href="{{ route('user.profile') }}"><i class="fa fa-user"></i>Profile</a>
    <a class="list-group-item" href="{{ route('update-password') }}"><i class="fa fa-unlock-alt"></i>Update password</a>
    <a class="list-group-item with-badge" href="{{ route('user-image') }}"><i class="fa fa-picture-o"></i>Update image</a>
    <a class="list-group-item with-badge" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Sign Out</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>
