export default function profileStore() {
    return {
        loggedIn: false,
        name: null,
        login(name) {
            this.loggedIn = true;
            this.name = name;
        },
        logout() {
            this.loggedIn = false;
            this.name = null;
        }
    }
}
