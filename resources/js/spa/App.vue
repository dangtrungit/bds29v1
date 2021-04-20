<template>
    <v-app>
        <v-main>
            <router-view />
        </v-main>
    </v-app>
</template>

<script>
export default {
    data: function() {
        return {
            username: "",
            password: "",
            show1: false,
            max: 30,
            rules: {
                required: value => !!value || "Không được để trống trường này.",
                min: v => v.length >= 8 || "Tối thiểu 6 ký tự",
                emailMatch: () => `Mật khẩu không đúng định dạng`
            }
        };
    }
};
</script>

<style lang="scss" scoped>
.form-wraper {
    min-height: 100vh;
    padding: 100px 0;
    .login-wraper {
        width: 400px;
        max-width: 100%;
    }
    .forgot-password {
        font-size: 0.9rem;
    }
}

.web-contain {
    background: url(/images/backgrounds/login-background.jpeg);
    background-size: cover;
    background-position: center;
}
</style>
