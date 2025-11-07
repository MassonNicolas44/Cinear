Nombre del Proyecto: Cinear

------------------------------------------------------------------------------------------------------------

Persona a cargo de la administracion y programacion del proyecto:  Masson Nicolas
Link de la pagina de inicio: https://cinear.lovestoblog.com
------------------------------------------------------------------------------------------------------------

Requisitos de desarrolo para la integracion:

WampServer: Version 3.3.0 64 Bits
Visual Studios: 1.89.0

------------------------------------------------------------------------------------------------------------

Tecnologias utilizadas:
PHP: Version 8.2
Apache: Version 2.4.54
MySql: Version 8.0.31

Laravel: Version 10.10
Bootstrap: Version 5.2.3
Jquery: Version 3.7.1
barryvdh/laravel-dompdf (Para la gestion de los informes en PDF) : Version 2.1


------------------------------------------------------------------------------------------------------------

Descripcion general:
La pagina web fue creada para la gestion de una boleteria de cine, la cual esta dividida de la siguiente manera:

*Inicio*

-Se visualiza la imagen, trailer y descripcion de la pelicula. Incluyendo un boton para reservar los boletos (antes de reservar, se debe seleccionar la fecha). Un vez seleccionada la funcion y el dia, se procede a seleccionar los horarios disponibles y la cantidad de boletos, por ultimo, se veran los detalles de la reserva (numero de ticket, fecha y hora de reserva, pelicula, sala, fecha y hora de la funcion, cantidad de boletos, precio final) y la opcion de descargar este comprobante o volver al incio.

*Pelicula*

-Para el registro se debera ingresar los siguientes datos (Nombre , Año , Descripcion , Categoria , Nacionalidad , Idioma , Tipo(2D o 3D) , Restriccion de Edad , Duracion , Precio , Url (para cargar el trailer de la pelicula) , Imagen).
-Existe un listado de las peliculas existentes en el cual se podra editar informacion de la misma, Habilitar o Inhabilitar, y/o eliminar , por ultimo tambien se podra asignar/ver actores de cada pelicula.
-Se puede descargar/ver un reporte de las peliculas.

*Categoria*

-Se podra ingresar una nueva categoria indicando solamente el nombre de la misma.
-Tambien se podra editar/eliminar la misma

*Actor*

-Se podra ingresar un nuevo actor indicando solamente el nombre, apellido y nacionalidad del mismo.
-Tambien se podra editar/eliminar al actor en cuestion.

*Restriccion de Edad*

-Se podra ingresar una nueva restriccion de edad indicando solamente la descripcion.
-Tambien se podra editar/eliminar la restriccion de edad en cuestion.

*Idioma*

-Se podra ingresar un nuevo idioma indicando solamente el nombre del mismo.
-Tambien se podra editar/eliminar el idioma.

*Tipo de animacion*

-Se podra ingresar un nuevo tipo de animacion indicando solamente el nombre del mismo.
-Tambien se podra editar/eliminar.

*Nacionalidad*

-Se podra ingresar una nueva nacionalidad indicando el nombre de la misma.
-Tambien se podra editar/eliminar.

*Sala*

-Se podra ingresar una nueva sala indicando el nombre y la cantidad de asientos disponibles.
-Tambien se podra editar/habilitar o inhabilitar /eliminar al actor en cuestion.

*Funcion*

-Para ingresar una funcion, se debera elegir la pelicula, sala, fecha de inicio/finalizacion y por ultimo los horarios tanto para la semana como el finde semana.
-Luego tenemos 2 listas, en la primera se visualiza todas las funciones (agrupadas por fecha) en la cual se podra seleccionar para ver cada cada dia individualmente o para habiltiar/inhabilitar la funcion.
En la segunda se listan todas las funciones (dia a dia). En esta ultima, se podra editar un dia de la funcion  o editar el grupo de fechas de la funcion . Tambien esta la opcion de habilitar/inhabilitar la funcion del dia a seleccionar como eliminar la misma.
-En ambos listados esta la posibilidad de filtrar por pelicula y/o sala.

*Reserva*

-Se visualizan todas las reservas registradas hasta el momento, teniendo la opcion de anular la misma.
-Se puede descargar/ver un reporte de las reservas, ya sean totales o entre fechas en particular.
-Esta la opcion tanto para el listado como los reportes, de filtrar por pelicula/sala/fecha de funcion (inicio y/o fin), fecha de reserva.

*Venta*

-Se visualizan todas las ventas registradas hasta el momento.
-Se puede descargar/ver un reporte de las ventas, ya sean totales o entre fechas en particular.
-Esta la opcion tanto para el listado como los reportes, de filtrar por pelicula/sala/fecha de funcion (inicio y/o fin), fecha de reserva.

*Usuario Logeado*
-Para los usuarios que no son administradores, solamente se podra deslogear o cambiar la contraseña (introduciendo primero la contraseña actual, luego la nueva contraseña y por ultima confirmando la nueva contraseña).
-Para el administrador, tendra la opcion de editar datos del persoanl (codigo de ingreso , nombre , apellido , DNI , email , telefono , direccion , rol dentro de la empresa). Tambien podra habilitar/inhabilitar personal y resetear la contraseña del personal (la contraseña a resetear es "123").


En la parte superior tenemos la barra de navegacion, la cual esta compuesta por los siguientes items y desplegables
-Inicio
-Pelicula (Ingesar,Lista)
-Categoria
-Actor (Ingresar,Lista)
-Restriccion
-Idioma (Ingresar,Lista)
-Tipo
-Nacionalidades (Ingresar,Lista)
-Sala
-Funcion (Ingresar,Lista)
-Reserva
-Venta
-Personal Logeado (Editar Contraseña,Salir) o (Administrar Personal,Ingresar Personal,Editar Contraseña,Salir)

