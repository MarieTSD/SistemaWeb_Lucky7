<?php
//Codigo para las sesiones
session_start();
$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'lucky7';
$conexion = new mysqli($servidor, $cuenta, $password, $bd);
?>
<?php
$servidor = 'localhost';
$cuenta = 'root';
$pass = '';
$bd = 'lucky7';

$conexion = new mysqli($servidor, $cuenta, $pass, $bd);
    if ($conexion->connect_errno) {
        die('Error en la conexion');
    }

$consulta= "SELECT nombre,existencia FROM prod";
$res=$conexion->query($consulta);



$conexion2 = new mysqli($servidor, $cuenta, $pass, $bd);
    if ($conexion2->connect_errno) {
        die('Error en la conexion');
    }

$consulta2= "SELECT nombre,estado FROM usuario";
$res2=$conexion2->query($consulta2);
//-------------------------------------------------------------
$act = 0;                                                  //--
$bloq = 0;                                                 //--
while($fila2 = $res2->fetch_assoc()){                      //--
    if($fila2["estado"]==0){                               //--
        $bloq++;                                           //--
    }                                                      //--
    if($fila2["estado"]==1){                               //--
        $act++;                                            //--
    }                                                      //--
}                                                          //--
//-------------------------------------------------------------
?>
 
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mision</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="vendor/fontawesome/all.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,500,700&display=swap" rel="stylesheet">
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/icon.gif" type="img/png">
<!--inicio dona-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Nombre', 'Inventario'],
          <?php
            
            while($fila = $res->fetch_assoc())
            {
               echo "['".$fila["nombre"]."',".$fila["existencia"]."],";
            }
            ?>
        ]);

        var options = {
          title: 'INVENTARIO',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <!--fin dona-->
    
    
    
    
    <!--inicio barras-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Estado', 'Total de usuarios'],
            
        ["ACTIVOS", <?php echo $act; ?> ],
        ["BLOQUEADOS", <?php echo $bloq; ?> ]
            
          
        ]);

        var options = {
          width: 370,
			margin: 10,
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    <!--fin barras-->
  </head>
 <body>
 <!-- ACCESIBILIDAD-->
<?php
if(isset($_SESSION['usuario']))
{
  ?>
    <script>
      
      
  jQuery(function reiniciar(){				
	/* Se cargan los estilos guardados en cookies al momento de ingresar a la pagina*/
    /*FONDO*/
    cambio=Cookies.get('colorCookie');

    jQuery('.cambiafondo').css('background-color',Cookies.get('colorCookie'));
		jQuery('#menu').css('background-color',Cookies.get('colorCookie'));
    jQuery('#menu a').css('background',Cookies.get('colorCookie'));
    if(cambio!==''){
      jQuery('.cambiafuente').css('color', 'white');
      jQuery('.cambiafuente i').css('color', 'white');
    }
    
    

    /*TEXTO*/
			if (Cookies.get('cookietexto') == 'normal') {
				$('.cambiatexto').css({
				'font-weight': 'normal',
				'font-style': 'normal',
				'text-decoration': 'none',
				'font-size':'15px'
				});
			}    
			if (Cookies.get('cookietexto') == 'negrita') 
			{
			
				$('.cambiatexto').css('font-weight', 'bold');
				$('.nav-link').css('font-size', '200%');

			
			
			}
			if (Cookies.get('cookietexto') == 'cursiva') 
			{

				$('cambiatexto').css('font-style', 'italic');
				$('.nav-link').css('font-size', '200%');

			}
			if (Cookies.get('cookietexto') == 'subrayado') 
			{

				$('cambiatexto').css('text-decoration', 'underline');
				$('.nav-link').css('font-size', '200%');

			}
		/*FUENTE*/	
			$('.cambiafuente').css('font-family',Cookies.get('cookiefuente') );
		
		});
    </script>
    <?php
 
  
  

    echo '<!-- MENU ACCESIBILIDAD -->';
    

    echo '<div class="fondo" >';
      

      
      echo '<div style="display : inline-flex">';
      echo '<label >Fondo</label><br>';
      echo    '<a href="#" class="thumbnail" data-color="#555151" style="height: 50px; width: 50px;"  >';  
      echo    '<img alt="gris" src="img/color1.png" style="height: 30px; width: 30px">';
      echo    '</a>' ;
      
      echo    '<a href="#" class="thumbnail" data-color="#669999" style="height: 50px; width: 50px;">'  ;
      echo    '<img alt="Manzana verde" src="img/color2.png" style="height: 30px; width: 30px"> ';
      echo    '</a> ';
      
      echo    '<a href="#" class="thumbnail" data-color="#52527a" style="height: 50px; width: 50px;">'  ;
      echo    '<img alt="Naranja" src="img/color3.jpg" style="height: 30px; width: 30px"> ';
      echo    '</a> ';
      echo    '<a href="#" class="thumbnail" data-color="#993333" style="height: 50px; width: 50px;"> ' ;
      echo    '<img alt="Limón amarillo" src="img/color4.png" style="height: 30px; width: 30px">' ;
      echo    '</a>' ;
      echo '</div> '  ; 
      echo '<div>';
      echo     '<label for="texto">Texto</label>';
      echo      '<select name="texto" id="texto">';
      echo        '<option value="normal">Normal</option>';
      echo        '<option value="negrita">Negrita</option>';
      echo        '<option value="cursiva">Cursiva</option>';
      echo        '<option value="subrayado">Subrayado</option>';
      echo    '</select>';
      echo '</div>';
      
      echo '<div>';
      echo   '<label for="fuente" >Fuente</label>';
      echo   '<select  id="fuente" name="fuente">';

      echo    '<option value="Times New Roman">Times New Roman</option>';
      echo    '<option value="Courier New">Courier New</option>';
      echo    '<option value="Arial">Arial</option>';
      echo  '</select>';

      echo '</div>';

      
    echo   '<div class="col-xs-12">';
    echo    '<a class="recargar" href="#" target="_blank"><i class="far fa-save"></i></a>';
    echo    '<a id="eliminaCookie"  href="#" target="_blank"><i class="far fa-trash-alt"></i></a>';
    echo   '</div>';
    echo    '<div>';
    echo    '<br><br><br>';
    echo    '</div>';
    echo '</div>'    ;

    
}?>
<!-- /MENU ACCESIBILIDAD -->
  	<?php
    if (isset($_POST['inicia'])) {
      $usuario = $_POST["user"];
      $pass = $_POST["pass"];
      $captcha = $_POST["tmptxt"];
      if ($conexion->connect_errno) {
        die('Error en la conexion');
      } else {
        $sql = "select * from usuario where cuenta ='$usuario'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows) {
          $fila = $resultado->fetch_assoc();
          $v1 = $fila['id'];
          $v6 = false;
          $v7 = $fila['intento'];
          if ($_SESSION['cod'] == $captcha) {
            if ($fila["estado"] == true) {
              if (password_verify($pass, $fila["contra"])) {
                $_SESSION["usuario"] = $usuario;

                if (isset($_POST['remember'])) {
                  setcookie("username", $_POST["user"], time() + 3600);
                  setcookie("password", $_POST["pass"], time() + 3600);
                }
                if($_SESSION["usuario"]=="Lucky7"){
					  header("Location: paginaAdmon.php");
				  }else{
					  header("Location: index.php");
				  }
              } else {
                $v7 += 1;
                $sql = "update usuario set intento='$v7' where id= '$v1'";
                $resultado = $conexion->query($sql);
                echo '<script>  swal("Contraseña incorrecta");</script>';
              }
            }
            if ($v7 == 3 && $fila['estado'] == true) {
              echo '<script>  swal("' . $usuario . ' se ha bloqueado");</script>';
              $sql = "update usuario set estado='$v6', intento='0' where id= '$v1'";
              $resultado = $conexion->query($sql);
            }
            if ($fila['estado'] == false) {
              echo '<script>  swal("Usuario Bloqueado");</script>';
            }
          } else {
            echo '<script>  swal("Error en el captcha");</script>';
          }
        } else {
          echo '<script>  swal("Usuario no existente");</script>';
        }
      }
    }
    ?>

   	<!-- menu -->
	  <nav id="menu" class="navbar navbar-expand-sm bg">
	  <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png" alt=""></a>
	  <button  id="menu_btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	  <span class="text-white" class="navbar-toggler-icon">+</span>
	  </button>
	  <div class="collapse navbar-collapse row justify-content-around" id="collapsibleNavbar">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a id="menu_item" class="nav-link menu_item" href="index.php">Inicio</a>
		  </li>
		  
		  <!-- Dropdown -->
	 <!-- Dropdown -->
			<li class="nav-item dropdown">
			  <a id="menu_item" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Acera De</a>
			  <div style="padding: 0px;" class="dropdown-menu menu_acerca_de">
				<a id="menu_item" class="dropdown-item" href="vision.php">Visión</a>
				<a id="menu_item" class="dropdown-item" href="mision.php">Misión</a>
				<a id="menu_item" class="dropdown-item" href="objetivo.php">Objetivo de la compañía</a>
			  </div>
      	  </li>   
		  <li class="nav-item">
			<a id="menu_item" class="nav-link" href="contactanos.php">Contactanos</a>
		  </li>  
		  <li class="nav-item">
			<a id="menu_item" class="nav-link" href="ayuda.php">Ayuda</a>
		  </li> 
		  
         <!-- Pagina para el adminitrador		  -->
		 <?php
			//echo $admin;
			
			if($_SESSION['usuario'] == "Lucky7"){
				echo '<li "> <a style="color:#ffcc00;
	padding: 10px;
	font-weight: 500;" href="paginaAdmon.php">USUARIO: ' . $_SESSION['usuario'] . "</a></li>";
			echo '<li class="nav-item dropdown">
			  <a id="menu_item" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Productos </a>
			  <div style="padding: 0px;" class="dropdown-menu menu_acerca_de">
				<a id="menu_item" class="dropdown-item" href="altasAdmon1.php">Alta Producto</a>
				<a id="menu_item" class="dropdown-item" href="bajasAdmon.php">Baja Producto</a>
				<a id="menu_item" class="dropdown-item" href="actualizarAdmon.php">Actualizar Producto</a>
			  </div>
      	  </li>';
			}elseif(isset($_SESSION["usuario"])){
				echo '<li style="color:#ffcc00;
	padding: 10px;
	font-weight: 500;"> USUARIO: ' . $_SESSION['usuario'] . "</li>";
			}
			?>
      	  
		</ul>
	  </div> 
	  
