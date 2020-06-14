<template>
    <button type="submit" class="btn btn-danger btn-sm" @click="deleteRecipe">Eliminar</button>
</template>

<script>
    export default {
        props: ['recipe'],
        methods: {
            deleteRecipe() {
                this.$swal.fire({
                    title: 'Estas seguro?',
                    text: "Seguro que quieres eliminar la receta?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {
                        const params = {
                            id: this.recipe
                        }
                        axios.post(`/recetas/${this.recipe}`, {params, _method: 'delete'})
                            .then(res => {
                                this.$swal.fire({
                                    title: 'Receta eliminada',
                                    text: 'Se eliminó la receta.',
                                    icon: 'success'
                                });
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            }).catch(console.log)

                    }
                })
            }
        }
    }
</script>
