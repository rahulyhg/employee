<div class="notifications">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if (isset($errors) && count($errors->all()) > 0)
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">×</a>
                        Please check the form below for errors
                    </div>
                @endif
                @if (!empty( Session::get('success')))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
