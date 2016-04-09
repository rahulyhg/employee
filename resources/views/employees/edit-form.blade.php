<form action="{{ route('ajax.employee.edit') }}" method="POST" class="form-employee-edit">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" placeholder="Name" value="{{ $employee->name }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" class="form-control" placeholder="Email" value="{{ $employee->email }}">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone" value="{{ $employee->phone }}">
    </div>

    <div class="form-group">
        <label for="job">Job title</label>
        <input name="job" id="job" type="text" class="form-control" placeholder="Job title" value="{{ $employee->job }}">
    </div>

    <div class="form-group">
        <label for="department_id">Department</label>
        <select name="department_id" id="department_id" class="form-control">
            @foreach($departments as $index => $department)
                <option value="{{ $department->id }}" {!! ($employee->department->id == $department->id) ? 'selected="selected"' : '' !!}>{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="updateEmployee">Update</button>
    </div>
</form>