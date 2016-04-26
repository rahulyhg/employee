<h2>Verify Your Email Address</h2>

<div class="content">
    <p>Your account was created!</p><br>
    Account: {{ $user->email }}<br>
    Password: {{ $password }}<br>
    Link login: <a href="{{ url('login') }}">{{ url('login') }}</a><br>
    <p>After login, you should change your password.</p>
</div>
<div style="color: #666;margin-top: 50px;">
    <div style="width: 200px; height: 1px; background-color: #eee;margin-bottom: 20px;"></div>
    Regards,<br>
    UET Fries
</div>