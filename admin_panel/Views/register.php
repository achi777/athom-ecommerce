    <div class="account-login section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
            <div class="register-form">
              <div class="title">
                <h3>{{$response}}</h3>
                <p>Registration takes less than a minute but gives you full control over your orders.</p>
              </div>
              <form class="row" method="post">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-fn">First Name</label>
                    <input class="form-control" type="text" name="firstname" id="reg-fn" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-ln">Last Name</label>
                    <input class="form-control" type="text" name="lastname" id="reg-ln" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-email">E-mail Address</label>
                    <input class="form-control" type="email" name="email" id="reg-email" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-phone">Phone Number</label>
                    <input class="form-control" type="text" name="phone" id="reg-phone" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-pass">Password</label>
                    <input class="form-control" type="password" name="password" id="reg-pass" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-pass-confirm">Confirm Password</label>
                    <input class="form-control" type="password" name="rpassword" id="reg-pass-confirm" required>
                  </div>
                </div>
                <div class="button">
                  <button class="btn" type="submit">Register</button>
                </div>
                <p class="outer-link">Already have an account? <a href="{{baseurl}}/login">Login Now</a>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>