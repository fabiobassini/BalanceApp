<div class="row h-100 justify-content-center">
  <div class="col-6 my-auto">


    <form action="index.php?action=process_login" method="post">
      <h1 class="h3 mb-3 fw-normal">Per favore accedi.</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="user" placeholder="admin">
        <label for="floatingInput">Nome utente</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <input class="w-100 btn btn-lg btn-primary" type="submit" value="Log in">

    </form>

  </div>
</div>