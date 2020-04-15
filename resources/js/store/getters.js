var _ = require('lodash');
export const getters = {
    FILTER_SPESIFIC_DATA: (state) =>{
        return _.filter(state.data , (data) =>{
            // ....
        });
    }
};