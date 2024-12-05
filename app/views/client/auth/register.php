<section class="signup-wrapper">
  <div class="container">
    <div class="form-container">
      <!-- start of panels -->
      <div class="panel signup-panel">
        <div class="content">
          <h3 class="panel-title">Welcome Back!</h3>
          <p class="panel-text">
            <span>To keep connected with us</span>
            <span>please login with your personal info</span>
          </p>
          <a href="/login" class="btn outline-light-btn">Login</a>
        </div>
        <img class="illustration" src="<?= asset('login.svg') ?>" alt="Login Illustration" />
      </div>
      <!-- end of panels -->
      <!-- start of sign up form -->
      <div class="signup-form">
        <form action="/register" method="POST" class="form-group">
          <h2 class="title">Create Account</h2>
          <div class="input-field">
            <input type="text" id="first-name" name="first_name" placeholder=" " class="input" />
            <label for="first-name" class="form-label">First Name</label>
          </div>
          <div class="input-field">
            <input type="text" id="last-name" name="last_name" placeholder=" " class="input" />
            <label for="last-name" class="form-label">Last Name</label>
          </div>
          <div class="input-field">
            <input type="email" id="email" name="email" placeholder=" " class="input" />
            <label for="email" class="form-label">Email Address</label>
          </div>
          <div class="input-field">
            <input type="password" id="password" name="password" class="input password" placeholder=" " />
            <label for="password" class="form-label">Password</label>
            <button type="button" class="show-password login-eye-btn invisible">
              <span class="iconify show-pass" data-icon="ant-design:eye-invisible-outlined" data-inline="false" />
            </button>
            <button type="button" class="show-password login-eye-btn visible" style="display:none;">
              <span class="iconify show-pass" data-icon="ant-design:eye-outlined" data-inline="false" />
            </button>
          </div>
          <div class="input-field">
            <input type="password" id="confirm-password" name="confirm_password" class="input password" placeholder=" " />
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <button type="button" class="show-password login-eye-btn invisible">
              <span class="iconify show-pass" data-icon="ant-design:eye-invisible-outlined" data-inline="false" />
            </button>
            <button type="button" class="show-password login-eye-btn visible" style="display:none;">
              <span class="iconify show-pass" data-icon="ant-design:eye-outlined" data-inline="false" />
            </button>
          </div>
          <button type="submit" class="signup">Sign Up</button>
          <p class="agreement-text">
            <span>By clicking on Sign Up, you agree to</span>
            <span><a href="#">terms & condition</a></span>
            <span>and</span>
            <span><a href="#">privacy policy</a>.</span>
          </p>
        </form>
      </div>
    </div>
  </div>
  <!-- end of sign up form -->
</section>