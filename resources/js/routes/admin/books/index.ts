import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../wayfinder'
/**
* @see \App\Http\Controllers\Admin\BookController::index
 * @see app/Http/Controllers/Admin/BookController.php:15
 * @route '/admin/books'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/admin/books',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Admin\BookController::index
 * @see app/Http/Controllers/Admin/BookController.php:15
 * @route '/admin/books'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::index
 * @see app/Http/Controllers/Admin/BookController.php:15
 * @route '/admin/books'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Admin\BookController::index
 * @see app/Http/Controllers/Admin/BookController.php:15
 * @route '/admin/books'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Admin\BookController::create
 * @see app/Http/Controllers/Admin/BookController.php:24
 * @route '/admin/books/create'
 */
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/admin/books/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Admin\BookController::create
 * @see app/Http/Controllers/Admin/BookController.php:24
 * @route '/admin/books/create'
 */
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::create
 * @see app/Http/Controllers/Admin/BookController.php:24
 * @route '/admin/books/create'
 */
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Admin\BookController::create
 * @see app/Http/Controllers/Admin/BookController.php:24
 * @route '/admin/books/create'
 */
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Admin\BookController::store
 * @see app/Http/Controllers/Admin/BookController.php:33
 * @route '/admin/books'
 */
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/admin/books',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Admin\BookController::store
 * @see app/Http/Controllers/Admin/BookController.php:33
 * @route '/admin/books'
 */
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::store
 * @see app/Http/Controllers/Admin/BookController.php:33
 * @route '/admin/books'
 */
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Admin\BookController::edit
 * @see app/Http/Controllers/Admin/BookController.php:78
 * @route '/admin/books/{book}/edit'
 */
export const edit = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/admin/books/{book}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Admin\BookController::edit
 * @see app/Http/Controllers/Admin/BookController.php:78
 * @route '/admin/books/{book}/edit'
 */
edit.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { book: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { book: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                }

    return edit.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::edit
 * @see app/Http/Controllers/Admin/BookController.php:78
 * @route '/admin/books/{book}/edit'
 */
edit.get = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\Admin\BookController::edit
 * @see app/Http/Controllers/Admin/BookController.php:78
 * @route '/admin/books/{book}/edit'
 */
edit.head = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Admin\BookController::update
 * @see app/Http/Controllers/Admin/BookController.php:87
 * @route '/admin/books/{book}'
 */
export const update = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put"],
    url: '/admin/books/{book}',
} satisfies RouteDefinition<["put"]>

/**
* @see \App\Http\Controllers\Admin\BookController::update
 * @see app/Http/Controllers/Admin/BookController.php:87
 * @route '/admin/books/{book}'
 */
update.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { book: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { book: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                }

    return update.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::update
 * @see app/Http/Controllers/Admin/BookController.php:87
 * @route '/admin/books/{book}'
 */
update.put = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\Admin\BookController::destroy
 * @see app/Http/Controllers/Admin/BookController.php:135
 * @route '/admin/books/{book}'
 */
export const destroy = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/admin/books/{book}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\Admin\BookController::destroy
 * @see app/Http/Controllers/Admin/BookController.php:135
 * @route '/admin/books/{book}'
 */
destroy.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { book: args }
    }

            if (typeof args === 'object' && !Array.isArray(args) && 'id' in args) {
            args = { book: args.id }
        }
    
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                }

    return destroy.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\Admin\BookController::destroy
 * @see app/Http/Controllers/Admin/BookController.php:135
 * @route '/admin/books/{book}'
 */
destroy.delete = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})
const books = {
    index: Object.assign(index, index),
create: Object.assign(create, create),
store: Object.assign(store, store),
edit: Object.assign(edit, edit),
update: Object.assign(update, update),
destroy: Object.assign(destroy, destroy),
}

export default books