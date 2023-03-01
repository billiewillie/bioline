<template>
    <div class="container">
        <p>Всего просмотров баннера: <b>{{ data.all_views }}</b></p>
        <p>Уникальных просмотров баннера: <b>{{ data.unique_views }}</b></p>
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
