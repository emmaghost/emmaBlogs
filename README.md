
## Blog Emmanuel Ortega

El sistema es un crud para dar de alta nuevos Artículos y poder dar los comentarios sobre los mismo.

## Cuenta con rutas para podr consumir como api, en ese caso pongo el ejemplo de crear mediante postman un comentario

Para consultar los articulos que se tienen en la base de datos existe mediante la api varias rutas como son:
- http://127.0.0.1:8000/api/articulos/Todos -- Traera todos los registros que esten activos para poderlos consultar mediante formato json
- http://127.0.0.1:8000/api/articulos/{id} -- Enviandole un parametro del id nos traera los datos de ese id requerido

Mediante post podemos consultar para enviar datos para el guardado en la bd 

-- http://127.0.0.1:8000/api/articulos/ -- Lo mandamos por POST y le tenemos que enviar en el cuerpo del mismo los siguintes parametros:
    ** id_propietario -- El id que esta solicitando la creacion)
    ** titulo -- El nombre del titulo del artículo
    ** articulo -- El cuerpo del artículo para su creacion
    ** foto -- archivo de imagen para que se guarde en la base
   ## si todo esta bien el api te regresara un  mensaje de "Se creo correctamente con el numero de id" 

## Middleware

Se ocupo un middleware para la validacion de algunas rutas mediante el front para que solo buscaran los ids existentes asi como evitar que pusieran
strings dentro de la ruta y evitar que el sistema pueda buscarlos.
Se controla asi que cuando se edite el articulo este activo y te muestre los que existe asi evitar que los usuarios puedan navegar con ids que ellos inventen


## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## No contiene seguidad todavia en los apis ya mas adelante se puede validar pornerle seguridad 



