import {axiosApp} from './instance'

const getProducts = () => {
    const url = '/products/' ;
    return axiosApp.get(url).then((response) => {
        let res = response.data;
        console.log(res);
        if(res.success){
            return res.data;
        }
    })
};
export {getProducts}