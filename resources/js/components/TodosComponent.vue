<template>
    <div>
    <h3>Todos List</h3>
    <ul class="list-group">
        <li class="list-group-item" :key="todo.id" v-for="todo in todos">{{ todo.title }}</li>
    </ul>
    </div>
</template>

<script>
   export default {
        data(){
            return {todos:[]}
        },
        created(){
            axios.get('/api/todos')
            .then((response) => {
                this.todos = [...response.data];
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
</script>
