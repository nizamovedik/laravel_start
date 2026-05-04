<template>
    <div class="row" v-if="section">
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">{{ section.title }}</h4>
                        <p class="card-text">
                            {{ section.description }}
                        </p>
                    </div>
                    <img :alt="section.title"
                         class="img-fluid w-100"
                         v-if="Object.keys(section.image).length > 0"
                         :src="section.image"
                    >
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <router-link :to="{name: 'section.edit', params: { id: section.id }}" class="btn btn-light-primary">
                        Редактировать
                    </router-link>
                    <button class="btn btn-outline-danger" @click.prevent="deleteSection(section.id)">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    data() {
        return {
            section: null
        }
    },
    mounted() {
        this.id = this.$route.params.id;
        this.getSectionById(this.id);
    },
    methods: {
        getSectionById(id) {
            axios.get(`/api/v1/sections/${id}`)
                .then(res => {
                    this.section = res.data.data;
                });
        },
        deleteSection(id) {
            const isAllowed = confirm("Удaлить раздел?");
            if (isAllowed) {
                axios.delete(`/api/v1/sections/${id}`)
                    .then(() => {
                        this.$router.push({name: 'section.index'});
                    })
                    .catch((error) => {
                        if (error.response) {
                            // Сервер ответил кодом ошибки (4xx, 5xx)
                            console.log(error.response.data);
                            console.log(error.response.status);
                        } else if (error.request) {
                            // Запрос был сделан, но ответ не получен (Network Error)
                            console.log(error.request);
                        } else {
                            // Произошла ошибка при настройке запроса
                            console.log('Error', error.message);
                        }
                    });
            }
        }
    }
}

</script>

<style scoped>

</style>
