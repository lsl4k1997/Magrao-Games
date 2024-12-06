function DownloadTorrent(){
    var span1 = document.getElementById('span1')
    var span2 = document.getElementById('span2')
    var veri = document.getElementById('VerificacaoDownload')
    var texto = document.getElementById('nome')
    var cor = document.getElementById('botaoCor')

    if(span1.className == 'mt-1 spinner-border spinner-border-sm'){
        span1.style.display = 'none'
        span2.className = 'bi bi-patch-check'
        veri.style.display = 'none'
        nome.innerHTML = 'ARQUIVO BAIXADO'
        cor.style.backgroundColor = 'rgb(1, 117, 250)'
    }
}