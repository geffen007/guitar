<?php 

$title = "Login";
$libJS = '';
$scriptJS = '';
$scriptJS2 = '';


require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/partials/headers.php';
?>
  <div class="container login">
    <div class="form">
      <h1>Login</h1>
      <form class="p-4" method="post" action="/APP2/php/login.php">
        <div class="mb-3">
          <label for="FormUsername" class="form-label">Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
        <div class="mb-3">
          <label for="FormPassword" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-light">Sign in</button>
      </form>
    </div>
  </div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/partials/footer.php';
?>