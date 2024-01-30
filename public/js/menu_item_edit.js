// Selecionar todos os botões de edição
const editButtons = document.querySelectorAll('.edit-btn');

// Adicionar um evento de clique a cada botão de edição
editButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Encontrar a linha da tabela
        const row = button.closest('tr');

        // Iterar sobre as células da linha, exceto a última (ações)
        for (let i = 0; i < row.cells.length - 1; i++) {
            const cell = row.cells[i];

            // Verificar se o elemento é uma célula de texto
            if (cell.tagName === 'TD') {
                // Obter o texto atual da célula
                const cellText = cell.innerText.trim();

                // Criar um campo de entrada para edição com o texto atual
                cell.innerHTML = `<input type="text" value="${cellText}">`;
            }
        }
    });
});
