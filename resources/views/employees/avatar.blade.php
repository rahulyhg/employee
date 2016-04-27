@if ($employee->avatar)
    <img class="img-responsive" src="{{ $employee->avatar->get_url() }}" alt="{{ $employee->avatar->get_name() }}">
@endif