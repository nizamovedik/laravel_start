<template>
    <div class="col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Редактирование раздела</h4>
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
                                            :disabled="!title"
                                            class="btn btn-primary me-1 mb-1"
                                            @click.prevent="update()">
                                        Обновить
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
    name: "Edit",
    data() {
        return {
            title: null,
            description: null,
            image: null,
        }
    },
    mounted() {
        this.id = this.$route.params.id;
        this.getSectionById(this.id);
    },
    methods: {
        getSectionById(id){
            axios.get(`/api/v1/sections/${id}`)
                .then(res => {
                    this.title = res.data.data.title;
                    this.description = res.data.data.description;
                    this.image = res.data.data.image;
                });
        },
        onFileChange(e) {
            this.image = e.target.files[0];
        },
        update(){
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };
            let formData = new FormData();
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('image', this.image);
            axios.patch(`/api/v1/sections/${this.id}`, formData, config)
                .then(() => {
                    this.$router.push({name: 'section.show', params: {id: this.id}});
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
</script>


<style scoped>

</style>
