# GLEAM

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

8. Y para finalizar la vista de la página principal, he puesto un apartado de ofertas, que son los productos que están en oferta. Cada producto tiene una imagen, un título, una descripción, un precio y un precio de oferta. Al hacer click en un producto, se redirige a la página de ese producto.




    