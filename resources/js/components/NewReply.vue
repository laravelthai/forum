<template>
<div class="card">
    <div class="card-body">
        <div v-if="signedIn" class="reply-box">
            <div class="form-group">
                <wysiwyg name="body" v-model="body" placeholder="Have something to say?" :shouldClear="completed"></wysiwyg>
            </div>
            <button class="btn btn-sm btn-primary" @click="addReply">Post</button>
        </div>
        <p class="text-center" v-else>
            Please <a href="/login">sign in</a> to participate in this discussion.
        </p>
    </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      body: '',
      completed: false
    }
  },
  methods: {
    addReply() {
      axios
        .post(location.pathname + '/replies', { body: this.body })
        .then(({data}) =>{
            this.body = ''
            this.completed = true

            flash('Your reply has been posted.')

            this.$emit('created', data)
         })
        .catch(error => {
          flash(error.response.data.message, 'danger')
        })
    }
  }
}
</script>
