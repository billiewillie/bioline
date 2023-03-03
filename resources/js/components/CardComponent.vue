<template>
    <div class="card mb-5 p-2">
        <p class="fs-2">домен: <b>{{ domain.domain }}</b></p>
        <p class="fs-4">Общее число просмотров на этом домене: <b>{{ domain.visited_count }}</b></p>
        <p class="fs-4">
            Выберите период для просмотра статистики баннера на домене.
        </p>
        <small class="mb-3">Для просмотра статистики за месяц оставьте 0 в колонке числа месяца.</small>
        <form type="post" action="/api/stats" class="d-flex gap-3 align-items-end">
            <div>
                <span>число месяца</span>
                <select class="form-select" aria-label="Default select example" v-model="stats.day">
                    <template v-for="(day, index) in (1,32)">
                        <option :value="index" :selected="stats.day === index">{{ index }}</option>
                    </template>
                </select>
            </div>
            <div>
                <span>месяц</span>
                <select class="form-select" aria-label="Default select example" v-model="stats.month">
                    <template v-for="month in 12">
                        <option :value="month" :selected="stats.month === month">{{ month }}</option>
                    </template>
                </select>
            </div>
            <div>
                <span>год</span>
                <select class="form-select" v-model="stats.year">
                    <option v-for="year in years" :value="year" :selected="stats.year === year">{{
                            year
                        }}
                    </option>
                </select>
            </div>
            <button @click.prevent="getStats(domain.id)" type="submit" class="btn btn-primary">Посмотреть
                статистику
            </button>
        </form>
        <div class="stat_result mt-5" v-if="result.all_views != null">
            <p>Общее число просмотров за выбранный период: {{ result.all_views }}</p>
            <p>Число просмотров с уникальных IP за выбранный период: {{ result.unique_views }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardComponent",
    props: ['domain'],
    data() {
        return {
            stats: {
                id: null,
                day: 0,
                month: 1,
                year: 2023
            },
            result: {
                all_views: null,
                unique_views: null
            }
        }
    },
    methods: {
        getStats(id) {
            this.stats.id = id.toString();
            axios.post('/api/stats', {...this.stats}).then(data => {
                this.result = {...data.data};
                console.log({...data})
            })
        }
    },
    computed: {
        years() {
            const year = new Date().getFullYear()
            return Array.from({length: year - 2022}, (value, index) => 2023 + index)
        }
    }
}
</script>

<style scoped>

</style>
