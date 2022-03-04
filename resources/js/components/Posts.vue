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
                    {{truncateText(post.description, 110)}}
                </div>
            </div>
        </div>

        <nav>
            <ul class="pagination">
                <!-- Previous link -->
                <li class="page-item" :class="{ 'disabled': currentPage == 1 }">
                    <a @click="getPosts(currentPage - 1)" class="page-link" href="#">Previous</a>
                </li>

                <!-- Pages link -->
                <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'actived': currentPage == n }">
                    <a @click="apiPosts(n)" class="page-link" href="#">{{ n }}</a>
                </li>

                <!-- Next link -->
                <li class="page-item" :class="{ 'disabled': currentPage == lastPage }">
                    <a @click="apiPosts(currentPage + 1)" class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        name: 'Posts',
        data: function(){
            return{
                posts: [],
                currentPage: 1,
                lastPage: null
            };
        },
        methods: {
            apiPosts: function(pageNumber){
                axios.get('/api/posts', {
                    params:{
                        page: pageNumber
                    }
                })
                .then((response) => {
                    this.posts = response.data.posts.data;
                    this.currentPage = response.data.posts.current_page;
                    this.lastPage = response.data.posts.last_page;
                });
            },
            truncateText: function(text, maxNumber){
                if (text.length > maxNumber) {
                    return text.substr(0, maxNumber) + '...';
                }

                return text;
            },
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
                cursor: pointer;

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

        nav{

            ul{
                list-style-type: none;
                display: flex;

                li{
                    padding: 0 20px;
                }
            }

        }
    }
</style>