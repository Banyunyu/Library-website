import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../wayfinder'
import read8d9ffd from './read'
/**
* @see \App\Http\Controllers\BookController::index
 * @see app/Http/Controllers/BookController.php:13
 * @route '/books'
 */
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/books',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BookController::index
 * @see app/Http/Controllers/BookController.php:13
 * @route '/books'
 */
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\BookController::index
 * @see app/Http/Controllers/BookController.php:13
 * @route '/books'
 */
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BookController::index
 * @see app/Http/Controllers/BookController.php:13
 * @route '/books'
 */
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\BookController::show
 * @see app/Http/Controllers/BookController.php:34
 * @route '/books/{book}'
 */
export const show = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/books/{book}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BookController::show
 * @see app/Http/Controllers/BookController.php:34
 * @route '/books/{book}'
 */
show.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
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

    return show.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BookController::show
 * @see app/Http/Controllers/BookController.php:34
 * @route '/books/{book}'
 */
show.get = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BookController::show
 * @see app/Http/Controllers/BookController.php:34
 * @route '/books/{book}'
 */
show.head = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\BookController::read
 * @see app/Http/Controllers/BookController.php:56
 * @route '/books/{book}/read'
 */
export const read = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: read.url(args, options),
    method: 'get',
})

read.definition = {
    methods: ["get","head"],
    url: '/books/{book}/read',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BookController::read
 * @see app/Http/Controllers/BookController.php:56
 * @route '/books/{book}/read'
 */
read.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
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

    return read.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BookController::read
 * @see app/Http/Controllers/BookController.php:56
 * @route '/books/{book}/read'
 */
read.get = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: read.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BookController::read
 * @see app/Http/Controllers/BookController.php:56
 * @route '/books/{book}/read'
 */
read.head = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: read.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\BorrowController::borrow
 * @see app/Http/Controllers/BorrowController.php:29
 * @route '/books/{book}/borrow'
 */
export const borrow = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: borrow.url(args, options),
    method: 'post',
})

borrow.definition = {
    methods: ["post"],
    url: '/books/{book}/borrow',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\BorrowController::borrow
 * @see app/Http/Controllers/BorrowController.php:29
 * @route '/books/{book}/borrow'
 */
borrow.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
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

    return borrow.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BorrowController::borrow
 * @see app/Http/Controllers/BorrowController.php:29
 * @route '/books/{book}/borrow'
 */
borrow.post = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: borrow.url(args, options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\BorrowController::returnMethod
 * @see app/Http/Controllers/BorrowController.php:64
 * @route '/books/{book}/return'
 */
export const returnMethod = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: returnMethod.url(args, options),
    method: 'post',
})

returnMethod.definition = {
    methods: ["post"],
    url: '/books/{book}/return',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\BorrowController::returnMethod
 * @see app/Http/Controllers/BorrowController.php:64
 * @route '/books/{book}/return'
 */
returnMethod.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
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

    return returnMethod.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BorrowController::returnMethod
 * @see app/Http/Controllers/BorrowController.php:64
 * @route '/books/{book}/return'
 */
returnMethod.post = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: returnMethod.url(args, options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\FavoriteController::favorite
 * @see app/Http/Controllers/FavoriteController.php:28
 * @route '/books/{book}/favorite'
 */
export const favorite = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: favorite.url(args, options),
    method: 'post',
})

favorite.definition = {
    methods: ["post"],
    url: '/books/{book}/favorite',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\FavoriteController::favorite
 * @see app/Http/Controllers/FavoriteController.php:28
 * @route '/books/{book}/favorite'
 */
favorite.url = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions) => {
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

    return favorite.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FavoriteController::favorite
 * @see app/Http/Controllers/FavoriteController.php:28
 * @route '/books/{book}/favorite'
 */
favorite.post = (args: { book: number | { id: number } } | [book: number | { id: number } ] | number | { id: number }, options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: favorite.url(args, options),
    method: 'post',
})
const books = {
    index: Object.assign(index, index),
show: Object.assign(show, show),
read: Object.assign(read, read8d9ffd),
borrow: Object.assign(borrow, borrow),
return: Object.assign(returnMethod, returnMethod),
favorite: Object.assign(favorite, favorite),
}

export default books