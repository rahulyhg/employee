<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-department" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group{!! ($errors->has('name')) ? ' has-errors' : '' !!}" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" value="{{ old('name', $form['defaults']['name']) }}" placeholder="Name">
        <div class="errors help-block">{{ ($errors->has('name') ? $errors->first('name') : '') }}</div>
    </div>

    <div class="form-group{!! ($errors->has('phone')) ? ' has-errors' : '' !!}" data-input="phone">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" value="{{ old('phone', $form['defaults']['phone']) }}" placeholder="Phone">
        <div class="errors help-block">{{ ($errors->has('phone') ? $errors->first('phone') : '') }}</div>
    </div>

    <div class="form-group" data-input="cover">
        <label for="cover">Cover</label>
        <input name="cover" id="cover" type="file" class="form-control">
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
        <button class="btn btn-primary" type="submit" id="editDepartment">{{ $form['button'] }}</button>
    </div>
</form>