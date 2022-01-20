<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("style.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>AlfaMidi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-colors header">
        <div class="container-fluid">
          <h1 class="navbar-brand" href="#">AlfaMidi</h1>

          <form class="d-flex">
            <button class="nav-item-btn">
              <a href="/" class="login_btn">Login</a>
            </button>
          </form>
        </div>  
    </nav>

    <div class="content_master">
      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show widtherror" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <form action="/login" method="post" class="form_controller">
        @csrf
        <h2>AlfaMidi</h2>
        <div class="form-group row">
          <label for="text" class="col-4 col-form-label label_controller">Email</label> 
          <div class="col-8">
            <input id="text" name="email" placeholder="Email" type="email" class="form-control" @error('email') is-invalid @enderror>
            @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="text1" class="col-4 col-form-label label_controller">Password</label> 
          <div class="col-8">
            <input id="text1" name="password" placeholder="Password" type="password" class="form-control">
          </div>
        </div> 

        <div class="form-group row">
          <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary form-control">Login</button>
          </div>
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>