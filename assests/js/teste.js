//Detalhes sobre a atração
function detalhesShows(){ 
    var atracao = document.getElementById('atracao').value; 
    document.getElementById('title').innerHTML = atracao;
    var endereco = document.getElementById('endereco').value; 
    document.getElementById('location').innerHTML = endereco;
    var data = document.getElementById('data').value; 
    document.getElementById('data_atracao').innerHTML = data;
    var horario = document.getElementById('horario').value; 
    document.getElementById('hora').innerHTML = horario;
    var arquivo = document.getElementById('arquivo').value; 
    document.getElementById('arq').innerHTML = arquivo;    
} 
window.onload = detalhesShows();

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });