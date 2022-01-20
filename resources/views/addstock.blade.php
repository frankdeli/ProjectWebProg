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

<div class="stock_container">
    <div class="headerforall">
        <a href="/stock"><i class="fas fa-backward stock_button"></i></a>
        <h1>Stock</h1>
        <hr>
    </div>

    <div class="stock_content">
        <div class="stock_content_header">
            <p>Stock Products</p>
        </div>

        <div class="stock_main_content">
            <form action="/addstock" method="POST" class="form_stock" enctype="multipart/form-data">
                @csrf
                <div class="cashier_add">
                    <label for="Name" class="cashier_form_label">Name</label>
                    <br>
                    <input type="text" placeholder="Chitato" id="Name" name="name" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Price" class="cashier_form_label">Price</label>
                    <br>
                    <input type="number" placeholder="10000" id="Price" name="price" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Stock" class="cashier_form_label">Stock</label>
                    <br>
                    <input type="number" placeholder="100" id="Stock" name="stock" class="cashier_form">
                </div>

                <div class="cashier_add">
                    <label for="Image" class="cashier_form_label">Image</label>
                    <br>
                    <input type="file" placeholder="100" id="Image" name="image" class="cashier_form1">
                </div>

                <div class="cashier_add">
                    <input type="submit" class="submit_adduser">
                </div>
            </form>

        </div>
    </div>

</div>
@endsection