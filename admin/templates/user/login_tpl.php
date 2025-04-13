<div class="login-view-website text-sm"><a href="../" target="_blank" title="Xem website"><i class="fas fa-reply mr-2"></i>Xem website</a></div>
<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100">
      <p class="login-icon1 mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="239" height="234" viewBox="0 0 239 234" fill="none">
          <rect x="88.5605" y="0.700195" width="149" height="149" rx="19.5" stroke="#7367F0" stroke-opacity="0.16" />
          <rect x="0.621094" y="33.761" width="200" height="200" rx="10" fill="#7367F0" fill-opacity="0.08" />
        </svg>
      </p>
      <p class="login-icon2 mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="181" height="181" viewBox="0 0 181 181" fill="none">
          <rect x="1.30469" y="1.44312" width="178" height="178" rx="19" stroke="#7367F0" stroke-opacity="0.16" stroke-width="2" stroke-dasharray="8 8" />
          <rect x="22.8047" y="22.9431" width="135" height="135" rx="10" fill="#7367F0" fill-opacity="0.08" />
        </svg>
      </p>
      <form class="login100-form">
        <span class="login100-form-title"> HỆ THỐNG QUẢN TRỊ </span>
        <span class="login100-form-subtitle">Vui lòng đăng nhập vào tài khoản của bạn !</span>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="username" id="username" placeholder="Tài khoản *" />
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa-solid fa-user" aria-hidden="true"></i>
          </span>
        </div>
        <div class="wrap-input100 validate-input">
          <input class="input100" type="password" id="password" name="password" placeholder="Mật khẩu *" />
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <i class="fa-solid fa-eye eye-css s-password"></i>
        </div>
        <div class="container-login100-form-btn">
          <button type="button" class="btn-login general-button login100-form-btn">
            Đăng nhập
          </button>
        </div>
        <div class="alert my-alert alert-login d-none text-center text-sm p-2 mb-0 mt-2" role="alert"></div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  const _spassword = document.querySelector('.s-password');
  const password = document.getElementById('password');
  if (_spassword) {
    _spassword.addEventListener('click', function(e) {
      if (password.getAttribute('type') == 'password') {
        password.setAttribute('type', 'text');
      } else {
        password.setAttribute('type', 'password');
      }
      e.currentTarget.classList.toggle('fa-eye-slash');
    });
  }
</script>
<div class="login-copyright text-sm text-dark">Designed by <a class="text-danger" href="#" target="_blank" title="dolamthanhphat@gmail.com"><strong>dolamthanhphat@gmail.com</strong></a></div>