---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Activity Log


APIs
<!-- START_ddd004b115bd571f2f3e40bc1fac71e2 -->
## Get Activity Log

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/activity_log/GetActivityLog?date=velit&object=eaque&user_id=occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/activity_log/GetActivityLog"
);

let params = {
    "date": "velit",
    "object": "eaque",
    "user_id": "occaecati",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
"Array of Activity"
```

### HTTP Request
`POST administration/activity_log/GetActivityLog`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `date` |  required  | Activity Date.
    `object` |  required  | Activity object.
    `user_id` |  required  | .

<!-- END_ddd004b115bd571f2f3e40bc1fac71e2 -->

#Actors Controller


APIs
<!-- START_2ebb999236370eda4982538fe7e6e5db -->
## Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET actors`


<!-- END_2ebb999236370eda4982538fe7e6e5db -->

<!-- START_c150b09eff2a66c88e3b9fda6e4ab3b3 -->
## create
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/actors/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET actors/create`


<!-- END_c150b09eff2a66c88e3b9fda6e4ab3b3 -->

<!-- START_397da74f837f079f86fa2015dc887e67 -->
## store
Not used yet

> Example request:

```bash
curl -X POST \
    "http://localhost/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST actors`


<!-- END_397da74f837f079f86fa2015dc887e67 -->

<!-- START_1f957c58c1e5aadc162b66f086ef673a -->
## show
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET actors/{actor}`


<!-- END_1f957c58c1e5aadc162b66f086ef673a -->

<!-- START_772be97d0d66164083b2378e0db13894 -->
## Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/actors/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET actors/{actor}/edit`


<!-- END_772be97d0d66164083b2378e0db13894 -->

<!-- START_6a272adebd19eea2fdfeb4f744de16b6 -->
## edit
Not used yet

> Example request:

```bash
curl -X PUT \
    "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT actors/{actor}`

`PATCH actors/{actor}`


<!-- END_6a272adebd19eea2fdfeb4f744de16b6 -->

<!-- START_381b17180f7806f9c0ded114e93405e5 -->
## update
Not used yet

> Example request:

```bash
curl -X DELETE \
    "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE actors/{actor}`


<!-- END_381b17180f7806f9c0ded114e93405e5 -->

#Appointment Controller


APIs
<!-- START_123eb31e6bba2ef2884fb6d884ef33f8 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/appointments?filter[actor]=fugit&filter[project]=repellat&filter[sound_engineer]=hic&filter[from]=cupiditate&filter[to]=neque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/appointments"
);

let params = {
    "filter[actor]": "fugit",
    "filter[project]": "repellat",
    "filter[sound_engineer]": "hic",
    "filter[from]": "cupiditate",
    "filter[to]": "neque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "Appointment": [
        {
            "id": 1860,
            "time_in_time": "16:00:00",
            "time_in_date": "2021-04-07 16:00:00",
            "time_out_time": "17:00:00",
            "time_out_date": "2021-04-07 17:00:00",
            "date": "07\/04\/2021",
            "note": null,
            "updated_at": "2021-04-06T13:14:24.000000Z",
            "created_at": "2021-04-06T13:14:24.000000Z",
            "deleted_at": null,
            "actors": [
                {
                    "id": 248,
                    "user_id": 293,
                    "pivot": {
                        "appointment_id": 1860,
                        "actor_id": 248
                    },
                    "user": {
                        "id": 293,
                        "first_name": "نضال",
                        "last_name": "جوهر",
                        "image": "tazmeen_app\/storage\/uploads\/actor\/images\/N Jouhar.png",
                        "name": "نضال جوهر"
                    }
                }
            ],
            "studio": "Studio A",
            "studio_id": 1,
            "sound_engineer": "Ghiath Al Ablouj",
            "sound_engineer_id": 19,
            "created_by_name": "Mohammad Al Dakkak",
            "deleted_by_name": null,
            "studio_color": "C467A2",
            "episodes": [
                {
                    "id": 5276,
                    "title": "Mike-S2",
                    "episode_number": "034",
                    "project_id": 189,
                    "text": "034 - Mike-S2",
                    "pivot": {
                        "appointment_id": 1860,
                        "episode_id": 5276,
                        "priority": 4
                    },
                    "project": {
                        "id": 189,
                        "name": "Mike-S2",
                        "project_id": "21026",
                        "text": "21026 - Mike-S2"
                    }
                }
            ],
            "appointment_update": [
                {
                    "id": 2900,
                    "created_at": "2021-04-07 12:05:25",
                    "updated_at": "2021-04-07 12:05:25",
                    "appointment_id": 1860,
                    "created_by": 34,
                    "note": [],
                    "created_by_name": "Mohammad Al Dakkak"
                }
            ],
            "appointment_note": []
        }
    ],
    "filter": {
        "actor": null,
        "project": null,
        "sound_engineer": [],
        "studio": [],
        "from": "2021-04-07T03:57:08.557Z",
        "to": "2021-06-14T03:57:08.557Z"
    }
}
```

### HTTP Request
`GET appointments`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `filter` |  optional  | JsonArray
    `filter.actor` |  optional  | int
    `filter.project` |  optional  | int
    `filter.sound_engineer` |  optional  | int
    `filter.from` |  optional  | datetime
    `filter.to` |  optional  | datetime

<!-- END_123eb31e6bba2ef2884fb6d884ef33f8 -->

<!-- START_fbed80fa46f5b0a94881170ca29e98d9 -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/appointments?data[actors]=nemo&data[sound_engineer_id]=totam&data[studio_id]=sed&data[time_in]=molestias&data[time_out]=quia&data[note]=quia&data[episodes]=nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/appointments"
);

let params = {
    "data[actors]": "nemo",
    "data[sound_engineer_id]": "totam",
    "data[studio_id]": "sed",
    "data[time_in]": "molestias",
    "data[time_out]": "quia",
    "data[note]": "quia",
    "data[episodes]": "nihil",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST appointments`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `data` |  optional  | JsonArray
    `data.actors` |  required  | Array
    `data.sound_engineer_id` |  required  | int
    `data.studio_id` |  required  | int
    `data.time_in` |  required  | date
    `data.time_out` |  required  | date
    `data.note` |  optional  | string
    `data.episodes` |  optional  | JsonArray

<!-- END_fbed80fa46f5b0a94881170ca29e98d9 -->

<!-- START_fc029954aa241c8d432684f287137f29 -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/appointments/1?id=sed&data[actors]=harum&data[sound_engineer_id]=et&data[studio_id]=ducimus&data[time_in]=voluptas&data[time_out]=nemo&data[note]=omnis&data[episodes]=dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/appointments/1"
);

let params = {
    "id": "sed",
    "data[actors]": "harum",
    "data[sound_engineer_id]": "et",
    "data[studio_id]": "ducimus",
    "data[time_in]": "voluptas",
    "data[time_out]": "nemo",
    "data[note]": "omnis",
    "data[episodes]": "dolor",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "data": {
        "time_in_old": "2021-06-07 18:45:00",
        "time_in": "2021-06-07 01:20:00"
    }
}
```

### HTTP Request
`PUT appointments/{appointment}`

`PATCH appointments/{appointment}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `data` |  optional  | JsonArray
    `data.actors` |  required  | Array
    `data.sound_engineer_id` |  required  | int
    `data.studio_id` |  required  | int
    `data.time_in` |  required  | date
    `data.time_out` |  required  | date
    `data.note` |  optional  | string
    `data.episodes` |  optional  | JsonArray

<!-- END_fc029954aa241c8d432684f287137f29 -->

<!-- START_1317b5a62359118aa18ca561e9439ebb -->
## destroy

> Example request:

```bash
curl -X DELETE \
    "http://localhost/appointments/1?id=fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/appointments/1"
);

let params = {
    "id": "fugit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "data": {
        "deleted_by": 34,
        "deleted_at": "2021-06-07 04:17:30"
    }
}
```

### HTTP Request
`DELETE appointments/{appointment}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_1317b5a62359118aa18ca561e9439ebb -->

<!-- START_a8b1af3ae26073098f0f25681be72546 -->
## Add Appointment Note

> Example request:

```bash
curl -X POST \
    "http://localhost/production/appointment/AddAppointmentNote?data[appointment_id]=ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/appointment/AddAppointmentNote"
);

let params = {
    "data[appointment_id]": "ut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/appointment/AddAppointmentNote`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `data` |  optional  | JsonArray
    `data.appointment_id` |  required  | int

<!-- END_a8b1af3ae26073098f0f25681be72546 -->

#Assign Controller


APIs
<!-- START_a4d70ce9146eec678818077727aaeb18 -->
## Get Assgin Episodes Jobs By Project

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/assgin/GetAssginEpisodesJobsByProject?reciver_team_id=non&project_id=quod&sender_team_id=incidunt&deadline=adipisci&assign_request_id=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/assgin/GetAssginEpisodesJobsByProject"
);

let params = {
    "reciver_team_id": "non",
    "project_id": "quod",
    "sender_team_id": "incidunt",
    "deadline": "adipisci",
    "assign_request_id": "aut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "job_id": 87,
            "episode_id": 4901
        }
    ],
    "myAssign": [
        {
            "job_id": 87,
            "episode_id": 4901
        }
    ],
    "jobs": [
        {
            "id": 87,
            "name": "Sound Edit",
            "type": "production",
            "position_id": 10,
            "multi_episode": 0
        }
    ],
    "episodes": [
        {
            "text": "160 - Soz",
            "id": 4901
        }
    ]
}
```

### HTTP Request
`GET production/assgin/GetAssginEpisodesJobsByProject`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `reciver_team_id` |  required  | int
    `project_id` |  required  | int
    `sender_team_id` |  required  | int
    `deadline` |  required  | date
    `assign_request_id` |  optional  | int

<!-- END_a4d70ce9146eec678818077727aaeb18 -->

<!-- START_86e8fb78346abb1644077feb1a6e262b -->
## Send Assgin

> Example request:

```bash
curl -X POST \
    "http://localhost/production/assgin/SendAssgin?deadline=non&project_id=sit&sender_team_id=dolor&reciver_team_id=tempora&episode_job[job_id]=cumque&episode_job[episode_id]=numquam&episode_job[exists]=commodi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/assgin/SendAssgin"
);

let params = {
    "deadline": "non",
    "project_id": "sit",
    "sender_team_id": "dolor",
    "reciver_team_id": "tempora",
    "episode_job[job_id]": "cumque",
    "episode_job[episode_id]": "numquam",
    "episode_job[exists]": "commodi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`POST production/assgin/SendAssgin`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `deadline` |  required  | date
    `project_id` |  required  | int
    `sender_team_id` |  required  | int
    `reciver_team_id` |  required  | int
    `episode_job` |  required  | JsonArray
    `episode_job.job_id` |  required  | int
    `episode_job.episode_id` |  required  | int
    `episode_job.exists` |  optional  | boolean

<!-- END_86e8fb78346abb1644077feb1a6e262b -->

<!-- START_65cc87f7987588318b21bee73573bd7c -->
## Update Assgin

> Example request:

```bash
curl -X POST \
    "http://localhost/production/assgin/UpdateAssgin?assign_enable=sunt&update_all=et&update_mode=dolor&assign_request_id=minima&deadline=autem&old_deadline=voluptas&project_id=perferendis&team_id=dolorum&episode_job[job_id]=dicta&episode_job[episode_id]=ipsa&episode_job[exists]=facilis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/assgin/UpdateAssgin"
);

let params = {
    "assign_enable": "sunt",
    "update_all": "et",
    "update_mode": "dolor",
    "assign_request_id": "minima",
    "deadline": "autem",
    "old_deadline": "voluptas",
    "project_id": "perferendis",
    "team_id": "dolorum",
    "episode_job[job_id]": "dicta",
    "episode_job[episode_id]": "ipsa",
    "episode_job[exists]": "facilis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`POST production/assgin/UpdateAssgin`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `assign_enable` |  required  | boolean
    `update_all` |  required  | boolean
    `update_mode` |  required  | boolean
    `assign_request_id` |  required  | int
    `deadline` |  required  | date
    `old_deadline` |  required  | date
    `project_id` |  required  | int
    `team_id` |  required  | int
    `episode_job` |  required  | JsonArray
    `episode_job.job_id` |  required  | int
    `episode_job.episode_id` |  required  | int
    `episode_job.exists` |  optional  | boolean

<!-- END_65cc87f7987588318b21bee73573bd7c -->

<!-- START_ce649b13a100889f4e8cce4aa13d6b40 -->
## Get Assgin Request Details

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/assgin/GetAssginRequestDetails?assign_request_id=dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/assgin/GetAssginRequestDetails"
);

let params = {
    "assign_request_id": "dolores",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "job_id": 87,
            "episode_id": 4901
        }
    ],
    "myAssign": [
        {
            "job_id": 87,
            "episode_id": 4901
        }
    ],
    "jobs": [
        {
            "id": 87,
            "name": "Sound Edit",
            "type": "production",
            "position_id": 10,
            "multi_episode": 0
        }
    ],
    "episodes": [
        {
            "text": "160 - Soz",
            "id": 4901
        }
    ]
}
```

### HTTP Request
`GET production/assgin/GetAssginRequestDetails`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `assign_request_id` |  required  | int

<!-- END_ce649b13a100889f4e8cce4aa13d6b40 -->

#Auth Controller


APIs
<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Get a JWT via given credentials.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## Log the user out (Invalidate the token).

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
## Refresh a token.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/refresh`


<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->

<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
## Get the authenticated User.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/me"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/me`


<!-- END_a47210337df3b4ba0df697c115ba0c1e -->

#Branches Controller


APIs
<!-- START_30a32610ed0972b79928f04cbc8e14e6 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "created_at": "2021-06-01T09:07:18",
            "updated_at": "2021-06-01 06:05:31",
            "id": 1,
            "country": "Syria",
            "currency": "S.P.",
            "flag": "Syria.jpg",
            "name": "Syria",
            "timezone": "Asia\/\/Damascus",
            "symbol": "Syria"
        }
    ]
}
```

### HTTP Request
`GET branches`


<!-- END_30a32610ed0972b79928f04cbc8e14e6 -->

<!-- START_147832de056deec3334a97de4cc2ac12 -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/branches?country=dignissimos&currency=quia&flag=sapiente&name=in&symbol=quis&timezone=voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/branches"
);

let params = {
    "country": "dignissimos",
    "currency": "quia",
    "flag": "sapiente",
    "name": "in",
    "symbol": "quis",
    "timezone": "voluptatem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "created_at": "2021-06-01T09:07:18",
            "updated_at": "2021-06-01 06:05:31",
            "id": 1,
            "country": "Syria",
            "currency": "S.P.",
            "flag": "Syria.jpg",
            "name": "Syria",
            "timezone": "Asia\/\/Damascus",
            "symbol": "Syria"
        }
    ]
}
```

### HTTP Request
`POST branches`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `country` |  required  | string
    `currency` |  required  | string
    `flag` |  required  | string
    `name` |  required  | string
    `symbol` |  required  | string
    `timezone` |  required  | string

<!-- END_147832de056deec3334a97de4cc2ac12 -->

<!-- START_b948913ab4e8234efb4d533b2396e31c -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/branches/1?id=ipsam&country=tempora&currency=voluptate&flag=voluptatem&name=omnis&symbol=et&timezone=numquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/branches/1"
);

let params = {
    "id": "ipsam",
    "country": "tempora",
    "currency": "voluptate",
    "flag": "voluptatem",
    "name": "omnis",
    "symbol": "et",
    "timezone": "numquam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "created_at": "2021-06-01T09:07:18",
            "updated_at": "2021-06-01 06:05:31",
            "id": 1,
            "country": "Syria",
            "currency": "S.P.",
            "flag": "Syria.jpg",
            "name": "Syria",
            "timezone": "Asia\/\/Damascus",
            "symbol": "Syria"
        }
    ]
}
```

### HTTP Request
`PUT branches/{branch}`

`PATCH branches/{branch}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `country` |  required  | string
    `currency` |  required  | string
    `flag` |  required  | string
    `name` |  required  | string
    `symbol` |  required  | string
    `timezone` |  required  | string

