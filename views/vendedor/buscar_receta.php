<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../../css/style.css" />
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
                    <li class="active"><a href="index.php">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
                    <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
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
            <li class="active"><a href="index.php">Crear Cliente <i class="material-icons left">assignment_ind</i></a></li>
            <li><a href="buscar_receta.php">Buscar Recetas <i class="material-icons left">search</i></a></li>
            <li><a href="insert_receta.php">Crear Receta <i class="material-icons left">playlist_add</i></a></li>
            <li>
                <div class="divider"></div>
            </li>
            <li><a href="logout.php">Salir <i class="material-icons left">power_settings_new</i></a></li>
        </ul>


        <!-- END SIDENAV -->
        <br>
        <div id="app" class="container">
            <div class="row">
                <div class="col l12">
                    <div class="card-panel">
                        <h4>Buscar receta</h4>
                        <form @submit.prevent="buscarRut">
                            <input type="text" v-model="rut" placeholder="Rut" />
                            <button class="btn-small lowerCase">buscar</button>
                        </form>


                        <table>
                            <tr>
                                <th>Armazon</th>
                                <th>Tipo</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr v-for="r in recetas">
                                <td>{{r.armazon}}</td>
                                <td>{{r.tipo_cristal}}</td>
                                <td>{{r.nombre_cliente}}</td>
                                <td>{{r.fecha_entrega}}</td>
                                <td>
                                    <button @click="abrirModal(r)" class="btn-small blue lowerCase">
                                        detalle
                                    </button>
                                </td>
                                <td>
                                    <div class="pdf">
                                        <img @click="generarPDF(r.id)" height="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png" alt="">
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <!--MODAL A MOSTRAR-->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h5>Detalle de Receta Nº:{{receta.id}}</h5>
                                <hr>
                                <div class="row">
                                    <div class="col l6">
                                        Esfera Izq: {{receta.esfera_oi}}
                                    </div>
                                    <div class="col l6">
                                        Esfera Der: {{receta.esfera_od}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col l6">
                                        Tipo Lente: {{receta.tipo_lente}}
                                    </div>
                                    <div class="col l6">
                                        Cristal: {{receta.material_cristal}}
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </div>

                        <!--END MODAL-->

                        <pre>

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
            //MODAL
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);

            /* CONFIG DROP DOWN NAVBAR
            var instanceDropdown1 = M.Dropdown.init(elems, {
                hover: true,
                belowOrigin: true
            });
            */

        });
    </script>
    <script src="../../js/buscar_receta.js"></script>


</body>

</html>