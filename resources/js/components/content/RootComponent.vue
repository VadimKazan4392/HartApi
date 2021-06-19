<template>
<div >
    <div v-for="post in allPosts" :key="post.id">
        <div class="row">
            <h3>{{post.title}}</h3>
            <p>{{post.body}}</p>
        </div> 
    </div>
</div>
</template>


<script>

import {mapGetters, mapActions} from 'vuex'

export default {
    computed: mapGetters(["allPosts"]),

    methods: mapActions(["fetchPosts"]),

    mounted() {
        this.fetchPosts()
    }
}
</script>

<style scoped>

</style>