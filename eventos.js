//nomeCarro NOVO POLO UP
//carro polo
//take-up-vermelho.png
//novo-polo-vitoriawagen-2.png

function carroPolo() {
    document.getElementById("nomeCarro").innerHTML = "NOVO POLO";
    document.getElementById("carro").src = "img/novo-polo-vitoriawagen-2.png";
    document.getElementById("carro").alt = "Novo Polo";
    document.getElementById("txtTarjaAzul").innerHTML = 'Imagens ilustrativas. Novo Polo 1.0 MPI - preto - a partir de R$ 49.990,00 - condição de taxa 0% válida exclusivamente para modelos 1.0 MPI e 1.6 MSI com entrada de 90% e saldo em 12 meses. Promoção válida até 28/02/2018 ou enquanto durar o estoque.'
    document.getElementById("menuPolo").style.backgroundColor = "#0697ce";
    document.getElementById("menuUp").style.backgroundColor = "transparent";

}

function carroUp() {
    document.getElementById("nomeCarro").innerHTML = "UP!";
    document.getElementById("carro").src = "img/take-up-vermelho.png";
    document.getElementById("carro").alt = "Up!";
    document.getElementById("txtTarjaAzul").innerHTML = 'Imagens ilustrativas. Up! 1.0 MPI - preto - a partir de R$ 49.990,00 - condição de taxa 0% válida exclusivamente para modelos 1.0 MPI e 1.6 MSI com entrada de 90% e saldo em 12 meses. Promoção válida até 28/02/2018 ou enquanto durar o estoque.'
    document.getElementById("menuUp").style.backgroundColor = "#0697ce";
    document.getElementById("menuPolo").style.backgroundColor = "transparent";
}

function cidadeVitoria() {
    document.getElementById("endereco").innerHTML = "Av. Vitória, 1047 - Romão - Vitória - Cep 29041-405";
    document.getElementById("telefone").innerHTML = "Tel (27) 3331-8100";
    document.getElementById("menuVitoria").style.backgroundColor = "#0697ce";
    document.getElementById("menuSerra").style.backgroundColor = "transparent";
}

function cidadeSerra() {
    document.getElementById("endereco").innerHTML = "Rod. BR 101 Norte, KM 264,91, 5030, B. Planalto de Carapina - Serra - Cep 29162-703";
    document.getElementById("telefone").innerHTML = "Tel (27) 3298-3400";
    document.getElementById("menuSerra").style.backgroundColor = "#0697ce";
    document.getElementById("menuVitoria").style.backgroundColor = "transparent";
}