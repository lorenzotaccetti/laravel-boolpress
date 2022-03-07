<template>
    <div class="show">
        <div class="container">
            <div class="post">
                <div class="title">
                    {{post.title}}
                </div>
                <div v-if="post.category" class="category">
                    Categoria: {{post.category.name}}
                    <span class="icon" v-if="post.category.name === 'Dolce'">
                        <i class="fas fa-ice-cream"></i>
                    </span>
                    <span class="icon" v-else-if="post.category.name === 'Secondo'">
                        <i class="fas fa-hamburger"></i>
                    </span>
                    <span class="icon" v-else-if="post.category.name === 'Primo'">
                        <i class="fas fa-fish"></i>
                    </span>
                    <span class="icon" v-else-if="post.category.name === 'Antipasto'">
                        <i class="fas fa-bacon"></i>
                    </span>
                    <span class="icon" v-else-if="post.category.name === 'Contorno'">
                        <i class="fas fa-bread-slice"></i>
                    </span>
                    <span class="icon" v-else-if="post.category.name === 'Piatto unico'">
                        <i class="fas fa-pizza-slice"></i>
                    </span>
                </div>
                <div class="tags" v-if="post.tags && post.tags.length > 0">
                    <router-link v-for="(tag, index) in post.tags" :key="index" class="tag" :to="{ name: 'tag-detail', params: {slug: tag.slug}}">
                        {{tag.slug}}
                    </router-link>
                </div>
                <div class="description">
                    {{post.description}}
                </div>
            </div>    
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Show',
        data: function(){
            return {
                post: {},
            }
        },
        methods: {
            getPost: function(){
                axios.get('/api/posts/' + this.$route.params.slug)
                .then((response) => {
                    if(response.data.success){
                        this.post = response.data.post;
                    } else{
                        this.$router.push({ name: 'not-found' });
                    }
                });
            }
        },
        created: function(){
            this.getPost();
        }
    }
</script>

<style lang="scss" scoped>
.show{
    background-color: #f2f5fb;
    color: #4f5a64;
    height: calc(100% - 160px);
    text-align: center;
    padding: 350px 0;

    .post{
        border: 1px solid #8d42eb;
        border-radius: 10px;
        background-color: white;
        padding: 30px 45px;

        .title{
            font-size: 45px;
            text-transform: uppercase;
            padding-bottom: 20px;
        }

        .category{
            padding-bottom: 20px;
            font-size: 20px;

            .icon{
                color: #8d42eb;
            }
        }

        .tags{
            padding-bottom: 20px;

            .tag{
                background-color: #8d42eb;
                color: white;
                padding: 5px 10px;
                border-radius: 10px;
                margin-right: 5px;
                text-decoration: none;
            }
        }

        .description{
            font-size: 22px;
        }
    }    
}
</style>