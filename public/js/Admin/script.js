$(document).ready(function () {
  $("#searchInput").on("input", function () {
    let searchText = $(this).val().toLowerCase();
    let rows = $("#userTable tbody tr");

    rows.each(function () {
      let found = false;
      let cells = $(this).find("td");

      cells.each(function () {
        let cellText = $(this).text().toLowerCase();
        if (cellText.includes(searchText)) {
          found = true;
          return false; // exit the loop
        }
      });

      if (found) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  $("#clear").click(function () {
    $("#file").val("");
    $("#previewTableBody").empty();
    $("#impt").hide();
  });

  $(".toggle-btn").click(function () {
    $("#sidebar").toggleClass("expand");
  });

  $("#categoria").change(function () {
    let categoriaId = $(this).val();

    $.ajax({
      url: "acciones_usuarios.php",
      type: "POST",
      data: { categoria_id: categoriaId },
      success: function (data) {
        $("#subcategoria").empty();

        $("#subcategoria").append(
          "<option selected>Selecciona una subcategoría</option>"
        );
        $.each(data, function (index, nombreSubcategoria) {
          $("#subcategoria").append(
            "<option>" + nombreSubcategoria.nombre + "</option>"
          );
        });
      },
    });
  });
});

function previewFile() {
  let fileInput = document.getElementById("file");
  let file = fileInput.files[0];
  let reader = new FileReader();

  reader.onload = function (e) {
    let contents = e.target.result;
    let lines = contents.split("\n");

    if (lines.length < 1) {
      alert("El archivo está vacío.");
      return;
    }

    let headers = lines[0].split("|").map((header) => header.trim());
    if (
      headers.length !== 8 ||
      headers[0] !== "codigo_de_barras" ||
      headers[1] !== "nombre" ||
      headers[2] !== "precio" ||
      headers[3] !== "cantidad" ||
      headers[4] !== "descripcion" ||
      headers[5] !== "categoria" ||
      headers[6] !== "subcategoria" ||
      headers[7] !== "url_imagen"
    ) {
      alert(
        "El archivo no tiene el formato correcto. Asegúrate de que los encabezados sean 'codigo_de_barras', 'nombre', 'precio', 'cantidad', 'descripcion', 'categoria', 'subcategoria' y 'url_imagen'."
      );
      return;
    }

    let tableBody = document.getElementById("previewTableBody");
    tableBody.innerHTML = "";

    for (let i = 1; i < lines.length; i++) {
      let line = lines[i].split("|");
      let subtotal = 0;
      let total = 0;

      if (line.length !== 8) {
        alert(
          "El producto en la línea " +
            (i + 1) +
            " no tiene la cantidad correcta de campos."
        );
        return;
      }

      if (line.some((field) => field.trim() === "")) {
        alert("El producto en la línea " + (i + 1) + " tiene campos vacíos.");
        return;
      }

      let barcode = line[0];
      let productName = line[1];
      let price = parseFloat(line[2]);
      let quantity = parseInt(line[3]);
      let imageLink = line[7];

      let row = document.createElement("tr");
      let barcodeCell = document.createElement("td");
      let productNameCell = document.createElement("td");
      let priceCell = document.createElement("td");
      let quantityCell = document.createElement("td");
      let imageCell = document.createElement("td");
      let subtotalCell = document.createElement("td");
      let totalCell = document.createElement("td");

      barcodeCell.textContent = barcode;
      productNameCell.textContent = productName;
      priceCell.textContent = price.toFixed(2) + " €";
      quantityCell.textContent = quantity;

      let img = document.createElement("img");
      img.src = imageLink;
      img.alt = "Product Image";
      img.style.maxWidth = "50px";
      img.style.maxHeight = "50px";
      imageCell.appendChild(img);

      subtotal = price * quantity;
      if (quantity >= 200) {
        subtotal *= 0.7;
      } else if (quantity >= 50) {
        subtotal *= 0.8;
      } else if (quantity >= 10) {
        subtotal *= 0.9;
      }
      total = subtotal * 1.21;

      subtotalCell.textContent = subtotal.toFixed(2) + " €";
      totalCell.textContent = total.toFixed(2) + " €";

      barcodeCell.id = "barcodeCell" + i;
      productNameCell.id = "productNameCell" + i;
      priceCell.id = "priceCell" + i;
      quantityCell.id = "quantityCell" + i;
      imageCell.id = "imageCell" + i;
      subtotalCell.id = "subtotalCell" + i;
      totalCell.id = "totalCell" + i;

      row.appendChild(barcodeCell);
      row.appendChild(productNameCell);
      row.appendChild(priceCell);
      row.appendChild(quantityCell);
      row.appendChild(imageCell);
      row.appendChild(subtotalCell);
      row.appendChild(totalCell);

      tableBody.appendChild(row);
    }

    document.getElementById("impt").style.display = "block";
  };

  reader.readAsText(file);
}

function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
    $.ajax({
      url: "crud_producto.php",
      type: "POST",
      data: { id: id, accion: "eliminar" },
      success: function (data) {
        data = data.replace(/"/g, "");
        if (data === "Producto eliminado correctamente") {
          $.bootstrapGrowl("Producto eliminado correctamente.", {
            type: "success",
            width: "1000px",
          });
        } else if (data === "No se puede eliminar un producto con stock") {
          $.bootstrapGrowl(data, { type: "danger", width: "1000px" });
        } else {
          $.bootstrapGrowl("Error al eliminar el producto.", {
            type: "danger",
            width: "1000px",
          });
        }
      },
    });
  }
}

function editarProducto(id) {
  $("#editarModal").modal("show");
  $.ajax({
    url: "crud_producto.php",
    type: "POST",
    data: { id: id, accion: "info_producto" },
    success: function (data) {
      data = JSON.parse(data);
      $("#edit_codigo_barras").val(data.producto.codigo_barras);
      $("#edit_nombre").val(data.producto.nombre).prop("disabled", true);
      $("#edit_precio").val(data.producto.precio).prop("disabled", true);
      $("#edit_descripcion")
        .val(data.producto.descripcion)
        .prop("disabled", true);
      $("#edit_descuento").val(data.producto.descuento).prop("disabled", true);
      $("#editar_imagen").val(data.producto.imagen).prop("disabled", true);
      $("#edit_categoria").empty();
      $("#edit_subcategoria").empty();

      $.each(data.categorias, function (index, categoria) {
        let option = $("<option>").text(categoria.nombre);
        if (categoria.nombre === data.categoria.nombre) {
          option.attr("selected", true);
        }
        $("#edit_categoria").append(option);
      });

      $.each(data.subcategorias, function (index, subcategoria) {
        let option = $("<option>").text(subcategoria.nombre);
        if (subcategoria.nombre === data.subcategoria.nombre) {
          option.attr("selected", true);
        }
        $("#edit_subcategoria").append(option);
      });

      $("#edit_categoria").prop("disabled", true);
      $("#edit_subcategoria").prop("disabled", true);
      console.log(data.producto.imagen);
      $("#edit_imagen")
        .attr("src", data.producto.imagen)
        .prop("disabled", true);
    },
  });
}

function openTab(evt, tabName) {
  let i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
