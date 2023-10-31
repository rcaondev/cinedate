document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("filmeForm");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    var nomeFilme = document.getElementById('nomeFilme').value;
    var data = document.getElementById('data').value;
    var local = document.getElementById('local').value;
    var foto = document.getElementById('foto').files[0];

    var formData = new FormData();
    formData.append('nomeFilme', nomeFilme);
    formData.append('data', data);
    formData.append('local', local);
    formData.append('foto', foto);

    fetch('salvar_filme.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Erro ao salvar filme:', error));
  });
});



// moviedb API  
  function buscarFilmes(query) {
    var apiKey = '068e2ba427fdf7f5a163f5ca409d0042';
    var url = `https://api.themoviedb.org/3/search/movie?api_key=${apiKey}&language=pt-BR&query=${query}`;
  
    fetch(url)
      .then(response => response.json())
      .then(data => mostrarResultados(data.results))
      .catch(error => console.error('Erro ao buscar filmes:', error));
  }

  function mostrarResultados(filmes) {
    var resultadosDiv = document.getElementById('resultados');
    resultadosDiv.innerHTML = ''; // Limpar resultados anteriores
  
    filmes.forEach(filme => {
      var div = document.createElement('div');
      div.textContent = filme.title;
      div.classList.add('resultado-filme');
      div.addEventListener('click', function() {
        document.getElementById('nomeFilme').value = filme.title;
        resultadosDiv.innerHTML = ''; // Limpar resultados após a seleção
      });
      resultadosDiv.appendChild(div);
    });
  }
  