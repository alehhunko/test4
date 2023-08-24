<template>
    <NavBar></NavBar>
    <div class="d-flex justify-start">
        <h1 class="text-decoration-underline">Ответы на вопросы</h1>
    </div>
    <v-container>
        <v-row no-gutters>
            <template v-for="question in questions">
                <v-col cols="4" :style="{ 'margin-top': top + 'px', 'margin-bottom': bottom + 'px' }">
                    <v-sheet class="ma-2 pa-2 bg-grey-lighten-2">
                        Ответы на вопросы
                        <v-expansion-panels>
                            <v-expansion-panel>
                                <v-expansion-panel-title>{{ question.request }}</v-expansion-panel-title>
                                <v-expansion-panel-text>
                                    {{ question.response }}
                                </v-expansion-panel-text>
                            </v-expansion-panel>
                        </v-expansion-panels>
                    </v-sheet>
                </v-col>
            </template>
        </v-row>
    </v-container>
</template>

<script>
import NavBar from './NavBar.vue';
export default {
    data() {
        return {
            questions: [],
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
    },

    mounted() {
        this.getQuestion();
        this.getSize();
    },
    components: {
        NavBar
    },
}
</script>