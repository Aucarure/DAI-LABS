<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Custom styles -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border: none;
      border-radius: 2rem;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .btn {
      border-radius: 50px;
    }
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
      0% {opacity: 0; transform: translateY(20px);}
      100% {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

  <?php 
  session_start();
  require_once 'clases/Persona.php';
  if (!isset($_SESSION['usuario']) || !isset($_SESSION['correo'])) {
      echo "<div class='text-center'><h2>No estás autenticado.</h2><a href='index.php' class='btn btn-primary mt-3'>Iniciar sesión</a></div>";
      exit;
  }
  $persona = new Persona($_SESSION['usuario'], $_SESSION['correo']);
  ?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 fade-in animate__animated animate__fadeInUp">
          <div class="card-body text-center">
            <h3 class="card-title mb-4">¡Bienvenido!</h3>
            <p class="lead"> <?= $persona->saludar(); ?> </p>
            <p><?php $persona->mostrarDatos(); ?></p>
            <a href="logout.php" class="btn btn-outline-danger mt-3">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
