@if ($department->cover)
    <img class="img-responsive center-block" src="{{ $department->get_url_featured() }}" alt="{{ $department->cover->get_name() }}" title="{{ $department->name }}">
@endif