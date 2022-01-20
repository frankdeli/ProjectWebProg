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
        <a href="/transaction_cashier"><i class="fas fa-backward stock_button"></i></a>
        <h1>Transaction</h1>
        <hr>
    </div>

    <div class="stock_content">
        <div class="stock_content_header">
            <p>Transaction</p>
        </div>

        <div class="stock_main_content">
            <form action="/addtransaction" method="POST" class="form_stock">
                @csrf
                {{-- <div class="cashier_add">
                    <label for="Id" class="cashier_form_label">Transaction Id</label>
                    <br>
                    <input type="number" placeholder="1" id="Id" name="id" class="cashier_form">
                </div> --}}

                <div class="cashier_add">
                    <label for="Cashier_id" class="cashier_form_label">Cashier_id</label>
                    <br>
                    <select name="id" id="Id" class="option_select">
                        @foreach ($user as $u)
                            @if ($u->role_id == 2)
                            <option value="{{ $u->role_id }}">{{ $u->name }}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>

                <div class="cashier_add">
                    <label for="Item" class="cashier_form_label">Product</label>
                    <br>
                    <select name="item" id="Item" class="option_select">
                        @foreach ($add as $a)
                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="cashier_add">
                    <label for="Quantity" class="cashier_form_label">Quantity</label>
                    <br>
                    <input type="number" placeholder="100" id="Quantity" name="quantity" class="cashier_form">
                </div>

                {{-- <div class="cashier_add">
                    <label for="Price" class="cashier_form_label">Price</label>
                    <br>
                    <input type="number" placeholder="10000" id="Price" name="price" class="cashier_form1">
                </div> --}}

                <div class="cashier_add">
                    <input type="submit" class="submit_adduser">
                </div>
            </form>

        </div>
    </div>

</div>
    
@endsection