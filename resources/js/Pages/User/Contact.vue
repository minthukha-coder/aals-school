<template>
    <Layout>
        <div id="contact-us" class="container-fluid">
            <p class="text-center text-2xl fw-bold">Contact Us</p>
            <h4 class="fw-bold">General Enquires</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 place-content-center">
                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-2">
                        <img src="../User/images/telephone.png" alt="" style="width:40px;">
                        <h3>Telephone</h3>
                    </div>
                    <div class="flex flex-col items-center">
                        <span>09778695126</span>
                        <span>09778695126</span>
                    </div>

                    <div class="flex items-center gap-2 mt-3">
                        <div class="flex justify-center items-center bg-blue-500 rounded-full w-10 h-10">
                            <font-awesome-icon icon="fa-solid fa-envelope" class="text-white" />
                        </div>
                        <div class="flex justify-center items-center bg-blue-500 rounded-full w-10 h-10">
                            <font-awesome-icon icon="fa-brands fa-facebook" class="text-white" />
                        </div>
                        <div class="flex justify-center items-center bg-red-500 rounded-full w-10 h-10">
                            <font-awesome-icon icon="fa-brands fa-youtube" class="text-white" />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center">
                    <img src="../User/images/email.png" alt="" style="width:40px;">

                    <h3>Mail</h3>
                    <span>09778695126</span>
                </div>

                <div class="flex flex-col items-center">
                    <h3>Contact Time</h3>
                    <div class="flex items-center ">
                        <img src="../User/images/clock.png" alt="" style="width:40px;" class="me-3">
                        <span>7:00 - 5:00</span>
                    </div>
                </div>
            </div>

            <div id="address" class="flex justify-center mt-5">
                <p class="flex items-center">
                    <font-awesome-icon icon="fa-solid fa-location-dot" /> <span class="font-bold text-xl">Address : No.
                        (205), Shop House (28), Han-thar-waddy Street, Times City Yangon, Kamaryut, Yangon</span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" style="background-color:#aaf683;">

            <!-- Application Form -->
            <div class="rounded-2xl p-3">
                <input v-model="form.name" type="text" placeholder="Enter your name"
                    class="w-full p-3 mb-4 border bg-white rounded-lg focus:outline-none" />

                <input v-model="form.email" type="email" placeholder="Email"
                    class="w-full p-3 mb-4 border bg-white rounded-lg focus:outline-none" />

                <div class="flex items-center mb-4 ">
                    <span class="p-3 border rounded-l-lg bg-white text-gray-600">+95</span>
                    <input v-model="form.phone" type="text" placeholder="Phone"
                        class="w-full p-3 border bg-white border-l-0 rounded-r-lg focus:outline-none" />
                </div>

                <textarea v-model="form.user_message" placeholder="Message" rows="4"
                    class="w-full p-3 mb-2 border bg-white rounded-lg focus:outline-none"></textarea>

                <div class="flex justify-end">
                    <v-btn @click="contact" color="primary" class="px-6 rounded-xl shadow-md">
                        Send
                    </v-btn>
                </div>
            </div>

            <!-- Google Map -->
            <div class="overflow-hidden">
                <div id="map" style="width: 100%; height: 460px;"></div>
            </div>

        </div>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import { onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3'
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const center = { lat: 16.863395753560457, lng: 96.06817014376111 };

const form = useForm({
    name: '',
    email: '',
    phone: '',
    user_message: '',
})
const contact = () => {
    form.post(route('contact.submit'));
}

onMounted(() => {
    // Create map instance
    const map = L.map('map').setView([center.lat, center.lng], 15);

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add marker
    L.marker([center.lat, center.lng]).addTo(map);
});

</script>

<style scoped>
/* Fix Leaflet icon issue */
.leaflet-marker-icon {
    background-image: url('https://unpkg.com/leaflet@1.9.4/dist/images/marker-icon.png');
}
</style>
