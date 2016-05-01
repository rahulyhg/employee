<form action="{{ $form['url'] }}" method="{{ $form['method'] }}" class="form-employee" enctype="multipart/form-data">
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

    <div class="form-group" data-input="phone">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" value="{{ $form['defaults']['phone'] }}" placeholder="Phone">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="job">
        <label for="job">Job title</label>
        <input name="job" id="job" type="text" class="form-control" value="{{ $form['defaults']['job'] }}" placeholder="Job title">
        <div class="errors help-block"></div>
    </div>

    <div class="form-group" data-input="department_id">
        <label for="department_id">Department</label>
        <select name="department_id" id="department_id" class="form-control">
            <option value="">Choose a department</option>
            @foreach($departments as $index => $department)
                <option value="{{ $department->id }}" {{ ($department->id == $form['defaults']['department_id']) ? 'selected="selected"': '' }}>{{ $department->name }}</option>
            @endforeach
        </select>
        <div class="errors help-block"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addEmployee">{{ $form['button'] }}</button>
        <div class="notify-success text-success">Create success!</div>
    </div>
</form>