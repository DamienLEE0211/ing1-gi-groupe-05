<template>
  <div class="milieu_f_u">
    <div class="formulaire_display">
      <div class="titre1">
        <h1>{{ form_title }}</h1>
        <img
          class="imgform"
          src="../assets/Formulaire.png"
          alt="Photo de formulaire"
          id="imgform"
          width="50"
        />
      </div>
      <hr />
      <form class="formulaire">
        <div class="champ">
          <label for="libelle_p">Libellé:</label>
          <input
            type="text"
            name="libelle"
            id="libelle_p"
            pattern="[a-zA-ZàâæçéèêëîïôùûüÿÀÂÉ-]+"
            required
            title="Ecrire un libellé composé de lettres seulement"
            autofocus
          />
        </div>
        <div class="champ">
          <label class="label_description" for="description"
            >Description:</label
          >
          <textarea
            class="description"
            name="description"
            id="description"
            cols="20"
            rows="5"
            placeholder="Description du projet.."
            required
            title="Ecrire une description du projet"
          ></textarea>
        </div>
        <div class="champ">
            <label for="image">Ajouter une image</label>
            <input type="file" name="image" id="image" accept="image/*">
        </div>
        <div class="gauche">
          <label class="ressources" for="liste_ressources"
            >Ajouter une ressource</label
          >
          <input
            id="liste_ressources"
            class="button_style"
            type="file"
            title="Ajouter une ressource standard à la liste"
            multiple
            @change="GetFileSizeNameAndType()"
          />
        </div>
        <div id="fp"></div>
        <div id="divTotalSize"></div>
        <hr />
        <div class="envoi">
          <button class="bouton_envoi" type="submit">Créer un Projet</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form_title: "Créer un Projet",
      selectionne: "",
      uncomplete: true,
    };
  },
  methods: {
    //test: function {},
    //axios.get("http://127.0.0.1:8000/api/users").then(response => (this.info = response))
    GetFileSizeNameAndType: function() {
        var fi = document.getElementById('liste_ressources');
        var totalFileSize = 0;
        if (fi.files.length > 0)
        {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++)
            {
                //ACCESS THE SIZE PROPERTY OF THE ITEM OBJECT IN FILES COLLECTION. IN THIS WAY ALSO GET OTHER PROPERTIES LIKE FILENAME AND FILETYPE
                var fsize = fi.files.item(i).size;
                totalFileSize = totalFileSize + fsize;
                document.getElementById('fp').innerHTML =
                document.getElementById('fp').innerHTML
                +
                '<br /> ' + 'File Name is <b>' + fi.files.item(i).name
                +
                '</b> and Size is <b>' + Math.round((fsize / 1024)) //DEFAULT SIZE IS IN BYTES SO WE DIVIDING BY 1024 TO CONVERT IT IN KB
                +
                '</b> KB and File Type is <b>' + fi.files.item(i).type + "</b>.";
            }
        }
        document.getElementById('divTotalSize').innerHTML = "Total File(s) Size is <b>" + Math.round(totalFileSize / 1024) + "</b> KB";
    }
  }
};
</script>

<style>
.milieu_f_u {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  /*margin-top: 140px;*/ /*100px de la taille de l'entête + 2*20px de padding de l'entête*/
  background-color: #0e8769;
}

.formulaire_display {
  min-width: 900px;
  width: 900px;
  background-color: white;
  height: auto;
  padding-bottom: 30px;
  border-radius: 20px;
  margin: 20px auto;
}

.titre1 {
  display: flex;
  align-items: center;
  justify-content: center;
}

.imgform {
  margin-left: 20px;
}

.formulaire {
  margin-top: 20px;
  margin-left: 0;
  text-align: center;
}

.actions {
  margin-top: 50px;
  display: flex;
  justify-content: left;
}

.champ {
  font-size: 30px;
  margin-top: 10px;
}

.taillecentrer {
  font-size: 30px;
  text-align: center;
  width: 390px;
}

label ~ input {
  font-size: 30px;
  width: 382px;
}

.label_description {
  vertical-align: top;
}

.description {
  font-size: 20px;
  width: 382px;
  max-width: 382px;
  min-width: 382px;
  max-height: 300px;
  min-height: 100px;
  overflow: scroll;
}

div.champ > label {
  display: inline-block; /* On choisit cette disposition pour donner une width a chaque label et ainsi pouvoir les aligner à droite*/
  width: 420px;
  text-align: right;
}

.date {
  text-align: center;
  width: 382px;
}

.bouton_envoi {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
  color: white;
  background-color: #0e8769;
}

.bouton_envoi:hover {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
  cursor: pointer;
}

.bouton_redirection {
  padding: 10px;
  font-size: 30px;
  border-radius: 10px;
}

div > button {
  padding: 10px;
  font-size: 20px;
  border-radius: 10px;
  margin-left: 10px;
}

.gauche {
  text-align: left;
  margin-top: 10px;
  margin-bottom: 20px;
}

.ressources {
  margin-top: 10px;
  font-size: 20px;
  text-align: left;
  width: 225px;
  margin-left: 10px;
}

.ressources:hover {
  margin-top: 10px;
  font-size: 20px;
  text-align: left;
  width: 225px;
  cursor: pointer;
  color: grey;
}

.decalage {
  margin-left: 15px;
  width: 243px;
}

/*.button_style {
  display: none;
}*/

.envoi {
  text-align: center;
  margin-top: 30px;
}

.msgerreur {
  font-size: 13px;
  color: red;
  margin-left: 52%;
  margin-top: 0;
  text-align: left;
}

.msgerreurdate {
  font-size: 20px;
  color: red;
  text-align: center;
}
</style>