<!-- END_b948913ab4e8234efb4d533b2396e31c -->

#Category Controller


APIs
<!-- START_edb5f044def0afc43b544cf9168a4a6c -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}
```

### HTTP Request
`GET category`


<!-- END_edb5f044def0afc43b544cf9168a4a6c -->

<!-- START_674bce8571c928c555c8c92ad291002a -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/category?name=et&color=vitae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/category"
);

let params = {
    "name": "et",
    "color": "vitae",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}
```

### HTTP Request
`POST category`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string
    `color` |  required  | string

<!-- END_674bce8571c928c555c8c92ad291002a -->

<!-- START_eede06d7bce6b282dcc0b899b5ac2543 -->
## store

> Example request:

```bash
curl -X PUT \
    "http://localhost/category/1?id=sit&name=esse&color=doloremque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/category/1"
);

let params = {
    "id": "sit",
    "name": "esse",
    "color": "doloremque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}
```

### HTTP Request
`PUT category/{category}`

`PATCH category/{category}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `name` |  required  | string
    `color` |  required  | string

<!-- END_eede06d7bce6b282dcc0b899b5ac2543 -->

#Clients Controller


APIs
<!-- START_942d9ab834314b3b36a24456f71d4bbc -->
## index
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET clients`


<!-- END_942d9ab834314b3b36a24456f71d4bbc -->

<!-- START_5b5075de0547ea16ec88a13f431ba8c0 -->
## store
Not used yet

> Example request:

```bash
curl -X POST \
    "http://localhost/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST clients`


<!-- END_5b5075de0547ea16ec88a13f431ba8c0 -->

<!-- START_0dbe9d76b0fbe63f0f925953caee6e5f -->
## edit
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/clients/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/clients/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET clients/{client}/edit`


<!-- END_0dbe9d76b0fbe63f0f925953caee6e5f -->

<!-- START_f9561533de97700488e4efa1987acb50 -->
## update
Not used yet

> Example request:

```bash
curl -X PUT \
    "http://localhost/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT clients/{client}`

`PATCH clients/{client}`


<!-- END_f9561533de97700488e4efa1987acb50 -->

<!-- START_a25e9fc7ad9be0169e8a1877bb633bde -->
## destroy
Not used yet

> Example request:

```bash
curl -X DELETE \
    "http://localhost/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE clients/{client}`


<!-- END_a25e9fc7ad9be0169e8a1877bb633bde -->

#Dashboard Controller


APIs
<!-- START_3d549dc6e98c9295ce3cf09c560cbb87 -->
## GetVacation
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/dashboard/GetVacation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/dashboard/GetVacation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET main/dashboard/GetVacation`


<!-- END_3d549dc6e98c9295ce3cf09c560cbb87 -->

#EmployeeController


APIs
<!-- START_815be665d85e6cdc4f9dd2e4ed02b43a -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/employees?withTrashed=blanditiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/employees"
);

let params = {
    "withTrashed": "blanditiis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "count": 50,
    "users": [
        {
            "active": 1,
            "id": 1,
            "first_name": "Feras",
            "last_name": "Al Hallak",
            "name": "Feras Al Hallak",
            "positions": "Sound Team,Quality Control",
            "image": "tazmeen_app\/storage\/uploads\/employee\/files\/...jpg"
        }
    ]
}
```

### HTTP Request
`GET employees`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `withTrashed` |  required  | string

<!-- END_815be665d85e6cdc4f9dd2e4ed02b43a -->

<!-- START_9cc70b33d737e330f7bffac718b713a3 -->
## store
this Api other not required Params

> Example request:

```bash
curl -X POST \
    "http://localhost/employees?form_rand_id=ut&social_connect=reiciendis&positions=itaque&files=ratione&active=aut&first_name=voluptatem&last_name=maxime&english_name=ea&nationality=ut&branch_id=aperiam&timezone=sed&daily_working_hour=illo&username=temporibus&password=qui&confirm_password=quia&mobile_number=praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/employees"
);

let params = {
    "form_rand_id": "ut",
    "social_connect": "reiciendis",
    "positions": "itaque",
    "files": "ratione",
    "active": "aut",
    "first_name": "voluptatem",
    "last_name": "maxime",
    "english_name": "ea",
    "nationality": "ut",
    "branch_id": "aperiam",
    "timezone": "sed",
    "daily_working_hour": "illo",
    "username": "temporibus",
    "password": "qui",
    "confirm_password": "quia",
    "mobile_number": "praesentium",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Added successfully",
    "user_id": 882,
    "status": "success"
}
```

### HTTP Request
`POST employees`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `form_rand_id` |  required  | int
    `social_connect` |  required  | JsonArray
    `positions` |  required  | JsonArray
    `files` |  required  | Array
    `active` |  required  | boolean
    `first_name` |  required  | string
    `last_name` |  required  | string
    `english_name` |  required  | string
    `nationality` |  required  | string
    `branch_id` |  required  | int
    `timezone` |  required  | string
    `daily_working_hour` |  required  | string
    `username` |  required  | string
    `password` |  required  | string
    `confirm_password` |  required  | string
    `mobile_number` |  required  | string

<!-- END_9cc70b33d737e330f7bffac718b713a3 -->

<!-- START_e6358a0946e3afd44725f739c4701f7c -->
## edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost/employees/1/edit?employee_id=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/employees/1/edit"
);

let params = {
    "employee_id": "tenetur",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "employee": {
        "id": 2711,
        "deleted_at": null,
        "created_at": "2020-05-21 10:55:39",
        "updated_at": "2021-05-27 07:42:44",
        "user_id": 27,
        "created_by": 4,
        "country": "egypt",
        "city": "",
        "street": "19",
        "building": "153",
        "floor": "4",
        "born_in_country": "syria",
        "born_in_city": "",
        "born_date": "2005-01-04",
        "military_postponed_to": null,
        "transportation": "bus",
        "nationality": "syria",
        "gender": "male",
        "certificates": "",
        "courses": null,
        "studying": null,
        "medical_insurance_sponser": null,
        "medical_insurance_value": null,
        "medical_insurance_company": null,
        "social_insurance_sponser": null,
        "social_insurance_value": null,
        "social_insurance_company": null,
        "military": "complete",
        "description": null,
        "diseases": null,
        "identification_number": null,
        "smoker": "yes",
        "social_status": "married",
        "number_of_children": "2",
        "languages": "english",
        "bank_number": null,
        "name_in_bank": null,
        "bank": null,
        "branch": "egypt",
        "programs": "Excel,NiS SFX,Nuendo,Protools,Tazmeen Player Record,Word",
        "work_phone": null,
        "work_email": "email@gmail.com",
        "nearby_phone_number": null,
        "accommodation_type": "resident",
        "passport_number": "n 000002338",
        "country_of_passport": "syria",
        "passport_expiration_date": "2022\/01\/02",
        "residence_type": null,
        "work_permit": "no",
        "residency_number": "818100000000000",
        "residence_created_at": "2019\/12\/14",
        "residence_expiration_at": "2020\/11\/30",
        "membership_number": null,
        "syndicalistic_name": null,
        "degree": "industrial_secondary_certificate",
        "syndicalistic_country": null,
        "social_insurance_card_number": null,
        "medical_insurance_card_number": null,
        "medical_insurance_expiration_at": null,
        "social_insurance_expiration_at": null,
        "ability_to_global_travel": "yes",
        "ability_to_local_travel": "yes",
        "ability_to_local_travel_reason": null,
        "ability_to_global_travel_reason": null,
        "ability_work_remotely": "yes",
        "work_place": "home",
        "social_connect": [
            {
                "key": "facebook",
                "value": "ahmed"
            }
        ],
        "daily_working_hour": "8",
        "tax_number": null,
        "hobbies": "",
        "activities": null,
        "first_name": "Ahmad",
        "middle_name": "Fuad",
        "last_name": "Ahmad",
        "username": "az",
        "personal_email": null,
        "mobile_number": "00201012500000",
        "phone_number": "00201012500000",
        "home_number": null,
        "logout": 0,
        "english_name": "Ahmad",
        "active": 1,
        "firebase_token": null,
        "remember_token": "5qVMiAPiwuWgdAKJ9uAb0IIofhtmt59YvTBwLvnjQGZ10Lj7fkKH5mdvVeVm",
        "image": "tazmeen_app\/..\/.jpeg",
        "timezone": "Africa\/Cairo",
        "device": "computer",
        "fcm_token": "dsafsdfsdSDFA",
        "fcm_token_mobile": null,
        "branch_id": 2,
        "files": [],
        "positions": [
            {
                "id": 65,
                "created_at": "2021-01-16 13:21:34",
                "updated_at": "2021-01-16 13:21:34",
                "employee_id": 27,
                "currency": null,
                "salary_due_date": null,
                "basic_salary": null,
                "variable_salary": null,
                "total_salary": null,
                "salary_updated_at": null,
                "transportation_allowance": null,
                "contract_type": null,
                "active": 1,
                "position_id": 10,
                "deleted_at": null,
                "jobs": "87,88,89,90,91,92,175",
                "roles": "2",
                "contract_start_in": [],
                "contract_end_in": [],
                "supervisor": null,
                "contract": [],
                "position": {
                    "id": 10,
                    "name": "Sound Team"
                }
            }
        ]
    }
}
```

### HTTP Request
`GET employees/{employee}/edit`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  required  | int

<!-- END_e6358a0946e3afd44725f739c4701f7c -->

<!-- START_f8822467a2c47bdd2d1757a482aefc44 -->
## update
this Api other not required Params

> Example request:

```bash
curl -X PUT \
    "http://localhost/employees/1?id=ut&form_rand_id=voluptatem&social_connect=labore&positions=qui&files=amet&active=et&first_name=sunt&last_name=ut&english_name=beatae&nationality=perferendis&branch_id=est&timezone=odit&daily_working_hour=occaecati&username=nihil&password=fugiat&confirm_password=sequi&mobile_number=fugiat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/employees/1"
);

let params = {
    "id": "ut",
    "form_rand_id": "voluptatem",
    "social_connect": "labore",
    "positions": "qui",
    "files": "amet",
    "active": "et",
    "first_name": "sunt",
    "last_name": "ut",
    "english_name": "beatae",
    "nationality": "perferendis",
    "branch_id": "est",
    "timezone": "odit",
    "daily_working_hour": "occaecati",
    "username": "nihil",
    "password": "fugiat",
    "confirm_password": "sequi",
    "mobile_number": "fugiat",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "employee": {
        "id": 2711,
        "deleted_at": null,
        "created_at": "2020-05-21 10:55:39",
        "updated_at": "2021-05-27 07:42:44",
        "user_id": 27,
        "created_by": 4,
        "country": "egypt",
        "city": "",
        "street": "19",
        "building": "153",
        "floor": "4",
        "born_in_country": "syria",
        "born_in_city": "",
        "born_date": "2005-01-04",
        "military_postponed_to": null,
        "transportation": "bus",
        "nationality": "syria",
        "gender": "male",
        "certificates": "",
        "courses": null,
        "studying": null,
        "medical_insurance_sponser": null,
        "medical_insurance_value": null,
        "medical_insurance_company": null,
        "social_insurance_sponser": null,
        "social_insurance_value": null,
        "social_insurance_company": null,
        "military": "complete",
        "description": null,
        "diseases": null,
        "identification_number": null,
        "smoker": "yes",
        "social_status": "married",
        "number_of_children": "2",
        "languages": "english",
        "bank_number": null,
        "name_in_bank": null,
        "bank": null,
        "branch": "egypt",
        "programs": "Excel,NiS SFX,Nuendo,Protools,Tazmeen Player Record,Word",
        "work_phone": null,
        "work_email": "email@gmail.com",
        "nearby_phone_number": null,
        "accommodation_type": "resident",
        "passport_number": "n 000002338",
        "country_of_passport": "syria",
        "passport_expiration_date": "2022\/01\/02",
        "residence_type": null,
        "work_permit": "no",
        "residency_number": "818100000000000",
        "residence_created_at": "2019\/12\/14",
        "residence_expiration_at": "2020\/11\/30",
        "membership_number": null,
        "syndicalistic_name": null,
        "degree": "industrial_secondary_certificate",
        "syndicalistic_country": null,
        "social_insurance_card_number": null,
        "medical_insurance_card_number": null,
        "medical_insurance_expiration_at": null,
        "social_insurance_expiration_at": null,
        "ability_to_global_travel": "yes",
        "ability_to_local_travel": "yes",
        "ability_to_local_travel_reason": null,
        "ability_to_global_travel_reason": null,
        "ability_work_remotely": "yes",
        "work_place": "home",
        "social_connect": [
            {
                "key": "facebook",
                "value": "ahmed"
            }
        ],
        "daily_working_hour": "8",
        "tax_number": null,
        "hobbies": "",
        "activities": null,
        "first_name": "Ahmad",
        "middle_name": "Fuad",
        "last_name": "Ahmad",
        "username": "az",
        "personal_email": null,
        "mobile_number": "00201012500000",
        "phone_number": "00201012500000",
        "home_number": null,
        "logout": 0,
        "english_name": "Ahmad",
        "active": 1,
        "firebase_token": null,
        "remember_token": "5qVMiAPiwuWgdAKJ9uAb0IIofhtmt59YvTBwLvnjQGZ10Lj7fkKH5mdvVeVm",
        "image": "tazmeen_app\/..\/.jpeg",
        "timezone": "Africa\/Cairo",
        "device": "computer",
        "fcm_token": "dsafsdfsdSDFA",
        "fcm_token_mobile": null,
        "branch_id": 2,
        "files": [],
        "positions": [
            {
                "id": 65,
                "created_at": "2021-01-16 13:21:34",
                "updated_at": "2021-01-16 13:21:34",
                "employee_id": 27,
                "currency": null,
                "salary_due_date": null,
                "basic_salary": null,
                "variable_salary": null,
                "total_salary": null,
                "salary_updated_at": null,
                "transportation_allowance": null,
                "contract_type": null,
                "active": 1,
                "position_id": 10,
                "deleted_at": null,
                "jobs": "87,88,89,90,91,92,175",
                "roles": "2",
                "contract_start_in": [],
                "contract_end_in": [],
                "supervisor": null,
                "contract": [],
                "position": {
                    "id": 10,
                    "name": "Sound Team"
                }
            }
        ]
    }
}
```

### HTTP Request
`PUT employees/{employee}`

`PATCH employees/{employee}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `form_rand_id` |  required  | int
    `social_connect` |  required  | JsonArray
    `positions` |  required  | JsonArray
    `files` |  required  | Array
    `active` |  required  | boolean
    `first_name` |  required  | string
    `last_name` |  required  | string
    `english_name` |  required  | string
    `nationality` |  required  | string
    `branch_id` |  required  | int
    `timezone` |  required  | string
    `daily_working_hour` |  required  | string
    `username` |  required  | string
    `password` |  required  | string
    `confirm_password` |  required  | string
    `mobile_number` |  required  | string

<!-- END_f8822467a2c47bdd2d1757a482aefc44 -->

<!-- START_06f190999a81ae230946d3308f2eaee6 -->
## Update Contract

> Example request:

```bash
curl -X POST \
    "http://localhost/hr/employee/UpdateContract?id=quia&contract_end_in=nihil&contract_start_in=sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hr/employee/UpdateContract"
);

let params = {
    "id": "quia",
    "contract_end_in": "nihil",
    "contract_start_in": "sit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST hr/employee/UpdateContract`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `contract_end_in` |  required  | date
    `contract_start_in` |  required  | date

<!-- END_06f190999a81ae230946d3308f2eaee6 -->

<!-- START_49dfa36a4596d841fc9879d3c8c0ab2a -->
## ChangePassword

> Example request:

```bash
curl -X POST \
    "http://localhost/hr/employee/ChangePassword?new_confirm_password=aut&new_password=vitae&old_password=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hr/employee/ChangePassword"
);

let params = {
    "new_confirm_password": "aut",
    "new_password": "vitae",
    "old_password": "autem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST hr/employee/ChangePassword`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `new_confirm_password` |  required  | string
    `new_password` |  required  | string
    `old_password` |  required  | string

