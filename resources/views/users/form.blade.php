<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-user">
    {{ csrf_field() }}

    <div class="form-group" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ $form['defaults']['name'] }}" placeholder="Name">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="email">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" class="form-control" value="{{ $form['defaults']['email'] }}" placeholder="Email">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addUser">{{ $form['button'] }}</button>
    </div>
</form>