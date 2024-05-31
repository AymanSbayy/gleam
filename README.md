# GLEAM

## Introducción

GLEAM es una aplicación web de comercio online que permite a los usuarios comprar productos de diferentes tipos de sectores, como electrónica, hogar, jardinería, etc. Este es un proyecto que he realizado con la finalidad de demostrar mis conocimientos adquiridos en el curso de Desarrollo de Aplicaciones Web en el instituto Sa Palomera. A parte de este objetivo, he querido intentar hacer una tienda ecommerce ya que es un proyecto que me gustaría hacer en un futuro y así poder tener una base para futuros proyectos. 




## Paso a paso

### Todas las vistas han sido creadas con estilos de Bootstrap 5 y CSS personalizado, son totalmente creados por mí, no he utilizado plantillas de terceros, pero si que me he basado en la documentación de Bootstrap 5 para crear los estilos y me he ayudado de algunos videos de Youtube para hacer algunas cosas que no sabía cómo hacerlas (Como los carruseles y el submenú de usuario).

1. Lo primero que he hecho es crear una estructura que se asemeja a la de los frameworks de desarrollo web, para así poder tener un control de los archivos y carpetas que se van a utilizar.

2. He creado un archivo `index.php` en la raíz del proyecto, que será el archivo que se encargará de cargar el archivo de configuración y de inicializar la aplicación.

3. He empezado hacer la vista de la página principal, que será la que se mostrará al usuario cuando acceda a la aplicación `welcome.view.php`, pero lo primero que he hecho es crear un archivo `navbar.view.php` que será el encargado de mostrar la cabecera de la página y del resto de páginas. Lo que he hecho es poner un mensaje de bienvenida para empezar que va cambiando como un carrusel. Después
1. Lo primero que he hecho es crear una estructura que se asemeja a la de los frameworks de desarrollo web, para así poder tener un control de los archivos y carpetas que se van a utilizar.

2. He creado un archivo `index.php` en la raíz del proyecto, que será el archivo que se encargará de cargar el archivo de configuración y de inicializar la aplicación.

3. He empezado hacer la vista de la página principal, que será la que se mostrará al usuario cuando acceda a la aplicación `welcome.view.php`, pero lo primero que he hecho es crear un archivo `navbar.view.php` que será el encargado de mostrar la cabecera de la página y del resto de páginas. Lo que he hecho es poner un mensaje de bienvenida para empezar que va cambiando como un carrusel. Después un navbar con un menú de navegación con el logo a la izquierda y los enlaces de la tienda en el centro. Mientras que a la derecha he puesto un icono de carrito de la compra que de momento no hace nada y un icono de usuario que al hacer click en él se despliega un modal con un formulario de login y otro de registro. En caso de que el usuario esté logueado, en vez de mostrar el formulario de login y registro, mostrará un desplegable con las opciones de perfil, pedidos y cerrar sesión.

4. He creado un archivo `footer.view.php` que será el encargado de mostrar el pie de página de la aplicación. De momento solo he puesto un mensaje de despedida y derechos de autor.

5. Después del navbar he puesto un carrusel con las tres categorías de productos que se venden en la tienda. Cada categoría tiene una imagen de fondo y un título. Al hacer click en una categoría, se redirige a la página de productos de esa categoría.

6. Justo debajo del carrusel he puesto un apartado de productos destacados, que son los productos que se mostrarán en la página principal. Cada producto tiene una imagen, un título, una descripción y un precio. Al hacer click en un producto, se redirige a la página de ese producto.

7. Debajo de esto he puesto un apartado con las subcategorías de productos que se venden en la tienda. Cada subcategoría tiene un título y una imagen. Al hacer click en una subcategoría, se redirige a la página de productos de esa subcategoría.

8. Una vez que he terminado la vista de la página principal, he creado la vista de la página de productos "shop.view.php". En esta vista he incluido el navbar y el footer. En el centro de la página he puesto un filtro de productos por categoría y subcategoría. Al lado del filtro he puesto los productos que se venden en la tienda. Cada producto tiene una imagen, un título, una descripción y un precio. Al hacer click en un producto, se redirige a la página de ese producto. He conseguido filtrar por categoría y subcategoría con peticiones AJAX al servidor, y lo mismo pasa con el menu lateral de la izquierda, que se actualiza con las subcategorias de la categoria seleccionada. Todo esto se hace con peticiones AJAX al servidor para no tener que recargar la página.

9. Una vez que he terminado la vista de la página de productos, he creado la vista de la página de un producto "product.view.php". En esta vista he incluido el navbar y el footer. En el centro de la página he puesto la imagen del producto, el título, la descripción, el precio y un botón para añadir el producto al carrito. Al hacer click en el botón, se añade el producto al carrito y se muestra un mensaje de éxito. He conseguido añadir productos al carrito con peticiones AJAX al servidor, para no tener que recargar la página. Además, he añadido un contador en el icono del carrito que muestra el número de productos que hay en el carrito y debajo del producto he puesto un carrusel con productos relacionados. 

