# GLEAM

## Introducción

GLEAM es una aplicación web de comercio online que permite a los usuarios comprar productos de diferentes tipos de sectores, como electrónica, hogar, jardinería, etc. Este es un proyecto que he realizado con la finalidad de demostrar mis conocimientos adquiridos en el curso de Desarrollo de Aplicaciones Web en el instituto Sa Palomera. A parte de este objetivo, he querido intentar hacer una tienda ecommerce ya que es un proyecto que me gustaría hacer en un futuro y así poder tener una base para futuros proyectos. 


### Todas las vistas han sido creadas con estilos de Bootstrap 5 y CSS personalizado, son totalmente creados por mí, no he utilizado plantillas de terceros, pero si que me he basado en la documentación de Bootstrap 5 para crear los estilos y me he ayudado de algunos videos de Youtube para hacer algunas cosas que no sabía cómo hacerlas (Como los carruseles y el submenú de usuario).

### Explicación de de los archivos del controlador.

- **acciones_perfil.php**: Procesa solicitudes POST para cambiar la contraseña, actualizar información personal, y gestionar la información de envío y facturación en un sistema web. Valida los campos proporcionados, comprueba la autenticación del usuario, y realiza las operaciones correspondientes como cambio de contraseña, actualización de datos personales, y almacenamiento de información de envío y facturación, asegurando la integridad de los datos y proporcionando mensajes de error o éxito según corresponda.

- **acciones_usuarios.php**: Maneja solicitudes POST, DELETE y PUT para operaciones relacionadas con categorías y usuarios en un sistema web. Para solicitudes POST, recupera subcategorías basadas en una categoría proporcionada. Para solicitudes DELETE y PUT, realiza acciones como eliminar usuarios, bloquear o desbloquear usuarios, y otorgar o quitar privilegios de administrador, dependiendo de la acción especificada en la solicitud y de la autenticación del usuario. Los mensajes de éxito o error se devuelven en formato JSON.

- **activacion.php**: Se encarga de activar una cuenta de usuario después de que se haya registrado en el sistema. Primero verifica si el usuario ya ha iniciado sesión, si no lo ha hecho, verifica si la solicitud es de tipo GET y contiene un token de activación. Si se cumple, obtiene el correo electrónico asociado con ese token, activa la cuenta correspondiente y redirige al usuario a una página de bienvenida con un mensaje de alerta. Si no se puede activar la cuenta, devuelve un mensaje de error en formato JSON. Si el usuario ya ha iniciado sesión, lo redirige directamente a la página de bienvenida.

- **admin_estadisticas.php**: Recopila datos relacionados con las compras y ventas de productos en una tienda en línea para crear estadísticas. Primero, obtiene las compras realizadas y los productos vendidos. Luego, genera estadísticas anuales, mensuales, semanales y diarias de ventas y ganancias, así como un desglose por hora de las compras y ventas diarias. Finalmente, incluye una vista para mostrar estas estadísticas.

- **admin_usuarios.php**: Maneja la visualización de usuarios en una interfaz administrativa de una aplicación web. Primero, obtiene todos los usuarios del sistema. Luego, implementa la paginación dividiendo la lista de usuarios en páginas, mostrando un número limitado de usuarios por página. Finalmente, incluye una vista que muestra la lista de usuarios paginada.

- **admin.php**: Se encarga de recopilar datos relacionados con las ventas diarias y semanales de productos en una tienda en línea para generar estadísticas. Calcula el total de compras, ventas y ganancias diarias, así como las ventas totales por día de la semana. Luego, convierte los datos en formato JSON para ser utilizados en una interfaz de usuario. Finalmente, incluye una vista que muestra un panel de control administrativo con gráficos de ventas diarias y semanales.

- **añadir_producto_carrito.php**: Gestiona las operaciones relacionadas con el carrito de compras en una tienda en línea. Primero, verifica si existe una cookie que almacene el carrito de compras. Luego, procesa las solicitudes POST para actualizar o agregar productos al carrito. Si se solicita una actualización, actualiza la cantidad del producto en el carrito y ajusta el stock disponible en consecuencia. Si se solicita agregar un nuevo producto al carrito, verifica si hay suficiente stock disponible y realiza las actualizaciones necesarias. Finalmente, devuelve una respuesta JSON con el estado de la operación y los detalles del producto, la cantidad y el stock disponible en el carrito.

