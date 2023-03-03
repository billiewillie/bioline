<template>
    <div class="container p-5">
        <h2>Всего просмотров баннера: <b>{{ data.all_views }}</b></h2>
        <h3 class="mb-4">Уникальных просмотров баннера: <b>{{ data.unique_views }}</b></h3>
        <div v-for="domain in data.domains">
            <CardComponent :domain="domain"></CardComponent>
        </div>
    </div>
</template>

<script>
import CardComponent from "./CardComponent.vue";
export default {
    name: "DomainComponent",

    data() {
        return {
            data: {
                all_views: null,
                unique_views: null,
                domains: null
            },
        }
    },

    mounted() {
        this.getDomains();
    },

    methods: {
        getDomains() {
            axios.get('/api/domains').then((data) => {
                this.data = data.data;
                console.log({...data.data})
            })
        },
    },

    components: {
        CardComponent
    }
}
</script>
