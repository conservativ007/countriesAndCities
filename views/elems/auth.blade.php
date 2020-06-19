<div class="auth">
  @if(isset($key) && $key == false)
  <span class="register">
    <a href="http://laraveltwo/register">register</a>
  </span>
  <span class="login">
    <a href="http://laraveltwo/login">login</a>
  </span>
  @else
  <span>
    <a href="http://laraveltwo/logout">logout</a>
  </span>
  @endif
</div>
