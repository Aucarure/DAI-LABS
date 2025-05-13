<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>
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
    .form-control:focus {
      box-shadow: none;
      border-color: #007bff;
    }
    .btn-primary {
      border-radius: 50px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
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

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 fade-in animate__animated animate__fadeInUp">
          <div class="card-body">
            <h3 class="text-center mb-4">Iniciar sesión</h3>
            <?php if (isset($_SESSION['usuario'])): ?>
              <div class="alert alert-success text-center">
                Bienvenido <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>.<br>
                <a href="bienvenida.php" class="btn btn-outline-primary mt-3">Ir a bienvenida</a>
                <a href="logout.php" class="btn btn-outline-secondary mt-3">Cerrar sesión</a>
              </div>
            <?php else: ?>
              <form action="login.php" method="POST">
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                  <label for="correo" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
                </div>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>