import { reactive } from 'vue';

export const eventBus = reactive({
    user: null, 
    setUser(user) {
        this.user = user; 
    },
    clearUser() {
        this.user = null; 
    },
});