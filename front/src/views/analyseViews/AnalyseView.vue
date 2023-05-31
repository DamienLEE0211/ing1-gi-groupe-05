<template>
  <div>
    <div class="background">
      <MenuHeader></MenuHeader>
      <h1>Analyse de fichier python</h1>
      <br>

      <div class="input">
        <div id="haut">
          <label id="label" for="InputText">Liste d'occurrences (séparation virgule)</label>
          <input name="input" id="InputText" type="text" >
          <span id="span"></span>
          <br>
          <label for="file-input" class="file-label">
            <span class="button-text">Choisir un fichier</span>
            <input type="file" id="file-input" name="fichier" accept=".py" @change="handleFileSelect">
          </label>
        </div>
        <br>
      </div>

      <br>
      <h3 hidden=true; class="titreG">Information générale</h3>
      <div class="chart-containers">
        <canvas aria-label="chart" ref="barCanvas1" width="300" height="300"></canvas>
      </div>

      <h3 hidden=true; class="titreG">Liste d'occurrences</h3>
      <div class="chart-containers">
        <canvas aria-label="chart" ref="barCanvas2" width="300" height="300"></canvas>
      </div>

      <h3 hidden=true; class="titreG">La plus grande fonction par rapport au nombre de ligne</h3>
      <div class="chart-containers">
        <canvas aria-label="chart" ref="pieCanvas1" width="300" height="300"></canvas>
      </div>
      <h3 hidden=true; class="titreG">La plus petite fonction par rapport au nombre de ligne</h3>
      <div class="chart-containers">
        <canvas aria-label="chart" ref="pieCanvas2" width="300" height="300"></canvas>
      </div>
      <Footer></Footer>
    </div>
  </div>
</template>



<style scoped>

.file-label {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  text-align: center;
}

.file-label:hover {
  background-color: #2980b9;
}

#file-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}

.button-text {
  font-size: 14px;
}


#fileInput {
  color: transparent;
}

#haut{
  background-color:white;
  padding:30px;
  border-radius:5px;
  color:black;
  display: flex;
  flex-direction: column;
  align-items: center;
}

#file{
  color:black;
}

#InputText{
  background-color:white;
  padding:3px;
  border:1px solid black;
  border-radius:5px;
}

.chart-containers {
  margin-top: 20px;
  width: 50%;
  margin: 20px;
  border-radius:10px;
}

.background{
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #0e8769;
  color:white;
}

canvas {
  margin-top: 10px;
}
</style>


<script>
import MenuHeader from '../../components/MenuHeader.vue' 
import Footer from '../../components/Footer.vue'
import { ref } from 'vue'
import Chart from 'chart.js/auto'

export default {
  
  components : {
  Footer,
  MenuHeader
  },
  setup() {
    const barCanvas1 = ref(null);
    const barCanvas2 = ref(null);
    const pieCanvas1 = ref(null);
    const pieCanvas2 = ref(null);
    let chart1 = null;
    let chart2 = null;
    let chart3 = null;
    let chart4 = null;

    const createChart = (canvas, data) => {
      const ctx = canvas.getContext('2d');
      const chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.labels,
          datasets: [
            {
              label: 'Valeurs',
              data: data.values,
              backgroundColor: 'blue',
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
        },
      });

      return chart;
    };

    const createPieChart = (canvas, data) => {
      let titre = '';
      let pourcentage = 0;

  if (canvas === pieCanvas1.value) {
    titre = 'MaxLigne';
    pourcentage = (data.maxLigne / data.nbLigne) * 100;
  } else {
    titre = 'MinLigne';
    pourcentage = (data.minLigne / data.nbLigne) * 100;
  }

  const ctx = canvas.getContext('2d');
  const chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [titre,'LigneRestante'],
      datasets: [
        {
          data: [pourcentage,100-pourcentage],
          backgroundColor: ['blue', 'red'],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: function (context) {
              let label = context.label || '';

              if (label) {
                label += ': ';
              }

              if (context.parsed) {
                label += context.parsed.toFixed(2) + '%';
              }

              return label;
            },
          },
        },
      },
    },
  });

  return chart;
};



    const updateChart = (canvas, apiURL, fileContent) => {
      const requestOptions = {
        method: 'POST',
        headers: { 'Content-Type': 'text/plain' },
        body: fileContent,
        redirect: 'follow',
      };

      fetch(apiURL, requestOptions)
        .then((response) => response.json())
        .then((jsonData) => {
          const labels = Object.keys(jsonData);
          const values = Object.values(jsonData);

          let chart;

          if (canvas === barCanvas1.value) {
            if (chart1) {
              chart1.destroy();
            }
            chart = createChart(canvas, { labels, values });
            chart1 = chart;
            const maxLigne = jsonData.MaxLigneFonction;
            const minLigne = jsonData.minLigneFonction;
            const nbLigne = jsonData.nbLigne;

            if (chart3) {
              chart3.destroy();
            }
            chart3 = createPieChart(pieCanvas1.value, { maxLigne, nbLigne });

            if (chart4) {
              chart4.destroy();
            }
            chart4 = createPieChart(pieCanvas2.value, { minLigne, nbLigne });




          }else if (canvas === barCanvas2.value) {
            if (chart2) {
              chart2.destroy();
            }
            chart = createChart(canvas, { labels, values });
            chart2 = chart;
          }

        })
        .catch((error) =>
          console.log('Erreur lors de la récupération des données de l\'API:', error)
        );
    };



const handleFileSelect = (event) => {
 
  const api2 = document.getElementById('InputText').value;

  if (api2 == "") {
    document.getElementById("label").style.color = "red";
    document.getElementById("span").style.color = "red";
    document.getElementById("span").innerHTML = "Erreur veuillez rentrer vos occurrences";
    event.target.value = "";
  } else {
  
    document.getElementById("label").style.color = "black";
    document.getElementById("span").innerHTML = "";
    var elements = document.getElementsByClassName("chart-containers");
    

  // Parcourir tous les éléments avec la classe spécifiée
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];

  // Changer la couleur de l'arrière-plan en blanc
     element.style.backgroundColor = "white";
}

    var elements = document.getElementsByClassName("titreG");

  // Parcourir tous les éléments avec la classe spécifiée
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];

// Changer la couleur de l'arrière-plan en blanc
   element.hidden=false;
}
    
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = (e) => {
      const fileContent = reader.result;
      updateChart(barCanvas1.value, 'http://localhost:8001/api', fileContent);
      updateChart(barCanvas2.value, 'http://localhost:8001/api/' + api2, fileContent);
    };

    reader.readAsText(file);    // Effacer la valeur de l'élément <input> après la sélection du fichier

 // Réinitialiser la valeur de l'élément <input>
 document.getElementById('file-input').value = '';
  }
};



    return {
      barCanvas1,
      barCanvas2,
      pieCanvas1,
      pieCanvas2,
      handleFileSelect,
    };
  },
};
</script>