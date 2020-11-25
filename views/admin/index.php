<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body class="green">

    <?php session_start(); ?>
    <?php if (isset($_SESSION['administrador'])) { ?>
        <nav class="green darken-3">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo" style="margin-left:10px">
                    OptiTal
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#">Gestión Usuario <i class="material-icons left">assignment_ind</i></a></li>
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
                    <a href="#name"><span class="white-text name">Administrador</span></a>
                    <a href="#email"><span class="white-text email">administrador@gmail.com</span></a>
                </div>
            </li>
            <li><a href="#">Gestión Usuario <i class="material-icons left">assignment_ind</i></a></li>
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
                    <span class="title">Bienvenido <?= $_SESSION['administrador']['nombre'] ?></span>
                    <p class="grey-text">
                        Fecha: <?= date('d-m-Y') ?>
                    </p>
                    <a href="#!" class="secondary-content"><i class="material-icons">event</i></a>
                </li>
            </ul>


            <div class="card-panel">
                <div class="row">
                    <div class="col s12 center">
                        <h4>Gestión Vendedor</h4>
                    </div>
                    <div class="col l4 m12 s12">
                        <!-- FORM CREATE VENDEDOR-->
                        <form v-if="estadoEdit==false" @submit.prevent="crearVendedor">
                            <div class="input-field">
                                <input id="rut" v-model="rut" type="text">
                                <label for="rut">Rut</label>
                            </div>
                            <div class="input-field">
                                <input id="nombre" v-model="nombre" type="text">
                                <label for="nombre">Nombre</label>
                            </div>
                            <button class="btn-small lowerCase">Crear Vendedor</button>
                        </form>

                        <!-- FORM EDIT VENDEDOR -->
                        <div v-else>
                            <div class="input-field">
                                <input readonly id="rut" v-model="vendedor.rut" type="text">
                                <label for="rut">Rut</label>
                            </div>
                            <div class="input-field">
                                <input readonly id="nombre" v-model="vendedor.nombre" type="text">
                                <label for="nombre">Nombre</label>
                            </div>
                            <select class="browser-default" v-model="vendedor.estado">
                                <option value="0">Bloquear</option>
                                <option value="1">Activar</option>
                            </select>
                            <br>
                            <button @click="editarVendedor" class="btn-small lowerCase orange">
                                <i class="material-icons left">edit</i>
                                Editar
                            </button>
                            <button @click="cancelarEdit" class="btn-small lowerCase orange lighten-3">Cancelar</button>
                        </div>
                    </div>

                    <div class="col l8 m12 s12">

                        <table>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            <tr v-for="v in vendedores">
                                <td>{{v.rut}}</td>
                                <td>{{v.nombre}}</td>
                                <td>{{v.estado==1?'Habilitado':'Bloqueado'}}</td>
                                <td>
                                    <button @click="activarEdit(v)" class="btn-floating orange">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


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
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

    <script src="../../js/admin.js"></script>
</body>

</html>