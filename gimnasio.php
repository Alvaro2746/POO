<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);





class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor){
        return $this->$propiedad=$valor;
    }
}

class Alumno extends Persona{
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __construct() {
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = FALSE;
    }
    public function __get($propiedad){
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor){
        return $this->$propiedad=$valor;
    }

    public function setFichaMedica($peso, $altura, $aptoFisico){
        $this->peso=$peso;
        $this->altura=$altura;
        $this->aptoFisico=$aptoFisico;

    }
}
class Entrenador extends Persona{
    private $aclases;

    public function __construct() {
        $this->aClases = array();
        
    }
    public function asignarClase(){
        
    }

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        return $this->$propiedad=$valor;
    }

    
}
class Clase{
    private $nombre;
    private $aAlumnos;
    private $entrenador;

    public function __construct() {
        $this->aAlumnos = array();
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor){
        return $this->$propiedad=$valor;
    }

    public function asignarEntrenador($entrenador){
        $this->entrenador=$entrenador;
        
    }

    public function inscribirAlumno($alumno){
        $this->aAlumnos[]=$alumno;

    }

    public function imprimirListado(){
        echo '<table class="table table-bordered" id="table">
        <thead>
          <tr>
              <th id="tablehead" class="text-center" colspan="4">Clase ' . $this->nombre . '</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <th id="diferenciar1" colspan="2">Entrenador: </th>
              <td colspan="2">' . $this->entrenador->nombre . '</td>
          </tr>
          <tr>
            <th colspan="4" id="diferenciar2" class="text-start">Alumnos inscritos: </th>
          </tr>
          <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Celular</th>
          </tr>'; 
          foreach($this->aAlumnos as $pos => $alumno){
          echo '<tr >
            <td '; echo $pos%2==0?  ' id="diferenciar2"> ' : ' id="diferenciar1"> '; echo  $alumno->dni . ' </td>
            <td '; echo $pos%2==0?  ' id="diferenciar2"> ' : ' id="diferenciar1"> '; echo  $alumno->nombre . ' </td>
            <td '; echo $pos%2==0?  ' id="diferenciar2"> ' : ' id="diferenciar1"> '; echo  $alumno->correo . ' </td>
            <td '; echo $pos%2==0?  ' id="diferenciar2"> ' : ' id="diferenciar1"> '; echo  $alumno->celular . ' </td>      
          </tr>';
          }
        echo '</tbody>
      </table>';
          }
    }

$entrenador1 = new Entrenador();
$entrenador1->dni = "34987789";
$entrenador1->nombre = "Miguel Ocampo";
$entrenador1->correo = "miguel@mail.com";
$entrenador1->celular = "11678634";

$entrenador2 = new Entrenador();
$entrenador2->dni = "28987589";
$entrenador2->nombre = "Andrea Zarate";
$entrenador2->correo = "andrea@mail.com";
$entrenador2->celular = "11768654";

$alumno1 = new Alumno();
$alumno1->dni = "14456731";
$alumno1->nombre = "Dante Montera";
$alumno1->correo = "dante@mail.com";
$alumno1->celular = "1145632457";
$alumno1->fechaNac = "1997-08-28";
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 78;

$alumno2 = new Alumno();
$alumno2->dni = "119876567";
$alumno2->nombre = "Darío Turchi";
$alumno2->correo = "Darío@mail.com";
$alumno2->celular = "16678954556";
$alumno2->fechaNac = "1986-11-21";
$alumno2->setFichaMedica(73, 168, false);
$alumno2->presentismo = 68;

$alumno3 = new Alumno();
$alumno3->dni = "9887076532";
$alumno3->nombre = "Facundo Fagnano";
$alumno3->correo = "facundo@mail.com";
$alumno3->celular = "2990765421";
$alumno3->fechaNac = "1993-02-06";
$alumno3->setFichaMedica(90, 187, true);
$alumno3->presentismo = 88;

$alumno4 = new Alumno();
$alumno4->dni = "990876542";
$alumno4->nombre = "Gastón Aguilar";
$alumno4->correo = "gaston@mail.com";
$alumno4->celular = "1998654388";
$alumno4->fechaNac = "1999-11-02";
$alumno4->setFichaMedica(70, 169, false);
$alumno4->presentismo = 98;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="my-5 text-center">
            <h1>Gimnasio</h1>
            <link rel="stylesheet" href="css/estilos.css">
        </div>
        <div class="row">
            <div class="col-12 my-5">
                <?php
                    $clase1->imprimirListado();
                ?>
            </div>
            <div class="col-12 my-5">
                <?php
                    $clase2->imprimirListado();
                ?>
            </div>  
        </div>

    </main>
    
</body>
</html>