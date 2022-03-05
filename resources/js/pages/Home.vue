<template>
    <div class="home">
        <div class="home-container">
            <h1>
                Titolo del Blog
                <span class="icon">
                    <i class="fab fa-battle-net"></i>
                </span>
            </h1>
            <div class="intestazione">
                Descrizione del blog
            </div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus massa ut neque aliquet, ut molestie neque tristique. Nam id quam viverra, convallis neque vel, rhoncus ligula. Morbi pulvinar purus in urna elementum malesuada. Suspendisse potenti. Morbi non velit rhoncus, pulvinar nunc vel, egestas ante. Curabitur sed dui ac eros posuere dictum at convallis nisl. Morbi eget neque eu elit tincidunt mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at turpis commodo, egestas nulla eu, euismod lorem. Vivamus non orci metus.
                <br>
                Praesent vel erat orci. Mauris id turpis tempor, imperdiet ante non, suscipit mi. Pellentesque sed sapien a odio porta tempus vitae id justo. Duis dapibus est quis diam posuere, et varius risus interdum. Aliquam erat volutpat. Curabitur in justo eu lectus euismod bibendum. Nam at volutpat tellus. Aenean tincidunt nunc vel risus dictum tristique. Sed sollicitudin ante eros, in pretium urna pretium in. Praesent molestie ultricies ante, eget lobortis diam pretium fringilla. Aliquam ac porta enim, vitae lobortis turpis. Aliquam non rhoncus lacus.
                <br>
                Proin posuere justo nec viverra aliquam. Aliquam ullamcorper laoreet quam, quis condimentum ex. Fusce vitae bibendum odio, sit amet porttitor nibh. Sed eu erat quis lectus lobortis pellentesque. Donec posuere fringilla nisi. Donec at tortor sed dui hendrerit lobortis. Sed mollis lacus tellus, non dignissim nulla placerat varius. Suspendisse risus massa, tempor ut nibh at, elementum posuere mi. Ut et orci sed ex aliquam vehicula.
                <br>
                Duis tempus augue ut nunc pretium, vel imperdiet ex ultricies. Sed finibus, dui nec vulputate consectetur, est orci accumsan nulla, in auctor massa ipsum sed lorem. Morbi efficitur metus ut libero tempor dictum. Vivamus rutrum placerat odio, vitae fringilla turpis auctor non. Ut scelerisque justo vel felis pharetra pulvinar. Integer bibendum non lectus eu rutrum. Maecenas pellentesque tincidunt dapibus.
                <br>
                Morbi eget bibendum lorem. Proin eget gravida ligula, et pharetra neque. Nam fermentum finibus turpis, a hendrerit erat sollicitudin a. Nullam viverra orci a elementum maximus. Pellentesque fringilla leo vehicula metus pulvinar, nec faucibus ante iaculis. Morbi quis augue sit amet arcu egestas vulputate et non massa. Nunc dui ipsum, mollis malesuada nisl a, tempus suscipit nisi. Nulla scelerisque vitae sapien quis iaculis.
            </p>
            <div class="intestazione">
                    Anteprime
            </div>
            <div class="anteprima-flex">
                <div class="post">
                    <div class="title-post">
                        Post di esempio
                        <span class="icon">
                            <i class="fab fa-usps"></i>
                        </span>
                    </div>
                    <div class="description-post">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare ullamcorper nulla, id sollicitudin dolor interdum in. Praesent in ex nec ex tincidunt ultricies quis volutpat quam. Aliquam pharetra est tempus massa luctus blandit. Integer mollis dolor vel ullamcorper gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce convallis sapien nec metus lobortis, quis elementum tellus molestie. Ut rhoncus libero eu enim suscipit efficitur. Ut mauris ligula, volutpat vel neque vitae, fringilla vestibulum lacus. Fusce sed lacus auctor, condimentum est eu, ultricies urna.
                    </div>
                </div>
                <div class="post">
                    <div class="title-post">
                        Post di esempio
                        <span class="icon">
                            <i class="fab fa-usps"></i>
                        </span>
                    </div>
                    <div class="description-post">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare ullamcorper nulla, id sollicitudin dolor interdum in. Praesent in ex nec ex tincidunt ultricies quis volutpat quam. Aliquam pharetra est tempus massa luctus blandit. Integer mollis dolor vel ullamcorper gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce convallis sapien nec metus lobortis, quis elementum tellus molestie. Ut rhoncus libero eu enim suscipit efficitur. Ut mauris ligula, volutpat vel neque vitae, fringilla vestibulum lacus. Fusce sed lacus auctor, condimentum est eu, ultricies urna.
                    </div>
                </div>
                <div class="post">
                    <div class="title-post">
                        Post di esempio
                        <span class="icon">
                            <i class="fab fa-usps"></i>
                        </span>
                    </div>
                    <div class="description-post">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare ullamcorper nulla, id sollicitudin dolor interdum in. Praesent in ex nec ex tincidunt ultricies quis volutpat quam. Aliquam pharetra est tempus massa luctus blandit. Integer mollis dolor vel ullamcorper gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce convallis sapien nec metus lobortis, quis elementum tellus molestie. Ut rhoncus libero eu enim suscipit efficitur. Ut mauris ligula, volutpat vel neque vitae, fringilla vestibulum lacus. Fusce sed lacus auctor, condimentum est eu, ultricies urna.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Home',
    }
</script>

<style lang="scss" scoped>
.home{
    width: 100%;
    height: calc(100% - 160px);
    padding: 40px 0;
    color: #4f5a64;
    background-color: #f2f5fb;

    .home-container{
        width: 80%;
        margin: auto;

        h1{
            text-align: center;
            padding-bottom: 20px;
            font-style: italic;

            .icon{
                color: #6c30bb;
            }
        }

        .intestazione{
            font-size: 22px;
            padding-bottom: 20px;
        }

        p{
            line-height: 2.0;
            padding-bottom: 20px;
        }
        
        .anteprima-flex{
            display: flex;
            align-items: center;

            .post{
                width: calc((100% / 3) - 30px);
                text-align: center;
                margin: 15px;
                border: 1px solid #4f5a64;
                border-radius: 10px;
                background-color: white;
                padding: 20px;

                .title-post{
                    font-size: 20px;
                    padding-bottom: 15px;

                    .icon{
                        color: #6c30bb;
                    }
                }

                .description-post{
                    font-size: 16px;
                    color: #9aa3b8;
                }
            }
        }
    }
}
</style>