import home from '../views/home'
import trendings from '../views/trendings'
import create from '../views/create'
const routes = [
  {
    path: '/',
    name: 'home',
    component: home
  },
  {
    path: '/trendings',
    name: 'trendings',
    component: trendings
  },
  {
    path: '/create',
    name: 'create',
    component: create
  }
]
export default routes;