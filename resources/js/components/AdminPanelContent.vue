<template>
  <v-sheet class="ma-2 pa-2 bg-grey-lighten-2" v-for="question in questions">
    <div class="d-flex justify-space-between">
      <p>Ответы на вопросы</p>
      <div>
        <v-btn icon="$edit" size="x-small"
          @click.prevent="changeQuestionID(question.id, question.request, question.response)"></v-btn>
        <v-btn icon="$delete" size="x-small" class="ml-2" @click.prevent="deleteQuestionID(question.id)"></v-btn>
      </div>
    </div>
    <v-expansion-panels>
      <v-expansion-panel class="mb-6 mt-2">
        <v-expansion-panel-title :style="{ 'margin-top': top + 'px', 'margin-bottom': bottom + 'px' }">{{ question.request }}</v-expansion-panel-title>
        <v-expansion-panel-text :style="{ 'margin-top': top + 'px', 'margin-bottom': bottom + 'px' }">
          {{ question.response }}
        </v-expansion-panel-text>
      </v-expansion-panel>
    </v-expansion-panels>

    <v-card v-if="question.id === questionID">
      <v-card-text>
        <v-text-field v-model="request" label="Вопрос"></v-text-field>
        <v-text-field v-model="response" label="Ответ"></v-text-field>
      </v-card-text>
      <v-card-actions class="d-flex justify-end">
        <v-btn color="primary" @click.prevent="editQuestion(question.id)">Изменить</v-btn>
      </v-card-actions>
    </v-card>
  </v-sheet>

  <v-divider></v-divider>

  <div class="text-center">
    <v-btn prepend-icon="$plus" color="primary" @click="dialog = true">
      Добавить еще
    </v-btn>
    <v-dialog v-model="dialog" width="760">
      <v-card>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col>
                <v-text-field v-model="request" label="Задать вопрос"></v-text-field>
              </v-col>
              <v-col>
                <v-text-field v-model="response" label="Ответить"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions class="d-flex justify-end">
          <v-btn color="primary" @click.prevent="dialog = false">Закрыть</v-btn>
          <v-btn color="primary" @click.prevent="addQuestion()">Добавить</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>

export default {
  data() {
    return {
      request: '',
      response: '',
      questions: [],
      dialog: false,
      questionID: '',
      top: '',
      bottom: '',

    }
  },

  methods: {
    getQuestion() {
      axios.get("api/request").then((response) => {
        this.questions = response.data;
      });
    },

    getSize() {
      axios.get("api/size").then((response) => {
        this.top = response.data[0].sizetop;
        this.bottom = response.data[0].sizebottom;
      });
    },

    addQuestion() {
      axios
        .post("api/request", {
          request: this.request,
          response: this.response,
        })
        .then((res) => {
          this.getQuestion();
          this.request = "";
          this.response = "";
        });
    },

    changeQuestionID(id, request, response) {
      this.questionID = id;
      this.request = request;
      this.response = response;
    },

    editQuestion(id) {
      axios.patch(`api/request/${id}`, {
        request: this.request,
        response: this.response,
      }).then((response) => {
        this.getQuestion();
        this.questionID = '';
      });
    },

    deleteQuestionID(id) {
      axios.delete(`api/request/${id}`).then((response) => {
        this.getQuestion();
      });
    },
  },

  mounted() {
    this.getQuestion();
    this.getSize();
  },
}
</script>