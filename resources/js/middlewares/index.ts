import user from "../store/modules/user";
import router from "../router";

export const authMiddleware = async () => {
    const store = user();
    const isLogged = store.isAuth;
    if (!isLogged) {
        await router.push('/sign-in');
        return false;
    }
    return true;
};
