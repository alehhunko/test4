<template>
    <v-card class="mx-auto d-flex justify-space-between mb-4">
        <v-card-text>
            <span class="subheading">Отступ сверху</span>
            <v-chip-group v-model="sizetop" selected-class="text-deep-purple-accent-4" mandatory>
                <v-chip v-for="size in sizes" :key="size" :value="size">
                    {{ size }}
                </v-chip>
            </v-chip-group>
        </v-card-text>
        
        <v-card-text>
            <span class="subheading">Отступ снизу</span>
            <v-chip-group v-model="sizebottom" selected-class="text-deep-purple-accent-4" mandatory>
                <v-chip v-for="size in sizes" :key="size" :value="size">
                    {{ size }}
                </v-chip>
            </v-chip-group>
        </v-card-text>
    </v-card>
    <v-btn block color="deep-purple-accent-4" @click.prevent="editSize()">
        Изменить
    </v-btn>
</template>

<script>
export default {
    data: () => ({
        sizetop: '2',
        sizebottom: '2',
        sizes: [
            '2', '8', '16', '24',
        ],
    }),

    methods: {
        editSize() {
            axios
                .post("api/size", {
                    sizetop: this.sizetop,
                    sizebottom: this.sizebottom,
                })
                .then((res) => {
                    window.location.reload()
                });
        },
    },
}
</script>