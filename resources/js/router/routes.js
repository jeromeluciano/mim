import home from '../views/home'
import trendings from '../views/trendings'
import create from '../views/create'
import register from '../views/register'
import tweet from '../views/tweet'
import profile from '../views/profile'

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
  },
  {
    path: '/register',
    name: 'register',
    component: register
  },
  {
    path: '/tweet/:id',
    name: 'tweet',
    component: tweet
  },
  {
    path: '/profile/:id',
    name: 'profile',
    component: profile
  }
]
export default routes;