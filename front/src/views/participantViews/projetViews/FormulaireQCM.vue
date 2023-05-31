<template>
  <div class="Q1-mid">
    <div class="quiz-container">
      <div v-for="(question, index) in questions" :key="index">
        <div class="question">{{ question.question }}</div>
        <br />
        <div id="answer-qcm">
          <label >
            <input type="text" v-model="question.answer" />
          </label>
        </div>

        <br />
      </div>
      <button @click="submitAnswers">Submit</button>
    </div>
  </div>
</template>

<style>
.Q1-mid{
  gap: 0;
  background-color: #0E8769;
  height: 100vh;
  text-align: center;
  justify-items: center;
}
.question {
  padding-top: 1em;
  font-size: 20px;
  text-align: center;

}

label {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 10px;
  padding-left: 20%;
  padding-right: 20%;
  text-align: center;
}

input[type="text"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 20px;
  background-color: #4caf50;
  color: #fff;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

</style>
<script>
Vue.createApp({
  data() {
    return {
      links: [
        {text: 'Accueil', url: 'acceuil.html'},
        {text: 'QCM', url: 'qcm.html'},
        {text: 'Data Challenge', url: 'datachallenge.html'}
      ],
      questions: [
        {
          question: "Quelle est la capitale de la France?",
          answer: ""
        },
        {
          question: "Qui a écrit Hamlet'?",
          answer: ""
        },
        {
          question: "Cy-tech est à Paris?",
          answer: ""
        },
        // Ajouter des questions ici
      ],
      currentQuestionIndex: 0,

      webmasters: [
        {id: 1, name: "L'association", fontSize: 18},
        {id: 2, name: "Des question?", fontSize: 18},
        {id: 3, name: 'Nous contacter', fontSize: 18}
      ]
    };
  },
  methods: {
    submitAnswers() {
      // Perform logic with all the answers
      for (const question of this.questions) {
        console.log("Question:", question.question);
        console.log("Answer:", question.answer);
      }

      // Clear the input fields after submission
      for (const question of this.questions) {
        question.answer = "";
      }
    }
  }
}).mount('body');
</script>