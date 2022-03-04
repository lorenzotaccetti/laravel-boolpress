<template>
    <div>
        <ul>
            <li v-for="(link, index) in links" :key="index">
                <router-link :to="{ name: link.name }">
                    {{ link.label }}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'Header',
        data: function(){
            return {
                links: [
                    {
                        name: 'home',
                        label: 'Home'
                    },
                    {
                        name: 'about',
                        label: 'About'
                    },
                    {
                        name: 'blog',
                        label: 'Blog'
                    },
                ],
            };
        }
    }
</script>

<style lang="scss" scoped>

</style>