- **añadir_producto.php**: Maneja la lógica para mostrar la página de administración donde se pueden agregar productos. Comienza asegurándose de que el usuario esté autenticado como administrador. Luego, utiliza consultas a la base de datos para obtener todos los productos, categorías y detalles de stock necesarios para mostrar en la interfaz de usuario. Los productos se dividen en páginas para facilitar la navegación. Finalmente, incluye la vista correspondiente que contiene el formulario para agregar productos junto con la información recopilada.

- **checkout.php**: Maneja la lógica para la página de pago (checkout). Comienza verificando si el usuario está autenticado. Luego, obtiene información sobre el usuario, como sus datos de envío y facturación, así como los productos en el carrito. Si el carrito está vacío, muestra una alerta y redirige al usuario a la página de bienvenida. Si hay productos en el carrito, calcula el subtotal, el descuento total y el IVA para mostrar en la página de pago. Finalmente, incluye la vista correspondiente para mostrar la página de pago.

- **crud_productos.php**: Permite buscar, añadir, comprar, importar, eliminar, editar y obtener información detallada sobre productos. Además, incluye validación para categorías y subcategorías de productos, asegurando la integridad de los datos. Es una herramienta esencial para la gestión eficiente de inventario y operaciones comerciales en el entorno digital.

- **eliminar_producto_carrito.php**: Primero, verifica si existe una cookie que almacene el carrito de compras. Luego, procesa las solicitudes POST para eliminar productos del carrito. Si se solicita eliminar un producto, lo elimina del carrito y ajusta el stock disponible en consecuencia. Finalmente, devuelve una respuesta JSON con el estado de la operación y los detalles del producto eliminado.

- **filtrar_productos.php**: Procesa solicitudes GET para filtrar productos. Primero, obtiene los parámetros de filtrado proporcionados en la solicitud. Luego, realiza una consulta a la base de datos para obtener los productos que coincidan con los criterios de filtrado. Finalmente, devuelve una respuesta JSON con los productos filtrados y los detalles de stock disponibles.

- **inprocess.php**: Incluye una vista que muestra un mensaje de "En proceso" para indicar que la página solicitada está en desarrollo y aún no está disponible para su uso. Es útil para mostrar temporalmente una página de mantenimiento o una página en construcción.

- **login.php**: Maneja la lógica para el inicio de sesión de un usuario en un sistema web. Comienza verificando si el usuario ya ha iniciado sesión. Si no lo ha hecho, procesa las solicitudes POST para iniciar sesión. Valida los campos proporcionados, comprueba la autenticación del usuario y redirige al usuario a la página de bienvenida si las credenciales son correctas. Si las credenciales son incorrectas, muestra un mensaje de error en la página de inicio de sesión.

- **logout.php**: Maneja la lógica para cerrar la sesión de un usuario en un sistema web. Simplemente destruye la sesión actual y redirige al usuario a la página de inicio de sesión.

- **pedidos.php**: Maneja la visualización de pedidos de un usuario en una tienda en línea. Comienza verificando si el usuario ha iniciado sesión. Si es así, obtiene el perfil del usuario y verifica si existe una cookie de mensaje activada. Si la cookie existe y su valor es verdadero, establece una variable de mensaje en verdadero y luego desactiva la cookie. Luego, obtiene los productos pedidos por el usuario y, para cada producto, obtiene su stock. 

- **perfil.php**: Gestiona la visualización del perfil de un usuario en una tienda en línea. Comienza verificando si el usuario ha iniciado sesión. Si es así, obtiene el perfil del usuario utilizando su dirección de correo electrónico almacenada en la sesión.

- **producto.php**: Este fragmento de código PHP inicia una sesión y luego verifica si se ha proporcionado un código de barras a través de la URL ($_GET). Si se proporciona un código de barras, se utiliza para recuperar información sobre el producto correspondiente, como su nombre, precio, descripción, etc., utilizando las consultas a la base de datos proporcionadas por las funciones getProductoByCodigoBarras, getStockByProducto, getSubcategoriaById y getProductosBySubcategoria. Si se encuentra el producto, se recuperan los datos adicionales, como el stock disponible y la subcategoría del producto, junto con otros productos relacionados en la misma subcategoría.