<!-- END_49dfa36a4596d841fc9879d3c8c0ab2a -->

#EmployeeTrackerController


APIs
<!-- START_86e05d19a0a414cf432ca3f31490e83f -->
## Get Screenshot

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/tracker/get-screen-tracker?date=incidunt&device_id=numquam&employee_id=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/tracker/get-screen-tracker"
);

let params = {
    "date": "incidunt",
    "device_id": "numquam",
    "employee_id": "velit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "images": [
        {
            "file_date": "2021-05-31",
            "file_name": [
                "2021-05-31-09-18-33"
            ],
            "file_path": "http:\/\/[username].s3.me-south-1.amazonaws.com\/...\/screenshot\/2021-05-31-09-18-33$$7BVHJ.jpeg",
            "file_time": "09:18:33",
            "server_time": "",
            "session_active": 1,
            "session_info": "-----**** -----****-----",
            "type": ""
        }
    ],
    "status": "success",
    "tracking_employee": {
        "created_at": "2020-12-28 13:11:42",
        "device_id": "12346276818AM_PC",
        "device_name": "AM_PC",
        "employee_id": 18,
        "id": 44,
        "schedule_screen": 900,
        "screen_now": "0",
        "screen_time": "12-15-40",
        "updated_at": "2021-05-31 14:00:37",
        "version": "1.0.0.1"
    }
}
```

### HTTP Request
`POST administration/tracker/get-screen-tracker`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `date` |  required  | Date of screens.
    `device_id` |  required  | Device id.
    `employee_id` |  required  | Employee id

<!-- END_86e05d19a0a414cf432ca3f31490e83f -->

<!-- START_fd062e2233eb25fb852c2142a2a2bb6f -->
## Update Tracker
use to screen now btn or update time between screen shot
screen_now: &quot;now&quot; when click screen now btn
schedule_screen: int (seconds) when change time

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/tracker/update-employee-tracker?data=explicabo&device_id=beatae&employee_id=sed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/tracker/update-employee-tracker"
);

let params = {
    "data": "explicabo",
    "device_id": "beatae",
    "employee_id": "sed",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST administration/tracker/update-employee-tracker`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `data` |  required  | {screen_now: "now" || schedule_screen: int (seconds)}.
    `device_id` |  required  | Device id.
    `employee_id` |  required  | Employee id

<!-- END_fd062e2233eb25fb852c2142a2a2bb6f -->

<!-- START_6e3f7ad3139ea816abf9e6b6b4db5797 -->
## Get Employee Device
Get Employee Device by employee id

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/tracker/get-employee-device?employee_id=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/tracker/get-employee-device"
);

let params = {
    "employee_id": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "created_at": "2020-10-08 08:19:52",
            "device_id": "-3744799931feras",
            "device_name": "feras",
            "employee_id": 1,
            "id": 36,
            "schedule_screen": 900,
            "screen_now": "stop",
            "screen_time": "18-24-34",
            "updated_at": "2021-02-24 18:24:34",
            "version": "1.0.0.1"
        }
    ]
}
```

### HTTP Request
`POST administration/tracker/get-employee-device`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  required  | {employee_id: 1}.

<!-- END_6e3f7ad3139ea816abf9e6b6b4db5797 -->

#EpisodesController


APIs
<!-- START_9343b8c3f9b8c80471090a2c01d0771b -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/episodes?project_id=similique&sender_team_id=ducimus&episodes=ut&deadline=temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/episodes"
);

let params = {
    "project_id": "similique",
    "sender_team_id": "ducimus",
    "episodes": "ut",
    "deadline": "temporibus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Added successfully"
}
```

### HTTP Request
`POST episodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int
    `sender_team_id` |  required  | int
    `episodes` |  required  | intArray
    `deadline` |  required  | date

<!-- END_9343b8c3f9b8c80471090a2c01d0771b -->

<!-- START_4c35c565569b8f8ee4a1d7581374d4d1 -->
## show

> Example request:

```bash
curl -X GET \
    -G "http://localhost/episodes/1?id=quod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/episodes/1"
);

let params = {
    "id": "quod",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "episode": {
        "episode_title": "Leets",
        "project_title": "21057 - Leets",
        "episode_number": "001",
        "id": 6185,
        "active": 0,
        "duration": null,
        "schedule": null
    }
}
```

### HTTP Request
`GET episodes/{episode}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_4c35c565569b8f8ee4a1d7581374d4d1 -->

<!-- START_9f731ec1e76c246a9bfe88feeda450d7 -->
## Toggle Episode Active

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/project/ToggleEpisodeActive?episode_id=eius&projectsId=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/ToggleEpisodeActive"
);

let params = {
    "episode_id": "eius",
    "projectsId": "sunt",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "episodes": [
        {
            "episode_title": "Leets",
            "project_title": "21057 - Leets",
            "episode_number": "001",
            "id": 6185,
            "active": 0,
            "duration": null,
            "schedule": null
        }
    ]
}
```

### HTTP Request
`GET production/project/ToggleEpisodeActive`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int
    `projectsId` |  required  | int

<!-- END_9f731ec1e76c246a9bfe88feeda450d7 -->

<!-- START_a7e8dd5ddcb596c9abf8b048f0b7f68b -->
## Update Episodes

> Example request:

```bash
curl -X POST \
    "http://localhost/production/episodes/UpdateEpisodes?id=eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/episodes/UpdateEpisodes"
);

let params = {
    "id": "eligendi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`POST production/episodes/UpdateEpisodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_a7e8dd5ddcb596c9abf8b048f0b7f68b -->

<!-- START_48fd386629bb08c390b6321011cd58f9 -->
## Delete Episodes

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/episodes/DeleteEpisodes?id=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/episodes/DeleteEpisodes"
);

let params = {
    "id": "et",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`GET production/episodes/DeleteEpisodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_48fd386629bb08c390b6321011cd58f9 -->

#HomeController


APIs
<!-- START_7d8d391731a1f767924e0c6baede20a0 -->
## index
Show Index Page

> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET {path?}`


<!-- END_7d8d391731a1f767924e0c6baede20a0 -->

#Jobs Controller


APIs
<!-- START_3b175ebfb4fc164502f7ce21d35d70c0 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/jobs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "id": 1,
            "name": "Syria",
            "type": "xx",
            "multi_episode": 1,
            "position_id": 123
        }
    ]
}
```

### HTTP Request
`GET jobs`


<!-- END_3b175ebfb4fc164502f7ce21d35d70c0 -->

<!-- START_02b6e7d7eec275039b3abf4aa068f039 -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/jobs?name=minus&type=totam&multi_episode=quas&position_id=eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/jobs"
);

let params = {
    "name": "minus",
    "type": "totam",
    "multi_episode": "quas",
    "position_id": "eum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "id": 1,
            "name": "Syria",
            "type": "xx",
            "multi_episode": 1,
            "position_id": 123
        }
    ]
}
```

### HTTP Request
`POST jobs`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string
    `type` |  required  | string
    `multi_episode` |  required  | tinyint 4
    `position_id` |  required  | int

<!-- END_02b6e7d7eec275039b3abf4aa068f039 -->

<!-- START_da33dbf4eade676a0a827bcaf1b1cb17 -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/jobs/1?id=porro&name=fugit&type=ullam&multi_episode=quod&position_id=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/jobs/1"
);

let params = {
    "id": "porro",
    "name": "fugit",
    "type": "ullam",
    "multi_episode": "quod",
    "position_id": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "branches": [
        {
            "id": 1,
            "name": "Syria",
            "type": "xx",
            "multi_episode": 1,
            "position_id": 123
        }
    ]
}
```

### HTTP Request
`PUT jobs/{job}`

`PATCH jobs/{job}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `name` |  required  | string
    `type` |  required  | string
    `multi_episode` |  required  | tinyint 4
    `position_id` |  required  | int

<!-- END_da33dbf4eade676a0a827bcaf1b1cb17 -->

#List Controller


APIs
<!-- START_0065aad8d90fe2c72aea1078dcab15ea -->
## projects

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "projects": [
        {
            "id": 21,
            "project_id": "11111",
            "category_id": 15,
            "name": "Negative Work",
            "requirement": "dubbing",
            "priority": null,
            "status": null,
            "text": "11111 - Negative Work",
            "category": {
                "id": 15,
                "name": "nis-works",
                "color": "00ffff"
            }
        }
    ]
}
```

### HTTP Request
`GET web-api/list/projects`


<!-- END_0065aad8d90fe2c72aea1078dcab15ea -->

<!-- START_ae2f72f230575986a9b7d7df6506c6bb -->
## episodes

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/episodes?parent=quidem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/episodes"
);

let params = {
    "parent": "quidem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "episode_number": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/episodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `parent` |  required  | int

<!-- END_ae2f72f230575986a9b7d7df6506c6bb -->

<!-- START_6fe5deefc73177e72a1f784febcd1e8f -->
## episodesByJobs

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/episodesByJobs?group=et&jobs=dolor&project_id=aut&appendEpisodes=praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/episodesByJobs"
);

let params = {
    "group": "et",
    "jobs": "dolor",
    "project_id": "aut",
    "appendEpisodes": "praesentium",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/episodesByJobs`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int
    `jobs` |  optional  | int
    `project_id` |  required  | int
    `appendEpisodes` |  optional  | intArray

<!-- END_6fe5deefc73177e72a1f784febcd1e8f -->

<!-- START_dcd9d85ea520ab7b698015cdf88bd7ec -->
## key

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/key?parent=rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/key"
);

let params = {
    "parent": "rerum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/key`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `parent` |  optional  | int

<!-- END_dcd9d85ea520ab7b698015cdf88bd7ec -->

<!-- START_ae587ddf786e59eb1ea4b15772b3e3b7 -->
## Get Attribute Value

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/GetAttributeValue?attributes_list=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/GetAttributeValue"
);

let params = {
    "attributes_list": "illo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/GetAttributeValue`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `attributes_list` |  required  | string

<!-- END_ae587ddf786e59eb1ea4b15772b3e3b7 -->

<!-- START_cb6a777ff232db56ad4fed7daee9227b -->
## lists

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/lists?name=molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/lists"
);

let params = {
    "name": "molestiae",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "key_array": "name",
            "name": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/lists`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string

<!-- END_cb6a777ff232db56ad4fed7daee9227b -->

<!-- START_e393043b20047f582c6de1356f9af257 -->
## keyArray

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/keyArray?parent=voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/keyArray"
);

let params = {
    "parent": "voluptas",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "key_array": "name",
            "name": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/keyArray`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `parent` |  required  | int

<!-- END_e393043b20047f582c6de1356f9af257 -->

<!-- START_a2d6a982a81699af6e0ee45e525128b3 -->
## employees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "user_id": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/employees`


<!-- END_a2d6a982a81699af6e0ee45e525128b3 -->

<!-- START_30b3c047bf27d3f029d39319ab92ded4 -->
## team_recurcive_employees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/team_recurcive_employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/team_recurcive_employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "user_id": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/team_recurcive_employees`


<!-- END_30b3c047bf27d3f029d39319ab92ded4 -->

<!-- START_11252728b72dc01ba9fa9a3872f5e79c -->
## users

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/users`


<!-- END_11252728b72dc01ba9fa9a3872f5e79c -->

<!-- START_78f6797d1a43d0260d1ea18a87146a13 -->
## employeePositions

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/employeePositions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/employeePositions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/employeePositions`


<!-- END_78f6797d1a43d0260d1ea18a87146a13 -->

<!-- START_cbedf5634ea072a1372fb883d829a391 -->
## positions

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/positions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/positions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/positions`


<!-- END_cbedf5634ea072a1372fb883d829a391 -->

<!-- START_6f004b134a35426a7fa7bf7f2441f854 -->
## studios

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/studios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/studios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "color": "#fff",
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/studios`


<!-- END_6f004b134a35426a7fa7bf7f2441f854 -->

<!-- START_a49692d297dd4870b89a22f97afe3367 -->
## Sound Engineer

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/sound-engineer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/sound-engineer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/sound-engineer`


<!-- END_a49692d297dd4870b89a22f97afe3367 -->

<!-- START_89dc33401da306b4de82e51b3caf46fc -->
## actors

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/actors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/actors`


<!-- END_89dc33401da306b4de82e51b3caf46fc -->

<!-- START_d8f33a5f08059e7b46593d6353afee36 -->
## task_status

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/task_status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/task_status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/task_status`


<!-- END_d8f33a5f08059e7b46593d6353afee36 -->

<!-- START_6164e1831547f7943c99d0ef5808179d -->
## clients

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/clients`


<!-- END_6164e1831547f7943c99d0ef5808179d -->

<!-- START_5208d23344d28863cadb5cc1fd436828 -->
## Employee Tasks

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my-tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my-tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        "xx",
        "yy"
    ]
}
```

### HTTP Request
`GET web-api/list/my-tasks`


<!-- END_5208d23344d28863cadb5cc1fd436828 -->

<!-- START_540e0b72e51efd08666a5173349297de -->
## roles

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/roles`


<!-- END_540e0b72e51efd08666a5173349297de -->

<!-- START_1c5176b10f4f97520bfd7aa397526f5a -->
## jobs

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/jobs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "type": "type",
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/jobs`


<!-- END_1c5176b10f4f97520bfd7aa397526f5a -->

<!-- START_db18e901e81a97450bede6fbfc76d24c -->
## jobs_by_position

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/jobs_by_position" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/jobs_by_position"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "position_id": 1,
            "position_name": "position_name",
            "type": "type",
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/jobs_by_position`


<!-- END_db18e901e81a97450bede6fbfc76d24c -->

<!-- START_683ba382e17f8c844181ea596ef31eb9 -->
## my_teams_jobs

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_teams_jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_teams_jobs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_teams_jobs`


<!-- END_683ba382e17f8c844181ea596ef31eb9 -->

<!-- START_07a870a0e385d0fb109c82eb73fc89c3 -->
## jobs_by_team

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/jobs_by_team?group=voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/jobs_by_team"
);

let params = {
    "group": "voluptatem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/jobs_by_team`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int

<!-- END_07a870a0e385d0fb109c82eb73fc89c3 -->

<!-- START_19eae22aadc6dbbfae4300d90f284715 -->
## team_jobs_recursive

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/team_jobs_recursive?group=sed&employees=corporis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/team_jobs_recursive"
);

let params = {
    "group": "sed",
    "employees": "corporis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/team_jobs_recursive`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int
    `employees` |  optional  | intArray

<!-- END_19eae22aadc6dbbfae4300d90f284715 -->

<!-- START_d95b59913bf66487f16115559a948a14 -->
## task_deadline_and_employee

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/task_deadline_and_employee?episode_id=at&jobs=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/task_deadline_and_employee"
);

let params = {
    "episode_id": "at",
    "jobs": "tenetur",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/task_deadline_and_employee`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  optional  | int
    `jobs` |  optional  | int

<!-- END_d95b59913bf66487f16115559a948a14 -->

<!-- START_5aa4338aa7d2f9d663593bd17dfb4dd1 -->
## my_job

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_job?employee_id=et&type=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_job"
);

let params = {
    "employee_id": "et",
    "type": "sunt",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_job`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  optional  | int
    `type` |  optional  | stringArray

<!-- END_5aa4338aa7d2f9d663593bd17dfb4dd1 -->

<!-- START_c0e6fa03e2a032be5771754766e552ee -->
## team_employees_position

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/team_employees_position?group=veniam&jobs=vel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/team_employees_position"
);

