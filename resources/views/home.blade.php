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

        <section class="mt-5">
            <div class="setion-detail mt-5">
                <h1 class="text-center">Productos en venta</h1>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($producto as $item)

                    <div class="col-md-4 col-sm-4 mt-3">
                        <div class="card" style="width: 100%;">
                            <img class="card-img-top" src="{{ asset('storage').'/'.$item->image}}" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>
                                <p class="card-text">{{$item->description}}</p>
                                <a href="{{ url('actualizar/'.$item->id) }}" class="btn btn-primary">Editar</a>
                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$item->id}})"              
                                    data-target="#DeleteModal" id="eliminar_btn" class="btn btn-danger mt-0">Eliminar</a>
                                    <!-- boton para eliminar registro-->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <!-- modal para confirmar borrar-->
    <div id="DeleteModal" class="modal fade text-info" role="dialog">
        <div class="modal-dialog ">
          <!-- contenido modal-->
          <form action="" id="deleteForm" method="post">
              <div class="modal-content">
                  <div class="modal-header bg-primary">
                      <h4 class="modal-title text-center mr-5">CONFIRMACIÓN DE ACCION</h4>
                  </div>
                  <div class="modal-body">
                      @csrf
                      @method('DELETE')
                      <p class="text-center" style="font-size: 20px">&iquest;Deseas borrar permanentemente este elemento ?</p>
                  </div>
                  <div class="modal-footer">
                      <center>
                          <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                          <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, Borrar</button>
                      </center>
                  </div>
              </div>
          </form>
          <!-- contenido modal-->
        </div>
       </div>
    <!-- modal para confirmar borrar-->



        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    <script>
            function deleteData(id)
    {
        var id = id;
        var url = "{{ url('borrar')}}" + '/' + id;
        
        $("#deleteForm").attr('action', url);
    }
    
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
    </script>
    </body>
</html>
