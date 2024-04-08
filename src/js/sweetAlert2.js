 //--------------------------------------------------------------------------------------------------------------------------//
  
 function alerta(titulo, texto, tipo){
    Swal.fire({
      title: titulo,
      html: '<div style="witdh=100%;">'+texto+"</div>", 
      icon: tipo, 
      confirmButtonText: 'Aceptar', 
      allowOutsideClick: false,
      allowEscapeKey: false})
  }
  
  function alertaEspecial(titulo, texto, tipo, url){
    Swal.fire({
      title: titulo, 
      html: texto, 
      icon: tipo, 
      confirmButtonText: 'Aceptar', 
      allowOutsideClick: false,
      allowEscapeKey: false}).then(function() {
        window.location = `${url}`;
    });
  }
  
  function alertaExport(titulo, texto, tipo, url){
    Swal.fire({
      title: titulo, 
      html: texto, 
      icon: tipo, 
      confirmButtonText: 'Aceptar', 
      allowOutsideClick: false,
      allowEscapeKey: false}).then(function() {
        window.location = `../controlador/${url}`;
    });
  }
  
