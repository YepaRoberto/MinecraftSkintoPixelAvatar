// Carga la imagen del skin
const skin = document.querySelector("input[name='skin']");

// Al enviar el formulario
function crearSkin() {
  // Obtiene la imagen del skin
  const data = new FormData(document.querySelector("form"));
  const skinData = data.get("skin");

  // Crea una imagen a partir de los datos del skin
  const skinImage = new Image();
  skinImage.src = window.URL.createObjectURL(new Blob([skinData], {type: "image/png"}));

  // Recorta la imagen del skin
  const cuerpo = skinImage.crop(0, 0, 64, 32);
  const cabeza = skinImage.crop(64, 0, 64, 32);
  const piernas = skinImage.crop(128, 0, 64, 32);
  const pies = skinImage.crop(192, 0, 64, 32);

  // Reemplaza las partes del skin
  const cabezaReemplazada = cuerpo.cloneNode(true);
  const esquinaReemplazada = cabeza.cloneNode(true);
  const brazoIzquierdoReemplazado = piernas.cloneNode(true);
  const brazoDerechoReemplazado = pies.cloneNode(true);
  const pechoReemplazado = cabeza.cloneNode(true);

  // Crea la plantilla del skin
  const plantilla = document.querySelector(".resultado");
  plantilla.innerHTML = `
    <img src="${cuerpo.src}" alt="Cuerpo">
    <img src="${cabezaReemplazada.src}" alt="Cabeza">
    <img src="${piernas.src}" alt="Piernas">
    <img src="${pies.src}" alt="Pies">
    <img src="${esquinaReemplazada.src}" alt="Esquina">
    <img src="${brazoIzquierdoReemplazado.src}" alt="Brazo izquierdo">
    <img src="${brazoDerechoReemplazado.src}" alt="Brazo derecho">
    <img src="${pechoReemplazado.src}" alt="Pecho">
  `;
}

// Asocia el evento submit al formulario
document.querySelector("form").addEventListener("submit", crearSkin);
