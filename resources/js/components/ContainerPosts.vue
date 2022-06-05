<template>
<!-- si può avere un solo div in template -->
    <div>
        <div class="row row-cols-5 g-4">
            <div class="col" v-for="post in posts" :key="post.id">
                <div class="card h-100">
                    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title h3">{{ post.title }}</h5>
                        <p class="card-text pt-3">{{ post.content }}</p>
                        <a :href="'/posts/' + post.slug" class="btn btn-primary mt-auto">show more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item" @click="getData(firstPageUrl)" :class="{disabled: currentPage ==1}">
                        <a class="page-link">First</a>
                    </li>
                    <li class="page-item" @click="getData(prevPageUrl)" :class="{disabled: !prevPageUrl}">
                        <a class="page-link">Previous</a>
                    </li>
                    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li> -->

                    <li class="page-item">
                        <form @submit.prevent="getData(baseApiUrl + '/?page=' + numNewPage)">
                            <input type="text" v-model="numNewPage" placeholder="page number here">
                        </form>
                    </li>

                    <li class="page-item" @click="getData(nextPageUrl)" :class="{disabled: !nextPageUrl}">
                        <a class="page-link">Next</a>
                    </li>
                    <li class="page-item" @click="getData(lastPageUrl)" :class="{disabled: !prevPageUrl}">
                        <a class="page-link">Last</a>
                    </li>
                </ul>
            </nav>
            <div class="text-center">
                page {{ currentPage }} of {{ numLastPage }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ContainerPosts',
    data(){
        return{
            posts:[],

            baseApiUrl: 'http://localhost:8000/api/posts',

            currentPage: null,
            numNewPage: null,

            prevPageUrl: null,
            nextPageUrl: null,

            firstPageUrl: null,
            lastPageUrl: null,

            numLastPage: null,
        }

    },
    created() {
            this.getData(this.baseApiUrl);
        },
    methods: {
        getData(url){
            if(url){
                Axios.get(url)
                .then(axRes => {
                    this.posts = axRes.data.response.data;
                    this.numLastPage = axRes.data.response.last_page;

                    this.currentPage = axRes.data.response.current_page;
                    this.nNewPage = null;

                    this.prevPageUrl = axRes.data.response.prev_page_url;
                    this.nextPageUrl = axRes.data.response.next_page_url;

                    this.firstPageUrl = axRes.data.response.first_page_url;
                    this.lastPageUrl = axRes.data.response.last_page_url;
                })
            }
        }
    }
}
</script>

<style>
     .page-link {
        cursor: pointer;
    }
</style>
