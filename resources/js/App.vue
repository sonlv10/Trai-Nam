<template>
    <v-app>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </v-app>
</template>

<script>
    import FooterComponent from "./components/FooterComponent";
    import HeaderComponent from "./components/HeaderComponent";
    import { mapState, mapActions } from 'vuex'
    export default {
        name: "App",
        components: {HeaderComponent, FooterComponent},
        computed: mapState({
            products: state => state.products.all
        }),
        methods: mapActions('cart', [
            'addProductToCart'
        ]),
        created () {
            this.$store.dispatch('products/getAllProducts')
        }
    }
</script>

<style scoped>

</style>