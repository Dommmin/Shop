<template>
    <AdminLayout title="Index">
        <template #header>
            Produkty
        </template>

        <div class="py-12">
            <div class="sm:px-6 lg:px-8">
                <div class="mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="px-4 py-6 sm:px-0">

                        <div class="flex justify-end mb-4">
                            <Link class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded-xl text-white" :href="route('product.create')">
                                <span>Dodaj</span>
                                <span class="hidden md:inline"> produkt</span>
                            </Link>
                        </div>

                        <div class="bg-white rounded-md shadow overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead>
                                <tr class="text-left font-bold bg-sky-700 text-xl text-white">
                                    <th class="pb-4 pt-3 px-4">Nazwa</th>
                                    <th class="pb-4 pt-3 px-4">Kategoria</th>
                                    <th class="pb-4 pt-3 px-4">Marka</th>
                                    <th class="pb-4 pt-3 px-4">Kolor</th>
                                    <th class="pb-4 pt-3 px-4">Na stanie</th>
                                    <th class="pb-4 pt-3 px-4">Opublikowany</th>
                                    <th class="pb-4 pt-3 px-4">Cena</th>
                                    <th class="pb-4 pt-3 px-4">Dodał</th>
                                    <th class="pb-4 pt-3 px-4"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="product in products" class="hover:bg-sky-200 bg-sky-100">
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.name }}
                                            <!--                                            <icon v-if="organization.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />-->
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.category }}/{{ product.subcategory }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.brand }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.color }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.in_stock }} szt.
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.is_public }}
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.price }} zł
                                        </Link>
                                    </td>
                                    <td class="border-t">
                                        <Link class="flex items-center px-4 py-4" :href="route('product.edit', product.id)" tabindex="-1">
                                            {{ product.user }}
                                        </Link>
                                    </td>
                                    <td class="border-t py-4 px-4 text-right">
                                        <Menu as="div" class="relative inline-block text-left">
                                            <div>
                                                <MenuButton
                                                    class="bg-red-500 inline-flex w-full justify-center rounded-md bg-black bg-opacity-60 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-80 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                                                >
                                                    Actions
                                                    <ChevronDownIcon
                                                        class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-violet-100"
                                                        aria-hidden="true"
                                                    />
                                                </MenuButton>
                                            </div>

                                            <transition
                                                enter-active-class="transition duration-100 ease-out"
                                                enter-from-class="transform scale-95 opacity-0"
                                                enter-to-class="transform scale-100 opacity-100"
                                                leave-active-class="transition duration-75 ease-in"
                                                leave-from-class="transform scale-100 opacity-100"
                                                leave-to-class="transform scale-95 opacity-0"
                                            >
                                                <MenuItems
                                                    class="fixed right-10 md:right-20 mt-2 w-36 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                >
                                                    <div class="px-1 py-1">
                                                        <MenuItem v-slot="{ active }">
                                                            <button :class="[active ? 'bg-violet-500 text-white' : 'text-gray-900','group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                                                                Duplikuj
                                                            </button>
                                                        </MenuItem>
                                                    </div>

                                                    <div class="px-1 py-1">
                                                        <MenuItem v-slot="{ active }">
                                                            <a href="#" @click="destroy(product.id)" :class="[active ? 'bg-violet-500 text-white' : 'text-gray-900','group flex w-full items-center rounded-md px-2 py-2 text-sm']">
                                                                Usuń
                                                            </a>
                                                        </MenuItem>
                                                    </div>
                                                </MenuItems>
                                            </transition>
                                        </Menu>
                                    </td>

                                    <!--                                    <td class="w-px border-t">-->
                                    <!--                                        icon-->
                                    <!--                                    </td>-->
                                </tr>
                                <!--                                <tr>-->
                                <!--                                    v-if="organizations.data.length === 0"-->
                                <!--                                >-->
                                <!--                                    <td class="px-6 py-4 border-t" colspan="4">No organizations found.</td>-->
                                <!--                                </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed top-16 w-56 text-right">

        </div>

    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    products: Object
});

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        Inertia.delete(route('product.destroy', id));
    }
};

import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import {Inertia} from "@inertiajs/inertia";
</script>

