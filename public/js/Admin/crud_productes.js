$(document).ready(function () {
  $("#importar").click(function () {
    let data = new FormData();
    data.append("file", $("#file").prop("files")[0]);
    data.append("action", "importar_productos");

    $.ajax({
      type: "POST",
      url: "crud_producto.php",
      data: data,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        data = JSON.parse(data);
        if (data === "No se ha seleccionado ningún archivo") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Los productos se han importado correctamente") {
          $.bootstrapGrowl(data, { type: "success", width: "1000px" });
          document.getElementById("file").value = "";
          document.getElementById("previewTableBody").innerHTML = "";
          document.getElementById("impt").style.display = "none";
          $("#importModal").modal("hide");
        } else {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        }
      },
      error: function (data) {
        console.log(data);
      },
    });
  });

  $("#editarProducto").click(function () {
    let data = new FormData();
    data.append("codigo_barras", $("#edit_codigo_barras").val());
    data.append("nombre", $("#edit_nombre").val());
    data.append("precio", $("#edit_precio").val());
    data.append("descripcion", $("#edit_descripcion").val());
    data.append("imagen", $("#editar_imagen").val());
    data.append("descuento", $("#edit_descuento").val());
    data.append("action", "editar_producto");

    $.ajax({
      type: "POST",
      url: "crud_producto.php",
      data: data,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        data = JSON.parse(data);
        if (
          data === "El código de barras debe ser un string de 13 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data === "El nombre del producto debe tener al menos 3 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data ===
          "La descripción del producto debe tener al menos 10 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "El precio debe ser un número válido") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "La imagen no puede estar vacía") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Producto editado correctamente") {
          $.bootstrapGrowl(data, { type: "success", width: "1000px" });
          $("#editarModal").modal("hide");
        } else {
          $.bootstrapGrowl("Error al editar el producto", {
            type: "danger",
            width: "1000px",
          });
        }
      },
    });
  });

  $("#comprarexist").click(function () {
    let codigo_barras = $("#codigo_barras2").val();
    let unidades = $("#unidades2").val();
    let total = $("#total2").text();
    total = total.replace(/[^0-9,.]/g, "");
    total = total.replace(",", ".");
    total = parseFloat(total);
    $.ajax({
      type: "POST",
      url: "crud_producto.php",
      data: {
        codigo_barras: codigo_barras,
        unidades: unidades,
        action: "comprar_producto",
        total: total,
      },
      success: function (data) {
        try {
          console.log(data);
          data = JSON.parse(data);
          if (
            data ===
            "El producto seleccionado, aún no esta disponible por falta de información"
          ) {
            $.bootstrapGrowl(data, { type: "danger" });
          } else {
            $.bootstrapGrowl("Producto comprado correctamente", {
              type: "success",
            });
            $("#comprarExist").modal("hide");
          }
        } catch (error) {
          console.error(error);
        }
      },
    });
  });

  $("#buscar_prod").click(function () {
    let codigo_barras = $("#codigo_barras2").val();
    $.ajax({
      type: "POST",
      url: "crud_producto.php",
      data: { codigo_barras: codigo_barras, action: "buscar_producto" },
      success: function (data) {
        try {
          data = JSON.parse(data);
          categoria = data.categoria;
          subcategoria = data.subcategoria;
          stock = data.stock;
          if (data === "Introduce un código de barras válido") {
            $.bootstrapGrowl(data, { type: "danger" });
          } else if (
            data === "El código de barras debe ser un string de 13 caracteres"
          ) {
            $.bootstrapGrowl(data, { type: "danger" });
          } else if (data === "Producto no encontrado") {
            $.bootstrapGrowl(data, { type: "danger" });
          } else {
            $("#info").show();
            $("#here").html(`
          <table class="table mt-2">
            <tr>
              <th>Nombre</th>
              <td>${data.producto.nombre}</td>
            </tr>
            <tr>
              <th>Precio</th>
              <td id="precio22" name="precio22">${data.producto.precio} €</td>
            </tr>
            <tr>
              <th>Descripción</th>
              <td>${data.producto.descripcion}</td>
            </tr>
            <tr>
              <th>Categoría</th>
              <td>${categoria.nombre}</td>
            </tr>
            <tr>
              <th>Subcategoría</th>
              <td>${subcategoria.nombre}</td>
            </tr>
            <tr>
              <th>Imagen</th>
              <td><img src="${data.producto.imagen}" alt="Imagen del producto" style="width: 100px; height: 100px;"></td>
            </tr>
            <tr>
              <th>Unidades</th>
              <td>${stock}</td>
            </tr>
            <tr>
              <th>Descuento (%)</th>
              <td>${data.producto.descuento} %</td>
            </tr>
          </table>
        `);
          }
        } catch (error) {
          console.error(error);
        }
      },
    });
  });

  $("#añadirP").click(function () {
    let categoria = $("#categoria").val();
    let subcategoria = $("#subcategoria").val();
    let imagen = $("#imagen").val();

    //Comprobar que la imagen es una URL válida
    if ( !imagen.match(/\.(jpeg|jpg|gif|png)$/) ) {
      $.bootstrapGrowl("La imagen debe ser un archivo de imagen válido (jpg, jpeg, png, gif)", {
        type: "danger",
        width: "1000px",
      });
      return;
    }
    

    if (categoria == null) {
      $.bootstrapGrowl("Debes seleccionar una categoría", {
        type: "danger",
        width: "1000px",
      });
      return;
    }

    if (subcategoria == null) {
      $.bootstrapGrowl("Debes seleccionar una subcategoría", {
        type: "danger",
        width: "1000px",
      });
      return;
    }

    let data = new FormData();
    data.append("nombre", $("#nombre").val());
    data.append("precio", $("#precio").val());
    data.append("descripcion", $("#descripcion").val());
    data.append("categoria", $("#categoria").val());
    data.append("subcategoria", $("#subcategoria").val());
    data.append("imagen", $("#imagen").val());
    data.append("codigo_barras", $("#codigo_barras").val());
    data.append("unidades", $("#unidades").val());
    data.append("descuento", $("#descuento").val());
    data.append("aumento_iva", $("#aumento_iva").val());
    data.append("total", $("#total").val());
    data.append("action", "añadir_producto");

    

    $.ajax({
      type: "POST",
      url: "crud_producto.php",
      data: data,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        data = JSON.parse(data);
        if (
          data === "El código de barras debe ser un string de 13 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data === "El nombre del producto debe tener al menos 3 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data ===
          "La descripción del producto debe tener al menos 10 caracteres"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Las unidades deben ser un número válido") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "El descuento debe ser un número válido") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "El aumento de IVA debe ser un número válido") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "El precio debe ser un número válido") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data ===
          "La imagen debe ser un archivo de imagen válido (jpg, jpeg, png, gif)"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (
          data ===
          "Este producto ya consta en la base de datos, prueba a comprar más unidades"
        ) {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Hubo un error al añadir el producto") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Tienes que llenar todos los campos") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else if (data === "Tienes que subir una imagen") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else {
          $.bootstrapGrowl("Producto añadido correctamente", {
            type: "success",
            width: "1000px",
          });
          let stock = data.stock;
          let codigo_barras = data.codigo_barras;
          let nombre = data.nombre;
          let precio = data.precio;
          let idProducto = data.producto;

          let tabla = $("#userTable");
          tabla.append(`
                <tr>
                    <td>${codigo_barras}</td>
                    <td>${nombre}</td>
                    <td>${precio}</td>
                    <td>${stock}</td>
                    <td>
                        <button onclick="eliminarProducto(${idProducto})" class="btn btn-danger"><i class="lni lni-trash-can"></i></button>
                        <button onclick="editarProducto(${idProducto})" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="lni lni-pencil"></i></button>
                    </td>
                </tr>
            `);

          $("#agregarModal").modal("hide");
        }
      },
    });
  });

  $("#precio, #unidades").change(function () {
    calcularTotal();
  });

  $("#unidades2").change(function () {
    calcularTotal2();
  });
});

