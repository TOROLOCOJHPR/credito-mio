<?php $titulo = "credito-mio"?>
<!DOCTYPE html>
<html lang="es">
<?php include "include/header.php"?>
<body>
    <?php include "mod/header.php"?>
    <div class="row mx-0 mh-100">
        <div class="bg-cover col-12 col-lg-5 px-0"  style="background-image:url('/img/fondo.jpg');min-height:400px;box-shadow: 1px 0px 10px black ;">
            <div class="capa w-100 h-100 d-flex justify-content-center align-items-center"> 
                <div class="text-white t-shadow-2 text-center pt-5">
                    <!-- <h1>Credito Mio</h1>-->
                    <p class="p-4 p-md-2 fs-1-5" style="color:white">
                        Para recibir una atención personalizada tienes la opción de llenar
                        este sencillo formulario, con el cual se nos facilitara darte un mejor
                        servicio y mucho más rápido. En Crédito Mío hacemos uso de tus datos solo 
                        para poder atenderte de una mejor manera
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <div id="error" class="hide w-100 text-white text-center bg-danger py-3">error</div>
            <form id="form" class="form-row  mx-0 w-100 p-2 p-md-5">
                <div class="form-group col-12 mx-auto">
                    <label>Nombre Completo</label>
                    <input class="form-control" type="text" name="nombre" value="" placeholder="Nombre completo" required>
                </div>
                <div class="form-group col-12 col-md-4 mx-auto">
                    <label>Teléfono</label>                
                    <input class="form-control" type="text" name="tel" value="" placeholder="Teléfono" required>
                </div>
                <div class="form-group col-12 col-md-8">
                    <label>Email</label>                
                    <input class="form-control" type="email" name="email" value="" placeholder="Correo electronico" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label>Código postal</label>                
                    <input class="form-control" type="text" name="cp" value="" placeholder="Código postal" required>
                </div>
                <div class="form-group col-12 col-md-8">
                    <label>Selecciona un rango de edad</label>                
                    <select class="form-control" name="edad" required>
                        <option class="text-muted" value="" selected>Selecciona una opción</option>
                        <option value="18-25">18-25 años</option>
                        <option value="26-35">26-35 años</option>
                        <option value="36-45">36-45 años</option>
                        <option value="46-55">46-55 años</option>
                        <option value="56++">56 años en adelante</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Actividad economica</label>                                
                    <select class="form-control" name="economia" required>
                        <option class="text-muted" value="" selected>Selecciona una opción</option>                    
                        <option value="1">Asalariado</option>
                        <option value="2">Empresarial</option>
                        <option value="3">Economía informal</option>
                        <option value="4">Ventas</option>
                        <option value="56++">Otro</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label>Ingresos mensuales</label>                                
                    <select class="form-control" name="ingresos" required>
                        <option class="text-muted" value="" selected>Selecciona una opción</option>                    
                        <option value="1">1,000 a 5,000</option>
                        <option value="2">5,000 a 10,000</option>
                        <option value="3">10,000 a 15,000</option>
                        <option value="4">+15,000</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-12">
                    <label>Rango de préstamo deseado</label>                                
                    <select class="form-control" name="prestamo" required>
                        <option class="text-muted" value="" selected>Selecciona una opción</option>                    
                        <option value="1">3,000 a 6,000</option>
                        <option value="2"> 6,000 a 8,000</option>
                        <option value="3">8,000 a 10,000</option>
                    </select>
                </div>
                <div class="row mx-0 w-100">
                    <input class="btn ml-auto text-white" style="background-color:#0489B1" type="submit" value="enviar">                
                </div>
            </form>
        </div>
    </div>
    <div id="bio"></div>
    <?php include "mod/footer.php"; include "include/jsFiles.php"?>
    <script>
        let form = document.getElementById('form');
        form.addEventListener('submit',(ev) =>{
            http_request = (window.XMLHttpRequest)? new XMLHttpRequest(): new ActiveXObject('Microsoft.XMLHTTP'); 
            http_request.open('POST','/include/ajax.php', true);
            let formulario = new FormData(form);
            http_request.overrideMimeType('text/plain');
            http_request.onreadystatechange = function(){
                if (http_request.readyState == 4) {//el servidor respondio
                    let bio = document.getElementById('bio');
                    if (http_request.status == 200) {//el cliente termino
                        bio.innerHTML = http_request.responseText;
                    } else {//ocurrio un error en el cliente
                        alert('Hubo problemas con la petición.');
                    }
                }
            }
            http_request.send(formulario);      
            hideShow();
            ev.preventDefault();
        });
        function hideShow(){
            let e = document.getElementById('error');
            if(e.classList.contains('hide')){
                e.classList.remove('hide');
                e.classList.add('show');
            }else{
                e.classList.remove('show');
                e.classList.add('hide');
            }
        }
    </script>
</body>
</html>