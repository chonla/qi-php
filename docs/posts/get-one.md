# Get a post should return post content

## GET /api/posts/2

## Expectation

| Assert | Expected |
| - | - |
| StatusCode | 200 |
| HEADER.content-type | /^application/json($|;)/ |
| DATA.id | 2 |
| DATA.title | /.+/ |
| DATA.body | /.+/ |
| DATA.author | /\d+/ |
| DATA.status | /^.+$/ |
| DATA.published_at | /\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/ |
| DATA.created_at | /\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/ |
| DATA.updated_at | /\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}/ |

### Example

```
{
    "id": 2,
    "title": "Sample Post 2",
    "body": "This is another sample.",
    "author": 1,
    "featured_image": 0,
    "created_at": "2018-07-16 08:19:43",
    "updated_at": "2018-07-16 08:19:43"
}
```