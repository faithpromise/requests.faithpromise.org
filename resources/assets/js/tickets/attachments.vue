<template>
  <div>
    <label class="FileInput">
      <svg>
        <use xlink:href="#icon-attach"></use>
      </svg>
      {{ is_uploading ? 'Uploading...' : 'Add Attachments' }}
      <input id="file_field" type="file" @change="upload" multiple="multiple" :disabled="is_uploading">
    </label>
    <ul class="FileList">
      <li v-for="(file, index) in files" :key="index" @click="remove(index)" title="Remove Attachment">
        {{ index }} - {{ file.name }}
      </li>
    </ul>
  </div>
</template>
<script>

    import attachmentService from './attachments.service';

    export default {

        props: {
            files:            { required: true, },
            isUploadingFiles: { required: true, },
        },

        data() {
            return {
                is_uploading: false,
            }
        },

        watch: {
            is_uploading(value) {
                this.$emit('update:isUploadingFiles', value);
            },
        },

        methods: {

            upload(event) {

                if (this.is_uploading)
                    return;

                this.is_uploading = true;

                let formData = new FormData(),
                    files    = event.target.files;

                // NProgress.start();

                for (let i = 0; i < files.length; i++) {
                    formData.append('file_' + i, files[i], files[i].name);
                }

                attachmentService.upload(formData).then((results) => {

                    this.is_uploading = false;

                    let new_files = results.data.data || [];

                    for (let i = this.files.length - 1; i >= 0; i--) {
                        new_files.unshift(this.files[i]);
                    }

                    this.$emit('update:files', new_files);

                }).catch(() => {
                    alert('Error uploading files');
                    this.is_uploading = false;
                });

            },

            remove(index) {
                if (confirm('Are you sure you want to remove this attachment?')) {
                    let new_files = [];

                    for (let i = 0; i < this.files.length; i++) {
                        if (i !== index)
                            new_files.push(this.files[i]);
                    }

                    this.$emit('update:files', new_files);
                }
            },

        },

    }
</script>