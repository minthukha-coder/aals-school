<template>
    <Layout>
        <div id="contact-us" class="container">
            <h3 class="text-center fw-bold">Contact Us</h3>
            <h4 class="fw-bold">General Enquires</h4>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5 place-content-center">
                <div class="flex flex-col items-center">
                    <div class="flex items-center gap-2">
                        <img src="../User/images/telephone.png" alt="" style="width:40px;">
                        <h3>Telephone</h3>
                    </div>
                    <p>09778695126</p>
                    <p>09778695126</p>

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
                    <font-awesome-icon icon="fa-solid fa-location-dot" /> <span class="font-bold">Address : No. (205), Shop House (28), Han-thar-waddy Street, Times City Yangon, Kamaryut, Yangon</span></p>
            </div>


            <div class="flex justify-center items-center mt-5">
                <!-- google map -->
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