<template>
    <footer>
        <div class="container">
            <div class="footer">
                <div>
                    <i class="fab fa-bity"></i>
                </div>
                <div>
                    <i class="fab fa-d-and-d"></i>
                </div>
                <div class="aviato">
                    <i class="fab fa-aviato"></i>
                </div>
                <div>
                    <i class="fab fa-gitkraken"></i>
                </div>
                <div>
                    <i class="fas fa-biohazard"></i>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: 'Footer'
    }
</script>

<style lang="scss" scoped>
footer{
    background-color: #6c30bb;
    // padding-top: 30px;
    height: 80px;
    line-height: 80px;
    color: white;
    font-size: 28px;

    .footer{
        display: flex;
        align-items: center;
        justify-content: space-between;

        .aviato{
            font-size: 65px;
        }
    }
}
</style>