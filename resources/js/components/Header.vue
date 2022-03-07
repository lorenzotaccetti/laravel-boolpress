<template>
    <header>
            <div class="header-container">
                <ul>
                    <li>
                        <i class="fab fa-buy-n-large"></i>
                    </li>
                    <li class="site">
                        BoolPress
                    </li>
                    <li v-for="(link, index) in links" :key="index">
                        <router-link class="link" :to="{ name: link.name }">
                            {{ link.label }}
                        </router-link>
                    </li>
                    <li>
                        <i class="fab fa-angellist"></i>
                    </li>
                </ul>
            </div>
    </header>
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
                    {
                        name: 'contact-us',
                        label: 'Contattaci'
                    },
                ],
            };
        }
    }
</script>

<style lang="scss" scoped>
header{
    height: 80px;
    line-height: 80px;
    color: white;
    background-color: #6c30bb;

    .header-container{
        width: 80%;
        margin: auto;

        ul{
            list-style-type: none;
            display: flex;
            align-items: center;
            justify-content: space-between;

            li{
                margin-right: 30px;
                font-size: 25px;
                text-transform: uppercase;

                .link{
                    color: white;
                    text-decoration: none;
                    padding: 5px;
                    border-radius: 10px;

                    &:hover{
                        background-color: #8d42eb;
                    }
                }
            }

            .site{
                font-size: 40px;
                font-style: italic;
            }
        }
    }
}
</style>