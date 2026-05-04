<template>

    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="section in sections">
                <td>{{ section.id }}</td>
                <td>{{ section.title }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
</style>

<script>
export default {
    name: "SectionsComponent",

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
                    this.sections = res.data;
                    console.log(res.data);
                })
                .catch();
        }
    }

}
</script>
