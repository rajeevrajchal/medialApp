<template>
    <div>
        <button
            :disabled="pageNumber === 0"
            @click="prevPage">
            Previous
        </button>
        <button
            :disabled="pageNumber >= pageCount -1"
            @click="nextPage">
            Next
        </button>
    </div>
</template>

<script>
    export default {
        name: "Pagination",
        data() {
            return {
                pageNumber: 0  // default to page 0
            }
        },
        props: {
            listData: {
                type: Array,
                required: true
            },
            size: {
                type: Number,
                required: false,
                default: 2
            }
        },
        created() {
            console.log("pagination ko", this.listData)
        },
        computed: {
            pageCount() {
                let l = this.listData.length,
                    s = this.size;
                return Math.ceil(l / s);
            },
            paginatedData() {
                const start = this.pageNumber * this.size,
                    end = start + this.size;
                return this.listData.slice(start, end);
            }
        },
        methods: {
            nextPage() {
                this.pageNumber++;
            },
            prevPage() {
                this.pageNumber--;
            }
        }
    }
</script>

<style scoped>
    ul {
        padding: 4px 4px;
        border: 1px solid black;

    }

    li {
        list-style-type: none;
        padding: 4px 4px;
    }

    li:hover {
        background-color: #eee;
    }

    li:nth-child(2n) {
        background-color: #ddd;
    }

    li:nth-child(2n):hover {
        background-color: #ccc;
    }

    button {
        width: 100px;
        height: 40px;
        background-color: #eef;
    }

    button:hover {
        cursor: pointer;
    }

    button:hover:disabled {
        cursor: not-allowed;
    }
</style>
