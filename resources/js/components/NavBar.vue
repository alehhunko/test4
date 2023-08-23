<template>
    <v-breadcrumbs :items="items">
        <template v-slot:title="{ item }">
            {{ item.title.toUpperCase() }}
        </template>
    </v-breadcrumbs>
</template>
<script>
export default {
    data() {
        return {
            items: [
                {
                    title: 'Main',
                    disabled: false,
                    href: '/',
                },
                {
                    title: 'Admin',
                    disabled: false,
                    href: '/adminpanel',
                },
                {
                    title: 'Sing in',
                    disabled: false,
                    href: '/singin',
                },
            ],
        }
    },
    components: {
    },
}
</script>