let params = {
    "group": "veniam",
    "jobs": "vel",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/team_employees_position`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int
    `jobs` |  optional  | int

<!-- END_c0e6fa03e2a032be5771754766e552ee -->

<!-- START_e45349c2845ad1dec17ec44fbf4eff54 -->
## employees_by_team

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/employees_by_team?group=quod&jobs=incidunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/employees_by_team"
);

let params = {
    "group": "quod",
    "jobs": "incidunt",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/employees_by_team`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int
    `jobs` |  optional  | int

<!-- END_e45349c2845ad1dec17ec44fbf4eff54 -->

<!-- START_1ad322ca7659eb8ed719f9cbb30d83a2 -->
## branches

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/branches"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/branches`


<!-- END_1ad322ca7659eb8ed719f9cbb30d83a2 -->

<!-- START_a636655e4891ac9b590ed2fd8bf8a3fb -->
## trackerEmployees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/trackerEmployees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/trackerEmployees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/trackerEmployees`


<!-- END_a636655e4891ac9b590ed2fd8bf8a3fb -->

<!-- START_6ce0355f15d711d69a1d4128d2d4eb8e -->
## transferEmployees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/transferEmployees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/transferEmployees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/transferEmployees`


<!-- END_6ce0355f15d711d69a1d4128d2d4eb8e -->

<!-- START_0e1bf3373dccb69f99c472119d7266d1 -->
## category

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "color": "#fff",
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/category`


<!-- END_0e1bf3373dccb69f99c472119d7266d1 -->

<!-- START_73348d38f008a4884f7b209aabbd7e2e -->
## status

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "choice"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/status`


<!-- END_73348d38f008a4884f7b209aabbd7e2e -->

<!-- START_a0406e4828bbdcb6e42b7a84d81fb5ec -->
## status_with_count

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/status_with_count?group=omnis&jobs=et&status=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/status_with_count"
);

let params = {
    "group": "omnis",
    "jobs": "et",
    "status": "facere",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "groups": [
        {
            "root": 1,
            "parent": null,
            "type": "project",
            "episode_id": 0,
            "episode_number": 0,
            "level": 1,
            "project_id": "21060",
            "id": 220,
            "title": "21060 - Transformers-S4"
        }
    ],
    "deadline": [
        {
            "sender_name": "Art Director Group - mdk",
            "receiver_name": "Graphics Group - mdk",
            "project_id": 220,
            "team_id": 12,
            "id": "p_deadline1695",
            "reciver_id": 138,
            "ep_nm": 3,
            "jb_nm": 3,
            "is_sender": 0,
            "editable": 0,
            "type": "deadline",
            "group": 220,
            "deadline": "2021-06-02 01:30:00",
            "start_time": 1622597400000,
            "end_time": "2021-06-02 03:30:00",
            "assign_request_id": 1695,
            "available_task": 1
        }
    ]
}
```

### HTTP Request
`GET web-api/list/status_with_count`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  required  | int
    `jobs` |  optional  | int
    `status` |  optional  | int

<!-- END_a0406e4828bbdcb6e42b7a84d81fb5ec -->

<!-- START_5fa06b383264ee75ccb54212ab41d8a5 -->
## supervisor_employees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/supervisor_employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/supervisor_employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/supervisor_employees`


<!-- END_5fa06b383264ee75ccb54212ab41d8a5 -->

<!-- START_f673408f15f9aa649203319a406cb59e -->
## my_team_recursive

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_team_recursive" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_team_recursive"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_team_recursive`


<!-- END_f673408f15f9aa649203319a406cb59e -->

<!-- START_b7a8a2848c35b368cb31882df0e7868b -->
## my_team_child

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_team_child?group=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_team_child"
);

let params = {
    "group": "facere",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_team_child`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  optional  | int

<!-- END_b7a8a2848c35b368cb31882df0e7868b -->

<!-- START_961a577569f9ecb4deee9e88ff53ac61 -->
## my_team

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_team?permissions=dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_team"
);

let params = {
    "permissions": "dolores",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_team`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `permissions` |  optional  | stringArray

<!-- END_961a577569f9ecb4deee9e88ff53ac61 -->

<!-- START_0397d4b68cb6e400836b686e3dd05404 -->
## next_step_jobs

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/next_step_jobs?episode_id=dolore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/next_step_jobs"
);

let params = {
    "episode_id": "dolore",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/next_step_jobs`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int or intArray

<!-- END_0397d4b68cb6e400836b686e3dd05404 -->

<!-- START_dbf6df7c30001356df5b0ad0101867fb -->
## my_projects

> Example request:

```bash
curl -X GET \
    -G "http://localhost/web-api/list/my_projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/web-api/list/my_projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "value": 1,
            "project_id": 1,
            "namr": "name"
        }
    ]
}
```

### HTTP Request
`GET web-api/list/my_projects`


<!-- END_dbf6df7c30001356df5b0ad0101867fb -->

#Live Session Controller


APIs
<!-- START_6781b3e7d30ff72ce632c121661b7a81 -->
## Get Live Work Sessions

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/live_session/GetLiveWorkSessions?deadline=sequi&project_id=qui&sender_team_id=sed&reciver_team_id=laudantium&episode_job[job_id]=a&episode_job[episode_id]=totam&episode_job[exists]=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/live_session/GetLiveWorkSessions"
);

let params = {
    "deadline": "sequi",
    "project_id": "qui",
    "sender_team_id": "sed",
    "reciver_team_id": "laudantium",
    "episode_job[job_id]": "a",
    "episode_job[episode_id]": "totam",
    "episode_job[exists]": "ab",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`GET production/live_session/GetLiveWorkSessions`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `deadline` |  required  | date
    `project_id` |  required  | int
    `sender_team_id` |  required  | int
    `reciver_team_id` |  required  | int
    `episode_job` |  required  | JsonArray
    `episode_job.job_id` |  required  | int
    `episode_job.episode_id` |  required  | int
    `episode_job.exists` |  optional  | boolean

<!-- END_6781b3e7d30ff72ce632c121661b7a81 -->

#My Task Controller


APIs
<!-- START_f0239f4c6ec1c2266623baaacfc9e0df -->
## Get Tasks

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetTasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetTasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "running_session": "false",
    "task": [
        {
            "id": 6949,
            "deadline": "2021-05-25 23:55:00",
            "deadline_sort": "2021-05-25 23:55:00",
            "jobs": [
                "Sound Lib-sync",
                "Sound Mixing"
            ],
            "project": "21055 - Fruit Basket-S2",
            "episode": "014 - Fruit Basket-S2",
            "task": "",
            "note": null,
            "state": "In progress",
            "type": "App\\EpisodeTask"
        }
    ]
}
```

### HTTP Request
`GET main/work_session/GetTasks`


<!-- END_f0239f4c6ec1c2266623baaacfc9e0df -->

<!-- START_b3030bcb06b1ddfc9ce222f15963dfde -->
## Get Tasks Details

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetTasksDetails?task_id=natus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetTasksDetails"
);

let params = {
    "task_id": "natus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 5222,
        "deadline": "2021-05-25 10:00:00",
        "note": null,
        "episode_id": 6093,
        "task": {
            "id": 6894,
            "created_at": "2021-05-25 06:22:07",
            "updated_at": "2021-05-25 11:43:33",
            "finished_at": null,
            "sender_id": 18,
            "receiver_id": 12,
            "info": [
                {
                    "key": null
                }
            ],
            "finish_reason": null,
            "finish_note": null,
            "finish_outtime_reason": null,
            "finish_info": null,
            "task_type": "App\\EpisodeTask",
            "task_id": 5222,
            "receiver_position_id": 86,
            "finish_state_id": null,
            "state_id": 16,
            "team_id": 8,
            "reason_skip_deadline": null,
            "sender": {
                "id": 18,
                "first_name": "Ahmad",
                "last_name": "Murad",
                "name": "Ahmad Murad"
            }
        },
        "jobs": [
            {
                "id": 87,
                "name": "Sound Edit",
                "pivot": {
                    "jobable_id": 5222,
                    "job_id": 87,
                    "jobable_type": "App\\EpisodeTask"
                }
            }
        ],
        "episode": {
            "id": 6093,
            "episode_number": "224",
            "title": "Soz",
            "project_id": 131,
            "text": "224 - Soz",
            "project": {
                "id": 131,
                "name": "Soz",
                "project_id": "20118",
                "text": "20118 - Soz"
            }
        }
    }
}
```

### HTTP Request
`GET main/work_session/GetTasksDetails`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int

<!-- END_b3030bcb06b1ddfc9ce222f15963dfde -->

<!-- START_93c58f0d65a3c79fa1c117cfd0f954e6 -->
## Get Production Task

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetProductionTask" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetProductionTask"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "running_session": true,
    "data": {
        "id": 22,
        "episode_id": 6093,
        "created_at": "2021-05-25 10:00:00",
        "episode": {
            "id": 3,
            "project_id": 3,
            "text": "224 - Soz",
            "project": {
                "id": 3,
                "name": "Soz",
                "project_id": "20118",
                "text": "20118 - Soz"
            },
            "title": "Soz",
            "episode_number": "123",
            "name": "Misc"
        },
        "note": null
    },
    "workSession": [
        {
            "id": 22,
            "created_at": "2021-05-25 10:00:00",
            "automatically": 0,
            "status": "0",
            "duration": 0,
            "employee_id": 12,
            "end": null,
            "note": null,
            "legal": 1,
            "sessionable_id": 1,
            "sessionable_type": "App\\Task",
            "job_id": 3
        }
    ]
}
```

### HTTP Request
`GET main/work_session/GetProductionTask`


<!-- END_93c58f0d65a3c79fa1c117cfd0f954e6 -->

<!-- START_400c5e116be46d4f78da3c82f555b73f -->
## Get Running Tasks

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetRunningTasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetRunningTasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET main/work_session/GetRunningTasks`


<!-- END_400c5e116be46d4f78da3c82f555b73f -->

<!-- START_a88fdfef0a96b702150bc322cc228ddd -->
## Get Administative Task

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetAdministativeTask" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetAdministativeTask"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "running_session": true,
    "data": {
        "id": 22,
        "created_at": "2021-05-25 10:00:00",
        "job": {
            "id": 3,
            "name": "Misc"
        },
        "job_id": 3
    },
    "workSession": [
        {
            "id": 22,
            "created_at": "2021-05-25 10:00:00",
            "updated_at": "2021-05-25 10:00:00",
            "automatically": 0,
            "status": "0",
            "duration": 0,
            "employee_id": 12,
            "start": "2021-05-25 10:00:00",
            "end": null,
            "note": null,
            "legal": 1,
            "sessionable_id": 1,
            "sessionable_type": "App\\AdministrativeTask",
            "job_id": 3
        }
    ]
}
```

### HTTP Request
`GET main/work_session/GetAdministativeTask`


<!-- END_a88fdfef0a96b702150bc322cc228ddd -->

#PositionsController


APIs
<!-- START_d98f727f9d54f8e6627f9461578d35a1 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/positions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/positions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}
```

### HTTP Request
`GET positions`


<!-- END_d98f727f9d54f8e6627f9461578d35a1 -->

<!-- START_2f47cb9e927168fda175d8005d33eeb1 -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/positions?name=quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/positions"
);

let params = {
    "name": "quo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}
```

### HTTP Request
`POST positions`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string

<!-- END_2f47cb9e927168fda175d8005d33eeb1 -->

<!-- START_ff120c12dff5c0c960f4b400f4428470 -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/positions/1?id=autem&name=harum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/positions/1"
);

let params = {
    "id": "autem",
    "name": "harum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}
```

### HTTP Request
`PUT positions/{position}`

`PATCH positions/{position}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `name` |  required  | string

<!-- END_ff120c12dff5c0c960f4b400f4428470 -->

#Projects Controller


APIs
<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "episodes": [
        {
            "id": 21,
            "project_id": "11111",
            "category_id": 15,
            "name": "Negative Work",
            "requirement": "dubbing",
            "priority": null,
            "status": null,
            "text": "11111 - Negative Work",
            "category": {
                "id": 15,
                "name": "nis-works",
                "color": "00ffff"
            }
        }
    ]
}
```

### HTTP Request
`GET projects`


<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->

<!-- START_6457c064807333898638aaa8f41ba1ab -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/projects?project_id=commodi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects"
);

let params = {
    "project_id": "commodi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "project_id": 5,
    "message": "success_add"
}
```

### HTTP Request
`POST projects`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_6457c064807333898638aaa8f41ba1ab -->

<!-- START_c67226e65a6121c577cf821d15168dc8 -->
## edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost/projects/1/edit?project_id=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects/1/edit"
);

let params = {
    "project_id": "eos",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "project": {
        "id": 220,
        "created_at": "2021-05-06 14:36:25",
        "updated_at": "2021-05-06 14:38:30",
        "project_id": "21060",
        "name": "Transformers-S4",
        "category": null,
        "requirement": "dubbing",
        "number_of_episodes": "26",
        "comment": null,
        "required_language": "arabic_language_traditional",
        "client_id": null,
        "country": null,
        "commissione": null,
        "order_date": null,
        "original_title": null,
        "final_title": null,
        "status": "in_progress",
        "priority": null,
        "delivery_method": null,
        "created_by": 2,
        "project_nationality": null,
        "project_info_comment": null,
        "terms_of_video": null,
        "terms_of_audio": null,
        "terms_of_scripts": null,
        "production_comment": null,
        "materilas_video": null,
        "materilas_music": null,
        "materilas_sfx": null,
        "materilas_script": null,
        "category_id": 16,
        "jobs": "86,87,88,89,92,93,175,177,94,95,106,109,110,111,112,113,114,173,141,142,148,150,176,197,170,147",
        "text": "21060 - Transformers-S4"
    }
}
```

### HTTP Request
`GET projects/{project}/edit`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_c67226e65a6121c577cf821d15168dc8 -->

<!-- START_d0e574164f37de9866bf98e489a3b5d0 -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/projects/1?project_id=in&allData=eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/projects/1"
);

let params = {
    "project_id": "in",
    "allData": "eligendi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Added successfully"
}
```

### HTTP Request
`PUT projects/{project}`

`PATCH projects/{project}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int
    `allData` |  required  | array

<!-- END_d0e574164f37de9866bf98e489a3b5d0 -->

<!-- START_dcf33fb53ed4bbdd340a151aca24d3ae -->
## Get Projects

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/project/GetProjects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/GetProjects"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "projects": [
        {
            "id": 21,
            "project_id": "11111",
            "category_id": 15,
            "name": "Negative Work",
            "requirement": "dubbing",
            "priority": null,
            "status": null,
            "text": "11111 - Negative Work",
            "category": {
                "id": 15,
                "name": "nis-works",
                "color": "00ffff"
            }
        }
    ]
}
```

### HTTP Request
`GET production/project/GetProjects`


<!-- END_dcf33fb53ed4bbdd340a151aca24d3ae -->

<!-- START_76087c96c334720ea3b2405ff0a86215 -->
## Get Episodes

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/project/GetEpisodes?project_id=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/GetEpisodes"
);

let params = {
    "project_id": "ab",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "episodes": []
}
```

### HTTP Request
`GET production/project/GetEpisodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_76087c96c334720ea3b2405ff0a86215 -->

<!-- START_0e09aa99378036f155d486cd49ae775b -->
## Get Specific Episodes

> Example request:

```bash
curl -X POST \
    "http://localhost/production/project/GetSpecificEpisodes?project_id=placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/GetSpecificEpisodes"
);

let params = {
    "project_id": "placeat",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "episodes": [
        {
            "episode_title": "Transformers-S4",
            "project_title": "21060 - Transformers-S4",
            "episode_number": "001",
            "id": 6429,
            "active": null
        }
    ]
}
```

### HTTP Request
`POST production/project/GetSpecificEpisodes`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_0e09aa99378036f155d486cd49ae775b -->

<!-- START_a7b7d55046932332394dd0b298036464 -->
## Get Project Episode Count

> Example request:

```bash
curl -X POST \
    "http://localhost/production/project/GetProjectEpisodeCount?project_id=perferendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/GetProjectEpisodeCount"
);

