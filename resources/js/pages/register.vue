<template>

  <form class="form-signin">
    <img class="mb-4" src="https://w7.pngwing.com/pngs/628/224/png-transparent-bootstrap-plain-wordmark-logo-icon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPassword" class="sr-only">Confirm Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2022</p>
  </form>
</template>