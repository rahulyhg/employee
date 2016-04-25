<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-profile">
    {{ csrf_field() }}

    <div class="form-group{!! ($errors->has('password')) ? ' has-errors' : '' !!}" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ $form['defaults']['name'] }}" placeholder="Name">
        <div class="errors help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</div>
    </div>

    <div class="form-group" data-input="email">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" class="form-control" value="{{ $form['defaults']['email'] }}" disabled="disabled" placeholder="Email">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="editProfile">{{ $form['button'] }}</button>
    </div>
</form>