let params = {
    "project_id": "perferendis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST production/project/GetProjectEpisodeCount`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_a7b7d55046932332394dd0b298036464 -->

<!-- START_c9484901a1444d1f12c901ab64160446 -->
## Update Table

> Example request:

```bash
curl -X POST \
    "http://localhost/production/project/UpdateTable?project_id=nisi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/project/UpdateTable"
);

let params = {
    "project_id": "nisi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "message": "success_add"
}
```

### HTTP Request
`POST production/project/UpdateTable`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int

<!-- END_c9484901a1444d1f12c901ab64160446 -->

#ReportController


APIs
<!-- START_301c9e985391a72d632f7aba195e887e -->
## Get Monthly Report

> Example request:

```bash
curl -X GET \
    -G "http://localhost/hr/report/GetMonthlyReport?employeeId=dolores&start=sit&end=hic" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hr/report/GetMonthlyReport"
);

let params = {
    "employeeId": "dolores",
    "start": "sit",
    "end": "hic",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET hr/report/GetMonthlyReport`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employeeId` |  required  | int
    `start` |  required  | date
    `end` |  required  | date

<!-- END_301c9e985391a72d632f7aba195e887e -->

<!-- START_132fcc41788815b4396ad1758fdafa50 -->
## Get Activity Report

> Example request:

```bash
curl -X GET \
    -G "http://localhost/hr/report/GetActivityReport?employeeId=omnis&start=autem&end=cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hr/report/GetActivityReport"
);

let params = {
    "employeeId": "omnis",
    "start": "autem",
    "end": "cumque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET hr/report/GetActivityReport`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employeeId` |  required  | int
    `start` |  required  | date
    `end` |  required  | date

<!-- END_132fcc41788815b4396ad1758fdafa50 -->

#ServiceController


APIs
<!-- START_66fb001578ed3d8784430bb807abfd22 -->
## api/service/GetServerTime
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/service/GetServerTime" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/service/GetServerTime"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "datetime": "2021-06-09 04:41:34",
    "date": "2021-06-09",
    "time": "04:41:34"
}
```

### HTTP Request
`GET api/service/GetServerTime`


<!-- END_66fb001578ed3d8784430bb807abfd22 -->

<!-- START_179a69c0e1de921d94fde30766678839 -->
## api/logger/UploadData
> Example request:

```bash
curl -X POST \
    "http://localhost/api/logger/UploadData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/logger/UploadData"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/logger/UploadData`


<!-- END_179a69c0e1de921d94fde30766678839 -->

#Session History Controller


APIs
<!-- START_adcaf628ad68a9a158e2f9908bd5be95 -->
## Get First Table

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/session_history/GetFirstTable?start=non&end=temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/session_history/GetFirstTable"
);

let params = {
    "start": "non",
    "end": "temporibus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET main/session_history/GetFirstTable`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `start` |  required  | date
    `end` |  required  | date

<!-- END_adcaf628ad68a9a158e2f9908bd5be95 -->

<!-- START_b907570d5f0df785a4a2324c2911782d -->
## Get Second Table

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/session_history/GetSecondTable?dates=ipsa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/session_history/GetSecondTable"
);

let params = {
    "dates": "ipsa",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET main/session_history/GetSecondTable`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `dates` |  required  | Array of date

<!-- END_b907570d5f0df785a4a2324c2911782d -->

<!-- START_aa08073623e373b3763723260b32ed47 -->
## Get Thrid Table

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/session_history/GetThridTable?selected_data=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/session_history/GetThridTable"
);

let params = {
    "selected_data": "sunt",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "dataTable": [
        {
            "date": "2021-06-07",
            "note": null,
            "start_time": "06:13:16",
            "end_time": "06:19:20",
            "actual_duration": "00:06:04",
            "out_of_range": "00:00:00",
            "sessionable_type": "Task",
            "task_type": "EpisodeTask",
            "task_id": 6894,
            "project_name": "20118 - Soz",
            "episode_name": "224 - Soz",
            "total_session": 1,
            "tasks": "Sound Edit,Sound Lib-sync,Sound Mixing",
            "duration": 0
        }
    ]
}
```

### HTTP Request
`GET main/session_history/GetThridTable`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `selected_data` |  required  | JsonArray

<!-- END_aa08073623e373b3763723260b32ed47 -->

<!-- START_677eeea7820983fff5378af0db65dac8 -->
## Get Task Detail

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/session_history/GetTaskDetail?task_id=voluptatem&task_type=nisi&sessionable_type=nisi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/session_history/GetTaskDetail"
);

let params = {
    "task_id": "voluptatem",
    "task_type": "nisi",
    "sessionable_type": "nisi",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "task": {
        "id": 6894,
        "created_at": "2021-05-25 06:22:07",
        "updated_at": "2021-06-07 03:22:02",
        "finished_at": null,
        "sender_id": 18,
        "receiver_id": 12,
        "info": [
            {
                "key": null
            }
        ],
        "finish_reason": null,
        "finish_note": null,
        "finish_outtime_reason": null,
        "finish_info": null,
        "task_type": "App\\EpisodeTask",
        "task_id": 5222,
        "receiver_position_id": 86,
        "finish_state_id": null,
        "state_id": 16,
        "team_id": 8,
        "reason_skip_deadline": null,
        "status": {
            "id": 16,
            "name": "In progress",
            "priority": 7
        },
        "finish_status": null
    }
}
```

### HTTP Request
`GET main/session_history/GetTaskDetail`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int
    `task_type` |  required  | string
    `sessionable_type` |  required  | string

<!-- END_677eeea7820983fff5378af0db65dac8 -->

#SessionsMangeController


Out Dated
<!-- START_cd3af09e3fb7663fce090374be076359 -->
## Update Tracker
Out Dated
This for old work sessions

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/sessions_mange/GetSessionsByEmp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/sessions_mange/GetSessionsByEmp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET administration/sessions_mange/GetSessionsByEmp`


<!-- END_cd3af09e3fb7663fce090374be076359 -->

<!-- START_afbf0ec3519a37fd4d31444f49f2cf49 -->
## Update Tracker
Out Dated
This for old work sessions

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/sessions_mange/UpdateSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/sessions_mange/UpdateSessionsWork"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administration/sessions_mange/UpdateSessionsWork`


<!-- END_afbf0ec3519a37fd4d31444f49f2cf49 -->

<!-- START_7194c4359b828e13fe15db357e92cd87 -->
## Update Tracker
Out Dated
This for old work sessions

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/sessions_mange/AddSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/sessions_mange/AddSessionsWork"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administration/sessions_mange/AddSessionsWork`


<!-- END_7194c4359b828e13fe15db357e92cd87 -->

<!-- START_1da3376bb202bbe37d2ed2f6b107f033 -->
## Update Tracker
Out Dated
This for old work sessions

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/sessions_mange/DeleteSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/sessions_mange/DeleteSessionsWork"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administration/sessions_mange/DeleteSessionsWork`


<!-- END_1da3376bb202bbe37d2ed2f6b107f033 -->

#Sessions Work Controller


APIs
<!-- START_4f150b556cbede4073fb6e82ebdaa876 -->
## GetOldSessionsWork
Old function not used

> Example request:

```bash
curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-bydate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/sessions-work/get-employee-session-work-bydate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST production/sessions-work/get-employee-session-work-bydate`


<!-- END_4f150b556cbede4073fb6e82ebdaa876 -->

<!-- START_c6629827b017dba882dd017ce7e3bd5e -->
## GetOldSessionsWork
Old function not used

> Example request:

```bash
curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-date-detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/sessions-work/get-employee-session-work-date-detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST production/sessions-work/get-employee-session-work-date-detail`


<!-- END_c6629827b017dba882dd017ce7e3bd5e -->

<!-- START_a27d5d689a62b08b396ed8cf3368a2e0 -->
## GetOldSessionsWork
Old function not used

> Example request:

```bash
curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-episode-detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/sessions-work/get-employee-session-work-episode-detail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST production/sessions-work/get-employee-session-work-episode-detail`


<!-- END_a27d5d689a62b08b396ed8cf3368a2e0 -->

#Studio Controller


APIs
<!-- START_92401cf7f8b19afdb37616d620b2dd78 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/studios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/studios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "studio": [
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Studio A",
            "branch": null,
            "color": "C467A2",
            "category": "x",
            "description": "x"
        }
    ]
}
```

### HTTP Request
`GET studios`


<!-- END_92401cf7f8b19afdb37616d620b2dd78 -->

<!-- START_c3ecfdb516fc7d21ccadcaa821cab9f3 -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/studios?brnach_id=velit&color=libero&name=repudiandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/studios"
);

let params = {
    "brnach_id": "velit",
    "color": "libero",
    "name": "repudiandae",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "studio": [
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Studio A",
            "branch": null,
            "color": "C467A2",
            "category": "x",
            "description": "x"
        }
    ]
}
```

### HTTP Request
`POST studios`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `brnach_id` |  required  | int
    `color` |  required  | string
    `name` |  required  | string

<!-- END_c3ecfdb516fc7d21ccadcaa821cab9f3 -->

<!-- START_5700b7233124f399c4cfca980159b613 -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/studios/1?id=quidem&brnach_id=provident&color=exercitationem&name=aperiam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/studios/1"
);

let params = {
    "id": "quidem",
    "brnach_id": "provident",
    "color": "exercitationem",
    "name": "aperiam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "studio": [
        {
            "id": 1,
            "created_at": null,
            "updated_at": null,
            "name": "Studio A",
            "branch": null,
            "color": "C467A2",
            "category": "x",
            "description": "x"
        }
    ]
}
```

### HTTP Request
`PUT studios/{studio}`

`PATCH studios/{studio}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `brnach_id` |  required  | int
    `color` |  required  | string
    `name` |  required  | string

<!-- END_5700b7233124f399c4cfca980159b613 -->

#System Key Controller


APIs
<!-- START_f7b4276d1e9e18ffc5a9659a2e33767a -->
## Load Lists Name

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/systemkey/load_lists_name" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/systemkey/load_lists_name"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "project_id": 5,
    "list_names": [
        "social_program",
        "file_type",
        "branchs"
    ]
}
```

### HTTP Request
`GET administration/systemkey/load_lists_name`


<!-- END_f7b4276d1e9e18ffc5a9659a2e33767a -->

<!-- START_4f56a16eb3212f9116df225b4f64a587 -->
## Load List

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/systemkey/load_list?name=ipsa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/systemkey/load_list"
);

let params = {
    "name": "ipsa",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "ListArray": [
        "BBAC",
        "Audi",
        "QNB",
        "Alexandria"
    ]
}
```

### HTTP Request
`GET administration/systemkey/load_list`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string

<!-- END_4f56a16eb3212f9116df225b4f64a587 -->

<!-- START_a5654670461c71d47cf18639e86a7360 -->
## Add Item List

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/systemkey/add_item_list?item_array=voluptas&item_name=quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/systemkey/add_item_list"
);

let params = {
    "item_array": "voluptas",
    "item_name": "quia",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Added successfully"
}
```

### HTTP Request
`POST administration/systemkey/add_item_list`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `item_array` |  required  | string
    `item_name` |  required  | string

<!-- END_a5654670461c71d47cf18639e86a7360 -->

<!-- START_061c176a33fe9c63dd432583c74d1937 -->
## Delete Key Item

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/systemkey/delete_item_list?items_name=harum&item_array=quos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/systemkey/delete_item_list"
);

let params = {
    "items_name": "harum",
    "item_array": "quos",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Deleted successfully"
}
```

### HTTP Request
`POST administration/systemkey/delete_item_list`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `items_name` |  required  | string
    `item_array` |  required  | stringArray

<!-- END_061c176a33fe9c63dd432583c74d1937 -->

#Task Controller


APIs
<!-- START_f0fb4a8ce65d63b1a29d8566e4553ecf -->
## Get Episode Available Job With Require

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task/GetEpisodeAvailableJob?episode_id=assumenda&group=architecto&allJobs=qui&appendJobs=sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/GetEpisodeAvailableJob"
);

let params = {
    "episode_id": "assumenda",
    "group": "architecto",
    "allJobs": "qui",
    "appendJobs": "sint",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "data": [
        {
            "value": 109,
            "text": "TazmoCue",
            "multi_episode": 0
        }
    ]
}
```

### HTTP Request
`GET production/task/GetEpisodeAvailableJob`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int
    `group` |  required  | int
    `allJobs` |  optional  | boolean
    `appendJobs` |  optional  | IntArray

<!-- END_f0fb4a8ce65d63b1a29d8566e4553ecf -->

<!-- START_07377128650f294fe60e0ebc1ffd81a3 -->
## Send Task

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/SendTask?deadline=quae&episode_deadline=dolores&employee_position_id=fuga&info=dolores&jobs=ullam&episodes=laboriosam&team_id=est&note=cumque&reason_skip_deadline=eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/SendTask"
);

let params = {
    "deadline": "quae",
    "episode_deadline": "dolores",
    "employee_position_id": "fuga",
    "info": "dolores",
    "jobs": "ullam",
    "episodes": "laboriosam",
    "team_id": "est",
    "note": "cumque",
    "reason_skip_deadline": "eum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/task/SendTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `deadline` |  required  | date
    `episode_deadline` |  required  | date
    `employee_position_id` |  required  | JsonObject
    `info` |  optional  | JsonArray
    `jobs` |  required  | Array
    `episodes` |  required  | int
    `team_id` |  required  | int
    `note` |  optional  | string
    `reason_skip_deadline` |  optional  | string

<!-- END_07377128650f294fe60e0ebc1ffd81a3 -->

<!-- START_cf86d763a082dd569d58de59e556afca -->
## Edit Task

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/EditTask?deadline=nam&episode_deadline=exercitationem&employee_position_id=qui&info=mollitia&jobs=autem&episodes=est&team_id=minima&project_id=vitae&state_id=reiciendis&task_id=quae&note=dolorem&reason_skip_deadline=sit&editable=ullam&multiEpisode=occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/EditTask"
);

let params = {
    "deadline": "nam",
    "episode_deadline": "exercitationem",
    "employee_position_id": "qui",
    "info": "mollitia",
    "jobs": "autem",
    "episodes": "est",
    "team_id": "minima",
    "project_id": "vitae",
    "state_id": "reiciendis",
    "task_id": "quae",
    "note": "dolorem",
    "reason_skip_deadline": "sit",
    "editable": "ullam",
    "multiEpisode": "occaecati",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/task/EditTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `deadline` |  required  | date
    `episode_deadline` |  required  | date
    `employee_position_id` |  required  | JsonObject
    `info` |  optional  | JsonArray
    `jobs` |  required  | Array
    `episodes` |  required  | int
    `team_id` |  required  | int
    `project_id` |  required  | int
    `state_id` |  required  | int
    `task_id` |  required  | int
    `note` |  optional  | string
    `reason_skip_deadline` |  optional  | string
    `editable` |  optional  | boolean
    `multiEpisode` |  optional  | boolean

<!-- END_cf86d763a082dd569d58de59e556afca -->

<!-- START_a6eed7d793b06c4b0ec1f7a5e263e356 -->
## Cancel Task

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/CancelTask?task_id=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/CancelTask"
);

let params = {
    "task_id": "illo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/task/CancelTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int

<!-- END_a6eed7d793b06c4b0ec1f7a5e263e356 -->

<!-- START_6f4be62c5ec7429cab215475c623ab94 -->
## Change Task State

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/ChangeTaskState?episode_id=explicabo&state_id=rerum&job_id=est&group=non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/ChangeTaskState"
);

let params = {
    "episode_id": "explicabo",
    "state_id": "rerum",
    "job_id": "est",
    "group": "non",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/task/ChangeTaskState`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int
    `state_id` |  required  | int
    `job_id` |  required  | int
    `group` |  required  | int

<!-- END_6f4be62c5ec7429cab215475c623ab94 -->

<!-- START_10543393fa011718e59c7d00dd304a10 -->
## Get Task State

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/GetTaskState?episode_id=reiciendis&group=incidunt&state=sit&jobs=numquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/GetTaskState"
);

