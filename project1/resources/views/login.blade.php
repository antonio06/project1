<html>
<head>
  <title>Proyect 1</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/libs/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="panel panel-info">
      <div class="panel-heading text-center">
        <h1>Login Persons project</h1>
      </div>
      <form class="form-inline center" style="margin: 0 auto; width: 80%;" action="/login" method="POST">
        <div class="form-group">
          <label for="InputEmail1">Email address</label>
          <input name="email" type="email" class="form-control" id="InputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="InputPassword1">Password</label>
          <input name="password" type="password" class="form-control" id="InputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        {{csrf_field()}}
      </form>
    </div>
</body>
</html>