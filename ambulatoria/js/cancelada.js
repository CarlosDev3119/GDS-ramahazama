function mostrarCampos(selectElement) {
    const divMedico = document.getElementById('divMedico');
    const divMotivo = document.getElementById('divMotivo');
  
    if (selectElement.value === 'Si') {
      divMedico.style.display = 'block';
      divMotivo.style.display = 'block';
    } else {
      divMedico.style.display = 'none';
      divMotivo.style.display = 'none';
    }
  }