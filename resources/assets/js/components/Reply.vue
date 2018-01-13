<template>
    <li :id="'reply-'+id" class="list-group-item" @mouseover="activeMenu = true" @mouseleave="activeMenu = false">
        <div class="media">
            <img class="avatar rounded-circle mr-3" src="https://i.imgur.com/1fgOYH3.jpg" :alt="reply.owner.name">
            <div class="media-body">
                <a :href="'/profiles/'+reply.owner.id" :title="reply.owner.name" v-text="reply.owner.name">
                </a>
                <span> • </span>
                <span class="meta" :title="reply.created_at" v-text="ago"></span>
                <span class="meta pull-right" v-show="activeMenu" v-if="authorize('owns', reply)">
                    <button class="btn btn-link btn-sm" @click="editing = !editing">Edit</button>
                    <button class="btn btn-link btn-sm" @click="destroy">Delete</button>
                </span>
                <div class="reply-body mt-1">
                    <div v-if="editing">
                        <div class="form-group">
                            <textarea class="form-control" v-model="body"></textarea>
                        </div>
                        <button class="btn btn-sm btn-primary" @click="update">Update</button>
                        <button class="btn btn-sm btn-link" @click="editing = false">Cancel</button>
                    </div>
                    <div v-else v-text="body"></div>
                </div>
            </div>
        </div>
    </li>
</template>

<script>
    import moment from "moment";

    export default {
        props: ["reply"],
        data() {
            return {
                editing: false,
                activeMenu: false,
                id: this.reply.id,
                body: this.reply.body
            };
        },
        computed: {
            ago() {
                return moment(this.reply.created_at).fromNow();
            }
        },
        methods: {
            update() {
                axios.patch("/replies/" + this.id, {
                    body: this.body
                }).then(response => {
                    this.editing = false;
                    this.activeMenu = false;
                    flash(response.data.message);
                }).catch(error => {
                    flash(error.response.data, "danger");
                });
            },
            destroy() {
                axios.delete("/replies/" + this.id).then(response => {
                    this.$emit("deleted", this.id);
                }).catch(error => {
                    flash(error.response.data, "danger");
                });
            }
        }
    };
</script>