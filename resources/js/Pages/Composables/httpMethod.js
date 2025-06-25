import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { router } from '@inertiajs/vue3';
/**
 * post method
 *
 * @param object form - the useForm helper
 * @param string url - route url
 * @param function tasksOnSuccess - a function that will called after onSuccess
 */
const post = (form, url, tasksOnSuccess = () => {}) => {
    form.submit('post', url, {
        preserveScroll: true,
        onSuccess: () => {
            tasksOnSuccess()
            toast.success("Congrats, it's successful!", {autoClose: 6000})
        },

    })
}

/**
 * get method
 *
 * @param object form - the useForm helper
 * @param string url - route url
 * @param function tasksOnSuccess - a function that will called after onSuccess
 */
const get = (form, url, tasksOnSuccess = () => {}) => {
    form.submit('get', url, {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            tasksOnSuccess()
            toast.success("Congrats, it's successful!", {autoClose: 6000})
        }
    })
}

/**
 * update method
 *
 * @param object form - the useForm helper
 * @param string url - route url
 * @param function tasksOnSuccess - a function that will called after onSuccess
 */
const update = (form, url, tasksOnSuccess = () => {}) => {
    let options = {
        preserveScroll: true,
        onSuccess: () => {
            tasksOnSuccess()
            toast.success("Congrats, it's successfully updated!", {autoClose: 6000})
        },
    }
    form.post(url, options)
}

/**
 * delete method
 *
 * @param object form - the useForm helper
 * @param string url - route url
 */
const del = (url) => {
    if(confirm('Sure to delete?')){
        router.delete(url, {
            preserveScroll: true,
            onSuccess: () => {
                toast.success("Congrats, deleted successful!", {autoClose: 6000});
            }
        })
    }
}

export { post, get, update, del }
