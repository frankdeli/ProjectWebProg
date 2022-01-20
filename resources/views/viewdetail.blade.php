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

<div class="transaksi_container">
    <div class="headerforall">
        <a href="/transaction_cashier"><i class="fas fa-backward stock_button"></i></a>
        <h1>Transaction</h1>
        <hr>
    </div>

    <div class="transaction_content">
        <div class="transaction_content_header">
            <p>Detail Transactions</p>
        </div>

        <div class="transaction_main_content">
            <table class="transaction_content_table">
                <tr class="transaction_content_table">
                    <th>Transaksi Id</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>

                @foreach ($detail as $t)
                    <tr>
                        <td>{{ $t->transaksi_id }}</td>
                        <td>{{ $t->product_id }}</td>
                        <td>{{ $t->quantity }}</td>
                        <td>{{ $t->price }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@endsection