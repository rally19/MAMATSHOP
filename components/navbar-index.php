<div uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; end: ! *">
<nav class="uk-navbar-container" uk-navbar>
  <div class="uk-navbar-left uk-margin-left">
    <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
  </div>
  <div class="uk-navbar-right uk-margin-right">
    <ul class="uk-navbar-nav uk-visible@m">
      <li <?= NavActive('index.php') ?>><a href="/mamatshop1/">HOME</a></li>
      <li <?= NavActive('about.php') ?>><a href="/mamatshop1/about">ABOUT</a></li>
      <li <?= NavActive('bussiness.php') ?>><a href="/mamatshop1/bussiness">BUSSINESS</a></li>
      <li><a href="/mamatshop1/store">TOKO</a></li>
    </ul>
    <div class="uk-visible@m">
      <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="Input" aria-label="Input">
    </div>
    <div class="uk-visible@m">
      <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
    </div>
    <div class="uk-navbar-item uk-visible@m">
      <div>
        <a class="uk-navbar-toggle" href="#" uk-icon="user"></a>
        <div uk-dropdown="pos: bottom-right; delay-hide: 400; animation: uk-animation-slide-top-small; animate-out: true; offset: -1">
          <ul class="uk-nav uk-dropdown-nav">
            <?php if ($loggedin): ?>
            <li><?php echo htmlspecialchars($username); ?></li>
            <li class="my-text-silver"><?php echo $_SESSION['level']; ?></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span uk-icon="user"></span> Account</a></li>
            <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
            <li class="uk-nav-divider"></li>
            <?php if ($_SESSION['level']=='admin'): ?>
            <li><a href="/mamatshop1/dashboard"><span uk-icon="server"></span> Dashboard</a></li>
            <li class="uk-nav-divider"></li>
            <?php endif; ?>
            <li class="uk-nav-divider"></li>
            <li><a href="/mamatshop1/auth/proses/proseslogout.php"><span uk-icon="sign-out"></span> Log Out</a></li>
            <?php endif; ?>
            <?php if (!$loggedin): ?>
            <li <?= NavActive('loginregister.php') ?>><a href="/mamatshop1/auth/loginregister.php"><span uk-icon="sign-in"></span> Login/Register</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <a class="uk-navbar-toggle uk-navbar-toggle-animate uk-hidden@m" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-nav-primary"></a>
  </div>
</nav>
</div>
<div id="offcanvas-nav-primary" uk-offcanvas="flip: true; mode: slide; overlay: reveal;">
  <div class="uk-offcanvas-bar uk-flex uk-flex-column">
    <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical"  uk-nav="multiple: true">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <li class="uk-active"><a class="uk-navbar-item uk-logo uk-text-bold" href="javascript:void(0)">MAMATSHOP</a></li>
      <br>
      <li <?= NavActive('index.php') ?>><a href="/mamatshop1/">HOME</a></li>
      <li><a href="/mamatshop1/about">ABOUT</a></li>
      <li><a href="/mamatshop1/bussiness">BUSSINESS</a></li>
      <li><a href="/mamatshop1/store">STORE</a></li>
      <br>
      <li class="uk-nav-divider"></li>
      <br>
      <li class="uk-parent">
        <a href="#"><span uk-icon="icon: user"></span>USER<span uk-nav-parent-icon></span></a>
        <ul class="uk-nav-sub">
            <?php if ($loggedin): ?>
            <li><?php echo htmlspecialchars($username); ?></li>
            <li class="my-text-silver"><?php echo $_SESSION['level']; ?></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span uk-icon="user"></span> Account</a></li>
            <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
            <li class="uk-nav-divider"></li>
            <?php if ($_SESSION['level']=='admin'): ?>
            <li><a href="/mamatshop1/dashboard"><span uk-icon="server"></span> Dashboard</a></li>
            <li class="uk-nav-divider"></li>
            <?php endif; ?>
            <li class="uk-nav-divider"></li>
            <li><a href="/mamatshop1/auth/proses/proseslogout.php"><span uk-icon="sign-out"></span> Log Out</a></li>
            <?php endif; ?>
            <?php if (!$loggedin): ?>
            <li <?= NavActive('loginregister.php') ?>><a href="/mamatshop1/auth/loginregister.php"><span uk-icon="sign-in"></span> Login/Register</a></li>
            <?php endif; ?>
        </ul>
      </li>
    </ul>
  </div>
</div>