import {defineStore} from 'pinia';
import axios from "axios";
import router from "../../router";


interface TState {
    userData: {
        id: number | null
        email: string | null,
        token: string | null,
        stepikID: string | null,
        knowledge: number | null,
    } | null
}

export default defineStore({
    id: 'user',

    state: (): TState => {
        return {
            userData: null
        };
    },

    getters: {
        isAuth: (state) => !!state.userData,
        getUserData: (state) => state.userData,
    },

    actions: {
        initialState(state: TState) {
            for (const stateKey in state) {
                if (this.hasOwnProperty(stateKey)) {
                    this[stateKey] = state[stateKey];
                }
            }
        },
        register(payload) {
            axios.post('/api/auth/register', payload)
                .then((res) => {
                    this.userData = res.data;
                    router.push('/');
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        login(payload) {
            axios.post('/api/auth/login', payload)
                .then((res) => {
                    this.userData = res.data;
                    router.push('/');
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        logout() {
            axios.post('/api/auth/logout', null, {
                headers: {
                    Authorization: `Bearer ${this.userData?.token}`
                }
            }).then(() => {
                this.userData = null;
                router.push('/');
                window.location.reload();
            });
        },
        getProfileData() {
            axios.get('/api/lk/user', {
                headers: {
                    Authorization: `Bearer ${this.userData?.token}`
                }
            })
                .then((res) => {
                    console.log(res.data);
                })
        },
    },
    persist: true,
});
