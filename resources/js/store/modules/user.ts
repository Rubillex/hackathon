import {defineStore} from 'pinia';


type TState = {
    email: string | null,
}

export default defineStore({
    id: 'user',

    state: (): TState => ({
        email: null,
    }),

    getters: {
        isAuth: (state) => !!state.email,
    },

    actions: {
        initialState(state: TState) {
            for (const stateKey in state) {
                if (this.hasOwnProperty(stateKey)) {
                    this[stateKey] = state[stateKey];
                }
            }
        },
    },
});