10. Una vez que he terminado la vista de la página de un producto, he creado la vista de la página de carrito "carrito_compra.view.php". Este es un modal que se muestra al hacer click en el icono del carrito. Cuando se añade un producto al carrito se añade en una COOKIE y al cargar la página, en este modal buscamos los productos que hay en la COOKIE y los mostramos de forma tabulada. Obviamente si no se reinicia la página también tenemos en cuenta que los productos se añadan al carrito en tiempo real con AJAX. En este modal se muestra el nombre del producto, la cantidad, el precio unitario y el precio total. Al lado de cada producto hay un botón para eliminarlo del carrito. Al final del modal se muestra el precio total de todos los productos del carrito. Al hacer click en el botón de checkout, se redirige a la página de checkout.

11. En la página puedes navegar sin ningun tipo de problemas, pero en el momento de hacer el checkout, se te pedirá que te registres o inicies sesión. Para ello he creado un modal que se muestra al hacer click en el icono de usuario del navbar. En este modal se muestra un formulario de login y otro de registro. Al hacer click en el botón de login, se envían los datos al servidor y se comprueba si el usuario existe en la base de datos. Si el usuario existe, se muestra un mensaje de éxito y se cierra el modal. Si el usuario no existe, se muestra un mensaje de error. Al hacer click en el botón de registro, se envían los datos al servidor y se comprueba si el usuario existe en la base de datos. Si el usuario existe, se muestra un mensaje de error. Si el usuario no existe, se envia un correo de confirmación al mail del usuario y se muestra un mensaje de éxito. Al hacer click en el botón de confirmación del correo, se redirige a la página de login. También puedes iniciar sessión con Google.

14. Una vez iniciado sesión, se desbloquean también más opciones en el navbar, como la de perfil, pedidos y cerrar sesión. En la página de perfil puedes ver tus datos personales y cambiar tu contraseña. En la página de pedidos puedes ver los pedidos que has hecho y el estado en el que se encuentran. En la página de cerrar sesión, se cierra la sesión y se redirige a la página principal.



## Requerimientos Técnicos

- Registro de usuarios
Para hacer el registro de usuarios, he creado una tabla en la base de datos llamada `usuarios` con los campos `idUsuario`, `nombre`, `password`, `email`, `administrador`, `telefono`, `foto`, `bloqueado`, `fechaRegistro`, `provider`, `provider_id` y `account_activation_token`.
Para hacer este registro, desde el modal haga una peticion AJAX al servidor con los datos del formulario y se comprueba si el usuario ya existe en la base de datos. Si el usuario no existe, se crea un token de activación de la cuenta y se envía un correo al usuario con un enlace para activar la cuenta. Al hacer clic en el enlace, se activa la cuenta y se redirige a la página de login. Si el usuario ya existe, se muestra un mensaje de error. Por supuesto, también se puede iniciar sesión con Google y la contraseña se encripta con `sha256`. La petición AJAX se hace con el método `POST` y se envían los datos en formato `JSON` al servidor PHP.
Se hace la petición AJAX, y el servidor la recibe y verifica que recibe correctamente toda la información.

Después de hacer las verificaciones correspondientes y ver que todo está correctamente formatado, procedemos a insertar los datos a la base de datos y a enviar el mail de verificación al usuario, pero con el campo de account_activation_token lleno, hasta que se active la cuenta para vaciarlo.

- Login de usuarios
Para hacer el login de usuarios, verificamos que el usuario existe en la base de datos y que la contraseña es correcta. Si el usuario existe, la contraseña es correcta, el usuario no está bloqueado y la cuenta está activada, se crea una sesión y se redirige a la página principal. Si el usuario no existe, la contraseña es incorrecta, el usuario está bloqueado o la cuenta no está activada, se muestra un mensaje de error. Por supuesto, también se puede iniciar sesión con Google. La petición AJAX se hace con el método `POST` y se envían los datos en formato `JSON` al servidor PHP.

Para el login social con Google, directamente se hace una petición a Google con el token que nos devuelve el login de Google y nos devuelve los datos del usuario. Si el usuario ya existe en la base de datos, se crea una sesión y se redirige a la página principal. Si el usuario no existe, se crea un usuario con los datos que nos devuelve Google y se crea una sesión. Esto se hace en los ficheros dentro de la carpeta `oAuth`, que son los encargados de hacer la autenticación con Google, uno para recojer los datos y otro para hacer la autenticación.

A nivel de acceso, se ha hecho un control de acceso a las páginas, para que si un usuario no está logueado, no pueda acceder a ciertas páginas. Para ello, se ha creado un middleware que se encarga de comprobar si el usuario está logueado y si no lo está, se redirige a la página de login. Este middleware se ha aplicado a las páginas de perfil, pedidos y cerrar sesión.


- Navegación Intuitiva




    