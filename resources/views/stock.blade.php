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
        <a href="/stock/add"><i class="fas fa-plus-square stock_button"></i></a>
        <h1>Stock</h1>
        <hr>
    </div>

    <div class="stock_content">
        <div class="stock_content_header">
            <p>Stock Products</p>
        </div>

        <div class="stock_main_content">
            <table class="stock_content_table">
                <tr class>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

               
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->stock }}</td>
                        <td><img src="{{ Storage::url($p->image) }}" alt="" class="img_product"></td>

                        <form action="/deleteStock/{{ $p->id }}" method="POST">
                            @csrf
                            <td>
                                <a href="/editStock"><i class="fas fa-edit edit_btn"></i></a>
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