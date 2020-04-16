<html>
    <head>
        <title>Mensajería</title>
        <link rel="icon" href="../controlador/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../controlador/css/header.css">
        <?php
        session_start();
        ?>

        <style>
            #cuerpo{
                width: 100%;
                margin: auto;
                background: white;
                display: grid;
                grid-template-areas:
                    "listaAmigos mensajes";
                grid-template-columns: 30% 70%;

            }

            #listaAmigos{
                grid-area: listaAmigos;
                border: 1px solid black;
                padding: 1rem;
                overflow-y: auto;
            }

            #chatear{
                font-weight: bold;
                font-size: 1.25rem;
            }

            #buscador{
                width: 100%;
                border-radius: 0.5rem;
            }

            .amigo{
                display: grid;
                grid-template-areas: 
                    "imagen datos";
                width: 20rem;
                margin: auto;
                padding: 1rem;
                margin-top: 0.5rem;
                border-radius: 3rem;
                cursor:pointer;
                transition: 1s background ease;
            }

            .amigo:hover{
                background: lightgrey;
            }

            .imgAmigo{
                grid-area: imagen;
                width: 5rem;
                border-radius: 4rem;
            }

            .datos{
                grid-area:datos;
            }

            .nombreAmigo{
                font-weight: bold;
                font-size: 1rem;
            }

            .animalAmigo, .razaAmigo{
                font-size: 0.8rem;
                line-height: 0.6;
            }

            #Cmensajes{
                grid-area: mensajes;
                border: 1px solid black;
                display: grid;
                grid-template-areas: 
                    "cabeceraCM"
                    "cuerpoCM"
                    "pieCM";
                grid-template-rows: 7rem auto 5rem;
            }

            #cabeceraCM{
                display: grid;
                grid-template-areas:
                    "imgAmigoCM nombreAmigoCM";
                border-bottom: 1px solid black;
                grid-area:cabeceraCM;
            }

            .imgAmigoCM{
                grid-area: imgAmigoCM;
                width: 5rem;
                border-radius: 5rem;
                float:left;
                padding: 1rem;
            }

            .nombreAmigoCM{
                grid-area: nombreAmigoCM;
                font-weight: bold;
                margin-top: 3rem;
                margin-right: 3rem;
            }

            #cuerpoCM{
                grid-area:cuerpoCM;
                padding:1rem;
                overflow: auto;
            }

            .mUser1, .mUser2{
                max-width: 100%;
                background-color: #EEEEEE;
                margin-bottom: 1rem;
                padding: 2rem 2rem 0.1px 2rem;
                border-radius: 8rem;
                word-break: break-all; 
                font-size: 1rem;
            }

            .mUser1{
                margin-left: 10rem;
            }

            .mUser2{
                margin-right: 10rem;
            }

            .mUser1 .fecha, .mUser2 .fecha{
                color: grey;
                font-size: 0.75rem;
                text-align: right;
            }

            #pieCM{
                grid-area: pieCM;
                border-top: 1px solid black;
            }

            #mensajeEscrito{
                border-radius: 1rem;
                margin: 1rem 1rem 0.5rem 1rem;
                width: 95%;
            }

            #enviarMensaje{
                float: right;
                background-color: #FFED91;
                font-size: 1.2rem;
                border-radius: 1rem;
                margin-right: 1rem;
                cursor: pointer;
                transition: 1s background ease;
            }

            @media (max-width:1200px){

                #cuerpo{
                    grid-template-columns: 40% 60%;
                    padding-bottom: 15rem;
                }

                #buscador, #mensajeEscrito{
                    height: 4rem;
                    font-size: 2rem;
                }
                
                .imgAmigo{
                    width: 7rem;
                }
                
                .nombreAmigo{
                    font-size: 1.5rem;
                }
                
                .animalAmigo, .razaAmigo{
                    font-size: 1.2rem;
                }
                
                #cabeceraCM{
                    grid-template-columns: 20% 80%;
                    grid-template-rows: 20% 50% 30%;
                }
                
                #enviarMensaje{
                    font-size: 3rem;
                }
                
            }


        </style>

    </head>
    <body>
        <div id="principal">
            <header>
                <nav id="navpc">
                    <a href="vistaUsuario.php" id="facepetA"><img src="../controlador/img/facepet.png" id="facepet"></a>
                    <li><a href="vistaUsuario.php">Inicio</a></li>
                    <li><a href="miPerfil.php">Mi Perfil</a></li>
                    <li id="crear">Crear
                        <ul>
                            <li><a href="crearPost.php">Crear Post</a></li>
                            <li><a href="crearEvento.php">Crear Evento</a></li>
                        </ul>
                    </li>
                    <li><a href="buscarAmigos.php">Buscar Amigos</a></li>
                    <li class="icono"><a href="mensajeria.php"><img src="../controlador/img/mensaje.png" id="mensajes" alt="mensajes"><span class="alerta">1</span></a></li>
                    <li class="icono"><a href="notificaciones.php"><img src="../controlador/img/notificacion.png" id="notificaciones" alt="notificaciones"><span class="alerta">1</span></a></li>
                    <li id="liUsuario">
                        <a href="miPerfil.php">
                            <img src="../controlador/img/gato.png" id="perfil">
                            <span id="nombreUsuario"><?php echo $_SESSION['username']; ?></span>
                        </a>
                        <img src="../controlador/img/abajo.png" id="abajo" alt="abajo">
                        <ul>
                            <li><a href="../index.php">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </nav>

                <div id="cabeceramv">
                    <a href="vistaUsuario.php" id="facepetAMV"><img src="../controlador/img/facepet.png" id="facepetMV" alt="logo"></a>
                    <nav class="menuHTML">
                        <div id="hamburguesa">
                            <label for="menu-toggle">
                                <div class="botonMenu">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </label>
                        </div>
                        <input type="checkbox" id="menu-toggle"/>
                        <ul id="trickMenu">
                            <a href="miPerfil.php"><li>Mi Perfil</li></a>
                            <a href="crearPost.php"><li>Crear Post</li></a>
                            <a href="crearEvento.php"><li>Crear Evento</li></a>
                            <a href="buscarAmigos.php"><li>Buscar Amigos</li></a>
                        </ul>
                    </nav>
                </div>
            </header>
        <div id="cuerpo">
            <div id="listaAmigos">
                <p id="chatear">Chatea con tus amigos</p>
                <input type="text" id="buscador" placeholder="Busca a un amigo">
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
                <div class="amigo">
                    <img src="../controlador/img/gato.png" class="imgAmigo" alt="imgAmigo">
                    <div class="datos">
                        <p class="nombreAmigo">Nombre Amigo</p>
                        <p class="animalAmigo">Animal Amigo</p>
                        <p class="razaAmigo">Raza Amigo</p>
                    </div>
                </div>
            </div>
            <div id="Cmensajes">
                <div id="cabeceraCM">
                    <img src="../controlador/img/gato.png" class="imgAmigoCM" alt="imgAmigo">
                    <p class="nombreAmigoCM">Nombre Amigo</p>
                </div>
                <div id="cuerpoCM">
                    <div class="mUser2"><span>HOLAAAAAAA</span><p class="fecha">13/04/2019 13:33</p></div>
                    <div class="mUser1"><span>holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span><p class="fecha">13/04/2019 13:33</p></div>
                    <div class="mUser2"><span>HOLAAAAAAA</span><p class="fecha">13/04/2019 13:33</p></div>
                    <div class="mUser1"><span>holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span><p class="fecha">13/04/2019 13:33</p></div>
                    <div class="mUser2"><span>HOLAAAAAAA</span><p class="fecha">13/04/2019 13:33</p></div>
                    <div class="mUser1"><span>holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</span><p class="fecha">13/04/2019 13:33</p></div>
                </div>
                <div id="pieCM">
                    <input type="text" id="mensajeEscrito" placeholder="Escribe un mensaje">
                    <button id="enviarMensaje">Enviar</button>
                </div>
            </div>
        </div>
            <footer>
                <ul id="segundoMenu">
                    <li class="icono"><a href="../index.php"><img src="../controlador/img/cerrar-sesion.png" id="cerrarsesion" alt="cerrarSesion"></a></li>
                    <li class="icono"><a href="mensajeria.php"><img src="../controlador/img/mensaje.png" id="mensajes" alt="mensajes"><span class="alerta">1</span></a></li>
                    <li class="icono"><a href="notificaciones.php"><img src="../controlador/img/notificacion.png" id="notificaciones" alt="notificaciones"><span class="alerta">1</span></a></li>
                    <li id="liUsuario">
                        <a href="miPerfil.php">
                            <img src="../controlador/img/gato.png" id="perfil" alt="imgPerfil">
                        </a>
                    </li>
                </ul>
            </footer>
    </div>
</body>
</html>