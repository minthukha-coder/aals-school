<template>
    <div
        :class="['sidebar', { collapsed: isCollapsed }]"
        class="text-white d-flex flex-column justify-between"
    >
        <!-- Navigation -->
        <ul class="nav flex-column">
            <SideLink
                icon="fa-solid fa-chart-pie"
                text="Home"
                :href="route('admin.home.index')"
                :active="currentRoute === 'admin.home.index'"
            />

            <SideLink
                icon="fa-solid fa-chart-pie"
                text="About"
                :href="route('admin.about.index')"
                :active="currentRoute === 'admin.about.index'"
            />

            <SideLink
                icon="fa-solid fa-chart-pie"
                text="Courses"
                :href="route('admin.courses.index')"
                :active="currentRoute === 'admin.courses.index'"
            />

            <SideLink
                icon="fa-solid fa-chart-pie"
                text="Additional Courses"
                :href="route('admin.additional-courses.index')"
                :active="currentRoute === 'admin.additional-courses.index'"
            />

            <SideLink
                icon="fa-solid fa-chart-pie"
                text="Partnerships"
                :href="route('admin.partnerships.index')"
                :active="currentRoute === 'admin.partnerships.index'"
            />

            <SideLink
                icon="fa-solid fa-chart-pie"
                text="Foundation Courses"
                :href="route('admin.foundation-courses.index')"
                :active="currentRoute === 'admin.foundation-courses.index'"
            />

                   <SideLink
                icon="fa-solid fa-chart-pie"
                text="Cambridge Academic English Courses"
                :href="route('admin.cambridge-courses.index')"
                :active="currentRoute === 'admin.foundation-courses.index'"
            />
        </ul>

        <!-- Toggle Collapse -->
        <div class="text-center p-3">
            <button class="btn btn-sm btn-light" @click="toggleCollapse">
                <i
                    :class="
                        isCollapsed
                            ? 'fa fa-chevron-right'
                            : 'fa fa-chevron-left'
                    "
                ></i>
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import SideLink from "./SideLink.vue";

const isCollapsed = ref(false);
const toggleCollapse = () => {
    isCollapsed.value = !isCollapsed.value;
};

const page = usePage();
const currentRoute = computed(() => page.component);
</script>

<style scoped>
.sidebar {
    background-color: #111827;
    color: #fff;
    width: 250px;
    transition: width 0.3s ease;
    height: 100vh;
    padding-top: 1rem;
    border-right: 2px solid #2d3748;
    position: fixed;
}

.sidebar.collapsed {
    width: 80px;
}

.sidebar.collapsed .nav-link span {
    display: none;
}
</style>
