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
        <a href="/cashier/add"><i class="fas fa-user-plus cashier_button"></i></a>
        <h1>Cashier</h1>
        <hr>
    </div>

    <div class="cashier_content">
        <div class="cashier_content_header">
            <p>Data All Users</p>
        </div>

        <div class="cashier_main_content">
            <table class="cashier_content_table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
    
                @foreach ($user_info as $ui)
                    <tr>
                        <td>{{ $ui->id }}</td>
                        <td>{{ $ui->name }}</td>
                        <td>{{ $ui->email }}</td>
                        @if (($ui->id) == 1)
                            <td>Admin</td>
                        @else
                            <td>Cashier</td>
                        @endif
                        <td><img src="{{ Storage::url($ui->image) }}" alt="" class="img_cashier"></td>

                        <form action="/deleteUser/{{ $ui->id }}" method="POST">
                            @csrf
                            <td>
                                <a href="/editCashier"><i class="fas fa-edit edit_btn"></i></a>
                                <button type="submit" class="btn btn-link"><i class="fas fa-trash-alt delete_btn"></i></button>
                            </td>
                        </form>
                        
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
    
@endsection