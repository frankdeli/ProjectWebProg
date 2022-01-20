@extends('layout/main')

@section('maincontent')
<div class="topbar">
    <div class="searchbar">
        <input type="text" placeholder="Search for" name="search" class="searchbar_input">
        <a href=""><i class="fas fa-search btn_search"></i></a>
    </div>
    
    <div class="welcome">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome back, <img src="{{ Storage::url(auth()->user()->image) }}" alt="" class="img_topbar">
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="fas fa-columns"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
                    </form>
                </li>
            </ul>
          </li>
    </div>
</div>

<div class="profile_container">
    <div class="headerforall">
        <h1>Dashboard</h1>
        <hr>
    </div>

    <div class="profile_content">
        <div class="profile_content_header">
            <p>{{ auth()->user()->name }} Sedang Login</p>
        </div>
        <div class="profile_content_main">
            <div class="profile_content_main_header">
                <h3><span style="font-weight: bold">Nama :</span> {{ auth()->user()->name }}</h3>
                <p class="user_role">{{$user_role = auth()->user()->role_id }}</p>
                @if ($user_role == 1)
                    <h3><span style="font-weight: bold">Role :</span> Admin</h3>
                @else
                    <h3><span style="font-weight: bold">Role :</span> Cashier</h3>
                @endif
            </div>
            <hr>
            <div class="profile_content_main_maincontent">
                <h3><span style="font-weight: bold">Nama :</span> {{ auth()->user()->name }}</h3>
                <h3><span style="font-weight: bold">Email :</span> {{ auth()->user()->email }}</h3>
                <h3><span style="font-weight: bold">Age :</span> 30</h3>
                <h3><span style="font-weight: bold">Gender :</span> Man</h3>
            </div>
            <hr>
            <div class="button_profile">
                <a href="/ubahprofile" class="changeprofile_btn">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection