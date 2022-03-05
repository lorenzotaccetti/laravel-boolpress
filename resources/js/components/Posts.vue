<template>
    <div class="post-page">
        <div class="posts">
            <div class="title">
                I nostri Post
                <span class="icon">
                    <i class="fas fa-fan"></i>
                </span>
            </div>

            <div class="posts-container">
                <div class="single-post" v-for="post in posts" :key="post.id">
                    <div class="post-title">
                        <span class="icon">
                            <i class="fab fa-envira"></i>
                        </span>
                        {{post.title}}
                    </div>
                    <div class="post-description">
                        {{truncateText(post.description, 110)}}
                    </div>
                    <div class="link">
                        <a href="">
                            Scopri il piatto
                        </a>
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
.post-page{
color: #4f5a64;
height: calc(100% - 160px);
background-color: #f2f5fb;

    .posts{
        width: 80%;
        padding: 20px 0;
        margin: auto;
        font-size: 20px;

        .title{
            font-size: 35px;
            padding: 20px 0;
            text-align: center;
            font-style: italic;

            .icon{
                padding-left: 5px;
                color: #6c30bb;
            }
        }

        .posts-container{
            display: flex;
            flex-wrap: wrap;

            .single-post{
                width: calc((100% / 2) - 40px);
                margin: 20px;
                padding: 25px;
                border: 1px solid #4f5a64;
                border-radius: 10px;
                background-color: white;

                .post-title{
                    color: #6c30bb;
                    font-size: 22px;
                    font-weight: 700;
                    padding-bottom: 20px;
                    text-transform: uppercase;

                    .icon{
                        padding-right: 5px;
                    }
                }

                .post-description{
                    font-size: 16px;
                    padding-bottom: 20px;
                }

                .link{
                    a{
                        color: white;
                        text-decoration: none;
                        text-transform: uppercase;
                        font-size: 12px;
                        background-color: #8d42eb;
                        border-radius: 10px;
                        padding: 5px 10px;
                    }
                }
            }
        }

        nav{
            margin: 40px 0;

            ul{
                list-style-type: none;
                display: flex;

                li{
                    padding: 0 20px;

                    a{
                        color: #6c30bb;
                        // background-color: #f2f5fb;
                    }
                }
            }

        }
    }
}    
</style>