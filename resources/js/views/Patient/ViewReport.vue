<template>
    <div class="report" id="print">
        <button @click="printReport">
            <i class="fas fa-print logo"></i>
            <span >Print Report</span>
        </button>
        <p>I am report</p>
    </div>

</template>

<script>
    var date = Date();
    export default {
        name: "ViewReport",
        props:{
            id:{
                required: true,
                type: Number
            },
            tn:{
                required:true,
                type:String,
            },
        },
        created() {
            console.log("view createdma aayo ra id:",this.id)
        },
        methods: {
            printReport(){
                const prtHtml = document.getElementById('print').innerHTML;
                const WinPrint = window.open('width=100%,height=100%');
                WinPrint.document.write(`<!DOCTYPE html>
                    <html>
                      <head>
                         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                      </head>
                      <body>
                        ${prtHtml}
                      </body>
                    </html>`)
                WinPrint.focus();
                WinPrint.print();
            }
        }

    }
</script>

<style scoped>

</style>
