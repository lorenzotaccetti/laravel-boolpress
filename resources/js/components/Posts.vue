<template>
    <div class="posts">
        <div class="title">
            I nostri Post
        </div>

        <div class="posts-container">
            <div class="single-post" v-for="post in posts" :key="post.id">
                <div class="post-title">
                    {{post.title}}
                </div>
                <div class="post-description">
                    {{post.description}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        data: function(){
            return{
                posts: [],
            };
        },
        methods: {
            apiPosts: function(){
                axios.get('/api/posts', 
                // {params:{}
                )
                .then((response) => {
                    this.posts = response.data.posts;
                });
            }
        },
        created: function(){
            this.apiPosts();
        }
    }
</script>

<style lang="scss" scoped>
    .posts{
        width: 80%;
        margin: 40px auto;
        font-size: 20px;

        .title{
            font-size: 35px;
            text-transform: uppercase;
        }

        .posts-container{
            display: flex;
            flex-wrap: wrap;

            .single-post{
                width: calc((100% / 4) - 40px);
                margin: 20px;
                padding: 15px;
                // border: 1px solid;
                // border-radius: 10px;
                cursor: pointer;
                height: 200px;
                overflow-y: auto;

                .post-title{
                    color: #9561e2;
                    font-size: 20px;
                    font-weight: 700;
                    padding-bottom: 20px;
                }

                .post-description{
                    font-size: 16px;
                }
            }
        }
    }
</style>