let params = {
    "episode_id": "reiciendis",
    "group": "incidunt",
    "state": "sit",
    "jobs": "numquam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "episode_id": 5545,
            "state_id": 7,
            "job_name": "Proofreading",
            "job_id": 113,
            "editable": true
        }
    ]
}
```

### HTTP Request
`POST production/task/GetTaskState`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int
    `group` |  required  | int
    `state` |  required  | int
    `jobs` |  optional  | Array

<!-- END_10543393fa011718e59c7d00dd304a10 -->

<!-- START_c74f656d0148b1d7313cc4567b439633 -->
## get Task

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/getTask?task_id=nulla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/getTask"
);

let params = {
    "task_id": "nulla",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "task": "success",
    "data": {
        "task": {
            "id": 5275,
            "deadline": "2021-05-26 12:00:00",
            "note": null,
            "episode_id": 6213,
            "episodeJobState": [
                {
                    "id": 63576,
                    "created_at": "2021-04-22 10:45:22",
                    "episode_id": 6213,
                    "job_id": 109,
                    "state_id": 4
                }
            ],
            "changes": [
                {
                    "id": 4185,
                    "created_at": "2021-05-25 13:53:38",
                    "updated_at": "2021-05-25 16:53:45",
                    "readed_at": "2021-05-25 13:53:45",
                    "log_name": "",
                    "subject_type": "App\\EpisodeTask",
                    "subject_id": 5275,
                    "causer_type": "App\\User",
                    "causer_id": 8,
                    "description": "created",
                    "properties": {
                        "new": {
                            "deadline": "2021-05-26 09:00:00",
                            "episode_id": 6213,
                            "id": 5275
                        },
                        "old": []
                    }
                }
            ],
            "is_sender": true,
            "work_session": [
                {
                    "id": 13138,
                    "created_at": "2021-05-25 13:54:50",
                    "updated_at": "2021-05-25 14:08:42",
                    "start": "2021-05-25 13:54:50",
                    "end": "2021-05-25 14:08:42",
                    "note": null,
                    "legal": 1,
                    "automatically": 0,
                    "status": "0",
                    "employee_id": 43,
                    "sessionable_type": "App\\Task",
                    "sessionable_id": 6955,
                    "duration": 832,
                    "change_log": null
                }
            ],
            "old_task": [],
            "task": {
                "id": 6955,
                "created_at": "2021-05-25 10:53:38",
                "updated_at": "2021-05-25 14:18:14",
                "finished_at": null,
                "sender_id": 8,
                "receiver_id": 858,
                "info": [
                    {
                        "key": null
                    }
                ],
                "finish_reason": null,
                "finish_note": null,
                "finish_outtime_reason": null,
                "finish_info": null,
                "task_type": "App\\EpisodeTask",
                "task_id": 5275,
                "receiver_position_id": 112,
                "finish_state_id": null,
                "state_id": 16,
                "team_id": 9,
                "reason_skip_deadline": null,
                "status": {
                    "id": 16,
                    "name": "In progress",
                    "priority": 7
                },
                "finish_status": null,
                "sender": {
                    "id": 8,
                    "first_name": "Ghofran",
                    "last_name": "Jabri",
                    "name": "Ghofran Jabri"
                },
                "receiver": {
                    "id": 858,
                    "first_name": "Rama",
                    "last_name": "Kamel",
                    "name": "Rama Kamel"
                }
            },
            "jobs": [
                {
                    "id": 109,
                    "name": "TazmoCue",
                    "type": "production",
                    "position_id": 13,
                    "multi_episode": 0,
                    "pivot": {
                        "jobable_id": 5275,
                        "job_id": 109,
                        "jobable_type": "App\\EpisodeTask"
                    }
                }
            ],
            "episode": {
                "id": 6213,
                "episode_number": "075",
                "title": "Naruto",
                "project_id": 190,
                "text": "075 - Naruto",
                "project": {
                    "id": 190,
                    "name": "Naruto",
                    "project_id": "21027",
                    "text": "21027 - Naruto"
                }
            }
        }
    }
}
```

### HTTP Request
`POST production/task/getTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int

<!-- END_c74f656d0148b1d7313cc4567b439633 -->

<!-- START_f470de9e6e3b0301671a52a6120c270d -->
## Set Next Step Task

> Example request:

```bash
curl -X POST \
    "http://localhost/production/task/SetNextStepTask?task_id=suscipit&next_jobs=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/SetNextStepTask"
);

let params = {
    "task_id": "suscipit",
    "next_jobs": "aut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST production/task/SetNextStepTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int
    `next_jobs` |  required  | intArray

<!-- END_f470de9e6e3b0301671a52a6120c270d -->

<!-- START_a8e3b9a556b85be4dba840c08bdc0d82 -->
## Change State To Done

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task/ChangeStateToDone?task_id=vel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/ChangeStateToDone"
);

let params = {
    "task_id": "vel",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET production/task/ChangeStateToDone`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int

<!-- END_a8e3b9a556b85be4dba840c08bdc0d82 -->

<!-- START_392ad4100f4bb6f077bb14b80ed0569e -->
## Get Task Change Log

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task/GetTaskChangeLog?task_id=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task/GetTaskChangeLog"
);

let params = {
    "task_id": "illo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 4185,
            "created_at": "2021-05-25 13:53:38",
            "updated_at": "2021-05-25 16:53:45",
            "readed_at": "2021-05-25 13:53:45",
            "log_name": "",
            "subject_type": "App\\EpisodeTask",
            "subject_id": 5275,
            "causer_type": "App\\User",
            "causer_id": 8,
            "description": "created",
            "properties": {
                "new": {
                    "deadline": "2021-05-26 09:00:00",
                    "episode_id": 6213,
                    "id": 5275
                },
                "old": []
            },
            "user": {
                "id": 8,
                "first_name": "Ghofran",
                "last_name": "Jabri",
                "name": "Ghofran Jabri"
            }
        }
    ]
}
```

### HTTP Request
`GET production/task/GetTaskChangeLog`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int

<!-- END_392ad4100f4bb6f077bb14b80ed0569e -->

#TaskPlanController


APIs
<!-- START_8b978982e170c1369a1178cb854c3a53 -->
## Get Task Plan Project

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task_plan/GetTaskPlanProject?status=distinctio&group=aliquam&employees=et&jobs=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task_plan/GetTaskPlanProject"
);

let params = {
    "status": "distinctio",
    "group": "aliquam",
    "employees": "et",
    "jobs": "illo",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "groups": [
        {
            "root": 1,
            "parent": null,
            "type": "project",
            "episode_id": 0,
            "episode_number": 0,
            "level": 1,
            "project_id": "20129",
            "id": 143,
            "title": "20129 - Hercai"
        }
    ],
    "deadline": [
        {
            "sender_name": "Art Director Group - oh",
            "receiver_name": "Script Group - gj",
            "project_id": 190,
            "team_id": 9,
            "id": "p_deadline1670",
            "reciver_id": 84,
            "ep_nm": 2,
            "jb_nm": 3,
            "is_sender": 0,
            "editable": 0,
            "type": "deadline",
            "group": 190,
            "deadline": "2021-07-11 19:00:00",
            "start_time": 1626030000000,
            "end_time": "2021-07-11 21:00:00",
            "assign_request_id": 1670,
            "available_task": 3
        }
    ]
}
```

### HTTP Request
`GET production/task_plan/GetTaskPlanProject`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `status` |  required  | int
    `group` |  required  | int
    `employees` |  optional  | int
    `jobs` |  optional  | IntArray

<!-- END_8b978982e170c1369a1178cb854c3a53 -->

<!-- START_ff6f7226b1428d2d2f2eab29a251fd9b -->
## Get Project Task

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task_plan/GetProjectTask?project_id=et&group=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task_plan/GetProjectTask"
);

let params = {
    "project_id": "et",
    "group": "quibusdam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "items": [],
    "deadline": [
        {
            "sender_name": "Art Director Group - oh",
            "receiver_name": "Script Group - gj",
            "id": "e_deadline_614_5545",
            "type": "deadline",
            "project_id": 143,
            "team_id": 9,
            "group": "ep_5545",
            "start_time": 1618509600000,
            "end_time": 1618516800000,
            "reciver_id": 84,
            "ep_nm": 1,
            "jb_nm": 1,
            "assign_request_id": 614,
            "is_sender": 0,
            "editable": 0,
            "deadline": "2021-04-15 18:00:00"
        }
    ],
    "episode_deadline": []
}
```

### HTTP Request
`GET production/task_plan/GetProjectTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `project_id` |  required  | int
    `group` |  required  | int

<!-- END_ff6f7226b1428d2d2f2eab29a251fd9b -->

<!-- START_a179337a34e103f46e2ffc899a27c9dd -->
## Update Episode Task Deadline

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/task_plan/UpdateEpisodeTaskDeadline?deadline=ut&episode_task_id=ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/task_plan/UpdateEpisodeTaskDeadline"
);

let params = {
    "deadline": "ut",
    "episode_task_id": "ut",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`GET production/task_plan/UpdateEpisodeTaskDeadline`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `deadline` |  required  | date
    `episode_task_id` |  required  | int

<!-- END_a179337a34e103f46e2ffc899a27c9dd -->

#TazmeenTransferController


APIs
<!-- START_6e820093d6b338ed13cf2ba44bb8b7ad -->
## Get User Device
when change user this api call to get user device

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/tazmeen_transfer/GetUserDevice?employee_id=reiciendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/tazmeen_transfer/GetUserDevice"
);

let params = {
    "employee_id": "reiciendis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "text": "PC",
            "value": "PC"
        }
    ]
}
```

### HTTP Request
`GET administration/tazmeen_transfer/GetUserDevice`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  required  | Employee id

<!-- END_6e820093d6b338ed13cf2ba44bb8b7ad -->

<!-- START_4401b554e0525d2e49360f6e7f2884ca -->
## Get User Device
when change user this api call to get user device

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/tazmeen_transfer/GetProgramTable?page=quibusdam&employee_id=nobis&device_id=eum&date=velit&table=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/tazmeen_transfer/GetProgramTable"
);

let params = {
    "page": "quibusdam",
    "employee_id": "nobis",
    "device_id": "eum",
    "date": "velit",
    "table": "quibusdam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "total": 51,
    "data": [
        {
            "created_at": "2021-06-01T09:07:18.000000Z",
            "event_at": "2021-06-01 06:05:31",
            "event_name": "Application Start",
            "id": 8888,
            "info": "{\"app\":\"reporter_manager\",\"computer\":\"PROD-ASSIST\",\"user\":\"am\"}",
            "instance_id": 8888
        }
    ]
}
```

### HTTP Request
`POST administration/tazmeen_transfer/GetProgramTable`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `page` |  required  | for pagination
    `employee_id` |  required  | Employee id
    `device_id` |  required  | Device id.
    `date` |  required  | .
    `table` |  required  | this to detect from any table read

<!-- END_4401b554e0525d2e49360f6e7f2884ca -->

#Team Controller


APIs
<!-- START_e87a639441129c834caa7a9090a61927 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/teams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/teams"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "teams": [
        {
            "id": 1,
            "name": "CEO Group",
            "description": null,
            "created_at": "2021-01-16 12:37:08",
            "updated_at": "2021-04-02 16:07:47",
            "leader_id": 60,
            "color": "#4a90e2",
            "substitute_id": null,
            "leader": {
                "id": 60,
                "employee_id": 2,
                "contract_start_in": [],
                "contract_end_in": [],
                "supervisor": null,
                "employee": {
                    "id": 2,
                    "user_id": 2,
                    "user": {
                        "id": 2,
                        "first_name": "Feras",
                        "last_name": "hl",
                        "name": "Feras hl"
                    }
                }
            }
        }
    ]
}
```

### HTTP Request
`GET teams`


<!-- END_e87a639441129c834caa7a9090a61927 -->

<!-- START_5bf959ceeb4f79492065ce588390623d -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/teams?name=et&description=et&leader_id=omnis&color=porro&substitute_id=facilis&jobs=aut&leader_substitutes=eveniet&members=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/teams"
);

let params = {
    "name": "et",
    "description": "et",
    "leader_id": "omnis",
    "color": "porro",
    "substitute_id": "facilis",
    "jobs": "aut",
    "leader_substitutes": "eveniet",
    "members": "eos",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`POST teams`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  required  | string
    `description` |  required  | string
    `leader_id` |  required  | int
    `color` |  required  | string
    `substitute_id` |  optional  | int
    `jobs` |  required  | string
    `leader_substitutes` |  required  | string
    `members` |  required  | JsonArray

<!-- END_5bf959ceeb4f79492065ce588390623d -->

<!-- START_d07d65a0708d4e4bbde9b205c009f73e -->
## edit

> Example request:

```bash
curl -X GET \
    -G "http://localhost/teams/1/edit?id=architecto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/teams/1/edit"
);

let params = {
    "id": "architecto",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "teams": {
        "id": 1,
        "name": "CEO Group",
        "description": null,
        "created_at": "2021-01-16 12:37:08",
        "updated_at": "2021-04-02 16:07:47",
        "leader_id": 60,
        "color": "#4a90e2",
        "substitute_id": null,
        "jobs": "43,44,45,46,47,48,49,68,69,53,54,55,56,57,58,160,161,162,50,51,52,194,195",
        "members": [
            {
                "id": 123,
                "created_at": "2021-02-03 08:16:46",
                "updated_at": "2021-02-03 08:16:46",
                "employee_id": 37,
                "currency": null,
                "salary_due_date": null,
                "basic_salary": null,
                "variable_salary": null,
                "total_salary": null,
                "salary_updated_at": null,
                "transportation_allowance": null,
                "contract_type": null,
                "active": 1,
                "position_id": 34,
                "deleted_at": null,
                "contract_start_in": [],
                "contract_end_in": [],
                "supervisor": null,
                "pivot": {
                    "team_id": 1,
                    "employee_position_id": 123,
                    "created_at": "2021-02-03 15:04:51",
                    "reference_id": null
                }
            }
        ]
    }
}
```

### HTTP Request
`GET teams/{team}/edit`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_d07d65a0708d4e4bbde9b205c009f73e -->

<!-- START_ae0ed66e0f0aaebda534253fd407d38d -->
## update

> Example request:

```bash
curl -X PUT \
    "http://localhost/teams/1?id=ut&name=vel&description=consequuntur&leader_id=aut&color=reprehenderit&substitute_id=qui&jobs=qui&leader_substitutes=sunt&members=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/teams/1"
);

let params = {
    "id": "ut",
    "name": "vel",
    "description": "consequuntur",
    "leader_id": "aut",
    "color": "reprehenderit",
    "substitute_id": "qui",
    "jobs": "qui",
    "leader_substitutes": "sunt",
    "members": "eos",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "teams": {
        "id": 1,
        "name": "CEO Group",
        "description": null,
        "created_at": "2021-01-16 12:37:08",
        "updated_at": "2021-04-02 16:07:47",
        "leader_id": 60,
        "color": "#4a90e2",
        "substitute_id": null,
        "jobs": "43,44,45,46,47,48,49,68,69,53,54,55,56,57,58,160,161,162,50,51,52,194,195",
        "members": [
            {
                "id": 123,
                "created_at": "2021-02-03 08:16:46",
                "updated_at": "2021-02-03 08:16:46",
                "employee_id": 37,
                "currency": null,
                "salary_due_date": null,
                "basic_salary": null,
                "variable_salary": null,
                "total_salary": null,
                "salary_updated_at": null,
                "transportation_allowance": null,
                "contract_type": null,
                "active": 1,
                "position_id": 34,
                "deleted_at": null,
                "contract_start_in": [],
                "contract_end_in": [],
                "supervisor": null,
                "pivot": {
                    "team_id": 1,
                    "employee_position_id": 123,
                    "created_at": "2021-02-03 15:04:51",
                    "reference_id": null
                }
            }
        ]
    }
}
```

### HTTP Request
`PUT teams/{team}`

`PATCH teams/{team}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `name` |  required  | string
    `description` |  required  | string
    `leader_id` |  required  | int
    `color` |  required  | string
    `substitute_id` |  optional  | int
    `jobs` |  required  | string
    `leader_substitutes` |  required  | string
    `members` |  required  | JsonArray

<!-- END_ae0ed66e0f0aaebda534253fd407d38d -->

<!-- START_c02007476da9a001eb0582f0f092e2fe -->
## Get Tree

> Example request:

```bash
curl -X GET \
    -G "http://localhost/hr/teams/GetTree?root=aliquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/hr/teams/GetTree"
);

