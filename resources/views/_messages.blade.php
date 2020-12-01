@if($errors->any())
    <div class="alert alert-danger alert-block w-50 mr-auto ml-auto text-center">
        <strong>{{ $errors->first() }}</strong>
    </div>
@endif
