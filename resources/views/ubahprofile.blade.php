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
        <h1>Edit Profile</h1>
        <hr>
    </div>

    <form action="/editprofile" class="form_editprofile" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form_profile_group">
            <label for="Id" class="form_column">Id</label>
            <br>
            <input type="number" id="Id" name="id" placeholder="1" class="form_column_input1">
        </div>

        <div class="form_profile_group">
            <label for="Email" class="form_column">Email</label>
            <br>
            <input type="email" id="Email" name="email" placeholder="justin@gmail.com" class="form_column_input1">
        </div>
        
        <div class="form_profile_group">
            <label for="Name" class="form_column">Nama</label>
            <br>
            <input type="text" id="Name" name="name" placeholder="Justin" class="form_column_input1">
        </div>

        <div class="form_profile_group">
            <label for="Password" class="form_column">Password</label>
            <br>
            <input type="password" id="Password" name="password" placeholder="********" class="form_column_input1">
        </div>

        <div class="form_profile_group">
            <label for="Image" class="form_column">Image</label>
            <br>
            <input type="file" id="Image" name="image" class="cashier_form1">
        </div>

        <div class="form_profile_group">
            <input type="submit" class="submit_editprofile">
            <button class="btn_cancel"><a href="/profile" class="cancel_btn">Cancel</a></button>
        </div>
        {{-- <button class="btn_cancel"><a href="/profile" class="cancel_btn">Cancel</a></button> --}}

       
        
    </form>
</div>

@endsection