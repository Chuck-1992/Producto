<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>PÁGINA PRINCIPAL</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
        <!-- Styles -->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar nuevo producto
                    </button>
                </div>
            </div>
        </nav>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- formulario de registro-->
                        <form class="form_global" action="{{url('nuevo')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- input para subir la imagen-->
                            <h5 class="text-left mt-3" id="form-detail"><i class="fa fa-asterisk obligatorio mr-2"></i> Cargar imagen</h5>
                            <div id="form-add">
                                <div class="input__row uploader">
                                    <div id="inputval_about" class="input-value"></div>
                                    <label for="file_about"><i class="fa fa-image" title="Seleccionar imagen"></i></label>
                                    <input accept="image/jpeg,image/png" multiple type="file" name="imagen" id="file_about" value="" class="form-control upload" />
                                </div>
                            </div>
                            <div class="alerta">
                                @error('imagen')
                                <span class="mensaje_error"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <!-- input para subir la imagen-->

                            <!-- input descripción-->
                            <div class="form-group mt-4">
                                <label for="nombre"><i class="fa fa-asterisk obligatorio mr-2"></i> Nombre</label>
                                <input class="form-control" id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" />
                            </div>
                            <div class="alerta">
                                @error('nombre')
                                <span class="mensaje_error"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <!-- input descripción-->

                            <!-- input descripción-->
                            <div class="form-group">
                                <label for="descripcion"><i class="fa fa-asterisk obligatorio mr-2"></i> Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" />
                            </div>
                            <div class="alerta">
                                @error('descripcion')
                                <span class="mensaje_error"><strong>{{$message}}</strong></span>
                                @enderror
                            </div>
                            <!-- input descripción-->

                            <!-- button submit -->
                            <div class="button-form mt-4">
                                <button id="eliminar_btn_agr" type="submit" class="btn btn-primary mt-0">Agregar registro</button>
                            </div>
                            <br />
                            <!-- button submit -->
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
        
        <div class="container d-flex justify-content-center mr-auto">
            @foreach ($producto as $item)
                
             <!-- formulario de registro-->
             <form class="w-50 mt-5" action="{{url('actualizar/registro')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                         <!-- imagen actual-->
            <h5 class="text-center mb-3" id="form-detail">Imagen actual</h5>
            <div class="form-actual d-flex justify-content-center">
            <img width="100" height="100" src="{{ asset('storage').'/'.$item->image}}" id="img-section" alt="">
            </div>
            <!-- imagen actual-->

                <input type="hidden" name="id" value={{$item->id}}>
        
                <input class="form-control" id="reemplazo" type="hidden" value="{{$item->image}}">
                
                <!-- input para subir la imagen-->
                <h5 class="text-left mt-3" id="form-detail"><i class="fa fa-asterisk obligatorio mr-2"></i> Cargar imagen</h5>
                <div id="form-add">
                    <div class="input__row uploader">
                        <div id="inputval_about" class="input-value"></div>
                        <label for="file_about"><i class="fa fa-image" title="Seleccionar imagen"></i></label>
                        <input accept="image/jpeg,image/png" multiple type="file" name="imagen" id="file" value={{$item->image}} class="form-control upload" />
                    </div>
                </div>
                <div class="alerta">
                    @error('imagen')
                    <span class="mensaje_error text-muted text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <!-- input para subir la imagen-->

                <!-- input descripción-->
                <div class="form-group mt-4">
                    <label for="nombre"><i class="fa fa-asterisk obligatorio mr-2"></i> Nombre</label>
                    <input class="form-control" id="nombre" name="nombre" type="text"  value={{$item->name}} />
                </div>
                <div class="alerta">
                    @error('nombre')
                    <span class="mensaje_error text-muted text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <!-- input descripción-->

                <!-- input descripción-->
                <div class="form-group">
                    <label for="descripcion"><i class="fa fa-asterisk obligatorio mr-2"></i> Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value={{$item->description}} />
                </div>
                <div class="alerta">
                    @error('descripcion')
                    <span class="mensaje_error text-muted text-danger"><strong>{{$message}}</strong></span>
                    @enderror
                </div>
                <!-- input descripción-->

                <!-- button submit -->
                <div class="button-form mt-4">
                    <button id="eliminar_btn_agr" type="submit" class="btn btn-primary mt-0">Actualizar registro</button>
                </div>
                <br />
                <!-- button submit -->
            </form>
            @endforeach
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {

            
            $("#file").removeAttr("name");

                $('#file').on('change',function(){
                    $("#reemplazo").removeAttr("name");
                    $("#file").attr("name","imagen");
                    $('#reemplazo').text( $(this).val());

                });
    
            });
        </script>
    
    </body>
</html>