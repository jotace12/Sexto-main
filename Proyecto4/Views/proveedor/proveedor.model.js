
class proveedor_Model {
  constructor(
    codproveedor,
    nomPro,
    contacto,
    telefono,
    direccion,
    Ruta
  ) {
    this.codproveedor = codproveedor;
    this.nomPro = nomPro;
    this.contacto = contacto;
    this.telefono = telefono;
    this.direccion = direccion;
    this.Ruta = Ruta;
  }

  todos() {
    var html = "";
    $.get("../../Controllers/proveedor.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.nomPro}</td>
                <td>${valor.contacto}</td>
                <td>${valor.telefono}</td>
                <td>${valor.direccion}</td>
                <td><div class="d-flex align-items-center gap-2"></div></td>
                <td>
                  <button class='btn btn-success' onclick='editar(${valor.codproveedor})'>Editar</button>
                  <button class='btn btn-danger' onclick='eliminar(${valor.codproveedor})'>Eliminar</button>
                  <button class='btn btn-info' onclick='ver(${valor.codproveedor})'>Ver</button>
                </td>
              </tr>`;
      });
      $("#tabla_proveedores").html(html);
    });
  }

  insertar() {
    var dato = new FormData();
    dato.append('codproveedor', this.codproveedor);
    dato.append('nomPro', this.nomPro);
    dato.append('contacto', this.contacto);
    dato.append('telefono', this.telefono);
    dato.append('direccion', this.direccion);
    dato.append('Ruta', this.Ruta);

    $.ajax({
      url: "../../Controllers/proveedor.controller.php?op=insertar",
      type: "POST",
      data: dato,
      contentType: false,
      processData: false,
      success: (res) => {
        res = JSON.parse(res);
        if (res === "ok") {
          Swal.fire("nomPro", "proveedor Registrado", "success");
          this.todos(); // Use this.todos() to call the todos function
        } else {
          Swal.fire("Error", res, "error");
        }
      },
    });

    this.limpia_Cajas();
  }

  proveedor_repetido() {
    var nomPro = this.nomPro;
    $.post("../../Controllers/proveedor.controller.php?op=proveedor_repetido", { nomPro: nomPro }, (res) => {
      res = JSON.parse(res);
      if (parseInt(res.proveedor_repetido) > 0) {
        $('#proveedorRepetido').removeClass('d-none');
        $('#proveedorRepetido').html('el proveedor ingresado, ya existe en la base de datos');
        $('button').prop('disabled', true);
      } else {
        $('#proveedorRepetido').addClass('d-none');
        $('button').prop('disabled', false);
      }
    });
  }

  limpia_Cajas() {
    document.getElementById("proveedor").value = "";
    document.getElementById("contacto").value = "";
    document.getElementById("telefono").value = "";
    document.getElementById("direccion").value = "";
    $("#Modal_proveedores").modal("hide");
  }
}