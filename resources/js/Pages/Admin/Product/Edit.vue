<template>
    <AdminLayout title="Index">
        <template #header>
            {{ form.name }}
        </template>

        <div class="py-2">
            <div class="sm:px-6 lg:px-8 bg-gray-100">
                <div class="mx-auto py-6 sm:px-6 lg:px-8 max-w-[50rem]">

                    <form @submit.prevent="form.put(route('product.update', form.id))">
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6 bg-indigo-500 bg-opacity-20">
                                <div class="m-4">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nazwa</label>
                                    <input v-model="form.name" id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.name" class="text-red-600">
                                            {{ errors.name }}
                                        </div>
                                    </div>
                                </div>

                                <!-- ////////////////////////////////////////// -->

                                <div class="m-4">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Wybierz kategorię i podkategorię</label>
                                    <div class="flex">
                                        <select v-model="form.category" name="category" id="category" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                            <option selected disabled>-- Wybierz kategorię --</option>
                                            <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                                        </select>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.category" class="text-red-600">
                                                {{ errors.category }}
                                            </div>
                                        </div>
                                        <label for="subcategory" class="sr-only">Wybierz podkategorię</label>
                                        <select v-model="form.subcategory_id" name="subcategory" id="subcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg border-l-gray-100 dark:border-l-gray-700 border-l-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>-- Wybierz podkategorię --</option>
                                            <option v-for="subcategory in subcategories" :value="subcategory.id">{{ subcategory.name }}</option>
                                        </select>
                                    </div>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.subcategory_id" class="text-red-600">
                                            {{ errors.subcategory_id }}
                                        </div>
                                    </div>
                                </div>



                                <!--                                <div v-for="category in categories">-->
                                <!--                                    <div v-for="subcategory in category.subcategories">-->
                                <!--                                        <div v-if="subcategory.category_id === form.category">-->
                                <!--                                            <pre>{{ subcategory.name }}</pre>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!-- ////////////////////////////////////////// -->

                                <!--                                <div class="m-4">-->
                                <!--                                    <label for="subcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Podkategoria</label>-->
                                <!--                                    <select v-model="form.subcategory_id" name="subcategory" id="subcategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-->
                                <!--                                        <option selected>&#45;&#45; Wybierz podkategorię &#45;&#45;</option>-->
                                <!--                                        <option v-for="subcategory in subcategories" :value="subcategory.id">{{ subcategory.name }}</option>-->
                                <!--                                    </select>-->
                                <!--                                    <div class="text-red-600 mt-1">-->
                                <!--                                        <div v-if="errors.subcategory" class="text-red-600">-->
                                <!--                                            {{ errors.subcategory }}-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->

                                <!-- ////////////////////////////////////////// -->

                                <div class="m-4">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Marka</label>
                                    <select v-model="form.brand_id" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>-- Wybierz markę --</option>
                                        <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
                                    </select>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.brand_id" class="text-red-600">
                                            {{ errors.brand_id }}
                                        </div>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kolor</label>
                                    <select v-model="form.color" id="color" name="color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>-- Wybierz kolor --</option>
                                        <option v-for="(index, color) in colors">
                                            {{ color }}
                                        </option>
                                    </select>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.color" class="text-red-600">
                                            {{ errors.color }}
                                        </div>
                                    </div>
                                    <!--                                <div class="p-6 ml-2 rounded-full border border-black" :class="[colors[form.color]]"></div>-->
                                </div>

                                <div class="m-4">
                                    <label for="typ" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Wybierz typ i rozmiar</label>
                                    <div class="flex">
                                        <select v-model="form.types" name="typ" id="typ" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                            <option selected disabled>-- Wybierz typ --</option>
                                            <option v-for="typ in types">{{ typ }}</option>
                                        </select>
                                        <div class="text-red-600 mt-1">
                                            <div v-if="errors.types" class="text-red-600">
                                                {{ errors.types }}
                                            </div>
                                        </div>

                                        <label for="size" class="sr-only">Wybierz rozmiar</label>
                                        <select v-model="form.size" name="size" id="size"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg border-l-gray-100 dark:border-l-gray-700 border-l-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected disabled>-- Wybierz rozmiar --</option>
                                            <option v-for="size in sizes[form.types]">{{ size }}</option>
                                        </select>
                                    </div>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.size" class="text-red-600">
                                            {{ errors.size }}
                                        </div>
                                    </div>
                                </div>


                                <div class="m-4">
                                    <label for="material" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Materiał</label>
                                    <select v-model="form.material" name="material" id="material" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>-- Wybierz materiał --</option>
                                        <option v-for="material in materials">{{ material }}</option>
                                    </select>
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.material" class="text-red-600">
                                            {{ errors.material }}
                                        </div>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Cena</label>
                                    <input v-model="form.price" id="price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.price" class="text-red-600">
                                            {{ errors.price }}
                                        </div>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <label for="in_stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ilość</label>
                                    <input v-model="form.in_stock" id="in_stock" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <div class="text-red-600 mt-1">
                                        <div v-if="errors.in_stock" class="text-red-600">
                                            {{ errors.in_stock }}
                                        </div>
                                    </div>
                                </div>

                                <div class="m-4">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                                    <textarea
                                        name="description"
                                        id="description"
                                        cols="100"
                                        rows="6"
                                        v-model="form.description"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    ></textarea>
                                    <div class="text-red-600 mt-1 w-full">
                                        <div v-if="errors.description" class="text-red-600">
                                            {{ errors.description }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button :disabled="isLoading" class="inline-flex items-center px-3 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl disabled:opacity-75 disabled:cursor-not-allowed w-full justify-center md:w-auto">
                                <div v-show="isLoading" class="inline-block animate-spin w-4 h-4 mr-2 border-t-2 border-t-white border-r-2 border-r-white border-b-2 border-b-white border-l-2 border-l-indigo-600 rounded-full"></div>
                                <span v-if="isLoading">Processing...</span>
                                <span v-else class="px-2">Save</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const isLoading = ref(false);

const props = defineProps({
    errors: Object,
    product: Object,
    categories: Object,
    brands: Object,
    subcategories: Object
});

const form = useForm(props.product);

const colors = {
    'Czarny': 'bg-black',
    'Brązowy': 'bg-custom-brown',
    'Beżowy': 'bg-custom-beige',
    'Szary': 'bg-custom-gray',
    'Biały': 'bg-white',
    'Niebieski': 'bg-custom-blue',
    'Morski': 'bg-custom-teal',
    'Turkusowy': 'bg-custom-turquoise',
    'Zielony': 'bg-custom-green',
    'Oliwkowy': 'bg-custom-olive',
    'Żółty': 'bg-custom-yellow',
    'Pomarańczowy': 'bg-custom-orange',
    'Czerwony': 'bg-custom-red',
    'Różowy': 'bg-custom-rose',
    'Liliowy': 'bg-custom-lilac',
    // 'Kolorowy'
};

const types = [
    'Spodnie', 'Buty', 'Odzież'
];

const sizes = {
    'Odzież': ['XS', 'S', 'M', 'L', 'XL', 'XXL', '3XL'],
    'Buty': ['36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50'],
    'Spodnie': ['26', '28', '30', '32', '34']
};

const materials = [
    'Bawełna', 'Wełna', 'Jedwab', 'Poliester', 'Wiskoza', 'Skóra', 'Kaszmir', 'Dżersej'
];
</script>
