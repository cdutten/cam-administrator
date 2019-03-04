<template>
    <div class="users">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <ul v-if="info">
            <li v-for="{ id, name } in info">
                <strong>Id:</strong> {{ id }},
                <strong>Name:</strong> {{ name }}
            </li>
        </ul>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                loading: false,
                info: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.info = null;
                this.loading = true;
                axios
                    .get('/api/cameras')
                    .then(response => {
                        console.log(response.data.data);
                        this.loading = false;
                        this.info = response.data.data;
                    });
            }
        }
    }
</script>