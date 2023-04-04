@php use App\Helpers\Helper; @endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('admin') }}/main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-7">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url('{{ asset('admin') }}/assets/images/notebook-workstation-1140x683.jpg');"></div>
                                        <div class="slider-content">
                                            <h3>Perfect Balance</h3>
                                            <p>ArchitectUI is like a dream. Some think it's too good to be true!
                                                Extensive
                                                collection of unified React Boostrap Components and Elements.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url('{{ asset('admin') }}/assets/images/notebook-workstation-1140x683.jpg');">
                                        </div>
                                        <div class="slider-content">
                                            <h3>Scalable, Modular, Consistent</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent
                                                Bootstrap based styles across all elements and components
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning"
                                        tabindex="-1">
                                        <div class="slide-img-bg"
                                            style="background-image: url('{{ asset('admin') }}/assets/images/notebook-workstation-1140x683.jpg');">
                                        </div>
                                        <div class="slider-content">
                                            <h3>Complex, but lightweight</h3>
                                            <p>We've included a lot of components that cover almost all use cases for
                                                any type of application.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-5">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4 class="mb-0">
                                <span class="d-block">{{ Helper::welcomeMessage() }}</span>
                                <span>Faça o login para acessar sua conta.</span>
                            </h4>
                            <div class="divider row"></div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong class="mb-2">{{ $title ?? null }}</strong>
                                    @foreach ($errors->all() as $error)
                                        <b>{{ $error }}</b>
                                    @endforeach
                                    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endif
                            <div>
                                <form method="POST" action="{{ route('auth') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail">E-mail</label>
                                                <input name="email" id="exampleEmail" placeholder="E-mail here..." type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword">Password</label>
                                                <input name="password" id="examplePassword" placeholder="Password here..." type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember-check" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember-check" class="form-check-label">Mantenha-me conectado</label>
                                    </div>

                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            @if (Route::has('password.request'))
                                                <a class="btn-lg btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Esqueceu sua senha?') }}
                                                </a>
                                            @endif
                                            <button class="btn btn-primary btn-lg">Entrar na dashboard</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('admin') }}/assets/scripts/main.js"></script>
</body>

</html>
