<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Menu Dinamico</title>
        <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/js/menu.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .action {
                cursor: pointer;
            }
        </style>
    </head>

    <body id="page-top">

        <div id="wrapper">

            <ul class="navbar-nav sidebar sidebar-light accordion">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="javascript:void();">
                    <div class="sidebar-brand-text mx-3">Menu Dinamico</div>
                </a>
                <div id="menu-dinamico"></div>
            </ul>

            <div id="content-wrapper" class="d-flex flex-column">

                <div id="content">

                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row m-1">

                        <div class="col-xl-6">

                            <div class="card mb-4">

                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Agregar nuevo elemento</h6>
                                </div>

                                <div class="card-body">

                                    <form method="post" id="form-menu"enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <input type="input" class="form-control" name="nombre" id="nombre" placeholder="Escribe un nombre"/>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="ico" id="ico" placeholder="Escribe el codigo"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <select name="etiqueta_id" id="etiqueta_id" class="form-control"></select>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="hidden_id" id="hidden_id">
                                            <input type="submit" class="btn btn-primary action" value="Guardar">
                                            {{-- <input type="text" class="btn btn-danger" value="Cancelar"> --}}
                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                        <div class="col-xl-6">

                            <div class="card mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Administrar menu dinamico</h6>
                                </div>
                                <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush table-hover text-center" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Icono</th>
                                                <th>Categoria</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datos"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
                                <b><a href="#" target="_blank">chelitodelgado</a></b>
                            </span>
                        </div>
                    </div>
                </footer>

            </div>

        </div>

        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/crud.js') }}"></script>
    </body>

</html>
