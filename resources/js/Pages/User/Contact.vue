<template>
    <Layout>
        <div id="contact-us" class="container-fluid" style="background-color: gainsboro;">
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


            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5 mb-5">

                <!-- Application Form -->
                <div class="border rounded p-3 flex-fill col-md-5">
                    <input type="text" placeholder="Enter your name"
                        class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none" />
                    <input type="text" placeholder="Email"
                        class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none">
                    <div class="flex items-center mb-4">
                        <span class="p-2 border rounded-l-lg bg-gray-100">+95</span>
                        <input type="text" placeholder="Phone"
                            class="w-full p-2 border border-l-0 rounded-r-lg focus:outline-none">
                    </div>
                    <textarea placeholder="Message"
                        class="w-full p-2 mb-4 border border-gray-300 rounded-lg focus:outline-none"></textarea>
                    <div class="d-flex justify-end">
                        <v-btn color="primary">
                            Apply
                        </v-btn>
                    </div>
                </div>

                <!-- Google Map -->
                <div class="border rounded p-3 col-md-7">
                    <GoogleMap api-key="AIzaSyBqvZfzDW7YlZHtfaR-5l1v8f0YkMzswQM"
                        style="width: 100%; height: 100%; min-height: 150px;" :zoom="15" :center="center">
                        <Marker :options="{ position: center }"></Marker>
                    </GoogleMap>
                </div>

            </div>

        </div>
    </Layout>
</template>

<script setup>
import Layout from "../User/Layouts/Layout.vue";
import Card from "../User/Components/Card.vue";
import imageCard from "../User/Components/imageCard.vue";
</script>

<style lang="scss" scoped></style>