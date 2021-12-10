<template>
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="d-flex flex-row flex-wrap recommendation-items">
                    <div class="movie flex-column">
                        <img src="/img/damy.png">
                        <p>タイトル</p>
                        <p class="small">投稿者</p>
                        <p class="small">再生回数 投稿日</p>
                    </div>
                    <div class="movie flex-column">
                        <img src="/img/damy.png">
                        <p>タイトル</p>
                        <p class="small">投稿者</p>
                        <p class="small">再生回数 投稿日</p>
                    </div>
                    <div class="movie flex-column">
                        <img src="/img/damy.png">
                        <p>タイトル</p>
                        <p class="small">投稿者</p>
                        <p class="small">再生回数 投稿日</p>
                    </div>
                    <div class="movie flex-column">
                        <img src="/img/damy.png">
                        <p>タイトル</p>
                        <p class="small">投稿者</p>
                        <p class="small">再生回数 投稿日</p>
                    </div>
<!--                    <img src="/img/damy.png" class="movie">-->
<!--                    <img src="/img/damy.png" class="movie">-->
<!--                    <img src="/img/damy.png" class="movie">-->
<!--                    <img src="/img/damy.png" class="movie">-->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomeIndex"
}
</script>

<style scoped>
@media screen and ( max-width: 490px ){
    .movie {
        width: 90%;
    }
}
@media screen and ( min-width: 491px ) and ( max-width: 800px) {
    .movie {
        width: 45%;
    }
}
@media screen and ( min-width: 801px ) and (max-width: 1060px) {
    .movie {
        width: 30%;
    }
}
@media screen and ( min-width: 1061px ) {
    .movie {
        width: 22.5%;
    }
}
.movie {
    max-width: 320px;
    margin: 5px;
}

img {
    width: 100%;
}

p {
    width: 100%;
    margin: 0;
}

.recommendation-items {
    /*max-height: 440px;*/
    /*overflow: hidden;*/
}

</style>
