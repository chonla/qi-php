# Get all posts should return list of posts and start with page 1 and limit of 4

## GET /posts?limit=4

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json[;$]/ |
| DATA.page | 1 |
| DATA.limit | 4 |
| DATA.result[0].id | /^\d+$/ |

### Example

```
{
    "page_count": 2,
    "page": 1,
    "limit": 4,
    "result": [
        {
            "id": 1,
            "title": "Sample Post",
            "body": "This is a sample post.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 2,
            "title": "Sample Post 2",
            "body": "This is another sample.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 3,
            "title": "Awesome Post",
            "body": "This is an awesome post.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 4,
            "title": "Go for avengers",
            "body": "Ironman is missing.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        }
    ]
}
```