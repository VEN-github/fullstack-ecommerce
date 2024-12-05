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
        <form class="form-group">
          <h2 class="title">Create Account</h2>
          <div class="input-field">
            <input type="text" placeholder=" " class="input" />
            <label class="form-label">First Name</label>
          </div>
          <div class="input-field">
            <input type="text" placeholder=" " class="input" />
            <label class="form-label">Last Name</label>
          </div>
          <div class="input-field">
            <input type="email" placeholder=" " class="input" />
            <label class="form-label">Email Address</label>
          </div>
          <div class="input-field">
            <input type="password" class="input password" placeholder=" " />
            <label class="form-label">Password</label>
            <button type="button" class="show-password login-eye-btn invisible">
              <span class="iconify show-pass" data-icon="ant-design:eye-invisible-outlined" data-inline="false" />
            </button>
            <button type="button" class="show-password login-eye-btn visible" style="display:none;">
              <span class="iconify show-pass" data-icon="ant-design:eye-outlined" data-inline="false" />
            </button>
          </div>
          <div class="input-field">
            <input type="password" class="input password" placeholder=" " />
            <label class="form-label">Confirm Password</label>
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