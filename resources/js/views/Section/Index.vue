<template>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="section in sections">
                <td>{{ section.id }}</td>
                <td>
                    <router-link :to="{name: 'section.show', params: { id: section.id }}" class="nav-link">
                        {{ section.title }}
                    </router-link>
                </td>
                <td>
                    <router-link :to="{name: 'section.edit', params: { id: section.id }}" class="nav-link"><i
                        class="bi bi-pen-fill"></i></router-link>
                </td>
                <td><i class="bi bi-trash-fill" @click.prevent="deleteSection(section.id)" role="button"></i></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            sections: null
        }
    },
    mounted() {
        this.getSections();
    },
    methods: {
        getSections() {
            axios.get('/api/v1/sections')
                .then(res => {
                    this.sections = res.data.data;
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
        },
        deleteSection(id) {
            const isAllowed = confirm("Удaлить раздел?");
            if (isAllowed) {
                axios.delete(`/api/v1/sections/${id}`)
                    .then(() => {
                        this.getSections();
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
    },
}
</script>

<style scoped>

</style>