function calcularTotal() {
  let precio = parseFloat($("#precio").val());
  let unidades = parseInt($("#unidades").val());
  let descuento;

  if (unidades >= 0 && unidades < 10) {
    descuento = 0;
  } else if (unidades >= 10 && unidades < 50) {
    descuento = 10;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  } else if (unidades >= 50 && unidades < 200) {
    descuento = 20;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  } else if (unidades >= 200) {
    descuento = 30;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  }

  let subtotal = precio * unidades;

  if (descuento > 0) {
    subtotal -= (subtotal * descuento) / 100;
  }
  if (21 > 0) {
    subtotal += (subtotal * 21) / 100;
  }
  $("#total").val(subtotal.toFixed(2) + " €");
}

function calcularTotal2() {
  let precio2 = $("#precio22").text();
  let numeros = precio2.replace(/[^0-9,.]/g, "");
  numeros = numeros.replace(",", ".");
  let precio = parseFloat(numeros);
  let unidades = parseInt($("#unidades2").val());
  let descuento;
  console.log(precio);
  if (unidades >= 0 && unidades < 10) {
    descuento = 0;
  } else if (unidades >= 10 && unidades < 50) {
    descuento = 10;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  } else if (unidades >= 50 && unidades < 200) {
    descuento = 20;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  } else if (unidades >= 200) {
    descuento = 30;
    $.bootstrapGrowl(`Descuento del ${descuento}% aplicado`, {
      type: "info",
      width: "1000px",
    });
  }

  let subtotal = precio * unidades;

  if (descuento > 0) {
    subtotal -= (subtotal * descuento) / 100;
  }
  if (21 > 0) {
    subtotal += (subtotal * 21) / 100;
  }

  let precioSinIvaDescuento = (subtotal / 1.21).toFixed(2);
  let totalConIvaDescuento = subtotal.toFixed(2);

  $("#subtotal2").text(
    `Precio sin IVA ni descuento: ${precioSinIvaDescuento} €`
  );
  $("#total2").text(`Total de la Compra: ${totalConIvaDescuento} €`);
}
