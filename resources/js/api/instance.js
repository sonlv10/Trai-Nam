import axios from 'axios';
import Vue from 'vue'

var axiosApp = axios.create({
    baseURL: process.env.VUE_APP_API_URL,
    headers: {'Content-type': 'application/x-www-form-urlencoded, application/json'},
});

export {axiosApp}