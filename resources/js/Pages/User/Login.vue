<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-4 shadow rounded rounded-4 p-5">
            <div class="w-100 text-white">
                <p class="title mb-4">Welcome from AALS School
                </p>
                <form class="form">
                    <div class="input-group">
                        <label for="username" style="color:#70e000">Email</label>
                        <input v-model="form.email" type="text" name="username" id="username" placeholder="">
                    </div>p
                    <div class="input-group">
                        <label for="password" style="color:#70e000">Password</label>
                        <input @keyup.enter="submit" v-model="form.password" :type="showPassword ? 'text' : 'password'" name="password" id="password" placeholder="">

                    </div>
                    <input type="checkbox" v-model="showPassword" id="showPassword">
                    <button @click="submit" type="button" class="sign">Sign in</button>
                </form>


            </div>
        </div>
    </div>

</template>

<script setup>

import { Link, useForm,usePage } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";
import { route } from 'ziggy-js';
import { ref, onMounted, onUpdated } from 'vue'

const toast = useToast();
const page = usePage();

const form = useForm({
    email: '',
    password: '',
});
const showPassword = ref(false);


const submit = () => {

    if (form.email == '' || form.password == '') {
        toast.warning('All fields are required');
        return;
    }

    form.post('/login', {
        onSuccess: (response) => console.log(response),
        onError: (error) => console.log(error)

    });
}

onMounted(() => {
console.log(page);
    if (page.props.flash) {
        if (page.props.flash.success) {
            toast.success(page.props.flash.success);
            page.props.flash.success = '';
        } else if (page.props.flash.failed) {
            toast.error(page.props.flash.failed);
            page.props.flash.failed = '';
        }
    }
})


</script>

<style scoped>
.form-container {
    width: 320px;
    border-radius: 0.75rem;
    background-color: rgba(17, 24, 39, 1);
    padding: 2rem;
    color: rgba(243, 244, 246, 1);
}

.title {
    font-size: 23px;
    font-weight: 600;
    /* letter-spacing: -1px; */
    position: relative;
    display: flex;
    align-items: center;
    padding-left: 30px;
    color: #70e000;
}

.title::before {
    width: 18px;
    height: 18px;
}

.title::after {
    width: 18px;
    height: 18px;
    animation: pulse 1s linear infinite;
}

.title::before,
.title::after {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 0px;
    background-color: #70e000;
}

.form {
    margin-top: 1.5rem;
}

.input-group {
    margin-top: 0.25rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
}

.input-group label {
    display: block;
    color: rgba(156, 163, 175, 1);
    margin-bottom: 4px;
}

.input-group input {
    width: 100%;
    border-radius: 5px !important;
    border: 1px solid #70e000;
    outline: 0;
    /* background-color: #FE919D; */
    padding: 0.75rem 1rem;
    color: #70e000;
}

.input-group input:focus {
    border-color: grey;
}

.forgot {
    display: flex;
    justify-content: flex-end;
    font-size: 0.75rem;
    line-height: 1rem;
    color: rgba(156, 163, 175, 1);
    margin: 8px 0 14px 0;
}

.forgot a,
.signup a {
    color: #70e000;
    text-decoration: none;
    font-size: 14px;
}

.forgot a:hover,
.signup a:hover {
    text-decoration: underline rgba(167, 139, 250, 1);
}

.sign {
    display: block;
    width: 100%;
    background-color: #70e000;
    padding: 0.75rem;
    text-align: center;
    color: white;
    border: none;
    border-radius: 0.375rem;
    font-weight: 600;
}

.social-message {
    display: flex;
    align-items: center;
    padding-top: 1rem;
}

.line {
    height: 1px;
    flex: 1 1 0%;
    background-color: rgba(55, 65, 81, 1);
}

.social-message .message {
    padding-left: 0.75rem;
    padding-right: 0.75rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color:
    #70e000;
}

.social-icons {
    display: flex;
    justify-content: center;
}

.social-icons .icon {
    border-radius: 0.125rem;
    padding: 0.75rem;
    border: none;
    background-color: transparent;
    margin-left: 8px;
}

.social-icons .icon svg {
    height: 1.25rem;
    width: 1.25rem;
    fill: #70e000;
}

.signup {
    text-align: center;
    font-size: 0.75rem;
    line-height: 1rem;
    color: rgba(156, 163, 175, 1);
}

@keyframes pulse {
    from {
        transform: scale(0.9);
        opacity: 1;
    }

    to {
        transform: scale(1.8);
        opacity: 0;
    }
}
</style>