let params = {
    "root": "aliquam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success",
    "tree": [
        {
            "id": 60,
            "name": "Feras Hl",
            "position": "CEO",
            "image": "\/tazmeen_app\/..\/default.png",
            "parent": null,
            "children": {
                "115": {
                    "name": "XX xxx",
                    "parent": 60,
                    "id": 115,
                    "position": "Administration Manager",
                    "image": "tazmeen_app\/..\/default.png",
                    "children": {},
                    "contract_start_in": [],
                    "contract_end_in": [],
                    "supervisor": true
                }
            },
            "contract_start_in": [],
            "contract_end_in": [],
            "supervisor": true
        }
    ]
}
```

### HTTP Request
`GET hr/teams/GetTree`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `root` |  required  | int

<!-- END_c02007476da9a001eb0582f0f092e2fe -->

#TechnicalReportController


APIs
<!-- START_291196a5727a4bf19a691cf6e32ef04c -->
## Get Technical Report
Under Developer

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/detail/GetTechnicalReport" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/detail/GetTechnicalReport"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET production/detail/GetTechnicalReport`


<!-- END_291196a5727a4bf19a691cf6e32ef04c -->

#TestController


APIs
<!-- START_24362feb742401494931004943628228 -->
## test/test
> Example request:

```bash
curl -X GET \
    -G "http://localhost/test/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/test/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET test/test`


<!-- END_24362feb742401494931004943628228 -->

<!-- START_dfdc3af1dab94aad354a10ea1ad8596a -->
## ClearCache
> Example request:

```bash
curl -X GET \
    -G "http://localhost/ClearCache" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/ClearCache"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET ClearCache`


<!-- END_dfdc3af1dab94aad354a10ea1ad8596a -->

<!-- START_5af6109fbe6b19088354ec09413db337 -->
## CacheClear
> Example request:

```bash
curl -X GET \
    -G "http://localhost/CacheClear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/CacheClear"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET CacheClear`


<!-- END_5af6109fbe6b19088354ec09413db337 -->

<!-- START_2fc11d3e5b5d351155bb00a03b9aed61 -->
## DumpAutoload
> Example request:

```bash
curl -X GET \
    -G "http://localhost/DumpAutoload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/DumpAutoload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET DumpAutoload`


<!-- END_2fc11d3e5b5d351155bb00a03b9aed61 -->

#Vacation Controller


APIs
<!-- START_4ab3b3de4071b43592a40d5773557ac5 -->
## index

> Example request:

```bash
curl -X GET \
    -G "http://localhost/vacations?selectedEmployee=sunt&start=cum&end=neque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/vacations"
);

let params = {
    "selectedEmployee": "sunt",
    "start": "cum",
    "end": "neque",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "hourly_administrative": "00:00:00",
        "hourly_sick": "00:00:00",
        "hourly_exceptional": "00:00:00",
        "daily_administrative": "0",
        "daily_sick": "0",
        "daily_exceptional": "1"
    },
    "list": [
        {
            "id": 3,
            "created_at": "2021-06-06 04:08:33",
            "updated_at": "2021-06-06 04:08:33",
            "type": "exceptional",
            "duration": "daily",
            "start": "2021-06-06 00:00:00",
            "end": "2021-06-06 23:59:59",
            "approved_at": "2021-06-06 14:08:00",
            "employee_id": 27,
            "created_by": 2
        }
    ]
}
```

### HTTP Request
`GET vacations`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `selectedEmployee` |  required  | int
    `start` |  required  | date
    `end` |  required  | date

<!-- END_4ab3b3de4071b43592a40d5773557ac5 -->

<!-- START_12e7f84e7671508231b5d66ced10126b -->
## store

> Example request:

```bash
curl -X POST \
    "http://localhost/vacations?employee_id=temporibus&approved_at=iste&start=quidem&end=sunt&duration=officia&type=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/vacations"
);

let params = {
    "employee_id": "temporibus",
    "approved_at": "iste",
    "start": "quidem",
    "end": "sunt",
    "duration": "officia",
    "type": "autem",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST vacations`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  required  | int
    `approved_at` |  required  | date
    `start` |  required  | date
    `end` |  required  | date
    `duration` |  required  | string
    `type` |  required  | string

<!-- END_12e7f84e7671508231b5d66ced10126b -->

#WorkProgressController


APIs
<!-- START_44c1d9dd55973e68f82be416d60cf82e -->
## Get Work Progress Project Details
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/WorkProgress/GetData?jobs=et&projects=amet&status=minima&group=ullam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/WorkProgress/GetData"
);

let params = {
    "jobs": "et",
    "projects": "amet",
    "status": "minima",
    "group": "ullam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET production/WorkProgress/GetData`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `jobs` |  required  | intArray
    `projects` |  required  | intArray
    `status` |  required  | intArray
    `group` |  required  | int

<!-- END_44c1d9dd55973e68f82be416d60cf82e -->

<!-- START_3c02e2c4e99baef571c99e99e88a0b5f -->
## Get Work Progress Projects

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/WorkProgress/GetWorkProgressProjects?status=corporis&group=aperiam&employees=molestiae&jobs=sit&projects=accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/WorkProgress/GetWorkProgressProjects"
);

let params = {
    "status": "corporis",
    "group": "aperiam",
    "employees": "molestiae",
    "jobs": "sit",
    "projects": "accusamus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "job_id": 106,
            "project_id": 143,
            "project_name": "20129 - Hercai"
        }
    ],
    "jobs": {
        "Script SV A": [
            {
                "job_name": "Casting Assistant",
                "job_id": 106,
                "position_name": "Script SV A",
                "position_id": 12
            }
        ],
        "Script Team": [
            {
                "job_name": "TazmoCue",
                "job_id": 109,
                "position_name": "Script Team",
                "position_id": 13
            }
        ]
    }
}
```

### HTTP Request
`GET production/WorkProgress/GetWorkProgressProjects`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `status` |  required  | int
    `group` |  required  | int
    `employees` |  optional  | int
    `jobs` |  optional  | IntArray
    `projects` |  optional  | IntArray

<!-- END_3c02e2c4e99baef571c99e99e88a0b5f -->

<!-- START_801abd53c2a931db220c4ec26221f1cd -->
## Get Work Progress Project Details

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/WorkProgress/GetWorkProgressProjectDetails?group=nemo&project_id=nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/WorkProgress/GetWorkProgressProjectDetails"
);

let params = {
    "group": "nemo",
    "project_id": "nihil",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "job_id": 106,
            "project_id": 199,
            "project_name": "21036 - Kardeslerim"
        }
    ],
    "jobs": {
        "Script Team": [
            {
                "job_name": "TazmoCue",
                "job_id": 109,
                "position_name": "Script Team",
                "position_id": 13
            },
            {
                "job_name": "Tazmo-Graphic",
                "job_id": 196,
                "position_name": "Script Team",
                "position_id": 13
            },
            {
                "job_name": "ARS",
                "job_id": 198,
                "position_name": "Script Team",
                "position_id": 13
            }
        ]
    }
}
```

### HTTP Request
`GET production/WorkProgress/GetWorkProgressProjectDetails`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `group` |  required  | int
    `project_id` |  required  | int

<!-- END_801abd53c2a931db220c4ec26221f1cd -->

<!-- START_396b9f792af155d2dd2baa6f9b79a28e -->
## Get Episode Job Tasks

> Example request:

```bash
curl -X GET \
    -G "http://localhost/production/WorkProgress/GetEpisodeJobTasks?episode_id=aut&job_id=commodi&state=omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/production/WorkProgress/GetEpisodeJobTasks"
);

let params = {
    "episode_id": "aut",
    "job_id": "commodi",
    "state": "omnis",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [],
    "episode": {
        "episode_number": "165",
        "title": "Soz",
        "text": "165 - Soz"
    },
    "job": {
        "name": "TazmoCue"
    }
}
```

### HTTP Request
`GET production/WorkProgress/GetEpisodeJobTasks`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `episode_id` |  required  | int
    `job_id` |  required  | int
    `state` |  optional  | JsonObject

<!-- END_396b9f792af155d2dd2baa6f9b79a28e -->

#Work Session Controller


APIs
<!-- START_34a87c2e2fc5812239dc05357165e330 -->
## Start Session

> Example request:

```bash
curl -X POST \
    "http://localhost/main/work_session/StartSession?task_id=perferendis&type=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/StartSession"
);

let params = {
    "task_id": "perferendis",
    "type": "tenetur",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "task": true
}
```

### HTTP Request
`POST main/work_session/StartSession`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int
    `type` |  required  | string

<!-- END_34a87c2e2fc5812239dc05357165e330 -->

<!-- START_e14a7d51657387eeb6b54c30804085b4 -->
## Stop Session

> Example request:

```bash
curl -X POST \
    "http://localhost/main/work_session/StopSession?type=dolores&note=delectus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/StopSession"
);

let params = {
    "type": "dolores",
    "note": "delectus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`POST main/work_session/StopSession`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `type` |  required  | string
    `note` |  optional  | string

<!-- END_e14a7d51657387eeb6b54c30804085b4 -->

<!-- START_311623dd80d9139566fdcf5d20a48f0d -->
## Get Total Session

> Example request:

```bash
curl -X POST \
    "http://localhost/main/work_session/GetTotalSession" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetTotalSession"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "old_total_duration": "00:19:49",
        "running_duration": "00:00:03.000000",
        "total_duration": "00:19:52.000000"
    }
}
```

### HTTP Request
`POST main/work_session/GetTotalSession`


<!-- END_311623dd80d9139566fdcf5d20a48f0d -->

<!-- START_4874425d101bc99decdecc77c7576200 -->
## Get Task Changes

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/GetTaskChanges" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/GetTaskChanges"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "activity_log": [
        {
            "properties": "{\"new\":{\"deadline\":\"2021-06-22 16:35:00\",\"episode_id\":4621,\"id\":5306},\"old\":{}}",
            "description": "created",
            "id": 4217,
            "message": "012 - Thamarat",
            "updated_at": "2021-06-02 03:10:50"
        }
    ]
}
```

### HTTP Request
`GET main/work_session/GetTaskChanges`


<!-- END_4874425d101bc99decdecc77c7576200 -->

<!-- START_e649c854a32e67ed3ab0a3d02ed171bc -->
## Set Task Changes Readed

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/SetTaskChangesReaded?task_ids=adipisci" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/SetTaskChangesReaded"
);

let params = {
    "task_ids": "adipisci",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET main/work_session/SetTaskChangesReaded`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_ids` |  required  | int Array

<!-- END_e649c854a32e67ed3ab0a3d02ed171bc -->

<!-- START_7598e7863ff93945bb642fdc8d382bf5 -->
## Finish Task

> Example request:

```bash
curl -X POST \
    "http://localhost/main/work_session/FinishTask?state_id=ut&task_id=iusto&finish_reason=aspernatur&finish_note=nulla&finish_info=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/FinishTask"
);

let params = {
    "state_id": "ut",
    "task_id": "iusto",
    "finish_reason": "aspernatur",
    "finish_note": "nulla",
    "finish_info": "eos",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true
}
```

### HTTP Request
`POST main/work_session/FinishTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `state_id` |  required  | int
    `task_id` |  required  | int
    `finish_reason` |  optional  | int
    `finish_note` |  optional  | string
    `finish_info` |  optional  | JsonArray

<!-- END_7598e7863ff93945bb642fdc8d382bf5 -->

<!-- START_3f52ace4151763005572e0399bce4b31 -->
## Check Session Alive

> Example request:

```bash
curl -X GET \
    -G "http://localhost/main/work_session/CheckSessionAlive?session_id=magni" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/main/work_session/CheckSessionAlive"
);

let params = {
    "session_id": "magni",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "running": true
}
```

### HTTP Request
`GET main/work_session/CheckSessionAlive`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `session_id` |  required  | int

<!-- END_3f52ace4151763005572e0399bce4b31 -->

#WorkSessionMangeController


APIs
<!-- START_fbdefc2bb0c060068acd1faad36a21ea -->
## Get Employee Sessions

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/work_session_mange/GetEmployeeSessions?employee_id=architecto&sessions_date=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/GetEmployeeSessions"
);

let params = {
    "employee_id": "architecto",
    "sessions_date": "et",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "sessions": [
        {
            "created_at": "2021-06-01T09:07:18.000000Z",
            "deadline": "2021-06-01 06:05:31",
            "episode": "episode name",
            "id": 8888,
            "project": "Administrative",
            "state": "Done",
            "type": "App\\AdministrativeTask",
            "updated_at": "2021-02-06 07:08:34",
            "job_id": 8888,
            "jobs": [
                "Lack of work"
            ],
            "job": {
                "id": 8888,
                "multi_episode": 0,
                "name": "Lack of work",
                "position_id": 8888,
                "type": "administrative"
            }
        }
    ]
}
```

### HTTP Request
`GET administration/work_session_mange/GetEmployeeSessions`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `employee_id` |  required  | Employee id
    `sessions_date` |  required  | date

<!-- END_fbdefc2bb0c060068acd1faad36a21ea -->

<!-- START_f50f4ca230393fc03b61ceb1408f4d7c -->
## Get Task Sessions Detail

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/work_session_mange/GetTaskSessionsDetail?task_id=perspiciatis&task_type=aut&sessionDate=delectus&employee_id=veniam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/GetTaskSessionsDetail"
);

