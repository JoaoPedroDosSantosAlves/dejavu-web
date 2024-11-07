document.addEventListener("DOMContentLoaded", function () {
  const inputs = document.querySelectorAll(".input-field");

  inputs.forEach((input) => {
    const label = input.nextElementSibling; // Seleciona o label que está imediatamente após o input

    input.addEventListener("focus", function () {
      label.classList.add("label-hidden"); // Adiciona a classe que oculta o label
    });

    input.addEventListener("blur", function () {
      if (input.value === "") {
        // Se o campo estiver vazio ao perder o foco
        label.classList.remove("label-hidden"); // Remove a classe para mostrar o label novamente
      }
    });
  });
});
