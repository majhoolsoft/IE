<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="limiter">
                        <div class="container-login100">
                            <div class="wrap-login100 p-t-50 p-b-90">
                                <div @click="$emit('close')" class="exit-btn"><i class="fa fa-times"></i></div>
                                <!--<form class="login100-form validate-form flex-sb flex-w">-->
                                    <span class="login100-form-title p-b-51">
                                        ورود
                                    </span>

                                    <div class="instruction">
                                        شماره تلفن یا ایمیل
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-16"
                                         data-validate="Username is required">

                                        <input class="input100" type="text" name="username" v-model="username"
                                               placeholder="برای مثال : majhool.yf@gmail.com">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="instruction">
                                        رمز عبور
                                    </div>
                                    <div class="wrap-input100 validate-input m-b-16"
                                         data-validate="Password is required">
                                        <input class="input100" type="password" name="pass" placeholder=""
                                               v-model="password">
                                        <span class="focus-input100"></span>
                                    </div>

                                    <div class="flex-sb-m w-full p-t-3 p-b-24">

                                        <div>
                                            <a href="#" class="instruction">
                                                رمز عبور را فراموش کرده اید؟کلیک کنید
                                            </a>
                                        </div>
                                    </div>
                                    <div style="color:red">{{error}}</div>
                                    <div class="container-login100-form-btn m-t-17">
                                        <button class="login100-form-btn" @click="postLogin">
                                            ورود
                                        </button>
                                    </div>

                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
    export default {
        props: ["close"],
        data() {
            return {
                username: "",
                password: "",
                error :""
            }
        },
        methods: {
            postLogin() { // You forgot the method name here
                axios.post('/login', {
                    username: this.username,
                    password: this.password
                }).then(response => {
                    //Do your stuff. Maybe redirect if you are using a router?
                    // console.log(response.data);
                    this.$emit('user' , response.data);
                    this.$emit('close');
                    this.$session.start();
                    this.$session.set('user', response.data);
                    Vue.http.headers.common['Authorization'] = 'Bearer ' + response.data
                }).catch(error => {
                    // Handle error
                    this.error="username or password not correct";
                })
            }
        }
    };
</script>

