<template>
    <div class="about">
        <div class="container">
            <div class="disposition">
                <div class="left">
                    <div class="title-about">
                        Chi Siamo
                        <span class="icon">
                            <i class="far fa-id-badge"></i>
                        </span>
                    </div>
                    <div class="description-about">
                        Donec eget pulvinar ipsum, vitae consectetur est. Etiam ac risus at mauris mollis rhoncus. Sed in erat aliquam, ultricies metus sed, dapibus lorem. Suspendisse posuere venenatis sapien at posuere. Aliquam erat volutpat. Mauris sagittis orci imperdiet, mattis nisl non, efficitur magna. Ut ut efficitur lacus. In hac habitasse platea dictumst. Etiam fringilla molestie velit ac imperdiet. Fusce massa felis, elementum ut nisl non, varius varius velit.Nam accumsan orci rutrum felis dapibus, sit amet dictum lorem sodales. Donec quam dolor, tempor sit amet hendrerit id, vestibulum vel quam. In id orci eros. Morbi nisi dolor, pulvinar id nulla nec, gravida condimentum sapien. Aenean viverra sit amet lacus a lacinia. Nunc suscipit feugiat hendrerit. Donec eu mi quis ligula tempor lobortis. In condimentum est ac justo sollicitudin, ut faucibus felis dictum. Aliquam a accumsan orci, nec lobortis leo. Nullam imperdiet dolor lacus, eu scelerisque velit pellentesque ut. Donec sit amet maximus ligula. Proin egestas, velit sed elementum cursus, dolor tellus tempor neque, sit amet hendrerit massa justo et metus. Nullam scelerisque, justo ut interdum gravida, orci massa euismod neque, id accumsan leo neque a justo.
                    </div>
                </div>
                <div class="right">
                    <div class="title-right">
                        Eccoci qua:
                    </div>
                    <div class="card"> 
                        <div class="icon">
                            <i class="fas fa-user-astronaut"></i>
                        </div>
                        <div class="name">
                            Lorenzo
                        </div>
                        <div>
                            Pellentesque sodales ut nunc vitae auctor. Donec id turpis sed nulla mattis euismod dictum at massa. Nullam ultrices, ex vel auctor facilisis, diam leo congue orci, in sodales dolor sem eget velit. Vivamus nisl nisi, fermentum eu diam elementum, pulvinar convallis urna.
                        </div>
                    </div>
                    <div class="card"> 
                        <div class="icon">
                            <i class="fas fa-user-injured"></i>
                        </div>
                        <div class="name">
                            Martino
                        </div>
                        <div>
                            Pellentesque sodales ut nunc vitae auctor. Donec id turpis sed nulla mattis euismod dictum at massa. Nullam ultrices, ex vel auctor facilisis, diam leo congue orci, in sodales dolor sem eget velit. Vivamus nisl nisi, fermentum eu diam elementum, pulvinar convallis urna.
                        </div>
                    </div>
                    <div class="card"> 
                        <div class="icon">
                            <i class="fas fa-user-nurse"></i>
                        </div>
                        <div class="name">
                            Lisa
                        </div>
                        <div>
                            Pellentesque sodales ut nunc vitae auctor. Donec id turpis sed nulla mattis euismod dictum at massa. Nullam ultrices, ex vel auctor facilisis, diam leo congue orci, in sodales dolor sem eget velit. Vivamus nisl nisi, fermentum eu diam elementum, pulvinar convallis urna.
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</template>

<script>
    export default {
        name: 'About'
    }
</script>

<style lang="scss" scoped>
.about{
    padding: 60px 0;
    color: #4f5a64;
    background-color: #f2f5fb;
    width: 100%;
    height: calc(100% - 160px);

    .disposition{
        display: flex;
        // align-items: center;

        .left{
            width: calc((100% / 2) - 50px);
            margin: 0 25px;

            .title-about{
                font-size: 35px;
                margin-bottom: 20px;

                .icon{
                    color:#6c30bb;
                }
            }

            .description-about{
                font-size: 17px;
                line-height: 2.0;
            }
        }

        .right{
            margin: 0 25px;
            width: calc((100% / 2) - 50px);

            .title-right{
                font-size: 22px;
                padding-bottom: 15px;
            }

            .card{
                border: 1px solid;
                padding: 20px;
                border-radius: 15px;
                text-align: center;
                margin-top: 20px;

                .icon{
                    font-size: 40px;
                    color: #6c30bb;
                }

                .name{
                    font-size: 22px;
                    margin-bottom: 15px;
                    color: black;
                }
            }
        }
    }
}
</style>