<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>login</title>
</head>

<body>
    <section class="" style="height: 930px; overflow: hidden;">
        <form action="/" method="post">
            {{ csrf_field() }}
            <div class="py-5" style="background-color: rgba(117, 113, 113, 1); height: 100%;">
                <div class="row justify-content-center align-items-center h-100 width: 775px;">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong "
                            style="border-radius: 4rem; height: 724px; justify-content: center; width: 775px; background-color: #ffff;">


                            <div class="card-body p-5 text-center">

                                <h1 class="mb-1">Login</h1>
                                <h3 class="mb-4">Welcome back! Please login</h3>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg"
                                        placeholder="Input your username here..."
                                        style="border-radius: 3rem; 
              height: 65px; 
              background-color: rgba(217, 217, 217, 1);" name="username" />
                                    <label class="form-label" for="typeEmailX-2"></label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg"
                                        placeholder="Input your password here..."
                                        style="border-radius: 3rem; 
              height: 65px; 
              background-color: rgba(217, 217, 217, 1);" name="password" />
                                    <label class="form-label" for="typePasswordX-2"></label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit"
                                    style="border-radius: 1rem; 
            width: 200px; 
            background-color: rgba(133, 121, 142, 1); 
            border-color: rgba(133, 121, 142, 1);">Login</button>
                                <p></p>
                                <p></p>
                                <img src="{{ asset('foto/login.png') }}" alt=""
                                    style="width: 450x; height: 250px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>
