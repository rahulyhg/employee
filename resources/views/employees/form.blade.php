<form action="{{ route('employee.add') }}">
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" placeholder="Name">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" id="email" type="email" class="form-control" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone">
    </div>

    <div class="form-group">
        <label for="job">Job title</label>
        <input name="job" id="job" type="text" class="form-control" placeholder="Job title">
    </div>

    <div class="form-group">
        <label for="department_id">Department</label>
        <select name="department_id" id="department_id" class="form-control">
            @foreach($departments as $index => $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>
</form>