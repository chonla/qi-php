# Delete a post should actually delete data

## Precondition

* [Login as a user](../common/login-by-user-1.md)
* [Create New Post](../common/create-new-post.md)
* [Delete New Post](../common/delete-new-post.md)

## GET {new-post-uri}

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 404 |
