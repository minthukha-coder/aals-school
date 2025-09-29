<template>
    <div class="col-lg-1.5 col-md-1.5 d-lg-flex d-md-flex d-sm-flex justify-between">
        <div>
            <ul class="p-2">
                <SideLink :href="route('admin.home.index')" icon="fa-solid fa-house" :isOpen="showHome" text="Home" />
                <SideLink :href="route('admin.about.index')" icon="fa-solid fa-address-card" :isOpen="showAbout"
                    text="About" />
                <SideLink :href="route('admin.partnerships.index')" icon="fa-solid fa-heart-circle-plus"
                    :isOpen="showPartnership" text="Partnerships" />
                <SideLink :href="route('admin.courses.index')" icon="fa-solid fa-book" :isOpen="showCourse"
                    text="Courses" />

                     <SideLink :href="route('admin.igcse-courses.index')" icon="fa-solid fa-book" :isOpen="showCourse"
                    text="IGCSE Courses" />
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

                <SideLink :href="route('admin.contents.index')" icon="a-solid fa-file-contract" :isOpen="showContent"
                    text="Content" />
                    
                <SideLink :href="route('admin.positions.index')" icon="fa-solid fa-users-gear" :isOpen="showPosition"
                    text="Position" />

            </ul>

        </div>
    </div>

</template>

<script setup>
import { ref, computed } from "vue";
import { route } from "ziggy-js";
import SideLink from "./SideLink.vue";

const showHome = ref(
    route().current("admin.home.index")
);

const showAbout = ref(
    route().current("admin.about.index") ||
    route().current("admin.about.edit")
);

const showPartnership = ref(
    route().current("admin.partnerships.index") ||
    route().current("admin.partnerships.create") ||
    route().current("admin.partnerships.edit")
);

const showCourse = ref(
    route().current("admin.courses.index") ||
    route().current("admin.courses.create") ||
    route().current("admin.courses.edit")
);

const showIGCSECourse = ref(
    route().current("admin.igcse-courses.index") ||
    route().current("admin.igcse-courses.create") ||
    route().current("admin.igcse-courses.edit")
);

const showAdditionalCourse = ref(
    route().current("admin.additional-courses.index") ||
    route().current("admin.additional-courses.create") ||
    route().current("admin.additional-courses.edit")
);

const showFoundationCourse = ref(
    route().current("admin.foundation-courses.index") ||
    route().current("admin.foundation-courses.create") ||
    route().current("admin.foundation-courses.edit")
);

const showCambridgeCourse = ref(
    route().current("admin.cambridge-courses.index") ||
    route().current("admin.cambridge-courses.create") ||
    route().current("admin.cambridge-courses.edit")
);

const showCambridgeExamCourse = ref(
    route().current("admin.cambridge-exam-courses.index") ||
    route().current("admin.cambridge-exam-courses.create") ||
    route().current("admin.cambridge-exam-courses.edit")
);

const showInternationalCourse = ref(
    route().current("admin.international-courses.index") ||
    route().current("admin.international-courses.create") ||
    route().current("admin.international-courses.edit")
);

// const showLocation = ref(
//     route().current("admin.location.index") ||
//     route().current("admin.location.create") ||
//     route().current("admin.location.edit")
// );

const showContent = ref(
    route().current("admin.contents.index") ||
    route().current("admin.contents.create") ||
    route().current("admin.contents.edit")
);

const showPosition = ref(
    route().current("admin.positions.index") ||
    route().current("admin.positions.create") ||
    route().current("admin.positions.edit")
);
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
