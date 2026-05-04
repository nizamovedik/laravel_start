<template>
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Добавление раздела</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Название</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" v-model="title" id="title" class="form-control" name="title"
                                           placeholder="Введите название">
                                </div>
                                <div class="col-md-4">
                                    <label>Описание</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <textarea v-model="description" id="description" class="form-control" name="description"
                                              placeholder="Введите описание"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Изображение</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="file" name="image" id="image" class="form-control" @change="onFileChange">
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit"
                                            :disabled="isDisabled"
                                            class="btn btn-primary me-1 mb-1"
                                            @click.prevent="store()">
                                        Добавить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            title: null,
            description: null,
            image: null,
        }
    },
    methods: {
        onFileChange(e) {
            this.image = e.target.files[0];
        },
        store() {
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('image', this.image);
            axios
                .post('/api/v1/sections', formData, config)
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
        },
    },
    computed: {
        isDisabled() {
            return !this.title;
        }
    }
}
</script>

<style scoped>

</style>
