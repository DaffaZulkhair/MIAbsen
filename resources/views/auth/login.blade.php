<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Datum | CRM Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('DATUM/assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('DATUM/assets/css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DATUM/assets/css/backend.css?v=1.0.0') }}">
</head>

<body class=" ">
    <div class="wrapper">
        <section class="login-content">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-5">
                        <div class="card p-3">
                            <div class="card-body">
                                <div class="auth-logo">
                                    <img src="{{ asset('DATUM/assets/images/logo.png') }} "
                                        class="img-fluid  rounded-normal  darkmode-logo" alt="logo">
                                    <img src="{{ asset('DATUM/assets/images/mi.png') }}"
                                        class="img-fluid rounded-normal light-logo" alt="logo">
                                </div>
                                <h3 class="mb-3 font-weight-bold text-center">Selamat Datang</h3>
                                <div class="mb-5">
                                    <p class="line-around text-secondary mb-0"><span class="line-around-1">Silahkan
                                            Masukkan Akun Anda</span></p>
                                </div>

                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-secondary">Username</label>
                                                <input class="form-control" type="text"
                                                    placeholder="Masukkan Username" name="username"
                                                    value="{{ old('username') }}">
                                                @error('username')
                                                    <span class="text-danger">
                                                        Masukkan username anda!
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="text-secondary">Password</label>
                                                </div>
                                                <input class="form-control" type="password"
                                                    placeholder="Masukkan Password" name="password"
                                                    value="{{ old('password') }}">
                                                @error('password')
                                                    <span class="text-danger">
                                                        Password anda salah!
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mt-2"
                                        type="submit">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('DATUM/assets/js/backend-bundle.min.js') }}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('DATUM/assets/js/customizer.js') }}"></script>

    <script src="{{ asset('DATUM/assets/js/sidebar.js') }}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('DATUM/assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('DATUM/assets/js/table-treeview.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('DATUM/assets/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('DATUM/assets/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('DATUM/assets/js/chart-custom.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/charts/01.js') }}"></script>
    <script src="{{ asset('DATUM/assets/js/charts/02.js') }}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('DATUM/assets/js/slider.js') }}"></script>

    <!-- Emoji picker -->
    <script src="{{ asset('DATUM/assets/vendor/emoji-picker-element/index.js') }}" type="module"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('DATUM/assets/js/app.js') }}"></script>
</body>

</html>
