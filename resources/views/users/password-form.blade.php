<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-password">
    {{ csrf_field() }}

    <div class="form-group{!! ($errors->has('password')) ? ' has-errors' : '' !!}" data-input="password">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" value="{{ $form['defaults']['password'] }}" placeholder="Password">
        <div class="errors help-block">{{ ($errors->has('password') ? $errors->first('password') : '') }}</div>
    </div>

    <div class="form-group{!! ($errors->has('password_confirmation')) ? ' has-errors' : '' !!}" data-input="password_confirmation">
        <label for="password_confirmation">Retype password</label>
        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" value="{{ $form['defaults']['password_confirmation'] }}" placeholder="Retype password">
        <div class="errors help-block">{{ ($errors->has('password_confirmation') ? $errors->first('password_confirmation') : '') }}</div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="changePassword">{{ $form['button'] }}</button>
    </div>
</form>