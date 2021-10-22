
import Category from './components/categories/Category'
import ManageCat from './components/categories/ManageCat'

import ManageUser from './components/users/ManageUser'
import UpdateUser from './components/users/UpdateUser'
import CreateUser from './components/users/CreateUser'

import ManageComment from './components/comments/ManageComment'

import App from './components/App'
import Dashboard from './components/dashboard/Dashboard'
import ManagePosts from './components/posts/ManagePosts'

export default {

    mode: 'history',      
    routes: [
       
        {
            path : '/categories',
            name: 'manage-category',
            component : ManageCat
        },
        {
            path : '/users',
            name: 'manage-user',
            component : ManageUser
        },
        {
            path : '/users/:id/edit',
            name: 'edit-user',
            component : UpdateUser
        },
        {
            path : '/users/create',
            name: 'create-user',
            component : CreateUser
        },
        {
            path : '/categories/:id',
            name: 'Category',
            component : Category
        },
        {
            path : '/comments',
            name: 'manage-comment',
            component : ManageComment
        },
        {
        path : '/',
        name:'Welcome',
        component: App
        },
        {
            path : '/home',
            name: 'home',
            component : Dashboard
        },
        {
            path : '/posts',
            name: 'manage-post',
            component : ManagePosts
        },
    ]
} 