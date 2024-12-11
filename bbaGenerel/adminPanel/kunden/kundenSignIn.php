<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Kunden Page</a>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div align="center" style="margin-top: 100px; background-color: grey;">
<h1 align="center">Kunden Anmeldung</h1>
  <form action="../pswControl/userPswControl/userLogin.php" method="POST">
<table align="center">
<tr>
<td>Benutzer Name</td>
<td>:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Sign in"></td>
</tr>
</table>
</div>
</form>



<div align="center" style="margin-top: 100px;  background-color: yellow;">
<h1 align="center">Kunden Admin Panel</h1>
  <form action="../pswControl/adminPswControl/adminLogin.php" method="POST">
<table align="center">
<tr>
<td>Admin Benutzer Name</td>
<td>:</td>
<td><input type="text" name="username"></td>
</tr>
<tr>
<td>Admin Password</td>
<td>:</td>
<td><input type="password" name="password"></td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" value="Sign in"></td>
</tr>
</table>
</form>
</div>


</body>
</html>