let params = {
    "task_id": "perspiciatis",
    "task_type": "aut",
    "sessionDate": "delectus",
    "employee_id": "veniam",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "timezone": "Asia\/Damascus",
    "sessions": [
        {
            "created_at": "2021-06-01T09:07:18",
            "updated_at": "2021-06-01 06:05:31",
            "start": "2021-06-01 06:05:31",
            "end": "2021-06-01 06:05:31",
            "automatically": 0,
            "id": 8888,
            "duration": 4322,
            "employee_id": 2,
            "sessionable_id": 21,
            "sessionable_type": "App\\Task",
            "type": "App\\AdministrativeTask",
            "status": 0,
            "note": "sdsad"
        }
    ],
    "task": [
        {
            "created_at": "2021-06-01T09:07:18",
            "updated_at": "2021-06-01 06:05:31",
            "finish_info": [
                {
                    "key": null,
                    "value": null
                }
            ],
            "finish_note": null,
            "finish_outtime_reason": null,
            "finish_reason": null,
            "finish_state_id": 8,
            "finished_at": "2021-06-01 06:05:31",
            "id": 8888,
            "info": [
                {
                    "key": null,
                    "value": null
                }
            ],
            "production_session": [
                {
                    "created_at": "2021-06-01T09:07:18",
                    "updated_at": "2021-06-01 06:05:31",
                    "start": "2021-06-01 06:05:31",
                    "end": "2021-06-01 06:05:31",
                    "automatically": 0,
                    "id": 8888,
                    "duration": 4322,
                    "employee_id": 2,
                    "sessionable_id": 21,
                    "sessionable_type": "App\\Task",
                    "type": "App\\AdministrativeTask",
                    "status": 0,
                    "note": "sdsad"
                }
            ],
            "reason_skip_deadline": null,
            "receiver": {
                "id": 17,
                "timezone": "Asia\/Damascus",
                "name": "name"
            },
            "receiver_id": 17,
            "receiver_position_id": 4322,
            "sender_id": 2,
            "state_id": 21,
            "task_id": 21,
            "task_type": "App\\EpisodeTask",
            "team_id": 9
        }
    ]
}
```

### HTTP Request
`GET administration/work_session_mange/GetTaskSessionsDetail`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `task_id` |  required  | int
    `task_type` |  required  | string
    `sessionDate` |  required  | datetime
    `employee_id` |  required  | int

<!-- END_f50f4ca230393fc03b61ceb1408f4d7c -->

<!-- START_c20717578aed35cc14bea1d99d9abac8 -->
## Update Work Session

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/work_session_mange/UpdateWorkSession?id=a&automatically=necessitatibus&legal=illum&status=voluptas&start=autem&end=quibusdam&note=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/UpdateWorkSession"
);

let params = {
    "id": "a",
    "automatically": "necessitatibus",
    "legal": "illum",
    "status": "voluptas",
    "start": "autem",
    "end": "quibusdam",
    "note": "velit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`POST administration/work_session_mange/UpdateWorkSession`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `automatically` |  required  | int
    `legal` |  required  | int
    `status` |  required  | int
    `start` |  required  | datetime
    `end` |  required  | datetime
    `note` |  optional  | string

<!-- END_c20717578aed35cc14bea1d99d9abac8 -->

<!-- START_60609cb19a4598f2a5e0ea938eeaff0f -->
## Update Task Details

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/work_session_mange/UpdateTaskDetails?id=blanditiis&finish_state_id=nisi&finish_note=deleniti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/UpdateTaskDetails"
);

let params = {
    "id": "blanditiis",
    "finish_state_id": "nisi",
    "finish_note": "deleniti",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`POST administration/work_session_mange/UpdateTaskDetails`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `finish_state_id` |  required  | int
    `finish_note` |  optional  | string

<!-- END_60609cb19a4598f2a5e0ea938eeaff0f -->

<!-- START_15887360e2a5c2625134b04a9daa0c25 -->
## Delete Session

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/work_session_mange/DeleteSession?id=fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/DeleteSession"
);

let params = {
    "id": "fugit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`GET administration/work_session_mange/DeleteSession`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int

<!-- END_15887360e2a5c2625134b04a9daa0c25 -->

<!-- START_166c745a43adb0ee7a777e18bc4ec48d -->
## Add Session To Task

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/work_session_mange/AddSessionToTask?sessionable_int=explicabo&sessionable_type=perferendis&employee_id=commodi&start=maiores&end=aut&legal=porro&note=et&status=consequuntur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/AddSessionToTask"
);

let params = {
    "sessionable_int": "explicabo",
    "sessionable_type": "perferendis",
    "employee_id": "commodi",
    "start": "maiores",
    "end": "aut",
    "legal": "porro",
    "note": "et",
    "status": "consequuntur",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`POST administration/work_session_mange/AddSessionToTask`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `sessionable_int` |  required  | int
    `sessionable_type` |  required  | string
    `employee_id` |  required  | int
    `start` |  required  | datetime
    `end` |  required  | datetime
    `legal` |  required  | int
    `note` |  optional  | string
    `status` |  required  | string

<!-- END_166c745a43adb0ee7a777e18bc4ec48d -->

<!-- START_232b833c6f5af2f882e75c711b0db491 -->
## Add Administration Session

> Example request:

```bash
curl -X POST \
    "http://localhost/administration/work_session_mange/AddAdministrationSession?id=dicta&employee_id=iusto&job_id=cum&legal=omnis&status=dolore&start=sequi&end=optio&sessionable_type=in&job=sunt&note=necessitatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/work_session_mange/AddAdministrationSession"
);

let params = {
    "id": "dicta",
    "employee_id": "iusto",
    "job_id": "cum",
    "legal": "omnis",
    "status": "dolore",
    "start": "sequi",
    "end": "optio",
    "sessionable_type": "in",
    "job": "sunt",
    "note": "necessitatibus",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true
}
```

### HTTP Request
`POST administration/work_session_mange/AddAdministrationSession`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `id` |  required  | int
    `employee_id` |  required  | int
    `job_id` |  required  | int
    `legal` |  required  | int
    `status` |  required  | string
    `start` |  required  | datetime
    `end` |  required  | datetime
    `sessionable_type` |  required  | string
    `job` |  required  | JsonObject
    `note` |  optional  | string

<!-- END_232b833c6f5af2f882e75c711b0db491 -->

#general


<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
## _debugbar/open
> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/open"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/open`


<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->

<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/clockwork/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/clockwork/{id}`


<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->

<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
## _debugbar/telescope/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/telescope/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/telescope/{id}`


<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->

<!-- START_5f8a640000f5db43332951f0d77378c4 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/assets/stylesheets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/stylesheets`


<!-- END_5f8a640000f5db43332951f0d77378c4 -->

<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET \
    -G "http://localhost/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/assets/javascript"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/javascript`


<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->

<!-- START_0973671c4f56e7409202dc85c868d442 -->
## Forget a cache key

> Example request:

```bash
curl -X DELETE \
    "http://localhost/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/_debugbar/cache/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE _debugbar/cache/{key}/{tags?}`


<!-- END_0973671c4f56e7409202dc85c868d442 -->

<!-- START_ffeb21a323d661b8d5ed8072620cc36e -->
## laravel-websockets
> Example request:

```bash
curl -X GET \
    -G "http://localhost/laravel-websockets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/laravel-websockets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET laravel-websockets`


<!-- END_ffeb21a323d661b8d5ed8072620cc36e -->

<!-- START_7a96267d047ecbef5cd21c3dd1691fe0 -->
## laravel-websockets/api/{appId}/statistics
> Example request:

```bash
curl -X GET \
    -G "http://localhost/laravel-websockets/api/1/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/laravel-websockets/api/1/statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "peak_connections": {
        "x": [],
        "y": []
    },
    "websocket_message_count": {
        "x": [],
        "y": []
    },
    "api_message_count": {
        "x": [],
        "y": []
    }
}
```

### HTTP Request
`GET laravel-websockets/api/{appId}/statistics`


<!-- END_7a96267d047ecbef5cd21c3dd1691fe0 -->

<!-- START_69dd61efc04363546d99d1d7cba7bf4c -->
## laravel-websockets/auth
> Example request:

```bash
curl -X POST \
    "http://localhost/laravel-websockets/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/laravel-websockets/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/auth`


<!-- END_69dd61efc04363546d99d1d7cba7bf4c -->

<!-- START_5f593177feb1276b604ea7c2cec73a03 -->
## laravel-websockets/event
> Example request:

```bash
curl -X POST \
    "http://localhost/laravel-websockets/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/laravel-websockets/event"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/event`


<!-- END_5f593177feb1276b604ea7c2cec73a03 -->

<!-- START_a114cbb106b4fbbabe00910c4c3fa19c -->
## laravel-websockets/statistics
> Example request:

```bash
curl -X POST \
    "http://localhost/laravel-websockets/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/laravel-websockets/statistics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST laravel-websockets/statistics`


<!-- END_a114cbb106b4fbbabe00910c4c3fa19c -->

<!-- START_a860c890b44558a758eaca7c13893ed6 -->
## Invoke the controller method.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust`

`POST administration/laratrust`

`PUT administration/laratrust`

`PATCH administration/laratrust`

`DELETE administration/laratrust`

`OPTIONS administration/laratrust`


<!-- END_a860c890b44558a758eaca7c13893ed6 -->

<!-- START_5e5c7a39bd34b9b29eff8e2659bc3035 -->
## administration/laratrust/permissions
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/permissions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/permissions`


<!-- END_5e5c7a39bd34b9b29eff8e2659bc3035 -->

<!-- START_164bdd7cb02e92c1ca17a97465650644 -->
## administration/laratrust/permissions/{permission}/edit
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/permissions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/permissions/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/permissions/{permission}/edit`


<!-- END_164bdd7cb02e92c1ca17a97465650644 -->

<!-- START_72b68bd0028c2077a78e043aea7fbb3f -->
## administration/laratrust/permissions/{permission}
> Example request:

```bash
curl -X PUT \
    "http://localhost/administration/laratrust/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/permissions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT administration/laratrust/permissions/{permission}`

`PATCH administration/laratrust/permissions/{permission}`


<!-- END_72b68bd0028c2077a78e043aea7fbb3f -->

<!-- START_b84ae4818c5a2d1651a58feb1b843c79 -->
## administration/laratrust/roles
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles`


<!-- END_b84ae4818c5a2d1651a58feb1b843c79 -->

<!-- START_3f4528b23f0c8564d4ef917ce6593009 -->
## administration/laratrust/roles/create
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles/create`


<!-- END_3f4528b23f0c8564d4ef917ce6593009 -->

<!-- START_8edea55d39077e63b28d6a0e33d9cabe -->
## administration/laratrust/roles
> Example request:

```bash
curl -X POST \
    "http://localhost/administration/laratrust/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST administration/laratrust/roles`


<!-- END_8edea55d39077e63b28d6a0e33d9cabe -->

<!-- START_d7eb035b19c81d98b4d02482b0952805 -->
## administration/laratrust/roles/{role}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles/{role}`


<!-- END_d7eb035b19c81d98b4d02482b0952805 -->

<!-- START_0e0e0161f5eed9a9eb18a35094986e38 -->
## administration/laratrust/roles/{role}/edit
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles/{role}/edit`


<!-- END_0e0e0161f5eed9a9eb18a35094986e38 -->

<!-- START_2d4b80fdf998eab01809618e6395ef8a -->
## administration/laratrust/roles/{role}
> Example request:

```bash
curl -X PUT \
    "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT administration/laratrust/roles/{role}`

`PATCH administration/laratrust/roles/{role}`


<!-- END_2d4b80fdf998eab01809618e6395ef8a -->

<!-- START_7a9bf1ed44fc93af79ecd8e4fcaeb188 -->
## administration/laratrust/roles/{role}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE administration/laratrust/roles/{role}`


<!-- END_7a9bf1ed44fc93af79ecd8e4fcaeb188 -->

<!-- START_e974f6fd7c2c143e63788da4fb8d4079 -->
## administration/laratrust/roles-assignment
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles-assignment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles-assignment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles-assignment`


<!-- END_e974f6fd7c2c143e63788da4fb8d4079 -->

<!-- START_4ed58bf4e3dd9fda19471b535c9345d6 -->
## administration/laratrust/roles-assignment/{roles_assignment}/edit
> Example request:

```bash
curl -X GET \
    -G "http://localhost/administration/laratrust/roles-assignment/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles-assignment/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET administration/laratrust/roles-assignment/{roles_assignment}/edit`


<!-- END_4ed58bf4e3dd9fda19471b535c9345d6 -->

<!-- START_fd289e64bc275e52586e09216e2397e0 -->
## administration/laratrust/roles-assignment/{roles_assignment}
> Example request:

```bash
curl -X PUT \
    "http://localhost/administration/laratrust/roles-assignment/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/administration/laratrust/roles-assignment/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT administration/laratrust/roles-assignment/{roles_assignment}`

`PATCH administration/laratrust/roles-assignment/{roles_assignment}`


<!-- END_fd289e64bc275e52586e09216e2397e0 -->

<!-- START_66df3678904adde969490f2278b8f47f -->
## Authenticate the request for channel access.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/broadcasting/auth"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "message": ""
}
```

### HTTP Request
`GET broadcasting/auth`

`POST broadcasting/auth`


<!-- END_66df3678904adde969490f2278b8f47f -->

<!-- START_f3d7f0e5074a4649e53b6cfbbd348592 -->
## api/tracker/period_check
> Example request:

```bash
curl -X POST \
    "http://localhost/api/tracker/period_check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/tracker/period_check"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tracker/period_check`


<!-- END_f3d7f0e5074a4649e53b6cfbbd348592 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Where to redirect users after login.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_a854280a0a7dfb6d6b537abd31c9b3a0 -->
## Start Authentication
Not used yet

> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/ConvertUserId" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/ConvertUserId"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET services/ConvertUserId`


<!-- END_a854280a0a7dfb6d6b537abd31c9b3a0 -->

<!-- START_f6929cb61fe506fefa8423ba0dd22807 -->
## Start Authentication

> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/StartAuthentication" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/StartAuthentication"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "user": {
        "id": 8888,
        "first_name": "feras",
        "last_name": "hl",
        "image": "tazmeen_app\/..\/.jpeg",
        "timezone": "Asia\/Damascus"
    },
    "employee": [
        {
            "id": 8
        }
    ],
    "roles": [
        "employee",
        "supervisor-tazmoscript",
        "employee"
    ],
    "permissions": [
        "main_my_work_session_page",
        "setting_page",
        "production_work_progress_live_sessions_page",
        "production_work_progress_sessions_history_page"
    ],
    "server_timedate": "2021-06-08 18:01:17",
    "status": true
}
```

### HTTP Request
`GET services/StartAuthentication`


<!-- END_f6929cb61fe506fefa8423ba0dd22807 -->

<!-- START_1cd0932af682ecc7d803c145475d0d07 -->
## get Notifications Count

> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/notification/getNotificationsCount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/notification/getNotificationsCount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "count": 5
}
```

### HTTP Request
`GET services/notification/getNotificationsCount`


<!-- END_1cd0932af682ecc7d803c145475d0d07 -->

<!-- START_073515641bcc93b0e782a0412b41cf47 -->
## get Notifications Content

> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/notification/getNotificationsContent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/notification/getNotificationsContent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 3344,
            "created_ago": "3 months ago",
            "title": "Update Task",
            "description": "You have new Assgin!",
            "type": "Task",
            "readed_at": "2021-02-15 08:05:38",
            "receiver_id": 8,
            "receiver": "Ghofran Jabri",
            "sender": "Orwah Habib"
        }
    ]
}
```

### HTTP Request
`GET services/notification/getNotificationsContent`


<!-- END_073515641bcc93b0e782a0412b41cf47 -->

<!-- START_1b6bcd9376a058b83e127ebb52d07abd -->
## set Fcm Token

> Example request:

```bash
curl -X POST \
    "http://localhost/services/notification/setFcmToken?token=in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/notification/setFcmToken"
);

let params = {
    "token": "in",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST services/notification/setFcmToken`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `token` |  required  | string

<!-- END_1b6bcd9376a058b83e127ebb52d07abd -->

<!-- START_dfaf86659ae0b50f45d9415a048efba7 -->
## services/notification/test
> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/notification/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/notification/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET services/notification/test`


<!-- END_dfaf86659ae0b50f45d9415a048efba7 -->

<!-- START_519f4a45a1b870753aae225b19ef25c2 -->
## send Push Notification
Php function

> Example request:

```bash
curl -X GET \
    -G "http://localhost/services/notification/sendPushNotification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/notification/sendPushNotification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET services/notification/sendPushNotification`


<!-- END_519f4a45a1b870753aae225b19ef25c2 -->

<!-- START_31cb3cdeef9b4a6eac24bed12c3c24a5 -->
## Change Password

> Example request:

```bash
curl -X POST \
    "http://localhost/services/setting/ChangePassword?old_password=alias&new_password=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/services/setting/ChangePassword"
);

let params = {
    "old_password": "alias",
    "new_password": "qui",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": "success"
}
```

### HTTP Request
`POST services/setting/ChangePassword`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `old_password` |  required  | string
    `new_password` |  required  | string

<!-- END_31cb3cdeef9b4a6eac24bed12c3c24a5 -->

<!-- START_bbf2a76cb645abb305511de723d24080 -->
## upload_temp_files
> Example request:

```bash
curl -X POST \
    "http://localhost/upload_temp_files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/upload_temp_files"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST upload_temp_files`


<!-- END_bbf2a76cb645abb305511de723d24080 -->

<!-- START_b6f3340c9c4bbbdafb5a9f7f76d16910 -->
## delete_temp_file
> Example request:

```bash
curl -X POST \
    "http://localhost/delete_temp_file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/delete_temp_file"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST delete_temp_file`


<!-- END_b6f3340c9c4bbbdafb5a9f7f76d16910 -->

<!-- START_47a3b9da6d16f8ca7f1b87d288ede816 -->
## schedule/stop_twelve_session_hourly
> Example request:

```bash
curl -X GET \
    -G "http://localhost/schedule/stop_twelve_session_hourly" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/schedule/stop_twelve_session_hourly"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET schedule/stop_twelve_session_hourly`


<!-- END_47a3b9da6d16f8ca7f1b87d288ede816 -->

<!-- START_10e663a10277e6532b105562b110605b -->
## schedule/stop_eight_session_hourly
> Example request:

```bash
curl -X GET \
    -G "http://localhost/schedule/stop_eight_session_hourly" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/schedule/stop_eight_session_hourly"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET schedule/stop_eight_session_hourly`


<!-- END_10e663a10277e6532b105562b110605b -->


