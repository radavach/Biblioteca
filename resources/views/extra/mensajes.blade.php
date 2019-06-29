@if(Session::has('mensaje'))
    <div class="alert {{ Session::pull('alert-class', 'alert-info') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ Session::pull('mensaje') }}
    </div>
@endif