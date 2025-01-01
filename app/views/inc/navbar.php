<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="https://mdbgo.com/">
      <img
        src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
        height="16"
        alt="MDB Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo APPNAME ?>"><?php echo APPNAME ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT ?>posts">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT ?>about_us">About us</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <?php if(isset($_SESSION['user_id'])){ ?>
          <span class="mr-3"> Welcome back <?php echo $_SESSION['user_name'] ?> </span>
        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2" >
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
        </button>
<?php }else{ ?>
        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2" >
        <a href="<?php echo URLROOT; ?>/users/login">Login</a>
        </button>
        <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
        <a href="<?php echo URLROOT; ?>/users/register" class="text-white bg-dark">Sing up</a>
        </button>
        <?php } ?>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->