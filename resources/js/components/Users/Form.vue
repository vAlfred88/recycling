<template>
    <div class="p-t-15">
        <div class="row">
            <div class="col-md-2 items-center">
                <img alt="User image" class="img-circle user-pic" src="/images/default.png">
            </div>
            <div class="col-md-7">
                <div :class="errors.has('name') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="name"
                           placeholder="Полное имя"
                           type="text"
                           v-validate="'required|min:5'">
                    <span class="help-block">{{ errors.first('name') }}</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">Менеджер</li>
                        <li class="list-inline-item">Администратор</li>
                    </ul>
                </div>
                <div :class="errors.has('email') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="email"
                           placeholder="Email"
                           type="text"
                           v-validate="'required|email'">
                    <span class="help-block">{{ errors.first('email') }}</span>
                </div>
                <div :class="errors.has('phone') ? 'has-error' : ''" class="form-group">
                    <input class="form-control"
                           name="phone"
                           placeholder="Номер телефона"
                           type="text"
                           v-validate="{ regex: /(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/ }">
                    <span class="help-block">{{ errors.first('phone') }}</span>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-right text-muted">Все города</p>
                <p class="text-right">Все пункты меню</p>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 p-t-10" v-for="i in 8">
                        <p-check class="p-switch" color="warning">Outline</p-check>
                    </div>
                </div>
                <div class="row p-t-20">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <button class="btn btn-default">Отправить приглашение</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Create"
    }
</script>

<style scoped>
    .user-pic {
        width: 120px;
        height: 120px;
    }

    .form-control {
        border: 0;
        border-bottom: 1px solid #e5ebec;
    }
</style>