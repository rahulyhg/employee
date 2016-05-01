<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-department">
    {{ csrf_field() }}

    <div class="form-group" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ $form['defaults']['name'] }}" placeholder="Name">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="phone">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" value="{{ $form['defaults']['phone'] }}" placeholder="Phone">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="manager_id">
        <label for="manager_id">Manager</label>
        <select name="manager_id" id="manager_id" class="form-control">
            <option value="">Choose a manager</option>
            @foreach($employees as $index => $employee)
                <option value="{{ $employee->id }}" {{ ($employee->id == $form['defaults']['manager_id']) ? 'selected="selected"': '' }}>{{ $employee->name }} &lt;{{ $employee->email }}&gt;</option>
            @endforeach
        </select>
        <div class="errors help-block"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addDepartment">{{ $form['button'] }}</button>
        <div class="notify-success text-success">Create success!</div>
    </div>
</form>