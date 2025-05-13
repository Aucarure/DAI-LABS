<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sesión cerrada</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fce4ec, #e1f5fe);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border: none;
      border-radius: 1.5rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .btn {
      border-radius: 50px;
    }
  </style>
</head>
<body>
  <?php 
    session_start(); 
    session_destroy(); 
  ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="card p-4 text-center animate__animated animate__fadeIn">
          <h3 class="mb-3">Sesión cerrada</h3>
          <p class="text-muted">Has salido correctamente del sistema.</p>
          <a href="index.php" class="btn btn-primary mt-3">Volver al login</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>