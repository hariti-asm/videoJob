<template>
    <div>
        <form @submit="formSubmit">
            <button v-if="show" type="submit" class="w-100 btn btn-success">
               Easy Apply
            </button>
            <div v-else class="alert alert-success">
                Application sent Successfully.
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ["jobid"],
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            show: true,
        };
    },

    methods: {
        formSubmit(e) {
            console.log("here ");
            e.preventDefault();
            axios
                .post("/jobfinder/applications/" + this.jobid, {})
                .then((response) => {
                    this.show = false;
                });
        },
    },
}; 
</script>
