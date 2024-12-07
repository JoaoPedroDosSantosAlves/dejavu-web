

// Função para alternar a visibilidade da sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active'); // Alterna a classe 'active'
}

// Adiciona evento de clique para cada botão na sidebar
document.querySelectorAll('.sidebar button').forEach(button => {
    button.addEventListener('click', () => {
        // Remove a classe 'active' de todos os botões
        document.querySelectorAll('.sidebar button').forEach(btn => {
            btn.classList.remove('active'); // Remove a classe active
        });
        
        // Adiciona a classe 'active' ao botão clicado
        button.classList.add('active'); // Adiciona a classe active
    });
});
