<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>

  <form action="{{ route('register.store') }}" method="POST">
    @csrf
    <input type="text" name="username">
    <input type="password" name="password">

    <button type="submit">Login</button>
  </form>

  <a href="/">kembali login</a>

</body>
</html>