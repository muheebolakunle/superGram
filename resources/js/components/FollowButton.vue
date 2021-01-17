<template>
    <div>
        <button class="btn btn-primary" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['userId'],

        methods : {
            followUser: function () {
                axios
                    .post('/follow/' + this.$props.userId)
                    .then( function(response){alert(response.data)})
                    .catch(error => console.log(error));
            }
        }
    }
</script>
