<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-password">
    {{ csrf_field() }}

    <div class="form-group" data-input="password">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" value="{{ $form['defaults']['password'] }}" placeholder="Password">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="confirm_password">
        <label for="confirm_password">Email</label>
        <input name="confirm_password" id="confirm_password" type="password" class="form-control" value="{{ $form['defaults']['confirm_password'] }}" placeholder="Retype password">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addUser">{{ $form['button'] }}</button>
    </div>
</form>