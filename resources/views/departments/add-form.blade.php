<form action="{{ route('ajax.department.add') }}" method="POST" class="form-department">
    {{ csrf_field() }}

    <div class="form-group" data-input="name">
        <label for="name">Name</label>
        <input name="name" id="name" type="text" class="form-control" placeholder="E.g Max Bert">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="phone">
        <label for="phone">Phone</label>
        <input name="phone" id="phone" type="text" class="form-control" placeholder="E.g 0123456789">
        <div class="errors"></div>
    </div>

    <div class="form-group" data-input="manager_id">
        <label for="manager_id">Manager</label>
        <select name="manager_id" id="manager_id" class="form-control">
            <option value="">Choose a manager</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <div class="errors"></div>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" id="addDepartment">Add new</button>
    </div>
</form>