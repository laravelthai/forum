<script>
    export default {
        props: ['attributes'],
        data() {
            return {
                editing: false,
                activeMenu: false,
                body: this.attributes.body
            };
        },
        methods: {
            update() {
                axios.patch('/replies/' + this.attributes.id, {
                    body: this.body
                }).catch(error => {
                    flash(error.response.data, 'danger');
                });

                this.editing = false;

                this.activeMenu = false;

                flash('Updated!');
            },
            destroy() {
                axios.delete('/replies/' + this.attributes.id);

                $(this.$el).fadeOut(300, () => {
                    flash('Your reply has been deleted.');
                });
            }
        }
    }
</script>