------------------------------------------------------------------------------------------------------------

Datos Adicionales:
-Si una pelicula,funcion quiere ser eliminado, no debe estar relacion con ninguna funcion,venta, caso contrario, solo se podra Deshabiltiar el mismo para que no pueda ser usado en el sistema.


Clave de ingreso del administrador: admin
Contraseña: admin123

claves de prueba:

prueba - 123
cajero - 123

------------------------------------------------------------------------------------------------------------

Estado del proyecto: Terminado

------------------------------------------------------------------------------------------------------------

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

22/4/24
-Se agrego la comprobacion para las peliculas, al registrar (si el nombre ya existe en la base de datos) y al editar (si el nombre ya existe en la base de datos y luego si el nombre a ingresar es igual a la pelicula editando)
-Se agrego la comprobacion para las salas, al registrar (si el nombre ya existe en la base de datos) y al editar (si el nombre ya existe en la base de datos y luego si el nombre a ingresar es igual a la sala editando)
-Se agregaron validaciones de estado, al registrar una funcion, que se pueda elegir entre peliculas y salas habilitadas 

23/4/24
-Se agrego VentaController, ademas de agregar una vista para ver las ventas total, filtrar por fechas y por pelicula y sala

24/4/24
-Se agrego una solapa en la cual SOLO el administrador pueda editar datos de las personas registradas en el sistema
-Se agrego un boton para resetear contraseña de las personas registradas (la contraseña a resetear es "123")
-Se comprobo que se pueda solamente ingresar al registro de un boleto, personal logeado y no logeado 

26/4/24
-Se agrego la vista de modificacion de contraseña (incluyendo las comprobaciones correspondientes)

29/4/24
-Se agrego en la parte "reserva/registrar" la parte de abajo solo para personal logeado
-Se agrego boton para ver y descarga de un reporte de las peliculas registradas en formato PDF

1/5/24
-Se agrego boton para ver y descarga de un reporte de las ventas registradas en formato PDF
-Se agrego boton para ver y descarga de un reporte de las reservas registradas en formato PDF
-Se agrego boton para descarga el comprobante al finalizar la reserva

2/5/24
-Se acomodaron las tablas, incluyendo titulos de las mismas y titulos de todas las vistas

3/5/24
-Primera fase de agregar estilos a los botones y darle un mejor orden

5/5/24
-Segunda fase de agregar estilos a los botones y darle un mejor orden

6/5/24
-Ultima fase de agregar estilos a los botones y darle un mejor orden
-Primera fase de agregar imagenes a los reportes y pestañas

7/5/24
-Se añadio el footer (Pie de pagina) a todo el proyecto
-Se añadio una restriccion en la parte de pestaña del personal logeado, donde solo pueda ingresar el administrador (Administrar y Ingresar personal)
-Se agrego icono a la imagen de reporte ademas de darle una mejor organizacion

9/5/24
-Se reorganizo la vista de los filtros, tanto para reserva como para venta

10/5/24
-Primera fase del diseño de la vista del inicio (mostrar imagen de pelicula y datos adicionales)

15/5/24
-Se agrego fondo al proyecto
-Se sacaron los datos personales del footer

16/5/24
-Se agrego la visualizacion del trailer de al pelicula (la persona a cargo de cargar la pelicula, debera cargar el URL correspondiente)

22/5/24
-Se arreglo un error que no permitia cargar 2 peliculas con trailer

24/5/24
-Se agrego la comprobacion de contraseña y estado (habilitado o no) del personal a logearse
-Se añadio la vista de reporte en las peliculas
-Se arreglo un error en los reportes que no dejaban utilizarse en el hosting
-Para todo personal logeado que no sea el administrador, solo podra ver el inicio y las reservas
-Se agrego un nuevo estado al reservar un boleto. El consumidor final/cajero reserva los boletos (estado=En Proceso). Al momento de pagar el consumidor final, el cajero pasa la reserva a (estado=Habilitada) y por ultimo, de ser necesario anulara la reserva (estado=Inhabilitada).

27/5/24
-Se añadio redireccion de pagina con respecto a los modulos (depende de cual sea el rol del personal logeado)
-Los reportes de las reservas, ahora seran vistos solo por el administrador

29/5/24
-Se corrigio un error al cargar la imagen de la pelicula, la misma perdia el tamaño (deformaba la imagen)
-Se acomodo las rutas, ya que habia algunas que no permitian al usuario final poder reservar un boleto

7/6/24
-Se acomodo un error que provocaba que el texto del inicio se viera con el estilo "negrita" cuando solo deberia verse las partes principales

23/10/25
-Se agrego que las tablas sean Responsive
-Al hacer click en "Ver" y "Descargar" los informes de las peliculas/reservas/ventas , abre una nueva pestaña, dejando abierta la anterior
-Se cambio nombre de "venta.listado" por "venta.lista"
-Se agrego boton para limpiar los filtros en la pestaña de ventas

4/11/25
-Se agrego boton para limpiar los filtros en la pestaña de reserva/funcion
-Se añadieron filtros en la pestaña de ventas/reservas y en el reporte del mismo. Filtro por Pelicula-Sala-Fecha-Fecha Reserva. En el reporte de ventas se muestra la fecha,hora y en caso te haber algun filtro activo, se mostrara al cual es.
-Se agrego un filtro en la pestaña de funcion para el estado de "Habilitada/Deshabilitada"

6/11/25
-Se agrego boton para limpiar los filtros en la pestaña de pelicula
-Se agrego un filtro en la pestaña de pelicula para el estado de "Habilitada/Deshabilitada"
-Se agregaron mensajes al no haber datos para mostrar en los reportes de pelicula-reserva-ventas ademas de las pestañas de reserva-pelicula