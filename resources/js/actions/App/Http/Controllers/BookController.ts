import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../../wayfinder'
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
* @see \App\Http\Controllers\BookController::readPage
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
export const readPage = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: readPage.url(args, options),
    method: 'get',
})

readPage.definition = {
    methods: ["get","head"],
    url: '/books/{book}/read/page/{page}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\BookController::readPage
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
readPage.url = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions) => {
    if (Array.isArray(args)) {
        args = {
                    book: args[0],
                    page: args[1],
                }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
                        book: typeof args.book === 'object'
                ? args.book.id
                : args.book,
                                page: args.page,
                }

    return readPage.definition.url
            .replace('{book}', parsedArgs.book.toString())
            .replace('{page}', parsedArgs.page.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\BookController::readPage
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
readPage.get = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: readPage.url(args, options),
    method: 'get',
})
/**
* @see \App\Http\Controllers\BookController::readPage
 * @see app/Http/Controllers/BookController.php:71
 * @route '/books/{book}/read/page/{page}'
 */
readPage.head = (args: { book: number | { id: number }, page: string | number } | [book: number | { id: number }, page: string | number ], options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: readPage.url(args, options),
    method: 'head',
})
const BookController = { index, show, read, readPage }

export default BookController