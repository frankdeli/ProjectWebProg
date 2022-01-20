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

<div class="cashier_container">
    
    <div class="headerforall">
        <a href="/cashier"><i class="fas fa-backward cashier_button"></i></a>
        <h1>Cashier</h1>
        <hr>
    </div>

    <div class="cashier_content">
        <div class="cashier_content_header">
            <p>Add Data</p>
        </div>

        <div class="cashier_maincontent">
            <form action="/addcashier" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cashier_add">
                    <label for="Role_Id" class="cashier_form_label">Role Id</label>
                    <br>
                    <input type="radio" class="cashier_form" name="role_id" id="Role_Id" value="1">
                    <label for="Role_Id"class="cashier_form_label1">1</label>
                    <br>
                    <input type="radio" class="cashier_form" name="role_id" id="Role_Id" value="2">
                    <label for="Role_Id" class="cashier_form_label1">2</label>
                </div>

                <div class="cashier_add">
                    <label for="Name" class="cashier_form_label">Name</label>
                    <br>
                    <input type="text" placeholder="Justin" id="Name" name="name" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Email" class="cashier_form_label">Email</label>
                    <br>
                    <input type="text" placeholder="justin@gmail.com" id="Email" name="email" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Password" class="cashier_form_label">Password</label>
                    <br>
                    <input type="password" placeholder="**********" id="Password" name="password" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Image" class="cashier_form_label">Image</label>
                    <br>
                    <input type="file" id="Image" name="image" class="cashier_form1">
                </div>

                <div class="cashier_add">
                    <input type="submit" class="submit_adduser">
                </div>
            </form>

        </div>
    </div>
</div>
    
@endsection