@section('comentariosEstilos')
    

<style>
    .body-comentario{
    margin-top:20px;
    background:#eee;
}
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}
    /* Estilos personalizados para reducir el ancho del formulario */
    .smaller-form {
        max-width: 700px; /* Define el ancho máximo del formulario */
        margin: 0 auto; /* Centra el formulario en el contenedor */
    }

    .smaller-input {
        width: 100%; /* Para que los campos de entrada ocupen todo el ancho */
    }

    .smaller-button {
        width: auto; /* Ajusta el ancho del botón al contenido */
    }
    /* Estilos personalizados para centrar el título con el formulario */
    .centered-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
</style>

<ul>
    <br><br><br><br><br>
{{-- PRUEBA DE BARRA DE FILTRACION --}}
       <div class="container">
        <h1 class="text-center mt-4">Búsqueda de motivos</h1>
        <hr>
        <div class="d-md-flex justify-content-center">
            <form action="{{ route('comentarios.home') }}" method="GET" class="text-center">
                <div class="form-group">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar..." />
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div>
            </form>
        </div>
    </div>
{{-- FINAL PRUEBA DE BARRA DE FILTRACION --}}

    @foreach ($comentarios as $comentario)
<div class="container ">
<div class="row">
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h3 class="h3 g-color-gray-dark-v1 mb-0">{{ $comentario->name }}</h3>

            <br>
                <h5 class="h5 g-color-gray-dark-v1 mb-0">Motivo de la consulta: {{$comentario->motivo}}</h5>
                <br>
                <span class="g-color-gray-dark-v4 g-font-size-12">{{$comentario->created_at}}</span>
              </div>
        
              <p> {{$comentario->descripcion}}</p>
        
              <ul class="list-inline d-sm-flex my-0">
                <li class="list-inline-item ml-auto">
                  <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#">
                    <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                    Responder</a>
                    
                </li>
                <li>
                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{route('comentarios.show', $comentario->id)}}">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        Mas informacion</a>
                </li>
              </ul>
            </div>
            
        </div>
    </div>
</div>
</div>
@endforeach
</ul>
{{ $comentarios->links() }}
</div>

{{-- ACA VAMOS A HACER EL GENERAR UN COMENTARIO NUEVO. --}}
{{-- ACA VAMOS A HACER EL GENERAR UN COMENTARIO NUEVO. --}}

<div role="main" class="main">
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">
                    <div class="post-block mt-3 post-leave-comment">
                        <div class="centered-form">
                            <h4 class="mb-3">Deja un comentario</h4>
                            <form class="contact-form p-2 rounded bg-color-grey smaller-form" action="{{ route('comentarios.generar') }}" method="POST">
                                @csrf
                                <div class="p-2">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-12">
                                        <label class="form-label required font-weight-bold text-dark">Nombre Completo</label>
                                        <input placeholder="Ingrese su Nombre" type="text" name="name" data-msg-required="Please enter your name." maxlength="100" class="form-control smaller-input" name="name" required>
                                    </div>
                                    <div class="form-group col-lg-6 col-12">
                                        <label class="form-label required font-weight-bold text-dark">Correo Electronico</label>
                                        <input placeholder="Email" type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control smaller-input" name="email" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Selecciona el motivo:</label>
                                        <select name="motivo" class="form-select smaller-input" required>
                                            <option value="" disabled selected hidden>Selecciona un motivo</option>
                                            <option value="Comentario">Comentario</option>
                                            <option value="Queja">Queja</option>
                                            <option value="Solicitud de ayuda">Necesito Ayuda</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="form-label required font-weight-bold text-dark">Comentario</label>
                                        <textarea maxlength="1000" data-msg-required="Please enter your message." rows="6" class="form-control smaller-input" name="descripcion" required></textarea>
                                    </div>
                                    <div class="form-group col-12 mb-0 text-center">
                                        <input type="submit" class="btn btn-primary btn-modern smaller-button" data-loading-text="Loading">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection