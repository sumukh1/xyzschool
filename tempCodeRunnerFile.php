<?php
<html>
    <head>
        <title>XYZ PUBLIC SCHOOL</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body><font color="green">
        <br>
    <div class="container">
  <h1 align="center"><span class="badge bg-secondary">XYZ PUBLIC SCHOOL</span></h1>
</div>
    <div class="container mt-3">
  <h2>Student Login</h2>
  <form method="POST">
    <div class="mb-3 mt-3">
      <label for="email">Student ID/Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="id">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary" name="B2"> Login </button><br><br>
    <button type="submit" class="btn btn-primary" name="B1"> Home </button> 
    <button type="submit" class="btn btn-primary" name="B3"> New user? </button>
  </form>
</div>

                
</body>
</html>