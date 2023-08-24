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
                                <Content></Content>
                            </v-window-item>

                            <v-window-item value="two">
                                <Design></Design>
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
import Design from './AdminPanelDesign.vue';
import Content from './AdminPanelContent.vue';
export default {
    data() {
        return {
            tab: null,
        }
    },
    components: {
        NavBar,
        Design,
        Content
    },

    methods: {
    },
}
</script>