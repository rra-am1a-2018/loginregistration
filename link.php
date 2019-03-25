<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
        // Deze links worden aangeboden als we zijn ingelogd.
        if (isset($_SESSION["id"])) {
          switch($_SESSION["userrole"]) {
            case 'administrator':
              echo '<li class="nav-item">
                      <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=administratorhome">adminhome</a>
                    </li>';
            break;
            case 'root':
              echo '<li class="nav-item">
                      <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=roothome">roothome</a>
                    </li>';
            break;
            case 'moderator':
              echo '<li class="nav-item">
                      <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=moderatorhome">moderatorhome</a>
                    </li>';
            break;
            case 'customer':
              echo '<li class="nav-item">
                      <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=customerhome">customerhome</a>
                    </li>';
            break;
            default:
              header("Location: ./index.php?content=logout");
            break;
          }



          echo '<li class="nav-item active">
                  <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=homepage">home<span class="sr-only">(current)</span></a>
                </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=logout">uitloggen</a>
                </li>';
        } else { // Deze links worden aangeboden als we niet zijn ingelogd.
          echo '<li class="nav-item">
                  <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=register">registratie</a>
                </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="http://www.loginregistration.am1a.org/index.php?content=login-form">inloggen</a>
                </li>';
        }
      ?>               
    </ul>
  </div>
</nav>