<html>
<head>
  <title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
  h4 {
    margin-left: 110px;
  }
</style>
</head>
<body>
<?php 
    if($this->session->flashdata("register_errors"))
    {
      echo ($this->session->flashdata("register_errors"));
    }  
    ?>
<div class="row">
  <div class="col-lg-6">
<h4>Register</h4>
<form class="form-horizontal border" action="mains/register_user" method="post">
  <input type="hidden" name="action" value="register">
  <div class="form-group">
    <label for="first_name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control"  placeholder="Name" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="alias" class="col-sm-2 control-label">Alias</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" placeholder="Alias" name="alias">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" placeholder="Password" name='password'>
    <label for="inputPassword" class="control-label">*Password should be at least 8 characters</label>
    </div>
  </div> <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Confirm Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" placeholder="Confirm Password" name='confirm_password'>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
         <select type="text" class="form-control" id="field-day" name="birth_day">
          <?php for($i=1; $i<=31;$i++) {?>
             <option value="<?= $i ?>"><?= $i ?></option>
             <?php } ?>
         </select>
    </div>
    <div class="col-sm-2">
         <select type="text" class="form-control" id="field-month" name="birth_month">
          <?php for($i=1; $i<=12;$i++) {?>
             <option value="<?= $i ?>"><?= $i ?></option>
             <?php } ?>
         </select>
    </div>
    <div class="col-sm-2">
         <select type="text" class="form-control" id="field-year" name="birth_year">
          <?php for($i=2015; $i>=1900;$i--) {?>
             <option value="<?= $i ?>"><?= $i ?></option>
             <?php } ?>
         </select>
    </div>
</div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-10">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>
</div>
<?php 
    if($this->session->flashdata("login_errors"))
    {
      echo ($this->session->flashdata("login_errors"));
    }  ?>
    <div class="col-lg-6">
    <h4>Signin</h4><br>
<form class="form-inline" action="/mains/login_user" method="post">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
  </div><br>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="Password">
  </div><br>
  <button type="submit" class="btn col-xs-offset-2 btn-success">Sign in</button>
</form>
</div>
</div>
</body>
</html>