<section class="login-wrapper">
  <div class="container">
    <div class="form-container">
      <!-- start of login form -->
      <div class="login-form">
        <form class="form-group login-group">
          <h2 class="title">Login</h2>
          <div class="input-field">
            <input type="email" class="input" placeholder=" " />
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
          <a href="#" class="forgot-pass">Forgot Password?</a>
          <button type="submit" class="login">Login</button>
        </form>
      </div>
      <!-- end of login form -->
      <!-- start of panels -->
      <div class="panel">
        <div class="content">
          <h3 class="panel-title">Get Started</h3>
          <p class="panel-text">
            <span>Enter your personal details and start</span>
            <span>journey with us</span>
          </p>
          <a href="/register" class="btn outline-light-btn">Sign Up</a>
        </div>
        <img class="illustration" src="<?= asset('sign-up.svg') ?>" alt="Sign Up Illustration" />
      </div>
      <!-- end of panels -->
    </div>
  </div>
</section>