<style scoped>
    .login_word {
        font-size: 20px;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    /*//////////////////////////////////////////////////////////////////
    [ FONT ]*/
    .exit-btn {
        float: right;
        cursor: pointer;
    }

    /*---------------------------------------------*/
    a {
        font-size: 14px;
        line-height: 1.7;
        color: #666666;
        margin: 0px;
        transition: all 0.4s;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
    }

    a:focus {
        outline: none !important;
    }

    a:hover {
        text-decoration: none;
        color: #403866;
    }

    /*---------------------------------------------*/
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0px;
    }

    p {
        font-size: 10px;
        line-height: 1.7;
        color: #666666;
        margin: 0px;
    }

    ul,
    li {
        margin: 0px;
        list-style-type: none;
    }

    /*---------------------------------------------*/
    input {
        outline: none;
        border: none;
    }

    textarea {
        outline: none;
        border: none;
    }

    textarea:focus,
    input:focus {
        border-color: transparent !important;
    }

    input::-webkit-input-placeholder {
        color: #8f8fa1;
        font-size: 10px;
    }

    input:-moz-placeholder {
        color: #8f8fa1;
    }

    input::-moz-placeholder {
        color: #8f8fa1;
    }

    input:-ms-input-placeholder {
        color: #8f8fa1;
    }

    textarea::-webkit-input-placeholder {
        color: #8f8fa1;
    }

    textarea:-moz-placeholder {
        color: #8f8fa1;
    }

    textarea::-moz-placeholder {
        color: #8f8fa1;
    }

    textarea:-ms-input-placeholder {
        color: #8f8fa1;
    }

    label {
        display: block;
        margin: 0;
    }

    /*---------------------------------------------*/
    button {
        outline: none !important;
        border: none;
        background: transparent;
    }

    button:hover {
        cursor: pointer;
    }

    iframe {
        border: none !important;
    }

    /*//////////////////////////////////////////////////////////////////
    [ Utility ]*/
    .txt1 {
        font-size: 10px;
        color: #827ffe;
        line-height: 1.4;
    }

    /*//////////////////////////////////////////////////////////////////
    [ login ]*/

    .limiter {
        width: 100%;
        margin: 0 auto;
    }

    .container-login100 {
        width: 100%;
        /* min-height: 100vh; */
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;

        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .wrap-login100 {
        width: 390px;
        background: #fff;
        border-radius: 10px;
        position: relative;
    }

    /*==================================================================
    [ Form ]*/

    .login100-form {
        width: 100%;
    }

    .login100-form-title {
        font-size: 25px;
        color: #666666;
        line-height: 1.2;
        text-transform: uppercase;
        text-align: center;
        width: 100%;
        display: block;
        margin-bottom: 3vh;
    }

    .instruction {
        text-align: right;
        color: #827ffe;
        font-size: 2vh;
    }

    /*------------------------------------------------------------------
    [ Input ]*/

    .wrap-input100 {
        width: 100%;
        height: 5vh;
        position: relative;
        background-color: #e6e6e6;
        border: 1px solid transparent;
        border-radius: 100px;
    }

    /*---------------------------------------------*/
    .input100 {
        color: #403866;
        line-height: 1.2;
        font-size: 10px;

        display: block;
        width: 100%;
        background: transparent;
        height: 30px;
        padding: 0 20px 0 38px;
    }

    /*------------------------------------------------------------------
    [ Focus Input ]*/

    .focus-input100 {
        position: absolute;
        display: block;
        width: calc(100% + 2px);
        height: calc(100% + 2px);
        top: -1px;
        left: -1px;
        pointer-events: none;
        border: 1px solid #827ffe;
        border-radius: 30px;

        visibility: hidden;
        opacity: 0;

    }

    .input100:focus + .focus-input100 {
        visibility: visible;
        opacity: 1;

        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .eff-focus-selection {
        visibility: visible;
        opacity: 1;

        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    /*==================================================================
    [ Restyle Checkbox ]*/

    .input-checkbox100 {
        display: none;
    }

    .label-checkbox100 {
        font-family: Ubuntu-Regular;
        font-size: 16px;
        color: #999999;
        line-height: 1.2;

        display: block;
        position: relative;
        padding-left: 26px;
        cursor: pointer;
    }

    .label-checkbox100::before {
        content: "\f00c";
        font-family: FontAwesome;
        font-size: 13px;
        color: transparent;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 3px;
        background: #fff;
        border: 2px solid #827ffe;
        left: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .input-checkbox100:checked + .label-checkbox100::before {
        color: #827ffe;
    }

    /*------------------------------------------------------------------
    [ Button ]*/
    .container-login100-form-btn {
        width: 50%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        margin-top: 3vh;
    }

    .login100-form-btn {
        font-size: 16px;
        color: #fff;
        line-height: 1.2;
        text-transform: uppercase;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        width: 100%;
        height: 6vh;
        background-color: #666666;
        border-radius: 30px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .login100-form-btn:hover {
        background-color: #403866;
    }

    /*------------------------------------------------------------------
    [ Alert validate ]*/

    .validate-input {
        position: relative;
    }

    .alert-validate::before {
        content: attr(data-validate);
        position: absolute;
        max-width: 70%;
        background-color: #fff;
        border: 1px solid #c80000;
        border-radius: 3px;
        padding: 4px 25px 5px 10px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 12px;
        pointer-events: none;

        font-family: Ubuntu-Regular;
        color: #c80000;
        font-size: 14px;
        line-height: 1.4;
        text-align: left;

        visibility: hidden;
        opacity: 0;

        -webkit-transition: opacity 0.4s;
        -o-transition: opacity 0.4s;
        -moz-transition: opacity 0.4s;
        transition: opacity 0.4s;
    }

    .alert-validate::after {
        content: "\f12a";
        font-family: FontAwesome;
        display: block;
        position: absolute;
        color: #c80000;
        font-size: 18px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 18px;
    }

    .alert-validate:hover:before {
        visibility: visible;
        opacity: 1;
    }

    @media (max-width: 992px) {
        .alert-validate::before {
            visibility: visible;
            opacity: 1;
        }
    }

    /*//////////////////////////////////////////////////////////////////
    [ Responsive ]*/
</style>
