# Get all posts should return list of posts in the given page

## GET /posts?&page=2

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json[;$]/ |
| DATA.page | 2 |

### Example

```
{
    "page_count": 2,
    "page": 2,
    "limit": 10,
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
        },
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
        },
        {
            "id": 9,
            "title": "BNK48",
            "body": "Cherprang is the best.",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        },
        {
            "id": 10,
            "title": "Russia!",
            "body": "Soccer!",
            "author": 1,
            "featured_image": 0,
            "created_at": "2018-07-16 08:19:43",
            "updated_at": "2018-07-16 08:19:43"
        }
    ]
}
```