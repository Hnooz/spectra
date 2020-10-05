<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">Meals /<span class="text-gray-700"> Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <base-input label="Name" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        <base-input type="number" label="Price" name="price" v-model="form.price" :error="$page.errors.price" required></base-input>
                        <base-input type="text" label="Image" name="image" v-model="form.image" :error="$page.errors.image" required></base-input>
                       <label class="block" for="">
                            <span class="text-gray-700">
                            Category
                            </span>
                            <select class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full" name="category_id" v-model="form.category_id">
                                <option :value="category.id" v-for="category in categories" :key="category.index">
                                    {{category.name}}
                                </option>
                            </select>
                       </label>
                       
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Update Meal</base-button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        props: [
            'meal',
            'categories'],
        data() {
            return {
                form: {
                    name: '',
                    price: '',
                    image: '',
                    category_id:''
                }
            }
        },
        created() {
            this.form = this.meal;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('meals.update', this.meal.id), this.form);
            }
        }
    }
</script>
