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

<div class="transaction_container">
    <div class="headerforall">
        <h1>Transaction</h1>
        <hr>
    </div>

    <div class="transaction_content">
        <div class="transaction_content_header">
            <p>Total Transactions</p>
        </div>

        <div class="transaction_main_content">
            <table class="transaction_content_table">
                <tr class="transaction_content_table">
                    <th>Id</th>
                    <th>Cashier_Id</th>
                    <th>Transaction Time</th>
                    <th>Total</th>
                </tr>

                @foreach ($transac as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->cashier_id }}</td>
                        <td>{{ $t->waktu_transaksi }}</td>
                        <td>{{ $t->total }}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
    
@endsection