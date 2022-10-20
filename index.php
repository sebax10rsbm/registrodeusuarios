<!DOCTYPE html>
<html lang="es">
<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="main.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->

  <title>Document</title>
</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="conocermas.php">Conocer más</a></li>
        <li><a href="login.php">Iniciar</a></li>
        <li><a href="registro.php">Registro</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row"></div>
    <div class="row">
      <div class="col s12">
      <img class="responsive-img" src="images/1.png">
      </div>
    </div>

  </div>
  <div class="row">
    
  </div>
  <div class="row">
    
  </div>
  <div class="container">
    <div class="row">
      <div class="col s4"><center>Quienes Somos</center></div>  
      <div class="col s4"><center>Misión</center></div>  
      <div class="col s4"><center>Visión</center></div>  
    </div>
  </div>
  <footer class="page-footer footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Cooptenjo</h5>
          <p class="grey-text text-lighten-4">Entidad cooperativa de ahorro y credito de Tenjo</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Redes</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Facebook</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Twitter</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Instagram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">TikTok</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      cooptenjo.com.co
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.carousel');
      var instances = M.Carousel.init(elems, options);
    });
    var instance = M.Carousel.init({
      fullWidth: true
    });

    M.AutoInit();
  </script>
</body>
</html>
