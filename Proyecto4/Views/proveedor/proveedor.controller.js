//archivo de donde llamar al procedimiento
//controlador

function init() {
  $("#form_proveedores").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos();
});

var todos = () => {
  var todos = new proveedor_Model("", "", "", "", "", "todos");
  var html = todos.todos();
}

var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_proveedores")[0]);
  var proveedor = $('#nomPro').val();  // Get the value of 'nomPro' input
  formData.append('nomPro', proveedor);  // Append to the FormData

  var proveedores = new proveedor_Model('', '', '', '', formData, 'insertar');
  proveedores.insertar();
}



var proveedor_repetido = () => {
    var proveedor = $('#proveedor').val();
    var proveedores = new proveedor_Model('',proveedor,'','','','proveedor_repetido');
    proveedores.proveedor_repetido();
}

;init();
