const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

let currentIndex = 0; // Para rastrear a imagem atual no carrossel

// Função para esconder a label ao clicar no input
inputs.forEach((inp) => {
    const label = inp.nextElementSibling; // Seleciona o label imediatamente após o input

    // Quando o input é clicado, esconde o label
    inp.addEventListener("click", () => {
        label.classList.add("label-hidden"); // Adiciona a classe que oculta o label
    });

    // Quando o input perde o foco, verifica se está vazio
    inp.addEventListener("blur", () => {
        if (inp.value === "") {
            label.classList.remove("label-hidden"); // Se vazio, o label reaparece
        }
    });
});

// Função para alternar entre modo de login e cadastro
toggle_btn.forEach((btn) => {
    btn.addEventListener("click", () => {
        main.classList.toggle("sign-up-mode");
    });
});

// Função para mover o slider manualmente via bullets
function moveSlider(index) {
    let currentImage = document.querySelector(`.img-${index}`);

    images.forEach((img) => img.classList.remove("show"));
    currentImage.classList.add("show");

    const textSlider = document.querySelector(".text-group");
    textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

    bullets.forEach((bull) => bull.classList.remove("active"));
    bullets[index - 1].classList.add("active");
}

// Adiciona evento de clique às bullets
bullets.forEach((bullet, index) => {
    bullet.addEventListener("click", () => {
        clearInterval(autoSlide); // Para o slide automático ao clicar manualmente
        moveSlider(index + 1); // Move o slider para o índice correto
        startAutoSlide(); // Reinicia o slide automático após interação manual
    });
});

// Função para mudar o slider automaticamente
function autoMoveSlider() {
    currentIndex = (currentIndex + 1) % images.length; // Atualiza o índice de forma cíclica
    moveSlider(currentIndex + 1); // Muda a imagem no carrossel
}

// Função para iniciar o carrossel automático
let autoSlide;
function startAutoSlide() {
    autoSlide = setInterval(autoMoveSlider, 3000); // Troca de imagem a cada 3 segundos
}

// Inicia o carrossel automático ao carregar a página
startAutoSlide();
function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = field.nextElementSibling;

    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        field.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
setTimeout(function () {
    const messages = document.querySelectorAll('.error-messages, .success-message');
    messages.forEach(function (message) {
        message.style.opacity = '0';
        setTimeout(() => message.remove(), 500); // Remove o elemento após o fade out
    });
}, 5000); // 3000ms = 3 segundos

