<template>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-4 shadow rounded rounded-4 p-5">
      <div class="w-100 text-white">
        <p class="title mb-4">Profile</p>

        <form class="form">
          <!-- Email -->
          <div class="input-group mt-3">
            <label for="email" style="color:#70e000">Email</label>
            <input v-model="form.email" type="email" id="email" placeholder="Enter your email" />
          </div>

          <!-- Password -->
          <div class="input-group mt-3">
            <label for="password" style="color:#70e000">Password</label>
            <input
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              id="password"
              placeholder="New password"
            />
          </div>

          <!-- Confirm Password -->
          <div class="input-group mt-3">
            <label for="password_confirmation" style="color:#70e000">Confirm Password</label>
            <input
              v-model="form.password_confirmation"
              :type="showPassword ? 'text' : 'password'"
              id="password_confirmation"
              placeholder="Confirm new password"
            />
          </div>

          <!-- Show password checkbox -->
          <div class="form-check mt-2">
            <input type="checkbox" class="form-check-input" v-model="showPassword" id="showPassword">
            <label class="form-check-label text-white" for="showPassword">Show password</label>
          </div>

          <!-- Submit button -->
          <button type="button" class="sign mt-3" @click="submit">Update Profile</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';
import { route } from 'ziggy-js';
import { router } from '@inertiajs/vue3';

const toast = useToast();
const page = usePage();

const showPassword = ref(false);

const user = page.props.user || {};

const form = useForm({
  email: user.email || '',
  password: '',
  password_confirmation: '',
});


const submit = () => {
  form.post(route('admin.profile.update'), {
    onSuccess: () => {
      toast.success('Profile updated successfully!');
      form.password = '';
      form.password_confirmation = '';
    },
    onError: (errors) => {
      for (let key in errors) {
        toast.error(errors[key]);
      }
    },
  });
};
</script>

<style scoped>
.title {
  font-size: 23px;
  font-weight: 600;
  color: #70e000;
  position: relative;
  display: flex;
  align-items: center;
  padding-left: 30px;
}
.title::before,
.title::after {
  content: "";
  position: absolute;
  left: 0;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background-color: #70e000;
}
.title::after {
  animation: pulse 1s linear infinite;
}

.form {
  margin-top: 1.5rem;
}
.input-group {
  margin-top: 0.5rem;
}
.input-group label {
  display: block;
  margin-bottom: 4px;
  color: rgba(156, 163, 175, 1);
}
.input-group input {
  width: 100%;
  border-radius: 5px !important;
  border: 1px solid #70e000;
  outline: 0;
  padding: 0.75rem 1rem;
  color: #70e000;
}
.input-group input:focus {
  border-color: grey;
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
