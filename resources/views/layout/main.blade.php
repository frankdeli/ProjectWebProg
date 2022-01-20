<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AlfaMidi</title>
    <link rel="stylesheet" href="{{ asset("style.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <div class="home_container">
        <div class="content_homecontainer">
            <div class="left_content">
                <h1>Kasir AlfaMidi</h1>
                <hr>
                <p class="user_role">{{$user_role = auth()->user()->role_id }}</p>
                @if ($user_role == 1)
                    <h3><a href="/dashboard" class="btn_content"><i class="fas fa-tachometer-alt btn_leftcontent"></i>Dashboard</a></h3>
                    <hr>
                    <h5>Interface</h5>
                    <h3><a href="/profile" class="btn_content"><i class="fas fa-cog btn_leftcontent"></i> Profile</a></h3>
                    <h3><a href="/cashier" class="btn_content"><i class="fas fa-users btn_leftcontent"></i>Cashier</a></h3>
                    <hr> 
                    <h5>Transaction</h5>
                    <h3><a href="/transaction" class="btn_content"><i class="fas fa-shopping-cart btn_leftcontent"></i>Report</a></h3>
                    <h3><a href="/stock" class="btn_content"><i class="fas fa-cubes btn_leftcontent"></i> Stock</a></h3>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn_content1"><i class="fas fa-sign-out-alt btn_leftcontent1"></i> Logout</button>
                    </form>
                    <hr>
                @else
                    <h5>Transaction</h5>
                    <h3><a href="/transaction_cashier" class="btn_content"><i class="fas fa-shopping-cart btn_leftcontent"></i>Transaction</a></h3>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn_content1"><i class="fas fa-sign-out-alt btn_leftcontent1"></i> Logout</button>
                    </form>
                    <hr>
                @endif
                
                
            </div>
    
            <div class="right_content">
                @yield('maincontent')

                <div class="footer_container">
                    <h4 class="footer_description">&#169; AlfaMidi 2021</h4>
                </div>
            </div>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>