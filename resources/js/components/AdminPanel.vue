<template>
    <NavBar></NavBar>
    <v-container>
        <v-row justify="center" no-gutters>
            <v-col cols="6">
                <v-card>
                    <v-tabs v-model="tab" bg-color="primary">
                        <v-tab value="one">Контент</v-tab>
                        <v-tab value="two">Дизайн</v-tab>
                    </v-tabs>

                    <v-card-text>
                        <v-window v-model="tab">
                            <v-window-item value="one">
                                <v-form>
                                    <v-text-field v-model="request" label="Задать вопрос"></v-text-field>
                                    <v-text-field v-model="response" label="Ответить"></v-text-field>
                                </v-form>
                                <v-btn @click.prevent="addQuestion()">Добавить</v-btn>
                                <v-divider></v-divider>
                            </v-window-item>

                            <v-window-item value="two">
                                Two
                            </v-window-item>
                        </v-window>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import NavBar from './NavBar.vue';
export default {
    data() {
        return {
            tab: null,
            request: '',
            response: '',
            requests: [],
        }
    },
    components: {
        NavBar
    },

    methods: {
        getQuestion() {
            axios.get("api/").then((response) => {
                this.requests = response.data;
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
    },
}
</script>