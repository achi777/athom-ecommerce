<div class="account-login section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
            <form class="card login-form" method="post">
              <div class="card-body">
                <div class="title">
                  <h3>{{$response}}</h3>
                  <p>please enter new password.</p>
                </div>
                <div class="form-group input-group">
                  <label for="reg-fn">password</label>
                  <input class="form-control" type="password" name="password" id="reg-pass" required>
                </div>
                <div class="form-group input-group">
                  <label for="reg-fn">Password</label>
                  <input class="form-control" type="password" name="rpassword" id="reg-pass" required>
                </div>
                <div class="button">
                  <button class="btn" type="submit">Creste new Password</button>
                </div>
                <p class="outer-link">Don't have an account? <a href="{{baseurl}}/register">Register here </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
