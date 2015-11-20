<!DOCTYPE html>
<?php
session_start();
if($_SESSION['idAlumcii']=='' || is_null($_SESSION['idAlumcii']) || $_SESSION['idUsso']<=0)
{
  header('Location: ../index.php');
  
}
?>

<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Activación de MOAC</title>

  
  <link rel="stylesheet" href="../css/sistemaetc.css">
  

  <script src="../js/vendor/custom.modernizr.js"></script>
    
 

</head>
<body >



<br>
    <div class="row ingresar">
      <br>
    <div class="large-12 columns">
      <h1>Activación Moac</h1>
    </div>
    </div> 
    <br>

    
    <div class="row"> 
    
    
    </div>
<?php 
$idkey=$_REQUEST['idk'];
$codigo=$_REQUEST['cod'];

if($codigo=='' or $idkey=='' or $codigo=='-')
{
  //
  echo '<script type="text/javascript">
        window.close();
        </script>';
}
else
{
  /*
    include_once('../Conexiones/conexion.php');
            //echo $idpC;
            
            $buscaprodtts="CALL validaybuscakeygroup('".$idProd."')";
            $querybTTS=$mysqli->query($buscaprodtts)or die('no elecuta el procedimiento de producto');
            if($querybTTS)
            {
              clearStoredResults($mysqli);
              $filabtts =$querybTTS->fetch_array(MYSQLI_ASSOC);
              $codpetTTS =$filabtts['codigotts_peticion_producto'];
            }
  */
  include_once('../Conexiones/conexion.php');
  $buscaKey="CALL validaybuscakeygroup('".$codigo."',".$idkey.")";
  $queryKey=$mysqli->query($buscaKey)or die('no elecuta el procedimiento de producto');
  if($queryKey)
  {
    clearStoredResults($mysqli);
    $filaKey=$queryKey->fetch_array(MYSQLI_ASSOC);
    $keyP =$filaKey['keygroup_grupo'];
    if($keyP=='')
    {
      echo '<script type="text/javascript">
        window.close();
        </script>';
    }
    else
    {
      $nameProd=$filaKey['nombre_producto'];
      $coincidenCP="<IMG SRC='../img/alerta.png'>";

      
      
	  echo"<table background='../img/rgbg3.jpg' width='100%'>
		   <tr><td colspan='2'>";
		   echo"<center><h2>".utf8_encode($nameProd)."</h2></center><br>";
		   echo "</td></tr>
       <tr><td colspan='2'>".$coincidenCP." Requieres tener el simulador de Moac con sesión iniciada para poder ingresar tu código y keygroup asignado.
        Tus códigos son los siguientes:
        <br>Tus codigos on los siguientes:</td></tr>
		   <tr><td>";
      echo"<b>Codigo Moac:</b></td><td>".$codigo."</td></tr>";
      echo"<tr><td><b>Keygroup:</b></td><td>".$keyP."</td></tr></table>";

      mssql_close();
      $msconnect=mssql_connect("ServidorMSsql","moacetclatam","mo43ac34")or die('no conecta a base de datos moac'); 
      $buscaidMoac="EXEC buscaridStudent '".$_SESSION['emailUser']."'";
      $queryidU = mssql_query($buscaidMoac)or die('ERROR EN LA BUSQUEDA');
      if($queryidU)
      {
        $filaidU = mssql_fetch_array($queryidU);
        $idstudentMoac=$filaidU[0];
        mysql_free_result($queryidU);
        $hard="Deshabilitado";
        $fechaphp=date("Y-m-d");
        $separacod=explode("-", $codigo);
        $prefcode=$separacod[0];
        
        if($prefcode=="MWD13")
        {
          $prod=24;
          $version="4.0.0.0";
          $idioma="spanish";
        }
        else if($prefcode=="MXL13")
        {
          $prod=25;
          $version="4.0.0.0";
          $idioma="spanish";
        }
        else if($prefcode=="MPP13")
        {
          $prod=26;
          $version="4.0.0.0";
          $idioma="spanish";
        }
        else
        {
          $prod=0;
          $version="0.0";
          $idioma="N/A";
        }

        if($prod>0)
        {
          $activacodigo="Declare @NombreCurso NVARCHAR(250);
                              Declare @id_curso BIGINT;
                              Declare @id_School BIGINT;
                              Declare @FechaLimite NVARCHAR(250);
                              Declare @err NVARCHAR(250);
                              Declare @msg2 NVARCHAR(350);
                              Declare @fff datetime;
                              set @fff=getdate();
                              EXEC MOAC13_ActivarCursoMoac '".$codigo."','".$keyP."','".$idstudentMoac."','".$hard."',@fff,'".$prod."',@NombreCurso,@id_curso,@id_School,@FechaLimite,@err,@msg2,'".$prod."','".$version."','".$idioma."'";
          $queryActiva = mssql_query($activacodigo)or die('ERROR EN LA ACTIVACION');
          if($queryActiva)
          {
              Echo"***********El codigo fue activado en Moac 2013";
          }
          else
          {
            Echo"Realice la Activacion en la plataforma Moac";
          }
        }
      }
      
      /*
      mssql_close();
      $msconnect=mssql_connect("ServidorMSsql","moacetclatam","mo43ac34")or die('no conecta a base de datos moac'); 
      


      $sqlKeyGroup = "EXEC V3_ActivarCursoMoacPrueba'".$keyP."','".$Ginsti."','".$Gtrab."','".$keygroupsCiidte[$x]."','".$idInstitucionDoc."','".$idPciidte[$x]."','1','';";
      echo"<br>";
      $queryKG = mssql_query($sqlKeyGroup)or die('no lo agrego a moac');
      if($queryKG)
      {
      }

      */
      //
      /*



MOAC13_ActivarCursoMoac]
@key NVARCHAR(250),--
@NoGrupo NVARCHAR(250),--
@id_student BIGINT,--
@MacSerialHD NVARCHAR(250),--
@fecha NVARCHAR(250),--
@PRODUCTOS NVARCHAR(250),--
@NombreCurso NVARCHAR(250) OUTPUT**,
@id_curso BIGINT OUTPUT**,
@id_School BIGINT OUTPUT**,
@FechaLimite NVARCHAR(250) OUTPUT**,
@err NVARCHAR(250) OUTPUT**,
@msg2 NVARCHAR(350) OUTPUT,
@CursoActivar BIGINT,--
@versionSW AS NVARCHAR(50),--
@idioma Nvarchar(25)--

      */
    }
    
  }
  else
  {
    echo '<script type="text/javascript">
        window.close();
        </script>';
  }  

  
}


?>

  <div class="row">
        <div class="small-12 columns">
        <p align="center"><input type="button" onclick="window.close();" name="Cerrar" Value="Cerrar ventana" id="Cerrar" class="secondary button"></p>
        </div>
        </div>
    </div>
    
    
 </div>   

  

      

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="../js/foundation.min.js"></script>

  
    <script>
    $(document).foundation();
  </script>
</form>
</body>
</html>