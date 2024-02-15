<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
        <div class="container"><h2 class="font-semibold text-gray-600">Estimado(a), la siguiente solicitud se ha generado desde Sistema de Gestión Virtual</h2></div>
      </div>
    <div class="container">
      <div class="container"><h3 class="font-semibold text-gray-600">Nombre: {{$contacto['name']}}</h3></div>
      <div class="container"><h3 class="font-semibold text-gray-600">Correo: {{$contacto['email']}}</h3></div>
      <div class="container"><h3 class="font-semibold text-gray-600">Mensaje: {{$contacto['mensaje']}}</h3></div>
    </div>
    <section style="background-image: url({{asset('images/homes/barra-verde.png')}})" >
        <footer class="text-gray-600 body-font">
            <div class="container flex flex-col items-center px-5 py-8 mx-auto sm:flex-row">
              <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">

                <img  class="block w-auto h-9" src={{asset('images/logos/icono4.png')}}>
              </a>
              <p class="mt-4 text-sm text-white sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">© 2021 Universidad Católica de Cuyo

              </p>

            </div>
          </footer>

    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
