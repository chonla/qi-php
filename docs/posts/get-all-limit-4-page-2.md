# Get all posts should return list of posts and start with page 1 and limit of 4

## GET /api/posts?limit=4&page=2

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json($|;)/ |
| DATA.page | 2 |
| DATA.limit | 4 |

### Example

```
{
    "page_count": 2,
    "page": 2,
    "limit": 4,
    "result": [
        {
            "id": 5,
            "title": "Spiderman is just a young boy",
            "body": "I wish he will grow up someday.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 6,
            "title": "Castlevana",
            "body": "Oh! you spell it wrong.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 7,
            "title": "Master Chef",
            "body": "I have no idea about this.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 8,
            "title": "Lorem ipsum",
            "body": "Rola Takizawa.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        }
    ]
}
```