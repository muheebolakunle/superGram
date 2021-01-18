<template>
    <div>
        <button class="btn btn-primary" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['userId', 'follows'],

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods : {
            followUser () {
                axios
                    .post('/follow/' + this.$props.userId)
                    .then( response => {
                        console.log(response.data);
                        this.status = !this.status;
                        })
                    .catch(errors => {
                        // console.log(errors.response.status);
                        if(errors.response.status =='401'){
                            window.location = "/login";
                        }
                    });
            }
        },

        computed: {
            buttonText: function () {
                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>
