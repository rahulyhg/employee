<form action="{{ route('ajax.employee.add') }}" method="POST" class="form-employee">
    {{ csrf_field() }}

    <div class="form-group" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" placeholder="Name">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="email">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="phone">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="job">
        <label for="job">Job title</label>
        <input name="job" id="job" type="text" class="form-control" placeholder="Job title">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="department_id">
        <label for="department_id">Department</label>
        <select name="department_id" id="department_id" class="form-control">
            @foreach($departments as $index => $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
        <div class="errors"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addEmployee">Add new</button>
    </div>
</form>