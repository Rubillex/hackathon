import {defineStore} from 'pinia';
import axios from "axios";


interface TState {
    userData: {
        id: number | null
        email: string | null,
        token: string | null,
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
        login(payload) {
            axios.post('/api/auth/login', payload)
                .then((res) => {
                    this.userData = res.data;
                })
                .catch((err) => {
                    console.log(err);
                })
        },
        getProfileData() {
            axios.get('/api/lk/user', { headers: {
                    Authorization: `Bearer ${this.userData?.token}`
                }})
                .then((res) => {
                    console.log(res.data);
                })
        },
    },
    persist: true,
});
