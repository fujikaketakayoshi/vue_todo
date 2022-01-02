<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <!--<form v-on:submit.prevent="submit">-->
                <form @submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title"  @input="$v.task.title.$touch()" :class="{ error : $v.task.title.$error,'form-control': true }">
                        <span v-if="$v.task.title.$error">titleが入力されていません。</span>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content" @input="$v.task.content.$touch()" :class="{ error : $v.task.content.$error,'form-control': true }">
                        <span v-if="$v.task.content.$error">contentが入力されていません。</span>
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                        <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge" @input="$v.task.person_in_charge.$touch()" :class="{ error : $v.task.person_in_charge.$error,'form-control': true }">
                        <span v-if="$v.task.person_in_charge.$error">person_in_chargeが入力されていません。</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { required } from 'vuelidate/lib/validators'

    export default {
        data: function () {
           return {
               task: {}
           }
        },
        validations: {
            task: {
                title: { required },
                content: { required },
                person_in_charge: { required }
            }
        },
       methods: {
           submit() {
                this.$v.$touch();
                if (this.$v.$invalid) {
                  console.log('バリデーションエラー');
                } else {
                   axios.post('/api/tasks', this.task)
                       .then((res) => {
                           this.$router.push({name: 'task.list'});
                       });
                }
           }
       }
   }
</script>