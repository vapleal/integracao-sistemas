// Modal
function showModal(tipo){ // recebe um valor de entrada
    var msg = tipo; // atribui o valor de entrada na variavel
    modal(msg); // passa o valor para a janela e chama a função
    // muda o status de exibição da div de oculta para aparente
    document.getElementById("modal").style.display = "block";
}
function hiddenModal(){
    // sobreescreve a div mensagem com valor vazio
    document.getElementById("mensagem").innerHTML = "";
    // esconde a div modal
    document.getElementById("modal").style.display = "none";
}

// monta modal
// conjunto de páginas para a resposta
var pgResp = ["news.html", "quiz.html"];
// função para resposta botão enviar
function resp(pagina){
    if (pagina === "nletter"){
        window.location.href = pgResp[0];
    }
    else if (pagina === "quiz"){
        window.location.href = pgResp[1];
    }
}
// função abre o modal
function modal(msg){
    var btnTopo = '<button id="fechar" class="btn-janela btn-font btn-cancel" onclick="hiddenModal()"> X </button>';
    var btnBase = '<button id="enviar" class="btn btn-font btn-ok" onclick="resp( \'' + msg + '\' )"> Enviar </button>' +
                  '<button id="cancelar" class="btn btn-font btn-cancel"> Cancelar </button>';
    var Mensagem;
    var div = document.getElementById("mensagem");
    div.classList.remove("video");
    // escolhe a mensagem
    if (msg === "quiz") {
        Mensagem = btnTopo +
                   '<label for="quiz" class="texto1">Qual é a música?</label>' +
                   '</br>' +
                   '<input type="text" name="quiz" id="quiz"/>' +
                   '</br></br>' +
                   btnBase;
    }
    else if (msg === "nletter") {
        Mensagem = btnTopo + 
                   '<label for="nletter" class="texto1">Obrigado por cadastrar</label>' +
                   '</br>' +
                   '<input type="text" name="nome" id="nome" placeholder="Digite seu nome..."/>' +
                   '</br></br>' +
                   btnBase;
    }
    else if (msg === "video"){
        Mensagem = btnTopo +
                   '<video src="media/FF-VII-PS4.mp4" width="100%" controls></video>' +
                   '</br></br>';
        div.classList.add("video");
    }
    // escreve na div mensagem
    div.innerHTML = Mensagem;
}
/* Banner da página index */
// contador de amagens
var imgAtual = 0;
// diretorio de imagens
var dirImg = "imagens";
// elemento de página para o banner
var objBanner = document.querySelector(".banner img");
// grupo de imagens (Array)
var imgBanner = ["banner.jpg",
                 "atari.jpg",
                 "ff-vii-rm-banner.jpg"];
// frases do banner da index
var frases = ["Confira os lançamentos para 2019!", 
              "Conheça a história do vídeo-game.",
              "Final Fantasy VII Remake - PS4: \"Jogo da hora\"(reporter)"];
var objFrase = document.getElementById("informacao");
// função para trocar as imagens
function trocaImagem(){
    // muda o valor da imagem atual a partir do resto 
    // da divisão pelo tamanho do array
    imgAtual = (imgAtual + 1) % imgBanner.length;
    // montar diretorio + imagem
    var imagem = dirImg + "/" + imgBanner[imgAtual];
    // selecionar a div e a tag a ser alterada
    // array[posição da informação]
    objBanner.src = imagem;
    // chamar função do radio button
    mudaRadio();
    // frases da index
    objFrase.innerHTML = "<p>" + frases[imgAtual] + "</p>";
}

// cria um intervalo de tempo para troca da imagem
var trBanner = setInterval(trocaImagem, 1000);
// para animação do banner
function paraBanner(){
    // remove intervalo de animação
    clearInterval(trBanner);
}
// volta animação do banner
function voltaBanner(){
    trBanner = setInterval(trocaImagem, 1000);
}
// avança uma imagem pelo botão
function proximaImg(){
    if (imgAtual === (imgBanner.length - 1)) {
        imgAtual = 0;
    }
    else {
        imgAtual += 1;
    }
    var imagem = dirImg + "/" + imgBanner[imgAtual];
    objBanner.src = imagem;
    objFrase.innerHTML = "<p>" + frases[imgAtual] + "</p>";
    objRG[imgAtual].checked = true;
}
// recua uma imagem pelo botão
function voltaImg(){
    if(imgAtual === 0){
        imgAtual = imgBanner.length - 1;
    }
    else {
        imgAtual -= 1;
    }
    var imagem = dirImg + "/" + imgBanner[imgAtual];
    objBanner.src = imagem;
    objFrase.innerHTML = "<p>" + frases[imgAtual] + "</p>";
    objRG[imgAtual].checked = true;
}
// muda imagem pelo rádio button
var objRadio = document.getElementsByName("rbbanner");
var objRG = [];

for (var i = 0; i < objRadio.length; i++){
    objRG.push(objRadio[i]);
}

function imgRadio(valor){    
    var imgAtual = valor;
    var imagem = dirImg + "/" + imgBanner[imgAtual];
    objBanner.src = imagem;
    objFrase.innerHTML = "<p>" + frases[valor] + "</p>";
}

function mudaRadio(){
    //console.log(" -> " + imgAtual);
    for (var i = 0; i < objRG.length; i++){
        if (i === imgAtual){
            objRG[i].checked = true;
          //  console.log(objRG[i].value + " -> " + imgAtual);
        }
        else {
            objRG[i].checked = false;
        }
    }
}


