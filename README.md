# API implementation example (PHP)

View the examples and comments for all the necessary information, params and fields. An unique token is required to access to API. This token can be generated within the control panel: https://app.trengo.eu.

The documentation is a work in progress.

----------

###Accessing the API

Make a GET request to https://app.trengo.eu/api/v1/{method} with a request-header named `token`. This a unique string referencing the agency.

#####Example

```php
$curl = curl_init();
curl_setopt_array('https://app.trengo.eu/api/v1/{method}', array(
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => $url,
  CURLOPT_HTTPHEADER => [
    'token: '.$token
  ]
));
$response = curl_exec($curl);
curl_close($curl);
echo json_decode($response, true);
```

----------

Available methods
--
#####/tickets

Get all tickets, including filtering and pagination.

Url: `/tickets`  Method: `GET`  Response: `JSON`
#####Possible GET parameters
| Param  | Explanation |
| ------------- | ------------- |
| page  | Current page  |
| status  | Filer ticket status (`OPEN`,`ASSIGNED`,`CLOSED`)  |
| date_from  | Select tickets newer than created date (Y-m-d) |
| date_until  | Select tickets older than created date  (Y-m-d) |

#####JSON response example
#######Request:
`https://app.trengo.eu/api/v1/tickets?status=OPEN`
#######Response:
```json
{
  "total": 2,
  "per_page": 30,
  "current_page": 1,
  "last_page": 1,
  "next_page_url": null,
  "prev_page_url": null,
  "from": 1,
  "to": 2,
  "data": [
    {
      "id": 1,
      "contact_id": 1,
      "status": "OPEN",
      "assigned_at": "2015-11-04 12:33:27",
      "created_at": "2015-11-04 12:29:06",
      "updated_at": "2015-11-04 13:00:53",
      "contact": {
        "id": 1,
        "full_name": "John Doe",
        "phone": "31612345678",
        "created_at": "2015-11-04 12:29:06",
        "updated_at": "2015-11-04 12:29:06"
      },
      "messages": [
        {
          "id": 1,
          "ticket_id": 1,
          "contact_id": 1,
          "type": "OUTBOUND",
          "sent_at": "2015-11-04 13:00:49",
          "message": "This is a test message",
          "file_name": null,
          "file_caption": null,
          "body_type": "TEXT",
          "read": 1,
          "created_at": "2015-11-04 13:00:48",
          "updated_at": "2015-11-04 13:00:49",
          "deleted_at": null
        },
        {
          "id": 1,
          "ticket_id": 1,
          "contact_id": 1,
          "type": "INBOUND",
          "sent_at": "2015-11-04 13:00:49",
          "message": "This is another test message",
          "file_name": null,
          "file_caption": null,
          "body_type": "TEXT",
          "read": 1,
          "created_at": "2015-11-04 13:00:48",
          "updated_at": "2015-11-04 13:00:49",
          "deleted_at": null
        }
      ]
    }
  ]
}
```
