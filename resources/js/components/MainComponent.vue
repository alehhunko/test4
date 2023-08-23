<template>
    <NavBar></NavBar>
    <div class="d-flex justify-start">
        <h1 class="text-decoration-underline">Ответы на вопросы</h1>
    </div>
    <v-container>
        <v-row no-gutters>
            <v-col cols="4">
                <v-sheet class="ma-2 pa-2 bg-grey-lighten-2">
                    Ответы на вопросы
                    <v-expansion-panels>
                        <v-expansion-panel>
                            <v-expansion-panel-title>Lorem ipsum dolor sit amet?</v-expansion-panel-title>
                            <v-expansion-panel-text>
                                <p>Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
        }
    },
    components: {
        NavBar
    },
}
</script>