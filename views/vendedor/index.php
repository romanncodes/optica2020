<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body class="green">

    <?php session_start(); ?>
    <?php if (isset($_SESSION['vendedor'])) { ?>

        <!-- OPTION MENU DROPDOWN NAVBAR 
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Crear Receta</a></li>
            <li><a href="#!">Retiro</a></li>
        </ul>
        -->


        <nav class="green darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left:10px">
                    OptiTal
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="active"><a href="#">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
                    <li><a href="#">Buscar Recetas <i class="material-icons left">search</i></a></li>
                    <li><a href="#">Receta <i class="material-icons left">playlist_add</i></a></li>
                    <!-- MENU DROPDOWN
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Receta <i class="material-icons left">playlist_add</i></a></li>
                     -->
                    <li><a href="logout.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <!-- START SIDENAV -->
        <ul id="slide-out" class="sidenav">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="responsive-img" src="https://wallpaperstock.net/wallpapers/thumbs1/31196wide.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="https://microhealth.com/assets/images/illustrations/personal-user-illustration-@2x.png"></a>
                    <a href="#name"><span class="white-text name"><?= $_SESSION['vendedor']['nombre'] ?></span></a>
                    <a href="#email"><span class="white-text email"><?= $_SESSION['vendedor']['nombre'] ?>@gmail.com</span></a>
                </div>
            </li>
            <li class="active"><a href="#">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
            <li><a href="#">Buscar Recetas <i class="material-icons left">search</i></a></li>
            <li><a href="#">Crear Receta <i class="material-icons left">playlist_add</i></a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="logout.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
        </ul>


        <!-- END SIDENAV -->
        <br>
        <div id="app" class="container">
            <ul class="collection">
                <li class="collection-item avatar">
                    <img src="https://microhealth.com/assets/images/illustrations/personal-user-illustration-@2x.png" alt="" class="circle">
                    <span class="title">Bienvenido <?= $_SESSION['vendedor']['nombre'] ?></span>
                    <p class="grey-text">
                        Fecha: <?= date('d-m-Y') ?>
                    </p>
                    <a href="#!" class="secondary-content tooltipped" data-position="bottom" data-tooltip="Cambiar mi clave">
                        <i class=" material-icons">build</i>
                    </a>
                </li>
            </ul>

            <div id="app" class="card-panel">
                <div class="row">
                    <div class="col l4 m12 s12">
                        <form @submit.prevent="buscar">
                            <input type="text" v-model="rut">
                            <button class="btn-small lowerCase">
                                buscar
                            </button>
                        </form>
                        <p>
                            {{rut}}
                        </p>
                    </div>
                    <div class="col l8 m12 s12">
                        <p>
                            <ul v-if="esta" class="collection">
                                <li class="collection-item">{{cliente.nombre_cliente}}</li>
                                <li class="collection-item">{{cliente.direccion_cliente}}</li>
                                <li class="collection-item">{{cliente.telefono_cliente}}</li>
                                <li class="collection-item">{{cliente.email_cliente}}</li>
                            </ul>
                        </p>

                    </div>
                </div>




                <div class="row">
                    <div class="col l12">
                        <div class="card-panel">
                            <select v-model="id_material_cristal" class="browser-default">
                                <option v-for="m in materiales" :value="m.id_material_cristal">
                                    {{m.material_cristal}}
                                </option>
                            </select>
                            <pre>
                            {{$data}}
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
            <!--- end VUEJS BUSCAR-->


        <?php } else { ?>

            <div class="row">
                <div class="col l4 m4 s12"></div>
                <div class="col l4 m4 s12">
                    <div class="card-panel center">
                        <h4 class="center red-text">Acceso Denegado!</h4>
                        <a href="../../index.php">click aqui para iniciar</a>
                    </div>
                </div>
            </div>

        <?php } ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems);
                var elems = document.querySelectorAll('.dropdown-trigger');
                var elems = document.querySelectorAll('.tooltipped');
                var instances = M.Tooltip.init(elems);
                /* CONFIG DROP DOWN NAVBAR
                var instanceDropdown1 = M.Dropdown.init(elems, {
                    hover: true,
                    belowOrigin: true
                });
                */

            });
        </script>

        <script src="../../js/buscar_cliente.js"></script>
        <script src="../../js/cbo.js"></script>
</body>

</html>