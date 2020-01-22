<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="landing.css">
        <script src="eventos.js" language="javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include 'Lead.php';
            include 'LandingForm.php';

            $nome = $email = $telefone = $mensagem = "";
            $nomeErr = $emailErr = $telefoneErr = $mensagemErr = "";
            $sucessoMsg = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["nome"])) {
                    $nomeErr = "Digite o nome";
                } else {
                    $nome = testa_entrada($_POST["nome"]);

                    if (!preg_match("/^[a-zA-Z ]*$/", $nome)) {
                        $nomeErr = "Digite apenas letras e espaços";
                    }
                }

                if (empty($_POST["email"])) {
                    $emailErr = "Digite o email";
                } else {
                    $email = testa_entrada($_POST["email"]);

                    if (!preg_match("/^[a-zA-Z0-9\@\.\-\_]*\@{1}[a-zA-Z0-9\@\.\-\_]*\.{1}[a-zA-Z0-9\.\-\_]+$/", $email)) {
                        $emailErr = "Formato de email incorreto";
                    }
                }

                if (empty($_POST["telefone"])) {
                    $telefoneErr = "Digite o telefone";
                } else {
                    $telefone = testa_entrada($_POST["telefone"]);

                    if (!preg_match("/^[0-9]{2}[0-9]{4,5}[0-9]{4}$/", $telefone)) {
                        $telefoneErr = "Digite o telefone no formato correto";
                    }
                }

                if (empty($_POST["mensagem"])) {
                    $mensagemErr = "Digite a mensagem";
                } else {
                    $mensagem = testa_entrada($_POST["mensagem"]);

                    if (!preg_match('/^[^\f]{10,255}$/', $mensagem)) {
                        $mensagemErr = "Digite pelo menos 10 caracteres";
                    }
                }

                if (empty($nomeErr) and empty($emailErr) and empty($telefoneErr) and empty($mensagemErr)) {
                    $lead = new Lead($nome, $email, $telefone, $mensagem);
                    $control = new LandingForm();

                    if ($control->salvar($lead)) {
                        $sucessoMsg = "<span id='sucessoMsg'><strong>Seus dados foram salvos com sucesso!</strong></span>";
                    }
                }

            }

            function testa_entrada($dados) {
                $dados = trim($dados);
                $dados = stripslashes($dados);
                $dados = htmlspecialchars($dados);
                return $dados;
            }
        ?>
        <picture>
            <source media="(max-width: 576px)" srcset="img/bg-mobile.png">
            <img id="imgCabecalho" src="img/bg.png" alt="tudo novo Volkswagen">
        </picture>
        <ul id="menu" class="nav justify-content-center">
            <li class="nav-item">
                <p id="menuPolo" onclick="carroPolo(this)" class="nav-link txtCarros">Novo Polo</a>
            </li>
            <li class="nav-item">
                <p id="menuUp" onclick="carroUp(this)" class="nav-link txtCarros">Up!</a>
            </li>
        </ul>

        <div id="contConteudo" class="container-fluid">
            <div id="conteudo" class="row">
                <div class="col-md-6">
                    <div class="col-8">
                        <div id="tarja" class="row">
                            <div id="novoPolo1" class="col-4 caixa">
                                <div class="row justify-content-end">
                                    <div class="row container justify-content-center">
                                        <p id="nomeCarro" class="txtTarja"><strong>NOVO POLO</strong></p>
                                    </div>
                                    <div class="row container justify-content-center">
                                        <p id="motorCarro" class="txtTarja">1.0 MPI</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 caixa">
                                <div class="row">
                                    <p id="txtTarjaValor" class="txtTarja tarjaValor">A PARTIR DE <strong>R$ 49.990,00</strong></p>
                                </div>
                                <div class="row">
                                    <p id="txtTarjaTaxa" class="txtTarja tarjaValor">+ TAXA <strong>0%</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <img id="carro" src="img/novo-polo-vitoriawagen-2.png" alt="Novo Polo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <p id="txtForm1"><strong>SAIA NA FRENTE E GARANTA SEU VOLKSWAGEN.</strong></p>
                    </div>
                    <div class="row justify-content-center">
                        <p id="txtForm2"><strong>Escolha o modelo que você deseja e receba ofertas imperdíveis em primeira mão.</strong></p>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="row justify-content-center">
                        <div class="col-lg-6">
                            <input class="container-fluid inputs" type="text" name="nome" value="<?php echo $nome;?>" placeholder="nome">
                            <span class="error"><?php echo $nomeErr;?></span>
                            <input class="container-fluid inputs" type="email" name="email" value="<?php echo $email;?>" placeholder="e-mail">
                            <span class="error"><?php echo $emailErr;?></span>
                            <input class="container-fluid inputs" type="telefone" name="telefone" value="<?php echo $telefone;?>" placeholder="telefone">
                            <span class="error"><?php echo $telefoneErr;?></span>
                        </div>
                        <div class="col-lg-6">
                            <textarea class="container-fluid inputs" name="mensagem" rows="4" style="resize: none" placeholder="mensagem"><?php echo $mensagem;?></textarea>
                            <span class="error"><?php echo $mensagemErr;?></span>
                            <button class="container-fluid" type="submit" id="btnGaranta" class="btn btn-success"><p id="txtBtnGaranta" style="white-space: nowrap; margin: 0; padding: 0;">GARANTA AGORA</p></button>
                            <?php echo $sucessoMsg ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="tarjaAzul" class="row justify-content-center">
            <p id="txtTarjaAzul">Imagens ilustrativas. Novo Polo 1.0 MPI - preto - 
                a partir de R$ 49.990,00 - condição de taxa 0% válida exclusivamente 
                para modelos 1.0 MPI e 1.6 MSI com entrada de 90% e saldo em 12 meses. 
                Promoção válida até 28/02/2018 ou enquanto durar o estoque.
            </p>
        </div>
        <div id="bgLogoVitoriawagen" class="row justify-content-center">
            <img src="img/rodape.png">
        </div>
        <ul id="menuCidade" class="nav justify-content-center">
            <li class="nav-item">
                <p id="menuVitoria" onclick="cidadeVitoria()" class="nav-link txtCidade">Vitória</a>
            </li>
            <li class="nav-item">
                <p id="menuSerra" onclick="cidadeSerra()" class="nav-link txtCidade">Serra</a>
            </li>
        </ul>
        <div id="tarjaEndereco" class="row">
            <div class="row justify-content-center rowEndereco">
                <div class="col-1">
                    <i class="material-icons">room</i>
                </div>
                <div class="col-xl-4">
                    <p id="endereco" class="txtContato">Av. Vitória, 1047 - Romão - Vitória - Cep 29041-405</p>
                </div>
            </div>
            <div class="row justify-content-center rowEndereco">
                <div class="col-1">
                    <i class="material-icons">mail</i>
                </div>
                <div class="col-xl-3">
                    <p class="txtContato">E-mail: vitoriawagen@grupolider.com.br</p>
                </div>
            </div>
            <div class="row justify-content-center rowEndereco">
                <div class="col-1">
                    <i class="material-icons">phone</i>
                </div>
                <div class="col-xl-2">
                    <p id="telefone" class="txtContato">Tel (27) 3331-8100</p>
                </div>
            </div>
            <div class="row justify-content-center rowEndereco">
                <div class="col-1">
                    <img id="facebook" src="img/face.png" alt="facebook">
                </div>
                <div class="col-1">
                    <img id="instagram" src="img/insta.png" alt="instagram">
                </div>
            </div>
        </div>
    </body>
</html>