- **realizar_pedido.php**: Verifica la sesión del usuario, procesa los datos del formulario de pedido, valida el método de pago, calcula el total y actualiza el stock de los productos. Además, genera una factura en formato PDF, envía un correo electrónico al cliente con un resumen del pedido y establece una cookie para mostrar un mensaje de confirmación. Utiliza las librerías PHPMailer y TCPDF para enviar correos electrónicos y generar archivos PDF, respectivamente, y maneja varios casos de error, como carrito vacío o sesión no iniciada.

- **registro.php**: Si el usuario no está autenticado y se envía un formulario POST, valida los datos de nombre completo, correo electrónico y contraseña. Si hay errores de validación, devuelve los errores como un objeto JSON. Si no hay errores, registra al usuario en la base de datos y envía un correo electrónico de activación con un enlace único. Utiliza la librería PHPMailer para enviar correos electrónicos y maneja excepciones en caso de fallo en el envío del correo.

- **shop.php**: Determina la cantidad de productos que se mostrarán por página y realiza consultas a la base de datos para obtener los productos activos y las categorías disponibles. Si se proporciona un parámetro de categoría en la URL, obtiene el ID de la categoría correspondiente. Después, si la categoría es "All", obtiene todos los productos activos; de lo contrario, obtiene productos activos por categoría. Calcula el número total de productos y el número total de páginas necesarias para mostrar todos los productos paginados. Finalmente, carga la vista de la tienda para mostrar los productos.

- **validation.php**: Este código PHP contiene funciones de validación para diferentes campos de usuario, como nombre completo, correo electrónico, contraseña, dirección, código postal, ciudad, provincia y país. Cada función valida un campo específico y devuelve un mensaje de error si la validación falla. Por ejemplo, la función validateNombreCompleto verifica si el nombre completo contiene solo letras, espacios en blanco y acentos, y si su longitud no supera los 100 caracteres. De manera similar, las otras funciones de validación tienen reglas específicas para cada campo. Estas funciones se pueden usar para validar datos de formularios de registro o actualización de usuarios. Además, hay una función userIsBlocked que verifica si un usuario está bloqueado consultando la base de datos.

- **welcome.php**: Recupera todos los productos de la base de datos y luego calcula cuántas veces se han vendido cada uno de ellos. Utiliza la función getAllProducts() para obtener todos los productos y getCompras() para obtener todas las compras realizadas.
Luego, itera sobre cada compra y cada producto comprado para actualizar el recuento de ventas de cada producto en el array $productosVendidos. Después, ordena los productos por la cantidad de veces que se han vendido en orden descendente y toma los primeros 10 productos más vendidos.

### Explicación de los archivos de la vista.

Tenemos dos carpetas, una que contiene las vistas de admin y otra que contiene los componentes de la tienda que nos hace falta utilizar varias veces en diferentes páginas. Y fuera de estas dos carpetas tenemos las vistas de la tienda que son las que se muestran al usuario.

### Explicación de los archivos del modelo.

Tenemos tres archivos en la carpeta modelo, uno que se encarga de hacer consultas sobre los productos, otro que se encarga de hacer consultas sobre los usuarios y otro que se encarga de hacer consultas sobre las categorías y subcategorías.

### Explicación de los archivos de la base de datos.

Tenemos una carpeta llamada "database" que contiene dos archivos, `db.constants.php` y `pdo.php`. El archivo `db.constants.php` contiene las constantes de la base de datos, como el nombre de la base de datos, el nombre de usuario, la contraseña y el host. El archivo `pdo.php` contiene la conexión a la base de datos utilizando la extensión PDO de PHP. La conexión se realiza utilizando las constantes definidas en `db.constants.php` y se devuelve un objeto PDO que se puede utilizar para realizar consultas a la base de datos.

### Explicación de los archivos de middleware.

Tenemos un archivo llamado `isAdmin.php` que se encarga de verificar si un usuario es administrador antes de permitirle acceder a ciertas páginas. Si el usuario no es administrador, se redirige a la página de inicio. Este middleware se utiliza para proteger las rutas de administración y garantizar que solo los administradores puedan acceder a ellas. Y otro archivo llamado `isLoggedIn.php` que se encarga de verificar si un usuario ha iniciado sesión antes de permitirle acceder a ciertas páginas. Si el usuario no ha iniciado sesión, se redirige a la página de inicio. Este middleware se utiliza para proteger las rutas que requieren autenticación y garantizar que solo los usuarios autenticados puedan acceder a ellas.















    