@extends('layout.main')

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

<div class="dashboard_container">
    <div class="headerforall">
        <h1>Dashboard</h1>
        <hr>
    </div>

    <div class="dashboard_subheader">
        <h2>Dashboard</h2>
    </div>

    <div class="dashboard_content_full_item">
        <div class="dashboard_content">
            <div class="dashboard_color_cashier">
    
            </div>
            <div class="dashboard_content_item">
                <div class="content_dashboard">
                    <p>Cashier</p>
                    <p>{{ $countcas }}</p>
                </div>
                <div class="dashboard_content_logo">
                    <i class="fas fa-users btn_dashboard"></i>
                </div>
            </div>
        </div>
        <div class="dashboard_content">
            <div class="dashboard_color_stock">
    
            </div>
            <div class="dashboard_content_item">
                <div class="content_dashboard">
                    <p>Category Item</p>
                    <p>{{ $countpro }}</p>
                </div>
                <div class="dashboard_content_logo">
                    <i class="fas fa-cubes btn_dashboard"></i>
                </div>
            </div>
        </div>
        <div class="dashboard_content">
            <div class="dashboard_color_transaction">
    
            </div>
            <div class="dashboard_content_item">
                <div class="content_dashboard">
                    <p>Transaction</p>
                    <p>{{ $counttran }}</p>
                </div>
                <div class="dashboard_content_logo">
                    <i class="fas fa-shopping-cart btn_dashboard"></i>
                </div>
            </div>
        </div>
    </div>
    

</div>
@endsection