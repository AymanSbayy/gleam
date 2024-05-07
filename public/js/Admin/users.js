function eliminarUsuario(idUsuario) {
  if (confirm("¿Estás seguro de que deseas eliminar este usuario?")) {
    $.ajax({
      url: "acciones_usuarios.php?id=" + idUsuario + "&accion=eliminar",
      type: "DELETE",
      success: function (result) {
        result = JSON.parse(result);
        if (result.message === "Usuario eliminado") {
          window.location.reload();
        } else {
          alert(result.message);
        }
      },
    });
  }
}

function bloquearUsuario(idUsuario) {
  $.ajax({
    url: "acciones_usuarios.php?id=" + idUsuario + "&accion=bloquear",
    type: "PUT",
    success: function (result) {
      result = JSON.parse(result);
      if (result.message === "Usuario bloqueado") {
        window.location.reload();
      } else {
        alert(result.message);
      }
    },
  });
}

function desbloquearUsuario(idUsuario) {
  $.ajax({
    url: "acciones_usuarios.php?id=" + idUsuario + "&accion=desbloquear",
    type: "PUT",
    success: function (result) {
      result = JSON.parse(result);
      if (result.message === "Usuario desbloqueado") {
        window.location.reload();
      } else {
        alert(result.message);
      }
    },
  });
}

function quitarAdmin(idUsuario) {
  $.ajax({
    url: "acciones_usuarios.php?id=" + idUsuario + "&accion=quitar-admin",
    type: "PUT",
    success: function (result) {
      result = JSON.parse(result);
      if (result.message === "Rol de administrador eliminado") {
        window.location.reload();
      } else {
        alert(result.message);
      }
    },
  });
}

function hacerAdmin(idUsuario) {
  $.ajax({
    url: "acciones_usuarios.php?id=" + idUsuario + "&accion=hacer-admin",
    type: "PUT",
    success: function (result) {
      result = JSON.parse(result);
      if (result.message === "Rol de administrador asignado") {
        window.location.reload();
      } else {
        alert(result.message);
      }
    },
  });
}
