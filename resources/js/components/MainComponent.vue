<template>
    <NavBar></NavBar>
    <div class="d-flex justify-start">
        <h1 class="text-decoration-underline">Ответы на вопросы</h1>
    </div>
    <v-container>
        <v-row no-gutters>
            <v-col cols="4" v-for="question in questions">
                <v-sheet class="ma-2 pa-2 bg-grey-lighten-2" >
                    Ответы на вопросы
                    <v-expansion-panels >
                        <v-expansion-panel class="mb-6 mt-2">
                            <v-expansion-panel-title>{{ question.request }}</v-expansion-panel-title>
                            <v-expansion-panel-text>
                                {{ question.response }}
                            </v-expansion-panel-text>
                        </v-expansion-panel>
                    </v-expansion-panels>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import NavBar from './NavBar.vue';
export default {
    data() {
        return {
            questions: [],
        }
    },

    methods: {
        getQuestion() {
            axios.get("api").then((response) => {
                this.questions = response.data;
            });
        },
    },

    mounted() {
        this.getQuestion();
    },
    components: {
        NavBar
    },
}
</script>