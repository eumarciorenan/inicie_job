<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset ('assets/style.css')}}">
        <title>Test Vaga Inicie</title>
    </head>
    <body>
        <div class="container pt-3">
            <h1 class="text-center">Documentação da API (Candidato Márcio Renan Almeida) </h1>
            <div class="row mt-5">
                <div class="col-md-6"><h3>Resources</h3>
                    <table class="table table-responsive-sm table-sm">
                        <tbody>
                            <tr>
                                <td>
                                    <samp>
                                        <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/users">https://gorest.co.in/public/v2/users</a>
                                    </samp>
                                </td>
                                <td class="text-end">3390</td>
                            </tr>
                            <tr>
                                <td>
                                    <samp>
                                        <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/posts">https://gorest.co.in/public/v2/posts</a>
                                    </samp>
                                </td>
                                <td class="text-end">1613</td>
                            </tr>
                            <tr>
                                <td>
                                    <samp>
                                        <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/comments">https://gorest.co.in/public/v2/comments</a>
                                    </samp>
                                </td>
                                <td class="text-end">1629</td>
                            </tr>
                            <tr>
                                <td>
                                    <samp>
                                        <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/todos">https://gorest.co.in/public/v2/todos</a>
                                    </samp>
                                </td>
                                <td class="text-end">1705</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3>Trying it Out</h3>
                    <table class="table table-responsive-sm table-sm"><tbody>
                        <tr>
                            <td>
                                <samp>POST /public/v2/users</samp>
                            </td>
                            <td class="text-end">Create a new user</td>
                        </tr>
                        <tr>
                            <td>
                                <samp>GET /public/v2/users/100</samp>
                            </td>
                            <td class="text-end">Get user details</td>
                        </tr>
                        <tr>
                            <td>
                                <samp>PUT|PATCH /public/v2/users/100</samp>
                            </td>
                            <td class="text-end">Update user details</td>
                        </tr>
                        <tr>
                            <td>
                                <samp>DELETE /public/v2/users/100</samp>
                            </td>
                            <td class="text-end">Delete user</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h3 class="mt-3">Nested Resources</h3>
        <div class="row"><div class="col-md-6">
            <table class="table table-responsive-sm table-sm">
                <tbody>
                    <tr>
                        <td>
                            <samp>GET <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/users/100/posts">/public/v2/users/100/posts</a>
                            </samp>
                        </td>
                        <td class="text-end">Retrieves user posts</td>
                    </tr>
                    <tr>
                        <td>
                            <samp>GET <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/posts/100/comments">/public/v2/posts/100/comments</a>
                            </samp>
                        </td>
                        <td class="text-end">Retrieves post comments</td>
                    </tr>
                    <tr>
                        <td>
                            <samp>GET <a target="_blank" class="text-white" href="https://gorest.co.in/public/v2/users/100/todos">/public/v2/users/100/todos</a></samp>
                        </td>
                        <td class="text-end">Retrieves user todos</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-responsive-sm table-sm"><tbody>
                <tr>
                    <td>
                        <samp>POST /public/v2/users/100/posts</samp>
                </td><td class="text-end">Creates a user post</td>
            </tr>
            <tr>
                <td>
                    <samp>POST /public/v2/posts/100/comments</samp>
                </td>
                <td class="text-end">Creates a post comment</td>
            </tr>
            <tr>
                <td>
                    <samp>POST /public/v2/users/100/todos</samp>
                </td>
                <td class="text-end">Creates a user todo</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<ul>
    <li class="text-warning">Do not post your personal data like name, email, phone, photo etc...</li>
    <li class="text-info">For paged results parameter "page" should be passed in url ex: GET <code>/public/v2/users?page=1</code></li><li class="text-info">Request methods PUT, POST, PATCH, DELETE needs access token, which needs to be passed with "Authorization" header as Bearer token.</li>
    <li class="text-info">API Versions <code>/public-api/*</code>, <code>/public/v1/*</code> and <code>/public/v2/*</code></li>
    <li>
        <a href="/my-account/access-tokens">Click here to get your access token</a>
    </li>
</ul>
<h3 class="mt-5">Features</h3>
<ul>
    <li>Fully secured quick prototyping.</li>
    <li>Response format negotiation. (supporting JSON and XML add ".json" or ".xml" to api end point)</li>
    <li>Support for the OPTIONS and HEAD verbs.</li>
    <li>Full search support on all fields. Ex: https://gorest.co.in/public/v2/users?name=kumar</li>
    <li>Data created/modified by a user is only visible to that perticular user, all data will be deleted and recreated on daily basis.</li><li><a href="/my-account/logs">Request and response logging.</a></li></ul><div class="row"><div class="col-md-6"><h3 class="mt-3">Rate Limiting Headers</h3>
        <ul>
            <li>
                <a href="/my-account/access-tokens">Customize the rate limit per access token.</a>
            </li>
            <li>
                <code>X-RateLimit-Limit</code> number of allowed requests/minute.</li>
                <li>
                    <code>X-RateLimit-Remaining</code> remaining requests within the current period.</li>
                    <li>
                        <code>X-RateLimit-Reset</code> seconds to wait before having maximum number of allowed requests again.</li>
                    </ul>
                </div>
                <div class="col-md-6"><h3 class="mt-3">Pagination Headers</h3>
                    <ul>
                        <li>
                            <code>X-Pagination-Total</code> total number of results.</li>
                            <li><code>X-Pagination-Pages</code> total number of pages.</li>
                            <li><code>X-Pagination-Page</code> current page number.</li>
                            <li><code>X-Pagination-Limit</code> results per page.</li>
                        </ul>
                    </div>
                </div>
                <h3 class="mt-3">API Versions</h3>
                <table class="table table-responsive-sm">
                    <tbody>
                        <tr>
                            <th>API</th>
                            <th>Response Body</th>
                            <th class="text-end">Comments</th>
                        </tr>
                        <tr>
                            <td>/public/v2/*</td>
                            <td>Object or Array of Objects</td>
                            <td class="text-end">HTTP Status code contains the actual response code <br>Response headers contains the pagination information <br>Response body contains the results</td>
                        </tr>
                        <tr>
                            <td>/public/v1/*</td>
                            <td>{ meta:, data: }</td>
                            <td class="text-end">HTTP status code contains the actual response code <br>
                                <code>meta</code> contains the pagination information <br>
                                <code>data</code> contains the actual results</td>
                            </tr>
                            <tr>
                                <td>/public-api/*</td>
                                <td>{ code :, meta:, data: }</td>
                                <td class="text-end">HTTP status code is always 200.  <br>
                                    <code>code</code> contains the operation response code <br>
                                    <code>meta</code> contains the pagination information <br>
                                    <code>data</code> contains the actual results</td>
                                </tr>
                            </tbody>
                        </table>
                        <h3 class="mt-3">Authentication</h3>
                        <p>Unlike Web applications, RESTful APIs are usually stateless, which means sessions or cookies should not be used. Therefore, each request should come with some sort of authentication credentials. A common practice is to send a secret access token with each request to authenticate the user. Since an access token can be used to uniquely identify and authenticate a user, API requests should always be sent via HTTPS to prevent man-in-the-middle (MitM) attacks. </p>
                        <p>There are different ways to send an access token:</p>
                        <ul>
                            <li>
                                <a href="http://en.wikipedia.org/wiki/Basic_access_authentication" rel="noreferrer" target="_blank">HTTP Basic Auth</a>: the access token is sent as the username.</li>
                                <li>Query parameter: the access token is sent as a query parameter in the API URL. <br>e.g. <samp>https://gorest.co.in/public/v2/users?access-token=xxx</samp>
                                </li>
                                <li>
                                    <a href="http://oauth.net/2/" rel="noreferrer" target="_blank">OAuth 2</a>: the access token is obtained by the consumer from an authorization server and sent to the API server via <a href="http://tools.ietf.org/html/rfc6750" rel="noreferrer" target="_blank">HTTP Bearer Tokens </a>, according to the OAuth2 protocol.</li>
                                    <li class="text-info">This API supports only "HTTP Bearer Tokens" and "Query parameter Auth"</li>
                                </ul>
                                <h3 class="mt-5 mb-3">cUrl Examples</h3>
                                <div class="mb-3">
                                    <h6 class="text-info">1. List users</h6>
                                    <samp class="user-select-all text-break">curl -i -H "Accept:application/json" -H "Content-Type:application/json" -XGET "https://gorest.co.in/public/v2/users"</samp>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-info">2. Create user</h6>
                                    <samp class="user-select-all text-break">curl -i -H "Accept:application/json" -H "Content-Type:application/json" -H "Authorization: Bearer ACCESS-TOKEN" -XPOST "https://gorest.co.in/public/v2/users"  -d '{"name":"Tenali Ramakrishna", "gender":"male", "email":"tenali.ramakrishna@15ce.com", "status":"active"}' </samp>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-info">3. Update user</h6>
                                    <samp class="user-select-all text-break">curl -i -H "Accept:application/json" -H "Content-Type:application/json" -H "Authorization: Bearer ACCESS-TOKEN"  -XPATCH "https://gorest.co.in/public/v2/users/123" -d '{"name":"Allasani Peddana", "email":"allasani.peddana@15ce.com", "status":"active"}' </samp>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-info">4. Delete user</h6>
                                    <samp class="user-select-all text-break">curl -i -H "Accept:application/json" -H "Content-Type:application/json" -H "Authorization: Bearer ACCESS-TOKEN" -XDELETE "https://gorest.co.in/public/v2/users/123"</samp>
                                </div>
                                <h3 class="mt-5">Http Response Codes</h3>
                                <ul>
                                    <li>200: OK. Everything worked as expected.</li>
                                    <li>201: A resource was successfully created in response to a POST request. The Location header contains the URL pointing to the newly created resource.</li>
                                    <li>204: The request was handled successfully and the response contains no body content (like a DELETE request).</li>
                                    <li>304: The resource was not modified. You can use the cached version.</li>
                                    <li>400: Bad request. This could be caused by various actions by the user, such as providing invalid JSON data in the request body etc.</li>
                                    <li>401: Authentication failed.</li>
                                    <li>403: The authenticated user is not allowed to access the specified API endpoint.</li>
                                    <li>404: The requested resource does not exist.</li>
                                    <li>405: Method not allowed. Please check the Allow header for the allowed HTTP methods.</li>
                                    <li>415: Unsupported media type. The requested content type or version number is invalid.</li>
                                    <li>422: Data validation failed (in response to a POST request, for example). Please check the response body for detailed error messages.</li>
                                    <li>429: Too many requests. The request was rejected due to rate limiting.</li>
                                    <li>500: Internal server error. This could be caused by internal program errors.</li>
                                </ul>
                            </div>
    </body>
</html>
