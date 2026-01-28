<?php
$username = $passwd = '';
$usernameErr = $passwdErr = '';
if (isset($_POST['username'], $_POST['passwd'])) {
  $username = trim($_POST['username']);
  $passwd = trim($_POST['passwd']);

if (empty($username)) {
  $usernameErr = "Please input username";
}
if (empty($passwd)) {
  $passwdErr = "Please input password";
}
if (empty($usernameErr) && empty($passwdErr)) {
  $user = logUserIn($username, $passwd);
  if ($user !== false) {
    header('Location: ./?page=dashboard.php');
  } else {
    echo '<div class="alert alert-success" role="alert">Login failed</div>';
  }
}
}
?>
<form action="./?page=login" method="post" class="col-sm-8 col-lg-6 mx-auto">
  <h3>Login</h3>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input name="username" type="text" value="<?php echo $username ?>" class="form-control
    <?php echo empty($usernameErr) ? '' : 'is-invalid' ?>">
    <div class="invalid-feedback">
      <?php echo $usernameErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="passwd" type="password" class="form-control
     <?php echo empty($passwdErr) ? '' : 'is-invalid' ?>">
    <div class="invalid-feedback">
      <?php echo $passwdErr ?>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>