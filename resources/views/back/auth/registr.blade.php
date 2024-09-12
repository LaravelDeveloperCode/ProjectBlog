<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('back/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('back/')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('back/')}}/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url('https://i.pinimg.com/originals/0d/ce/e2/0dcee2fab53e37154231a31f3336b887.png');
            background-size: cover; /* Resmin tam olarak kaplamasını sağlar */
            background-position: center center; /* Hem yatay hem de dikey olarak ortalar */
            background-repeat: no-repeat; /* Tekrar etmesini engeller */
            height: 65vh; /* Ekranın yüksekliğini kaplar */
            width: 80%; /* Ekranın genişliğini kaplar */
            display: flex;
            align-items: center; /* İçeriği dikey olarak ortalar */
            justify-content: center; /* İçeriği yatay olarak ortalar */
        }

        .login-form-container {
            width: 100%;
            max-width: 500px; /* Form genişliği */
            padding: 20px; /* Form kenar boşlukları */
            background: rgba(255, 255, 255, 0.8); /* Form arka plan rengi ve opasite */
            border-radius: 8px; /* Köşe yuvarlama */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Hafif gölge */
        }

        .login-row {
            display: flex;
            height: 100vh; /* Ekranın yüksekliğini kaplar */
        }

        .login-col {
            flex: 1;
            display: flex;
            justify-content: center; /* İçeriği yatay olarak ortalar */
            align-items: center; /* İçeriği dikey olarak ortalar */
        }

        .login-form {
            width: 100%; /* Formun genişliğini ayarlayın */
        }
    </style>


</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        @if(session('message1'))
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{session('message1')}}</strong><br>
                        </div>
                        @endif
                        @if(session('message2'))
                        <div class="alert alert-danger text-center" role="alert">
                            <strong>{{session('message2')}}</strong><br>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registration</h1>
                                    </div>
                                    <form method="post" action="{{route('reginsertt')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control form-control-user"
                                                id="exampleInputName" aria-describedby="nameHelp"
                                                placeholder="Ad/Soyadınızı daxil edin..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email adresinizi daxil edin..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Parolunuzu daxil edin..." required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Xatırla</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Daxil et</button>
                                    </form>
                                    <hr>
                                    <a href="{{route('loginn')}}" class="btn btn-google btn-user btn-block">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

</body>

</html>