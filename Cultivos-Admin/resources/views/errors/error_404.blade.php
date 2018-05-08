<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>CultivosCR</title>
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/img/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('css/codebase.min.css') }}">
</head>

    <body>
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="hero bg-white">
                    <div class="hero-inner">
                        <div class="content content-full">
                            <div class="py-30 text-center">
                                <div class="display-3 text-danger">
                                    <i class="fa fa-warning"></i> {{ Lang::get('errors.404.404') }}
                                </div>
                                <h1 class="h2 font-w700 mt-30 mb-10">{{ Lang::get('errors.404.h1') }}</h1>
                                <h2 class="h3 font-w400 text-muted mb-50">{{ Lang::get('errors.404.h2') }}</h2>
                                <a class="btn btn-hero btn-rounded btn-alt-secondary" href="javascript:history.back()">
                                    <i class="fa fa-arrow-left mr-10"></i>{{ Lang::get('errors.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
        <script src="{{ asset('js/codebase.min.js') }}"></script>        
    </body>
</html>