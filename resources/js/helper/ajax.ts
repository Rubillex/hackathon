let csrfToken = document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

export function setCsrfToken(newToken: string) {
    csrfToken = newToken;
}

/**
 * GET-запрос на получение JSON
 */
export async function getJson<T>(url: string): Promise<T> {
    const options = {
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
        },
    };

    // @ts-ignore
    const response = await fetch(url, options);

    return await response.json();
}

/**
 * POST-запрос с JSON-телом и получающий ответ в формате JSON
 */
export async function postJson<T>(url: string, data): Promise<T> {
    const options = {
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
        },
        method: 'POST',
    };

    if (data instanceof FormData) {
        const object = {};
        data.forEach((value, key) => { object[key] = value; });
        options['body'] = JSON.stringify(object);
    } else {
        options['body'] = JSON.stringify(data);
    }

    // @ts-ignore
    const response = await fetch(url, options);

    return await response.json();
}

/**
 * POST-запрос без JSON-тела, получающий ответ в формате JSON
 */
export async function post<T>(url: string): Promise<T> {
    const options = {
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
        },
        method: 'POST',
    };

    // @ts-ignore
    const response = await fetch(url, options);

    return await response.json();
}

/**
 * POST-запрос для отправки формы с файлами
 * @param href string куда слать форму
 * @param data FormData|HTMLFormElement - либо подготовленная FormData, либо HTML DOM нода самой формы
 */
export async function postMultipartFormData<T>(href: string, data: FormData|HTMLFormElement): Promise<T> {
    const options = {
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Cache-Control': 'no-cache',
        },
        method: 'POST',
    };

    if (data instanceof FormData) {
        options['body'] = data;
    } else {
        options['body'] = new FormData(data);
    }

    // @ts-ignore
    const response = await fetch(href, options);

    return await response.json();
}

export function buildQueryString(obj, prefix = ''): string {
    let str: string[] = [];

    for (let key in obj) {
        if (!obj.hasOwnProperty(key)) continue;
        if (obj[key] === null || obj[key] === undefined || obj[key] === '') continue;

        let keyStr = prefix ? prefix + '[' + key + ']' : key;
        let value = obj[key];

        str.push((value !== null && typeof value === 'object')
            ? buildQueryString(value, keyStr)
            : encodeURIComponent(keyStr) + '=' + encodeURIComponent(value));
    }

    return str.join('&');
}
