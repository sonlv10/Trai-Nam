import axios from 'axios';
const BASE_API_URL= '...';
const API_URL_ENDPOINT = '...';
const A = axios.create({ baseURL: String(BASE_API_URL) });
export const actions = {
    GET_DATA({commit}){
        A.get(API_URL_ENDPOINT).then((res) =>{
            commit('SET_DATA' , res.data);
            commit('IS_LOADING' , false);
        }).catch((err) =>{
            console.error(err)
        });
    }
};