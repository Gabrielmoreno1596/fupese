document.addEventListener("DOMContentLoaded", () => {
    const inputBienvenida = document.getElementById("upload-bienvenida");
    const previewBienvenida = document.getElementById("preview-bienvenida");
  
    inputBienvenida.addEventListener("change", (event) => {
      const file = event.target.files[0];
      if (!file) return;
  
      const reader = new FileReader();
      reader.onload = function (e) {
        const imageData = e.target.result;
        previewBienvenida.src = imageData;
        // Guardar en localStorage
        localStorage.setItem("imagen_bienvenida", imageData);
      };
      reader.readAsDataURL(file);
    });
  });
  

  