<?php 
include '../config.php';
session_start(); 
 
 if (!isset($_SESSION['username'])) {
    header("Location: ../");
    exit();
}   elseif ($_SESSION['level']!='admin') {
    header("Location: ../");
    exit();
}   else {
    $loggedin = isset($_SESSION['username']);
    $username = $loggedin ? $_SESSION['username'] : '';
}

$sql = "SELECT id, username, email, password, level FROM users"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/css/uikit.min.css" />
</head>
<body>
    <div class="uk-grid-collapse" uk-grid>
        <!-- Sidebar -->
        <div class="uk-width-1-6 uk-background-secondary uk-light uk-padding-small uk-visible@m" style="height: 100vh; position: sticky; top: 0;">
            <h3 class="uk-text-center">Dashboard</h3>
            <ul class="uk-nav uk-nav-default">
                <li class="uk-active"><a href="#">Home</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="../">Exit</a></li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="uk-width-expand">
            <!-- Navbar -->
            <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-left uk-flex uk-flex-1 uk-margin-left">
                    <form class="uk-search uk-search-default" style="flex-grow: 1;">
                        <span uk-search-icon></span>
                        <input class="uk-search-input uk-width-1-1" type="search" placeholder="Search...">
                    </form>
                </div>
                <div class="uk-navbar-right uk-margin-left uk-margin-right">
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
                    <li class="uk-active"><a href="#" class=""><span uk-icon="server"></span> Dashboard</a></li>
                    <li class="uk-nav-divider"></li>
                    <?php endif; ?>
                    <li class="uk-nav-divider"></li>
                    <li><a href="../logout.php"><span uk-icon="sign-out"></span> Log Out</a></li>
                    <?php endif; ?>
                    <?php if (!$loggedin): ?>
                    <li><a href="../loginregister.php"><span uk-icon="sign-in"></span> Login/Register</a></li>
                    <?php endif; ?>
                  </ul>
                </div>
                    <a class="uk-hidden@m uk-icon-link" href="#" uk-icon="icon: menu" uk-toggle="target: #offcanvas-sidebar"></a>
                </div>
            </nav>
            </div>
            <div id="offcanvas-sidebar" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar">
                    <h3>Dashboard</h3>
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-active"><a href="#">Home</a></li>
                        <li><a href="#">Reports</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-container uk-padding">
                <div class="uk-grid-small uk-child-width-1-4@m" uk-grid>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <h3 class="uk-card-title">Report 1</h3>
                            <p>Lorem ipsum dolor.</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <h3 class="uk-card-title">Report 2</h3>
                            <p>Lorem ipsum dolor.</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <h3 class="uk-card-title">Report 3</h3>
                            <p>Lorem ipsum dolor.</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body">
                            <h3 class="uk-card-title">Report 4</h3>
                            <p>Lorem ipsum dolor.</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="uk-container uk-padding">
                <ul uk-tab>
                    <li><a href="#">Tab 1</a></li>
                    <li><a href="#">Tab 2</a></li>
                    <li><a href="#">Tab 3</a></li>
                </ul>
                
                <ul class="uk-switcher uk-margin">
                    <div>
                    <table class="uk-table uk-table-hover uk-table-divider uk-table-small">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Level</th>
                  </tr>
              </thead>
              <tbody>
                  <?php if ($result->num_rows > 0): ?>
                      <?php while ($row = $result->fetch_assoc()): ?>
                          <tr>
                              <td><?php echo $row['id']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['password']; ?></td>
                              <td><?php echo $row['level']; ?></td>
                          </tr>
                      <?php endwhile; ?>
                  <?php else: ?>
                      <tr>
                          <td colspan="5">No data found</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
          </table>
                    </div>
                    <li>Curabitur aliquet quam id dui posuere blandit.<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></li>
                    <li>Quisque velit nisi, pretium ut lacinia in, elementum id enim.<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.24/dist/js/uikit-icons.min.js"></script>
</body>
</html>
