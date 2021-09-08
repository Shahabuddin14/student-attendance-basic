<aside class="user-info-wrapper">
    <div class="user-cover" style="background-image: url(https://bootdey.com/img/Content/bg1.jpg);"></div>
    <div class="user-info">
        <div class="user-avatar">
            <img src="{{ asset(Auth::user()->image) }}" alt="User"></div>
        <div class="user-data">
            <h4>{{ Auth::user()->name }}</h4>
        </div>
    </div>
</aside>
