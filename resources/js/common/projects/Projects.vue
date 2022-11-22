<template>
    <div class="page_wrap_vue" :class="$vuetify.breakpoint.xsOnly?'':''">
        <transition name="fade">
            <router-view :key="$route.fullPath"> </router-view>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            active: '',
        };
    },
    mounted() {
        const self = this;
    },
};
</script>
