import Accounts from '../../components/AccountsComponent'

const routes = [
    {
        path: '/accounts',
        name: 'accounts',
        component: Accounts
    }
]

export default routes.map(route => {
    return { ...route, meta: { public: false } }
})