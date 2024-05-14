let produto = document.getElementById('produto');
let valor = document.getElementById('valor');
let saida = document.getElementById('saida');

produto.addEventListener('input', () => {
    //saida.textContent = produto.value;
});
valor.addEventListener('input', () => {
    let value = valor.value;
    saida.textContent = formatarMoeda(value);
});
// Função para formatar o valor como moeda brasileira (real)
function formatarMoeda(valor) {
    // Converte o valor para um número float
    valor = parseFloat(valor);
    // Verifica se o valor é um número
    if (!isNaN(valor)) {
        // Formata o valor como moeda brasileira (real)
        return valor.toLocaleString('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        });
    } else {
        // Se o valor não for um número, retorna vazio
        return '';
    }
}