<h1> {{ $modo }} empleado </h1>

@if(count($errors)>0)

    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $error )
            <li>{{ $error }}</li>
             @endforeach
        </ul>
    </div>
    
    

@endif

<div class="form-group">

<label for="nombre">Nombre</label>
<input class="form-control" type="text" name="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">
<br>

</div>

<div class="form-group">

<label for="ApellidoPaterno">Apellido Paterno</label>
<input class="form-control" type="text" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">
<br>  
</div>

<div class="form-group">


<label for="ApellidoMaterno">Apellido Materno</label>
<input class="form-control" type="text" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}" id="ApellidoPaterno">
<br>
</div>

<div class="form-group">

<label for="Correo">Correo</label>
<input class="form-control" type="text" name="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}" id="Correo"> 
<br>
</div>

<div class="form-group">

<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
<img src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
@endif
<input class="form-control" type="file" name="Foto" value="" id="Foto">    
</div>

<a class="btn btn-primary" href="{{ url('empleado/create') }}">Regresar</a>

<br>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos" >
<br>