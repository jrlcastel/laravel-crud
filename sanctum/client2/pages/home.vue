<template>

    <div>
        You are logged in as: {{$auth.user.name}} <br>
        <b-button variant="primary" @click="logout()">Logout</b-button>
    </div>
</template>

<script>
export default {
    middleware: ["guest"],
    methods: {
        async logout() {
            try{
                await this.$auth.logout();
                if (!this.$auth.loggedIn) {
                console.log("Logged out.");
                this.$router.push("/");
                }
            } catch (error) {
                console.log(error)
            }
        }
    }
}
</script>