<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css" />
</head>

<body class="green">
    <div id="app" class="">
        <div class="row">
            <div class="col l4 m4 s12"></div>
            <div class="col l4 m4 s12">
                <div class="card-panel">
                    <h5 class="center">Acceso</h5>
                    <form @submit.prevent="login">
                        <div class="input-field">
                            <input id="rut" v-model="rut" type="text">
                            <label for="rut">Rut</label>
                        </div>
                        <div class="input-field">
                            <input id="clave" v-model="clave" type="password">
                            <label for="clave">Clave</label>
                        </div>
                        <button class="btn-small right lowerCase">Iniciar Sesión</button>
                        <br><br>
                    </form>
                </div>

            </div>

        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="js/login.js"></script>
</body>

</html>