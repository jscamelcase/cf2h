<?php loadPartial("head") ?>

<body class="d-flex justify-content-center align-items-center" style='height: 100vh'>
  <div class="container d-flex justify-content-center align-items-center">
    <div class="row">
      <div class="col-lg-12">
        <img class="mx-auto d-block text-center" src="../images/rectangle-logo.png" alt="CF2H Logo">
        <h2 class="text-center">Client Login</h2>
        <?= loadPartial('errors', [
          'errors' => $errors ?? []
        ]) ?>
        <form class="form-horizontal mx-auto" action="/auth/login" method="post">
          <div class="card p-3">
            <div class="form-group">
              <label for="email-input" class="col-form-label">Email Address</label>
              <input type="email" class="form-control" name="email" id="email-input" placeholder="xxx@xxx.com" required>
            </div>
            <div class="form-group mb-3">
              <label for="password-input" class="col-form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password-input" placeholder="Password" requried>
            </div>
            <button class="btn btn-m btn-secondary" type="submit">Log In</button>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

</body>

</html>