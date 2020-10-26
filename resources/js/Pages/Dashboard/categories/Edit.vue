<template>
    <form @update.prevent="submit">
        <input :disabled="this.show == !category.id" class="border border-indigo-300 px-3 rounded text-gray-600" type="text"   name="name" :error="$page.errors.updatename" v-model="updatename" required>
        <base-button primary hidden>update Category</base-button>
        <button @click="test" type="submit">test</button>
    </form>  
</template>

<script>
    export default {
        props:[
            'category',
            'show'
        ],

        data() {
            return {
                updatename:''
            }
        },
        created(){
            this.updatename = this.category.name
        },
        methods: {
            test(){
                try {
                    console.log(this.update());
                    
                } catch (error) {
                    console.log(error);
                }
            },
            update() {
                this.$inertia.put(this.$route('categories.update', this.category.id), this.updatename);
            },
        },
    }
</script>