<!-- Codigo LOGIN-->  
	<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <!--Content-->
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="modal-content form-elegant">
              <!--Header-->
              <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-success font-weight-500 my-3" id="myModalLabel"><strong>INICIAR SESION</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->

              <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                  <input type="text" name="user" id="user" class="form-control validate" value="<?php if (isset($_COOKIE["username"])) {$usuario = $_COOKIE["username"];echo $usuario;} ?>" required>
                </div>

                <div class="md-form pb-3 ">
                  <input type="password" name="pass" id="pass" class="form-control validate" value="<?php if (isset($_COOKIE["password"])) {$pass = $_COOKIE["password"];echo $pass;} ?>" required>
                  <p class="text-success d-flex justify-content-end">Olvidaste tu <a href="recupera.php" class="text-primary bg-white">
                      contraseña?</a></p>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" id="defaultIndeterminate2">
                  <label class="custom-control-label text-success " for="defaultIndeterminate2">Recordar usuario y contraseña</label>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                  <img id="captcha" src="captcha.php" width="100" height="30" class="img-polaroid">
                  <button type="button" class="btn btn-outline-info" onclick="refresh(event)"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                  <input type="text" name="tmptxt" id="cod" class="form-control validate" required placeholder="Ingresa el Código" value="" /><br />
                  <br> <br>
                </div>
                <div class="text-center mb-3">

                  <button type="submit" id="log" name="inicia" class="btn bg-success text-white btn-block btn-rounded z-depth-1a" >Iniciar sesion</button>
                </div>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"></p>
              </div>
              <!--Footer-->
              <div class="modal-footer mx-5 pt-3 mb-1">
                <p class="font-small  d-flex justify-content-end text-success">No estas registrado? <a href="#" data-toggle="modal" data-target="#elegantModalFormregister" class="text-primary bg-white">
                    Registrate</a></p>
              </div>
            </div>
          </form>
          <!--/.Content-->
        </div>
      </div>
      <!-- Modal -->
      <?php
      if (isset($_SESSION["usuario"])) {
        echo '<button class="botonAccesibilidad estenu"><i class="fab fa-accessible-icon"> </i> </button>';
        echo '<a  class="btn btn-danger btn-rounded" href="logout.php">Salir</a>';

      } else {
        echo '<div class="text-center">';
        echo '<a href=""class="btn btn-outline-success" data-toggle="modal" data-target="#elegantModalForm">Login</a>';
        echo '</div>';
      }

      ?>
      <div class="modal fade" id="elegantModalFormregister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <!--Content-->
          <form action="reg1.php" onSubmit="return validarPasswd()" method="post">
            <div class="modal-content form-elegant">
              <!--Header-->
              <div class="modal-header text-center">
                <h3 class="modal-title w-100 text-success font-weight-bold my-3" id="myModalLabel"><strong>Registro</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->

              <div class="modal-body mx-4">
                <!--Body-->
                <div class="md-form mb-5">
                  <input type="text" class="form-control validate" name="nom" required maxlength="30" placeholder="Nombre" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="text" class="form-control validate" name="cuenta" required maxlength="30" placeholder="Cuenta" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="email" class="form-control validate" name="correo" placeholder="Correo" required> 
                </div>
                <div class="md-form mb-5">
                  <input type="password" class="form-control validate" placeholder="Contraseña" name="contra" id="contra"> 
                </div>
                <div class="md-form mb-5">
                  <input type="password" class="form-control validate" name="contra2" id="contra2" placeholder="Escriba de nuevo su contraseña"> 

                </div>

                <div class="text-center mb-3">
                  <button type="submit" name="envia" class="btn bg-success text-white btn-block btn-rounded z-depth-1a">Registrarse</button>
                </div>
                <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"></p>
              </div>
            </div>
          </form>
          <!--/.Content-->
        </div>
      </div>
    
    <!--Fin codigo login--> 
	</nav>
   	<!-- fin menu -->

   <!-- Hero section -->
    <section class="hero3" style="background-image: url(img/fondo9.png);">
     	<!--SMACSS-->
     	<!--BEM BLOVK ELEMENT MODIFIER-->
     	<br><br><br>
      <h1 class="hero__title">BIENVENIDO ADMIN</h1>
      <br><br>
      <p class="hero__paragraph" style="color:black;">como administrador de esta pagina, puedes tener acceso a la base de datos de los producto con lo que cuenta la tienda, ademas de poder agregar y/o modificar estos.</p>
    </section>
    <!-- End Hero section -->
    
    
    <div>
    	<br><br>
     	<h2 class="hero__title">INVENTARIO</h2>
    	<div id="donutchart" ></div>
      <br><br>
      <h2 class="hero__title">USUARIOS BLOQUEDOS VS NO BLOQUEADOS</h2><BR></BR>
      <div id="top_x_div" style="marging:10px;"></div>
    </div>
    	
 
    
  </body>
    
    
    
    <!-- End characteristics section -->
<footer class="jumbotron text-center text-primary" style="margin:0px; width: 100%;">
 <p class="pie_parrafo">Lucky 7 México y Centroamérica ©2019 | LA MODA N0 ES NADA SIN PERSONAS</p>
 <p class="pie_parrafo">Todos los derechos reservados</p>
  <!--<p class="pie_parrafo1">Num Visitas: </p>-->
</footer>
     <!-- ARCHIVOS JSACCESIBILIDAD -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/js.cookie.js"></script>
      <script src="js/functions.js"></script>
      <!-- FIN ARCHIVOS -->

  </body>
</html>