Registro de Actividad:

23/1/24 -Inicio de Proyecto -Creacion de Modelos y Controladores de la Base de Datos -Creacion y verificacion de un nuevo Usuario (para ingresar al sistema)

31/1/24 - Se agrego la restriccion de edad para peliculas al proyecto.
-Se creo la vista de Tipo,Idioma,Nacionalidad y Restriccion de edad
-Se testeo el alta, baja y modificacion de las vistas mencionadas en el item de arriba

8/2/24 - Se agrego la pestaña de actores al proyecto.
-Se creo la vista de Actor (Agregar, modificar, lista)
-Se testeo el alta, baja y modificacion de las vistas mencionadas en el item de arriba

9/2/24 - Se agrego la pestaña de categorias y peliculas al proyecto.
-Se creo la vista de Categoria y Pelicula (Agregar, modificar, lista)
-Se testeo el alta, baja y modificacion de las vistas mencionadas en el item de arriba

12/2/24 - Se agrego la subida de imagen de pelicula al proyecto.
-Se añadio la vista de la imagen al editar una pelicula
-Se añadio "habilitar" y "inhabilitar" las peliculas en la vista de Lista de Peliculas

7/3/24 - Se agrego la pestaña de reparto en la tabla de pelicula.
-Se añadio la vista de asignar y desasignar actores a una pelicula en particular
-Se empezo con la parte de asignar una pelicula a una sala

12/3/24
-Se agrego la pestañada de Sala
-Se añadio la vista de crear/editar/lista de salas

13/3/24
-Se agrego la pestaña de Funcion (la cual se encarga de relacion una pelicula con una sala en una fecha y horario)
-Se añadio la vista de la lista de salas asignadas a cada pelicula

21/3/24
-Se agrego un listado de las peliculas junto con las salas, fechas y horario de cada una

24/3/24
-Se agrego la edicion individual de horario de una funcion (Pelicula)
-Se agrego la extencion de la fecha fin de la pelicula

29/3/24
-Se agregaron 2 botones y sus funciones respectivas, 1 para la edicion de horario por dia en particual y otro para la edicion de toda la funcion (horario y fechas)

1/4/24
-Se agrego la Habilitacion y Inhabilitacion de funciones (por dia)
-Se simplifico el menu desplegable de tener Registro y Edicion y estar todo junto en una sola solapa. Para "Categoria","Sala","Restriccion","Tipo"
-Se agrego y edito documentacion de los Controller

2/4/24
-Se agrego una nueva tabla en la vista de funciones, donde indica la sala y la pelicula
-Se dividio en la vista Funcion en(Asignar, Listado Simple , Listado Completo)

4/4/24
-Se agrego en el inicio un listado de las peliculas (con fechas inicial y fecha final de cada una) para poder seleccionar y poder avanzar a la reserva de la misma

5/4/24
-Se agrego un boton para poder Habilitar y Inhabilitar peliculas teniendo en cuenta el rango de fechas en las cuales fueron cargadas (en la parte de funciones)

9/4/24
-Se agrego la seleccion de pelicula y fecha para poder realizar la reserva de una pelicula
-Se agrego la visualizacion de los datos de reserva de una pelicula (pelicula, fecha, horarios)

10/4/24
-Se agrego una tabla en la visualizacion de reserva, en la cual se visualiza las reserva de ese dia para esa pelicula y sala en particular

12/4/24
-Se añadio la vista de reserva de boleto (incluyendo comprobacion de boletos disponibles)

16/4/24
-Se añadio la vista de finalizacion de boleto (datos de la reserva finalizada)
-Se añadio la anulacion de reserva de boleto

17/4/24
-Se añadio filtrado en la parte de reservas por pelicula, sala, fecha de la funcion y fecha de la reserva

19/4/24
-En la parte de funciones se agrego para poder seleccionar una pelicula y la sala para poder visualizar los datos, sin tener que mostrar todas las funciones existentes.
-Se arreglo un error el cual no registraba nuevas funciones al extender el rango de fecha de la pelicula y sala
-Se añadio filtrado en la parte de funciones por pelicula y sala
-Se añadio cartel al no tener registros cuando se filtra en funciones como en reservas
-Se arreglo un error que traia los horarios de semana y finde juntos

20/4/24
-Se agrego precio final al finalizar compra
-Se agrego el precio final en las columnas de funciones y reservas



-Centrar las filas en la aprte de registro boleto
-Centrar "No hay datos para mostrar"  en las tablas de funciones y reservas(tanto en lista como en registro)
-Boton para imprimir comprobante de boleto
-Separar en "reserva/registrar" la parte de abajo solo para personal logeado
-Revisar los listados (PELICULAS - FUNCION - RESERVA) teniendo en cuenta cuales estan HABILITADOS y cuales NO

-Inhabilitar botor de "reserva/registrar" con CSS
-Inhabilitar botor de "reserva/lista" ANULADO con CSS