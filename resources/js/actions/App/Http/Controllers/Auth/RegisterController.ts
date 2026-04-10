import { queryParams, type RouteQueryOptions, type RouteDefinition } from './../../../../../wayfinder'
/**
* @see \App\Http\Controllers\Auth\RegisterController::showRegisterForm
 * @see app/Http/Controllers/Auth/RegisterController.php:17
 * @route '/register'
 */
export const showRegisterForm = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showRegisterForm.url(options),
    method: 'get',
})

showRegisterForm.definition = {
    methods: ["get","head"],
    url: '/register',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Auth\RegisterController::showRegisterForm
 * @see app/Http/Controllers/Auth/RegisterController.php:17
 * @route '/register'
 */
showRegisterForm.url = (options?: RouteQueryOptions) => {
    return showRegisterForm.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Auth\RegisterController::showRegisterForm
 * @see app/Http/Controllers/Auth/RegisterController.php:17
 * @route '/register'
 */
showRegisterForm.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: showRegisterForm.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Auth\RegisterController::showRegisterForm
 * @see app/Http/Controllers/Auth/RegisterController.php:17
 * @route '/register'
 */
showRegisterForm.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: showRegisterForm.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Auth\RegisterController::register
 * @see app/Http/Controllers/Auth/RegisterController.php:25
 * @route '/register'
 */
export const register = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})

register.definition = {
    methods: ["post"],
    url: '/register',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Auth\RegisterController::register
 * @see app/Http/Controllers/Auth/RegisterController.php:25
 * @route '/register'
 */
register.url = (options?: RouteQueryOptions) => {
    return register.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Auth\RegisterController::register
 * @see app/Http/Controllers/Auth/RegisterController.php:25
 * @route '/register'
 */
register.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: register.url(options),
    method: 'post',
})
const RegisterController = { showRegisterForm, register }

export default RegisterController