<template>
    <div class="col-lg-1.5 col-md-1.5 d-lg-flex d-md-flex d-sm-flex justify-between">
        <div>
            <ul class="p-2">
                <SideLink :href="route('admin.home.index')" icon="fa-solid fa-house"
                 :isOpen="showHome"
                    text="Home" />
                <SideLink :href="route('admin.about.index')" icon="fa-solid fa-address-card":isOpen="showAbout"
                    text="About" />
                <SideLink :href="route('admin.partnerships.index')" icon="fa-solid fa-heart-circle-plus"
                    :isOpen="showPartnership" text="Partnerships" />
                <SideLink :href="route('admin.courses.index')" icon="fa-solid fa-book" :isOpen="showCourse"
                    text="Courses" />
                <SideLink :href="route('admin.additional-courses.index')" icon="fa-solid fa-book-bookmark"
                    :isOpen="showAdditionalCourse" text="Additional Courses" />
                <SideLink :href="route('admin.foundation-courses.index')" icon="fa-solid fa-book-journal-whills" 
                    :isOpen="showFoundationCourse" text="Foundation Courses" />
                <SideLink :href="route('admin.cambridge-courses.index')" icon="fa-solid fa-newspaper"
                    :isOpen="showCambridgeCourse" text="Cam-Academic Courses" />
                <SideLink :href="route('admin.cambridge-exam-courses.index')" icon="fa-solid fa-book-tanakh"
                    :isOpen="showCambridgeExamCourse" text="Cambridge Exam Courses" />
                <SideLink :href="route('admin.international-courses.index')" icon="fa-solid fa-scroll"
                    :isOpen="showInternationalCourse" text="International Exam Services" />

                <!-- <SideLink :href="route('admin.location.index')" icon="fa-solid fa-map-location-dot" :isOpen="showLocation"
                    text="Location" /> -->

                <SideLink :href="route('admin.positions.index')" icon="fa-solid fa-users-gear":isOpen="showPosition"
                    text="Position" />

            </ul>

        </div>
    </div>

</template>

<script setup>
import { ref, computed } from "vue";
import { route } from "ziggy-js";
import SideLink from "./SideLink.vue";

const showHome = ref(route().current("admin.home.index"));
const showAbout = ref(route().current("admin.about.index"));
const showCourse = ref(route().current("admin.courses.index"));
const showAdditionalCourse = ref(route().current("admin.additional-courses.index"));
const showPartnership = ref(route().current("admin.partnerships.index"));
const showFoundationCourse = ref(route().current("admin.foundation-courses.index"));
const showCambridgeCourse = ref(route().current("admin.cambridge-courses.index"));
const showCambridgeExamCourse = ref(route().current("admin.cambridge-exam-courses.index"));
const showInternationalCourse = ref(route().current("admin.international-courses.index"));
// const showLocation = ref(route().current("admin.location.index"));
const showPosition = ref(route().current("admin.position.index"));
</script>

<style scoped>
.sidebar {
    background-color: #111827;
    color: #fff;
    width: 280px;
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
