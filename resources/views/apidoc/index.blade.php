<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.</p>
<!-- END_INFO -->
<h1>Activity Log</h1>
<p>APIs</p>
<!-- START_ddd004b115bd571f2f3e40bc1fac71e2 -->
<h2>Get Activity Log</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/activity_log/GetActivityLog?date=velit&amp;object=eaque&amp;user_id=occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/activity_log/GetActivityLog"
);

let params = {
    "date": "velit",
    "object": "eaque",
    "user_id": "occaecati",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">"Array of Activity"</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/activity_log/GetActivityLog</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>date</code></td>
<td>required</td>
<td>Activity Date.</td>
</tr>
<tr>
<td><code>object</code></td>
<td>required</td>
<td>Activity object.</td>
</tr>
<tr>
<td><code>user_id</code></td>
<td>required</td>
<td>.</td>
</tr>
</tbody>
</table>
<!-- END_ddd004b115bd571f2f3e40bc1fac71e2 -->
<h1>Actors Controller</h1>
<p>APIs</p>
<!-- START_2ebb999236370eda4982538fe7e6e5db -->
<h2>Not used yet</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET actors</code></p>
<!-- END_2ebb999236370eda4982538fe7e6e5db -->
<!-- START_c150b09eff2a66c88e3b9fda6e4ab3b3 -->
<h2>create</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/actors/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET actors/create</code></p>
<!-- END_c150b09eff2a66c88e3b9fda6e4ab3b3 -->
<!-- START_397da74f837f079f86fa2015dc887e67 -->
<h2>store</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST actors</code></p>
<!-- END_397da74f837f079f86fa2015dc887e67 -->
<!-- START_1f957c58c1e5aadc162b66f086ef673a -->
<h2>show</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET actors/{actor}</code></p>
<!-- END_1f957c58c1e5aadc162b66f086ef673a -->
<!-- START_772be97d0d66164083b2378e0db13894 -->
<h2>Not used yet</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/actors/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET actors/{actor}/edit</code></p>
<!-- END_772be97d0d66164083b2378e0db13894 -->
<!-- START_6a272adebd19eea2fdfeb4f744de16b6 -->
<h2>edit</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT actors/{actor}</code></p>
<p><code>PATCH actors/{actor}</code></p>
<!-- END_6a272adebd19eea2fdfeb4f744de16b6 -->
<!-- START_381b17180f7806f9c0ded114e93405e5 -->
<h2>update</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/actors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE actors/{actor}</code></p>
<!-- END_381b17180f7806f9c0ded114e93405e5 -->
<h1>Appointment Controller</h1>
<p>APIs</p>
<!-- START_123eb31e6bba2ef2884fb6d884ef33f8 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/appointments?filter[actor]=fugit&amp;filter[project]=repellat&amp;filter[sound_engineer]=hic&amp;filter[from]=cupiditate&amp;filter[to]=neque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET appointments</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>filter</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>filter.actor</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>filter.project</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>filter.sound_engineer</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>filter.from</code></td>
<td>optional</td>
<td>datetime</td>
</tr>
<tr>
<td><code>filter.to</code></td>
<td>optional</td>
<td>datetime</td>
</tr>
</tbody>
</table>
<!-- END_123eb31e6bba2ef2884fb6d884ef33f8 -->
<!-- START_fbed80fa46f5b0a94881170ca29e98d9 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/appointments?data[actors]=nemo&amp;data[sound_engineer_id]=totam&amp;data[studio_id]=sed&amp;data[time_in]=molestias&amp;data[time_out]=quia&amp;data[note]=quia&amp;data[episodes]=nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST appointments</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>data</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>data.actors</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>data.sound_engineer_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>data.studio_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>data.time_in</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>data.time_out</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>data.note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>data.episodes</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_fbed80fa46f5b0a94881170ca29e98d9 -->
<!-- START_fc029954aa241c8d432684f287137f29 -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/appointments/1?id=sed&amp;data[actors]=harum&amp;data[sound_engineer_id]=et&amp;data[studio_id]=ducimus&amp;data[time_in]=voluptas&amp;data[time_out]=nemo&amp;data[note]=omnis&amp;data[episodes]=dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "data": {
        "time_in_old": "2021-06-07 18:45:00",
        "time_in": "2021-06-07 01:20:00"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT appointments/{appointment}</code></p>
<p><code>PATCH appointments/{appointment}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>data</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>data.actors</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>data.sound_engineer_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>data.studio_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>data.time_in</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>data.time_out</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>data.note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>data.episodes</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_fc029954aa241c8d432684f287137f29 -->
<!-- START_1317b5a62359118aa18ca561e9439ebb -->
<h2>destroy</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/appointments/1?id=fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/appointments/1"
);

let params = {
    "id": "fugit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "data": {
        "deleted_by": 34,
        "deleted_at": "2021-06-07 04:17:30"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE appointments/{appointment}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_1317b5a62359118aa18ca561e9439ebb -->
<!-- START_a8b1af3ae26073098f0f25681be72546 -->
<h2>Add Appointment Note</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/appointment/AddAppointmentNote?data[appointment_id]=ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/appointment/AddAppointmentNote"
);

let params = {
    "data[appointment_id]": "ut",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/appointment/AddAppointmentNote</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>data</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>data.appointment_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a8b1af3ae26073098f0f25681be72546 -->
<h1>Assign Controller</h1>
<p>APIs</p>
<!-- START_a4d70ce9146eec678818077727aaeb18 -->
<h2>Get Assgin Episodes Jobs By Project</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/assgin/GetAssginEpisodesJobsByProject?reciver_team_id=non&amp;project_id=quod&amp;sender_team_id=incidunt&amp;deadline=adipisci&amp;assign_request_id=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/assgin/GetAssginEpisodesJobsByProject</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>reciver_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>sender_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>assign_request_id</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a4d70ce9146eec678818077727aaeb18 -->
<!-- START_86e8fb78346abb1644077feb1a6e262b -->
<h2>Send Assgin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/assgin/SendAssgin?deadline=non&amp;project_id=sit&amp;sender_team_id=dolor&amp;reciver_team_id=tempora&amp;episode_job[job_id]=cumque&amp;episode_job[episode_id]=numquam&amp;episode_job[exists]=commodi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/assgin/SendAssgin</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>sender_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>reciver_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>episode_job.job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.exists</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
</tbody>
</table>
<!-- END_86e8fb78346abb1644077feb1a6e262b -->
<!-- START_65cc87f7987588318b21bee73573bd7c -->
<h2>Update Assgin</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/assgin/UpdateAssgin?assign_enable=sunt&amp;update_all=et&amp;update_mode=dolor&amp;assign_request_id=minima&amp;deadline=autem&amp;old_deadline=voluptas&amp;project_id=perferendis&amp;team_id=dolorum&amp;episode_job[job_id]=dicta&amp;episode_job[episode_id]=ipsa&amp;episode_job[exists]=facilis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/assgin/UpdateAssgin</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>assign_enable</code></td>
<td>required</td>
<td>boolean</td>
</tr>
<tr>
<td><code>update_all</code></td>
<td>required</td>
<td>boolean</td>
</tr>
<tr>
<td><code>update_mode</code></td>
<td>required</td>
<td>boolean</td>
</tr>
<tr>
<td><code>assign_request_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>old_deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>episode_job.job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.exists</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
</tbody>
</table>
<!-- END_65cc87f7987588318b21bee73573bd7c -->
<!-- START_ce649b13a100889f4e8cce4aa13d6b40 -->
<h2>Get Assgin Request Details</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/assgin/GetAssginRequestDetails?assign_request_id=dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/assgin/GetAssginRequestDetails"
);

let params = {
    "assign_request_id": "dolores",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/assgin/GetAssginRequestDetails</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>assign_request_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_ce649b13a100889f4e8cce4aa13d6b40 -->
<h1>Auth Controller</h1>
<p>APIs</p>
<!-- START_a925a8d22b3615f12fca79456d286859 -->
<h2>Get a JWT via given credentials.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/login</code></p>
<!-- END_a925a8d22b3615f12fca79456d286859 -->
<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<h2>Log the user out (Invalidate the token).</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/logout</code></p>
<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->
<!-- START_994af8f47e3039ba6d6d67c09dd9e415 -->
<h2>Refresh a token.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/refresh</code></p>
<!-- END_994af8f47e3039ba6d6d67c09dd9e415 -->
<!-- START_a47210337df3b4ba0df697c115ba0c1e -->
<h2>Get the authenticated User.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/auth/me" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/auth/me</code></p>
<!-- END_a47210337df3b4ba0df697c115ba0c1e -->
<h1>Branches Controller</h1>
<p>APIs</p>
<!-- START_30a32610ed0972b79928f04cbc8e14e6 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET branches</code></p>
<!-- END_30a32610ed0972b79928f04cbc8e14e6 -->
<!-- START_147832de056deec3334a97de4cc2ac12 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/branches?country=dignissimos&amp;currency=quia&amp;flag=sapiente&amp;name=in&amp;symbol=quis&amp;timezone=voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST branches</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>country</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>currency</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>flag</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>symbol</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>timezone</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_147832de056deec3334a97de4cc2ac12 -->
<!-- START_b948913ab4e8234efb4d533b2396e31c -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/branches/1?id=ipsam&amp;country=tempora&amp;currency=voluptate&amp;flag=voluptatem&amp;name=omnis&amp;symbol=et&amp;timezone=numquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT branches/{branch}</code></p>
<p><code>PATCH branches/{branch}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>country</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>currency</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>flag</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>symbol</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>timezone</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_b948913ab4e8234efb4d533b2396e31c -->
<h1>Category Controller</h1>
<p>APIs</p>
<!-- START_edb5f044def0afc43b544cf9168a4a6c -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET category</code></p>
<!-- END_edb5f044def0afc43b544cf9168a4a6c -->
<!-- START_674bce8571c928c555c8c92ad291002a -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/category?name=et&amp;color=vitae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/category"
);

let params = {
    "name": "et",
    "color": "vitae",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST category</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_674bce8571c928c555c8c92ad291002a -->
<!-- START_eede06d7bce6b282dcc0b899b5ac2543 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/category/1?id=sit&amp;name=esse&amp;color=doloremque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/category/1"
);

let params = {
    "id": "sit",
    "name": "esse",
    "color": "doloremque",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "category": [
        {
            "color": "ff0000",
            "id": 1,
            "name": "drama"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT category/{category}</code></p>
<p><code>PATCH category/{category}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_eede06d7bce6b282dcc0b899b5ac2543 -->
<h1>Clients Controller</h1>
<p>APIs</p>
<!-- START_942d9ab834314b3b36a24456f71d4bbc -->
<h2>index</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET clients</code></p>
<!-- END_942d9ab834314b3b36a24456f71d4bbc -->
<!-- START_5b5075de0547ea16ec88a13f431ba8c0 -->
<h2>store</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST clients</code></p>
<!-- END_5b5075de0547ea16ec88a13f431ba8c0 -->
<!-- START_0dbe9d76b0fbe63f0f925953caee6e5f -->
<h2>edit</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/clients/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET clients/{client}/edit</code></p>
<!-- END_0dbe9d76b0fbe63f0f925953caee6e5f -->
<!-- START_f9561533de97700488e4efa1987acb50 -->
<h2>update</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT clients/{client}</code></p>
<p><code>PATCH clients/{client}</code></p>
<!-- END_f9561533de97700488e4efa1987acb50 -->
<!-- START_a25e9fc7ad9be0169e8a1877bb633bde -->
<h2>destroy</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE clients/{client}</code></p>
<!-- END_a25e9fc7ad9be0169e8a1877bb633bde -->
<h1>Dashboard Controller</h1>
<p>APIs</p>
<!-- START_3d549dc6e98c9295ce3cf09c560cbb87 -->
<h2>GetVacation</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/dashboard/GetVacation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/dashboard/GetVacation</code></p>
<!-- END_3d549dc6e98c9295ce3cf09c560cbb87 -->
<h1>EmployeeController</h1>
<p>APIs</p>
<!-- START_815be665d85e6cdc4f9dd2e4ed02b43a -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/employees?withTrashed=blanditiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/employees"
);

let params = {
    "withTrashed": "blanditiis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET employees</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>withTrashed</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_815be665d85e6cdc4f9dd2e4ed02b43a -->
<!-- START_9cc70b33d737e330f7bffac718b713a3 -->
<h2>store</h2>
<p>this Api other not required Params</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/employees?form_rand_id=ut&amp;social_connect=reiciendis&amp;positions=itaque&amp;files=ratione&amp;active=aut&amp;first_name=voluptatem&amp;last_name=maxime&amp;english_name=ea&amp;nationality=ut&amp;branch_id=aperiam&amp;timezone=sed&amp;daily_working_hour=illo&amp;username=temporibus&amp;password=qui&amp;confirm_password=quia&amp;mobile_number=praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Added successfully",
    "user_id": 882,
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST employees</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>form_rand_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>social_connect</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>positions</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>files</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>active</code></td>
<td>required</td>
<td>boolean</td>
</tr>
<tr>
<td><code>first_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>last_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>english_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>nationality</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>branch_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>timezone</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>daily_working_hour</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>username</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>confirm_password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>mobile_number</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_9cc70b33d737e330f7bffac718b713a3 -->
<!-- START_e6358a0946e3afd44725f739c4701f7c -->
<h2>edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/employees/1/edit?employee_id=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/employees/1/edit"
);

let params = {
    "employee_id": "tenetur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET employees/{employee}/edit</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_e6358a0946e3afd44725f739c4701f7c -->
<!-- START_f8822467a2c47bdd2d1757a482aefc44 -->
<h2>update</h2>
<p>this Api other not required Params</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/employees/1?id=ut&amp;form_rand_id=voluptatem&amp;social_connect=labore&amp;positions=qui&amp;files=amet&amp;active=et&amp;first_name=sunt&amp;last_name=ut&amp;english_name=beatae&amp;nationality=perferendis&amp;branch_id=est&amp;timezone=odit&amp;daily_working_hour=occaecati&amp;username=nihil&amp;password=fugiat&amp;confirm_password=sequi&amp;mobile_number=fugiat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT employees/{employee}</code></p>
<p><code>PATCH employees/{employee}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>form_rand_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>social_connect</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>positions</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>files</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>active</code></td>
<td>required</td>
<td>boolean</td>
</tr>
<tr>
<td><code>first_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>last_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>english_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>nationality</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>branch_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>timezone</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>daily_working_hour</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>username</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>confirm_password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>mobile_number</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_f8822467a2c47bdd2d1757a482aefc44 -->
<!-- START_06f190999a81ae230946d3308f2eaee6 -->
<h2>Update Contract</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/hr/employee/UpdateContract?id=quia&amp;contract_end_in=nihil&amp;contract_start_in=sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/hr/employee/UpdateContract"
);

let params = {
    "id": "quia",
    "contract_end_in": "nihil",
    "contract_start_in": "sit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST hr/employee/UpdateContract</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>contract_end_in</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>contract_start_in</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_06f190999a81ae230946d3308f2eaee6 -->
<!-- START_49dfa36a4596d841fc9879d3c8c0ab2a -->
<h2>ChangePassword</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/hr/employee/ChangePassword?new_confirm_password=aut&amp;new_password=vitae&amp;old_password=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/hr/employee/ChangePassword"
);

let params = {
    "new_confirm_password": "aut",
    "new_password": "vitae",
    "old_password": "autem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST hr/employee/ChangePassword</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>new_confirm_password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>new_password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>old_password</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_49dfa36a4596d841fc9879d3c8c0ab2a -->
<h1>EmployeeTrackerController</h1>
<p>APIs</p>
<!-- START_86e05d19a0a414cf432ca3f31490e83f -->
<h2>Get Screenshot</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/tracker/get-screen-tracker?date=incidunt&amp;device_id=numquam&amp;employee_id=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/tracker/get-screen-tracker"
);

let params = {
    "date": "incidunt",
    "device_id": "numquam",
    "employee_id": "velit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/tracker/get-screen-tracker</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>date</code></td>
<td>required</td>
<td>Date of screens.</td>
</tr>
<tr>
<td><code>device_id</code></td>
<td>required</td>
<td>Device id.</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>Employee id</td>
</tr>
</tbody>
</table>
<!-- END_86e05d19a0a414cf432ca3f31490e83f -->
<!-- START_fd062e2233eb25fb852c2142a2a2bb6f -->
<h2>Update Tracker</h2>
<p>use to screen now btn or update time between screen shot
screen_now: &quot;now&quot; when click screen now btn
schedule_screen: int (seconds) when change time</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/tracker/update-employee-tracker?data=explicabo&amp;device_id=beatae&amp;employee_id=sed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/tracker/update-employee-tracker"
);

let params = {
    "data": "explicabo",
    "device_id": "beatae",
    "employee_id": "sed",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/tracker/update-employee-tracker</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>data</code></td>
<td>required</td>
<td>{screen_now: &quot;now&quot;</td>
<td>schedule_screen: int (seconds)}.</td>
</tr>
<tr>
<td><code>device_id</code></td>
<td>required</td>
<td>Device id.</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>Employee id</td>
</tr>
</tbody>
</table>
<!-- END_fd062e2233eb25fb852c2142a2a2bb6f -->
<!-- START_6e3f7ad3139ea816abf9e6b6b4db5797 -->
<h2>Get Employee Device</h2>
<p>Get Employee Device by employee id</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/tracker/get-employee-device?employee_id=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/tracker/get-employee-device"
);

let params = {
    "employee_id": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/tracker/get-employee-device</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>{employee_id: 1}.</td>
</tr>
</tbody>
</table>
<!-- END_6e3f7ad3139ea816abf9e6b6b4db5797 -->
<h1>EpisodesController</h1>
<p>APIs</p>
<!-- START_9343b8c3f9b8c80471090a2c01d0771b -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/episodes?project_id=similique&amp;sender_team_id=ducimus&amp;episodes=ut&amp;deadline=temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/episodes"
);

let params = {
    "project_id": "similique",
    "sender_team_id": "ducimus",
    "episodes": "ut",
    "deadline": "temporibus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Added successfully"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST episodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>sender_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episodes</code></td>
<td>required</td>
<td>intArray</td>
</tr>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_9343b8c3f9b8c80471090a2c01d0771b -->
<!-- START_4c35c565569b8f8ee4a1d7581374d4d1 -->
<h2>show</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/episodes/1?id=quod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/episodes/1"
);

let params = {
    "id": "quod",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "episode": {
        "episode_title": "Leets",
        "project_title": "21057 - Leets",
        "episode_number": "001",
        "id": 6185,
        "active": 0,
        "duration": null,
        "schedule": null
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET episodes/{episode}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_4c35c565569b8f8ee4a1d7581374d4d1 -->
<!-- START_9f731ec1e76c246a9bfe88feeda450d7 -->
<h2>Toggle Episode Active</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/project/ToggleEpisodeActive?episode_id=eius&amp;projectsId=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/project/ToggleEpisodeActive"
);

let params = {
    "episode_id": "eius",
    "projectsId": "sunt",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/project/ToggleEpisodeActive</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>projectsId</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_9f731ec1e76c246a9bfe88feeda450d7 -->
<!-- START_a7e8dd5ddcb596c9abf8b048f0b7f68b -->
<h2>Update Episodes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/episodes/UpdateEpisodes?id=eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/episodes/UpdateEpisodes"
);

let params = {
    "id": "eligendi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/episodes/UpdateEpisodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a7e8dd5ddcb596c9abf8b048f0b7f68b -->
<!-- START_48fd386629bb08c390b6321011cd58f9 -->
<h2>Delete Episodes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/episodes/DeleteEpisodes?id=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/episodes/DeleteEpisodes"
);

let params = {
    "id": "et",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/episodes/DeleteEpisodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_48fd386629bb08c390b6321011cd58f9 -->
<h1>HomeController</h1>
<p>APIs</p>
<!-- START_7d8d391731a1f767924e0c6baede20a0 -->
<h2>index</h2>
<p>Show Index Page</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET {path?}</code></p>
<!-- END_7d8d391731a1f767924e0c6baede20a0 -->
<h1>Jobs Controller</h1>
<p>APIs</p>
<!-- START_3b175ebfb4fc164502f7ce21d35d70c0 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET jobs</code></p>
<!-- END_3b175ebfb4fc164502f7ce21d35d70c0 -->
<!-- START_02b6e7d7eec275039b3abf4aa068f039 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/jobs?name=minus&amp;type=totam&amp;multi_episode=quas&amp;position_id=eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/jobs"
);

let params = {
    "name": "minus",
    "type": "totam",
    "multi_episode": "quas",
    "position_id": "eum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST jobs</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>multi_episode</code></td>
<td>required</td>
<td>tinyint 4</td>
</tr>
<tr>
<td><code>position_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_02b6e7d7eec275039b3abf4aa068f039 -->
<!-- START_da33dbf4eade676a0a827bcaf1b1cb17 -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/jobs/1?id=porro&amp;name=fugit&amp;type=ullam&amp;multi_episode=quod&amp;position_id=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT jobs/{job}</code></p>
<p><code>PATCH jobs/{job}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>multi_episode</code></td>
<td>required</td>
<td>tinyint 4</td>
</tr>
<tr>
<td><code>position_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_da33dbf4eade676a0a827bcaf1b1cb17 -->
<h1>List Controller</h1>
<p>APIs</p>
<!-- START_0065aad8d90fe2c72aea1078dcab15ea -->
<h2>projects</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/projects</code></p>
<!-- END_0065aad8d90fe2c72aea1078dcab15ea -->
<!-- START_ae2f72f230575986a9b7d7df6506c6bb -->
<h2>episodes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/episodes?parent=quidem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/episodes"
);

let params = {
    "parent": "quidem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "episode_number": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/episodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>parent</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_ae2f72f230575986a9b7d7df6506c6bb -->
<!-- START_6fe5deefc73177e72a1f784febcd1e8f -->
<h2>episodesByJobs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/episodesByJobs?group=et&amp;jobs=dolor&amp;project_id=aut&amp;appendEpisodes=praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/episodesByJobs"
);

let params = {
    "group": "et",
    "jobs": "dolor",
    "project_id": "aut",
    "appendEpisodes": "praesentium",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/episodesByJobs</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>appendEpisodes</code></td>
<td>optional</td>
<td>intArray</td>
</tr>
</tbody>
</table>
<!-- END_6fe5deefc73177e72a1f784febcd1e8f -->
<!-- START_dcd9d85ea520ab7b698015cdf88bd7ec -->
<h2>key</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/key?parent=rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/key"
);

let params = {
    "parent": "rerum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/key</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>parent</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_dcd9d85ea520ab7b698015cdf88bd7ec -->
<!-- START_ae587ddf786e59eb1ea4b15772b3e3b7 -->
<h2>Get Attribute Value</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/GetAttributeValue?attributes_list=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/GetAttributeValue"
);

let params = {
    "attributes_list": "illo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "id": 1,
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/GetAttributeValue</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>attributes_list</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_ae587ddf786e59eb1ea4b15772b3e3b7 -->
<!-- START_cb6a777ff232db56ad4fed7daee9227b -->
<h2>lists</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/lists?name=molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/lists"
);

let params = {
    "name": "molestiae",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "key_array": "name",
            "name": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/lists</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_cb6a777ff232db56ad4fed7daee9227b -->
<!-- START_e393043b20047f582c6de1356f9af257 -->
<h2>keyArray</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/keyArray?parent=voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/keyArray"
);

let params = {
    "parent": "voluptas",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "key_array": "name",
            "name": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/keyArray</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>parent</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_e393043b20047f582c6de1356f9af257 -->
<!-- START_a2d6a982a81699af6e0ee45e525128b3 -->
<h2>employees</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "user_id": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/employees</code></p>
<!-- END_a2d6a982a81699af6e0ee45e525128b3 -->
<!-- START_30b3c047bf27d3f029d39319ab92ded4 -->
<h2>team_recurcive_employees</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/team_recurcive_employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "user_id": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/team_recurcive_employees</code></p>
<!-- END_30b3c047bf27d3f029d39319ab92ded4 -->
<!-- START_11252728b72dc01ba9fa9a3872f5e79c -->
<h2>users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/users</code></p>
<!-- END_11252728b72dc01ba9fa9a3872f5e79c -->
<!-- START_78f6797d1a43d0260d1ea18a87146a13 -->
<h2>employeePositions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/employeePositions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/employeePositions</code></p>
<!-- END_78f6797d1a43d0260d1ea18a87146a13 -->
<!-- START_cbedf5634ea072a1372fb883d829a391 -->
<h2>positions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/positions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/positions</code></p>
<!-- END_cbedf5634ea072a1372fb883d829a391 -->
<!-- START_6f004b134a35426a7fa7bf7f2441f854 -->
<h2>studios</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/studios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "color": "#fff",
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/studios</code></p>
<!-- END_6f004b134a35426a7fa7bf7f2441f854 -->
<!-- START_a49692d297dd4870b89a22f97afe3367 -->
<h2>Sound Engineer</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/sound-engineer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/sound-engineer</code></p>
<!-- END_a49692d297dd4870b89a22f97afe3367 -->
<!-- START_89dc33401da306b4de82e51b3caf46fc -->
<h2>actors</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/actors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/actors</code></p>
<!-- END_89dc33401da306b4de82e51b3caf46fc -->
<!-- START_d8f33a5f08059e7b46593d6353afee36 -->
<h2>task_status</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/task_status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/task_status</code></p>
<!-- END_d8f33a5f08059e7b46593d6353afee36 -->
<!-- START_6164e1831547f7943c99d0ef5808179d -->
<h2>clients</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/clients</code></p>
<!-- END_6164e1831547f7943c99d0ef5808179d -->
<!-- START_5208d23344d28863cadb5cc1fd436828 -->
<h2>Employee Tasks</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my-tasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        "xx",
        "yy"
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my-tasks</code></p>
<!-- END_5208d23344d28863cadb5cc1fd436828 -->
<!-- START_540e0b72e51efd08666a5173349297de -->
<h2>roles</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/roles</code></p>
<!-- END_540e0b72e51efd08666a5173349297de -->
<!-- START_1c5176b10f4f97520bfd7aa397526f5a -->
<h2>jobs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "type": "type",
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/jobs</code></p>
<!-- END_1c5176b10f4f97520bfd7aa397526f5a -->
<!-- START_db18e901e81a97450bede6fbfc76d24c -->
<h2>jobs_by_position</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/jobs_by_position" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "position_id": 1,
            "position_name": "position_name",
            "type": "type",
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/jobs_by_position</code></p>
<!-- END_db18e901e81a97450bede6fbfc76d24c -->
<!-- START_683ba382e17f8c844181ea596ef31eb9 -->
<h2>my_teams_jobs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_teams_jobs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_teams_jobs</code></p>
<!-- END_683ba382e17f8c844181ea596ef31eb9 -->
<!-- START_07a870a0e385d0fb109c82eb73fc89c3 -->
<h2>jobs_by_team</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/jobs_by_team?group=voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/jobs_by_team"
);

let params = {
    "group": "voluptatem",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/jobs_by_team</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_07a870a0e385d0fb109c82eb73fc89c3 -->
<!-- START_19eae22aadc6dbbfae4300d90f284715 -->
<h2>team_jobs_recursive</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/team_jobs_recursive?group=sed&amp;employees=corporis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/team_jobs_recursive"
);

let params = {
    "group": "sed",
    "employees": "corporis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/team_jobs_recursive</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>employees</code></td>
<td>optional</td>
<td>intArray</td>
</tr>
</tbody>
</table>
<!-- END_19eae22aadc6dbbfae4300d90f284715 -->
<!-- START_d95b59913bf66487f16115559a948a14 -->
<h2>task_deadline_and_employee</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/task_deadline_and_employee?episode_id=at&amp;jobs=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/task_deadline_and_employee"
);

let params = {
    "episode_id": "at",
    "jobs": "tenetur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/task_deadline_and_employee</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_d95b59913bf66487f16115559a948a14 -->
<!-- START_5aa4338aa7d2f9d663593bd17dfb4dd1 -->
<h2>my_job</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_job?employee_id=et&amp;type=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/my_job"
);

let params = {
    "employee_id": "et",
    "type": "sunt",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_job</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>type</code></td>
<td>optional</td>
<td>stringArray</td>
</tr>
</tbody>
</table>
<!-- END_5aa4338aa7d2f9d663593bd17dfb4dd1 -->
<!-- START_c0e6fa03e2a032be5771754766e552ee -->
<h2>team_employees_position</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/team_employees_position?group=veniam&amp;jobs=vel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/team_employees_position"
);

let params = {
    "group": "veniam",
    "jobs": "vel",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/team_employees_position</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_c0e6fa03e2a032be5771754766e552ee -->
<!-- START_e45349c2845ad1dec17ec44fbf4eff54 -->
<h2>employees_by_team</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/employees_by_team?group=quod&amp;jobs=incidunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/employees_by_team"
);

let params = {
    "group": "quod",
    "jobs": "incidunt",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/employees_by_team</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_e45349c2845ad1dec17ec44fbf4eff54 -->
<!-- START_1ad322ca7659eb8ed719f9cbb30d83a2 -->
<h2>branches</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/branches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/branches</code></p>
<!-- END_1ad322ca7659eb8ed719f9cbb30d83a2 -->
<!-- START_a636655e4891ac9b590ed2fd8bf8a3fb -->
<h2>trackerEmployees</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/trackerEmployees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "user_id": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/trackerEmployees</code></p>
<!-- END_a636655e4891ac9b590ed2fd8bf8a3fb -->
<!-- START_6ce0355f15d711d69a1d4128d2d4eb8e -->
<h2>transferEmployees</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/transferEmployees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/transferEmployees</code></p>
<!-- END_6ce0355f15d711d69a1d4128d2d4eb8e -->
<!-- START_0e1bf3373dccb69f99c472119d7266d1 -->
<h2>category</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "color": "#fff",
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/category</code></p>
<!-- END_0e1bf3373dccb69f99c472119d7266d1 -->
<!-- START_73348d38f008a4884f7b209aabbd7e2e -->
<h2>status</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "choice"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/status</code></p>
<!-- END_73348d38f008a4884f7b209aabbd7e2e -->
<!-- START_a0406e4828bbdcb6e42b7a84d81fb5ec -->
<h2>status_with_count</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/status_with_count?group=omnis&amp;jobs=et&amp;status=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/status_with_count"
);

let params = {
    "group": "omnis",
    "jobs": "et",
    "status": "facere",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/status_with_count</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>status</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a0406e4828bbdcb6e42b7a84d81fb5ec -->
<!-- START_5fa06b383264ee75ccb54212ab41d8a5 -->
<h2>supervisor_employees</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/supervisor_employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/supervisor_employees</code></p>
<!-- END_5fa06b383264ee75ccb54212ab41d8a5 -->
<!-- START_f673408f15f9aa649203319a406cb59e -->
<h2>my_team_recursive</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_team_recursive" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 11,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_team_recursive</code></p>
<!-- END_f673408f15f9aa649203319a406cb59e -->
<!-- START_b7a8a2848c35b368cb31882df0e7868b -->
<h2>my_team_child</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_team_child?group=facere" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/my_team_child"
);

let params = {
    "group": "facere",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_team_child</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>optional</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_b7a8a2848c35b368cb31882df0e7868b -->
<!-- START_961a577569f9ecb4deee9e88ff53ac61 -->
<h2>my_team</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_team?permissions=dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/my_team"
);

let params = {
    "permissions": "dolores",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_team</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>permissions</code></td>
<td>optional</td>
<td>stringArray</td>
</tr>
</tbody>
</table>
<!-- END_961a577569f9ecb4deee9e88ff53ac61 -->
<!-- START_0397d4b68cb6e400836b686e3dd05404 -->
<h2>next_step_jobs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/next_step_jobs?episode_id=dolore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/web-api/list/next_step_jobs"
);

let params = {
    "episode_id": "dolore",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "text": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/next_step_jobs</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int or intArray</td>
</tr>
</tbody>
</table>
<!-- END_0397d4b68cb6e400836b686e3dd05404 -->
<!-- START_dbf6df7c30001356df5b0ad0101867fb -->
<h2>my_projects</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/web-api/list/my_projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "value": 1,
            "project_id": 1,
            "namr": "name"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET web-api/list/my_projects</code></p>
<!-- END_dbf6df7c30001356df5b0ad0101867fb -->
<h1>Live Session Controller</h1>
<p>APIs</p>
<!-- START_6781b3e7d30ff72ce632c121661b7a81 -->
<h2>Get Live Work Sessions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/live_session/GetLiveWorkSessions?deadline=sequi&amp;project_id=qui&amp;sender_team_id=sed&amp;reciver_team_id=laudantium&amp;episode_job[job_id]=a&amp;episode_job[episode_id]=totam&amp;episode_job[exists]=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/live_session/GetLiveWorkSessions</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>sender_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>reciver_team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>episode_job.job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>episode_job.exists</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
</tbody>
</table>
<!-- END_6781b3e7d30ff72ce632c121661b7a81 -->
<h1>My Task Controller</h1>
<p>APIs</p>
<!-- START_f0239f4c6ec1c2266623baaacfc9e0df -->
<h2>Get Tasks</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetTasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetTasks</code></p>
<!-- END_f0239f4c6ec1c2266623baaacfc9e0df -->
<!-- START_b3030bcb06b1ddfc9ce222f15963dfde -->
<h2>Get Tasks Details</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetTasksDetails?task_id=natus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/work_session/GetTasksDetails"
);

let params = {
    "task_id": "natus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetTasksDetails</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_b3030bcb06b1ddfc9ce222f15963dfde -->
<!-- START_93c58f0d65a3c79fa1c117cfd0f954e6 -->
<h2>Get Production Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetProductionTask" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetProductionTask</code></p>
<!-- END_93c58f0d65a3c79fa1c117cfd0f954e6 -->
<!-- START_400c5e116be46d4f78da3c82f555b73f -->
<h2>Get Running Tasks</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetRunningTasks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetRunningTasks</code></p>
<!-- END_400c5e116be46d4f78da3c82f555b73f -->
<!-- START_a88fdfef0a96b702150bc322cc228ddd -->
<h2>Get Administative Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetAdministativeTask" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetAdministativeTask</code></p>
<!-- END_a88fdfef0a96b702150bc322cc228ddd -->
<h1>PositionsController</h1>
<p>APIs</p>
<!-- START_d98f727f9d54f8e6627f9461578d35a1 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/positions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET positions</code></p>
<!-- END_d98f727f9d54f8e6627f9461578d35a1 -->
<!-- START_2f47cb9e927168fda175d8005d33eeb1 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/positions?name=quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/positions"
);

let params = {
    "name": "quo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST positions</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_2f47cb9e927168fda175d8005d33eeb1 -->
<!-- START_ff120c12dff5c0c960f4b400f4428470 -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/positions/1?id=autem&amp;name=harum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/positions/1"
);

let params = {
    "id": "autem",
    "name": "harum",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "positions": [
        {
            "id": 1,
            "name": "CEO"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT positions/{position}</code></p>
<p><code>PATCH positions/{position}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_ff120c12dff5c0c960f4b400f4428470 -->
<h1>Projects Controller</h1>
<p>APIs</p>
<!-- START_ba05cb3a11667fbd2926fcfc72905d8a -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/projects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET projects</code></p>
<!-- END_ba05cb3a11667fbd2926fcfc72905d8a -->
<!-- START_6457c064807333898638aaa8f41ba1ab -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/projects?project_id=commodi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/projects"
);

let params = {
    "project_id": "commodi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "project_id": 5,
    "message": "success_add"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST projects</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_6457c064807333898638aaa8f41ba1ab -->
<!-- START_c67226e65a6121c577cf821d15168dc8 -->
<h2>edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/projects/1/edit?project_id=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/projects/1/edit"
);

let params = {
    "project_id": "eos",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET projects/{project}/edit</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_c67226e65a6121c577cf821d15168dc8 -->
<!-- START_d0e574164f37de9866bf98e489a3b5d0 -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/projects/1?project_id=in&amp;allData=eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/projects/1"
);

let params = {
    "project_id": "in",
    "allData": "eligendi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Added successfully"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT projects/{project}</code></p>
<p><code>PATCH projects/{project}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>allData</code></td>
<td>required</td>
<td>array</td>
</tr>
</tbody>
</table>
<!-- END_d0e574164f37de9866bf98e489a3b5d0 -->
<!-- START_dcf33fb53ed4bbdd340a151aca24d3ae -->
<h2>Get Projects</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/project/GetProjects" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/project/GetProjects</code></p>
<!-- END_dcf33fb53ed4bbdd340a151aca24d3ae -->
<!-- START_76087c96c334720ea3b2405ff0a86215 -->
<h2>Get Episodes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/project/GetEpisodes?project_id=ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/project/GetEpisodes"
);

let params = {
    "project_id": "ab",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "episodes": []
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/project/GetEpisodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_76087c96c334720ea3b2405ff0a86215 -->
<!-- START_0e09aa99378036f155d486cd49ae775b -->
<h2>Get Specific Episodes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/project/GetSpecificEpisodes?project_id=placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/project/GetSpecificEpisodes"
);

let params = {
    "project_id": "placeat",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/project/GetSpecificEpisodes</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_0e09aa99378036f155d486cd49ae775b -->
<!-- START_a7b7d55046932332394dd0b298036464 -->
<h2>Get Project Episode Count</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/project/GetProjectEpisodeCount?project_id=perferendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/project/GetProjectEpisodeCount"
);

let params = {
    "project_id": "perferendis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/project/GetProjectEpisodeCount</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a7b7d55046932332394dd0b298036464 -->
<!-- START_c9484901a1444d1f12c901ab64160446 -->
<h2>Update Table</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/project/UpdateTable?project_id=nisi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/project/UpdateTable"
);

let params = {
    "project_id": "nisi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "success_add"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/project/UpdateTable</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_c9484901a1444d1f12c901ab64160446 -->
<h1>ReportController</h1>
<p>APIs</p>
<!-- START_301c9e985391a72d632f7aba195e887e -->
<h2>Get Monthly Report</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/hr/report/GetMonthlyReport?employeeId=dolores&amp;start=sit&amp;end=hic" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/hr/report/GetMonthlyReport"
);

let params = {
    "employeeId": "dolores",
    "start": "sit",
    "end": "hic",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET hr/report/GetMonthlyReport</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employeeId</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_301c9e985391a72d632f7aba195e887e -->
<!-- START_132fcc41788815b4396ad1758fdafa50 -->
<h2>Get Activity Report</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/hr/report/GetActivityReport?employeeId=omnis&amp;start=autem&amp;end=cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/hr/report/GetActivityReport"
);

let params = {
    "employeeId": "omnis",
    "start": "autem",
    "end": "cumque",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET hr/report/GetActivityReport</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employeeId</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_132fcc41788815b4396ad1758fdafa50 -->
<h1>ServiceController</h1>
<p>APIs</p>
<!-- START_66fb001578ed3d8784430bb807abfd22 -->
<h2>api/service/GetServerTime</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/service/GetServerTime" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "datetime": "2021-06-09 04:41:34",
    "date": "2021-06-09",
    "time": "04:41:34"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/service/GetServerTime</code></p>
<!-- END_66fb001578ed3d8784430bb807abfd22 -->
<!-- START_179a69c0e1de921d94fde30766678839 -->
<h2>api/logger/UploadData</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/logger/UploadData" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/logger/UploadData</code></p>
<!-- END_179a69c0e1de921d94fde30766678839 -->
<h1>Session History Controller</h1>
<p>APIs</p>
<!-- START_adcaf628ad68a9a158e2f9908bd5be95 -->
<h2>Get First Table</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/session_history/GetFirstTable?start=non&amp;end=temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/session_history/GetFirstTable"
);

let params = {
    "start": "non",
    "end": "temporibus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/session_history/GetFirstTable</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_adcaf628ad68a9a158e2f9908bd5be95 -->
<!-- START_b907570d5f0df785a4a2324c2911782d -->
<h2>Get Second Table</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/session_history/GetSecondTable?dates=ipsa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/session_history/GetSecondTable"
);

let params = {
    "dates": "ipsa",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/session_history/GetSecondTable</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>dates</code></td>
<td>required</td>
<td>Array of date</td>
</tr>
</tbody>
</table>
<!-- END_b907570d5f0df785a4a2324c2911782d -->
<!-- START_aa08073623e373b3763723260b32ed47 -->
<h2>Get Thrid Table</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/session_history/GetThridTable?selected_data=sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/session_history/GetThridTable"
);

let params = {
    "selected_data": "sunt",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/session_history/GetThridTable</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>selected_data</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_aa08073623e373b3763723260b32ed47 -->
<!-- START_677eeea7820983fff5378af0db65dac8 -->
<h2>Get Task Detail</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/session_history/GetTaskDetail?task_id=voluptatem&amp;task_type=nisi&amp;sessionable_type=nisi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/session_history/GetTaskDetail"
);

let params = {
    "task_id": "voluptatem",
    "task_type": "nisi",
    "sessionable_type": "nisi",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/session_history/GetTaskDetail</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>task_type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>sessionable_type</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_677eeea7820983fff5378af0db65dac8 -->
<h1>SessionsMangeController</h1>
<p>Out Dated</p>
<!-- START_cd3af09e3fb7663fce090374be076359 -->
<h2>Update Tracker</h2>
<p>Out Dated
This for old work sessions</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/sessions_mange/GetSessionsByEmp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/sessions_mange/GetSessionsByEmp</code></p>
<!-- END_cd3af09e3fb7663fce090374be076359 -->
<!-- START_afbf0ec3519a37fd4d31444f49f2cf49 -->
<h2>Update Tracker</h2>
<p>Out Dated
This for old work sessions</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/sessions_mange/UpdateSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/sessions_mange/UpdateSessionsWork</code></p>
<!-- END_afbf0ec3519a37fd4d31444f49f2cf49 -->
<!-- START_7194c4359b828e13fe15db357e92cd87 -->
<h2>Update Tracker</h2>
<p>Out Dated
This for old work sessions</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/sessions_mange/AddSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/sessions_mange/AddSessionsWork</code></p>
<!-- END_7194c4359b828e13fe15db357e92cd87 -->
<!-- START_1da3376bb202bbe37d2ed2f6b107f033 -->
<h2>Update Tracker</h2>
<p>Out Dated
This for old work sessions</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/sessions_mange/DeleteSessionsWork" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/sessions_mange/DeleteSessionsWork</code></p>
<!-- END_1da3376bb202bbe37d2ed2f6b107f033 -->
<h1>Sessions Work Controller</h1>
<p>APIs</p>
<!-- START_4f150b556cbede4073fb6e82ebdaa876 -->
<h2>GetOldSessionsWork</h2>
<p>Old function not used</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-bydate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/sessions-work/get-employee-session-work-bydate</code></p>
<!-- END_4f150b556cbede4073fb6e82ebdaa876 -->
<!-- START_c6629827b017dba882dd017ce7e3bd5e -->
<h2>GetOldSessionsWork</h2>
<p>Old function not used</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-date-detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/sessions-work/get-employee-session-work-date-detail</code></p>
<!-- END_c6629827b017dba882dd017ce7e3bd5e -->
<!-- START_a27d5d689a62b08b396ed8cf3368a2e0 -->
<h2>GetOldSessionsWork</h2>
<p>Old function not used</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/sessions-work/get-employee-session-work-episode-detail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/sessions-work/get-employee-session-work-episode-detail</code></p>
<!-- END_a27d5d689a62b08b396ed8cf3368a2e0 -->
<h1>Studio Controller</h1>
<p>APIs</p>
<!-- START_92401cf7f8b19afdb37616d620b2dd78 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/studios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET studios</code></p>
<!-- END_92401cf7f8b19afdb37616d620b2dd78 -->
<!-- START_c3ecfdb516fc7d21ccadcaa821cab9f3 -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/studios?brnach_id=velit&amp;color=libero&amp;name=repudiandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/studios"
);

let params = {
    "brnach_id": "velit",
    "color": "libero",
    "name": "repudiandae",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST studios</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>brnach_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_c3ecfdb516fc7d21ccadcaa821cab9f3 -->
<!-- START_5700b7233124f399c4cfca980159b613 -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/studios/1?id=quidem&amp;brnach_id=provident&amp;color=exercitationem&amp;name=aperiam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/studios/1"
);

let params = {
    "id": "quidem",
    "brnach_id": "provident",
    "color": "exercitationem",
    "name": "aperiam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT studios/{studio}</code></p>
<p><code>PATCH studios/{studio}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>brnach_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_5700b7233124f399c4cfca980159b613 -->
<h1>System Key Controller</h1>
<p>APIs</p>
<!-- START_f7b4276d1e9e18ffc5a9659a2e33767a -->
<h2>Load Lists Name</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/systemkey/load_lists_name" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "project_id": 5,
    "list_names": [
        "social_program",
        "file_type",
        "branchs"
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/systemkey/load_lists_name</code></p>
<!-- END_f7b4276d1e9e18ffc5a9659a2e33767a -->
<!-- START_4f56a16eb3212f9116df225b4f64a587 -->
<h2>Load List</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/systemkey/load_list?name=ipsa" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/systemkey/load_list"
);

let params = {
    "name": "ipsa",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "ListArray": [
        "BBAC",
        "Audi",
        "QNB",
        "Alexandria"
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/systemkey/load_list</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_4f56a16eb3212f9116df225b4f64a587 -->
<!-- START_a5654670461c71d47cf18639e86a7360 -->
<h2>Add Item List</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/systemkey/add_item_list?item_array=voluptas&amp;item_name=quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/systemkey/add_item_list"
);

let params = {
    "item_array": "voluptas",
    "item_name": "quia",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Added successfully"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/systemkey/add_item_list</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>item_array</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>item_name</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_a5654670461c71d47cf18639e86a7360 -->
<!-- START_061c176a33fe9c63dd432583c74d1937 -->
<h2>Delete Key Item</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/systemkey/delete_item_list?items_name=harum&amp;item_array=quos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/systemkey/delete_item_list"
);

let params = {
    "items_name": "harum",
    "item_array": "quos",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "message": "Deleted successfully"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/systemkey/delete_item_list</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>items_name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>item_array</code></td>
<td>required</td>
<td>stringArray</td>
</tr>
</tbody>
</table>
<!-- END_061c176a33fe9c63dd432583c74d1937 -->
<h1>Task Controller</h1>
<p>APIs</p>
<!-- START_f0fb4a8ce65d63b1a29d8566e4553ecf -->
<h2>Get Episode Available Job With Require</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task/GetEpisodeAvailableJob?episode_id=assumenda&amp;group=architecto&amp;allJobs=qui&amp;appendJobs=sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/GetEpisodeAvailableJob"
);

let params = {
    "episode_id": "assumenda",
    "group": "architecto",
    "allJobs": "qui",
    "appendJobs": "sint",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success",
    "data": [
        {
            "value": 109,
            "text": "TazmoCue",
            "multi_episode": 0
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task/GetEpisodeAvailableJob</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>allJobs</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
<tr>
<td><code>appendJobs</code></td>
<td>optional</td>
<td>IntArray</td>
</tr>
</tbody>
</table>
<!-- END_f0fb4a8ce65d63b1a29d8566e4553ecf -->
<!-- START_07377128650f294fe60e0ebc1ffd81a3 -->
<h2>Send Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/SendTask?deadline=quae&amp;episode_deadline=dolores&amp;employee_position_id=fuga&amp;info=dolores&amp;jobs=ullam&amp;episodes=laboriosam&amp;team_id=est&amp;note=cumque&amp;reason_skip_deadline=eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/SendTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>episode_deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>employee_position_id</code></td>
<td>required</td>
<td>JsonObject</td>
</tr>
<tr>
<td><code>info</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>episodes</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>reason_skip_deadline</code></td>
<td>optional</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_07377128650f294fe60e0ebc1ffd81a3 -->
<!-- START_cf86d763a082dd569d58de59e556afca -->
<h2>Edit Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/EditTask?deadline=nam&amp;episode_deadline=exercitationem&amp;employee_position_id=qui&amp;info=mollitia&amp;jobs=autem&amp;episodes=est&amp;team_id=minima&amp;project_id=vitae&amp;state_id=reiciendis&amp;task_id=quae&amp;note=dolorem&amp;reason_skip_deadline=sit&amp;editable=ullam&amp;multiEpisode=occaecati" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/EditTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>episode_deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>employee_position_id</code></td>
<td>required</td>
<td>JsonObject</td>
</tr>
<tr>
<td><code>info</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>required</td>
<td>Array</td>
</tr>
<tr>
<td><code>episodes</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>team_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>state_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>reason_skip_deadline</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>editable</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
<tr>
<td><code>multiEpisode</code></td>
<td>optional</td>
<td>boolean</td>
</tr>
</tbody>
</table>
<!-- END_cf86d763a082dd569d58de59e556afca -->
<!-- START_a6eed7d793b06c4b0ec1f7a5e263e356 -->
<h2>Cancel Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/CancelTask?task_id=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/CancelTask"
);

let params = {
    "task_id": "illo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/CancelTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a6eed7d793b06c4b0ec1f7a5e263e356 -->
<!-- START_6f4be62c5ec7429cab215475c623ab94 -->
<h2>Change Task State</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/ChangeTaskState?episode_id=explicabo&amp;state_id=rerum&amp;job_id=est&amp;group=non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/ChangeTaskState"
);

let params = {
    "episode_id": "explicabo",
    "state_id": "rerum",
    "job_id": "est",
    "group": "non",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/ChangeTaskState</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>state_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_6f4be62c5ec7429cab215475c623ab94 -->
<!-- START_10543393fa011718e59c7d00dd304a10 -->
<h2>Get Task State</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/GetTaskState?episode_id=reiciendis&amp;group=incidunt&amp;state=sit&amp;jobs=numquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/GetTaskState"
);

let params = {
    "episode_id": "reiciendis",
    "group": "incidunt",
    "state": "sit",
    "jobs": "numquam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "episode_id": 5545,
            "state_id": 7,
            "job_name": "Proofreading",
            "job_id": 113,
            "editable": true
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/GetTaskState</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>state</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>Array</td>
</tr>
</tbody>
</table>
<!-- END_10543393fa011718e59c7d00dd304a10 -->
<!-- START_c74f656d0148b1d7313cc4567b439633 -->
<h2>get Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/getTask?task_id=nulla" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/getTask"
);

let params = {
    "task_id": "nulla",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/getTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_c74f656d0148b1d7313cc4567b439633 -->
<!-- START_f470de9e6e3b0301671a52a6120c270d -->
<h2>Set Next Step Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/production/task/SetNextStepTask?task_id=suscipit&amp;next_jobs=aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/SetNextStepTask"
);

let params = {
    "task_id": "suscipit",
    "next_jobs": "aut",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST production/task/SetNextStepTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>next_jobs</code></td>
<td>required</td>
<td>intArray</td>
</tr>
</tbody>
</table>
<!-- END_f470de9e6e3b0301671a52a6120c270d -->
<!-- START_a8e3b9a556b85be4dba840c08bdc0d82 -->
<h2>Change State To Done</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task/ChangeStateToDone?task_id=vel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/ChangeStateToDone"
);

let params = {
    "task_id": "vel",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task/ChangeStateToDone</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a8e3b9a556b85be4dba840c08bdc0d82 -->
<!-- START_392ad4100f4bb6f077bb14b80ed0569e -->
<h2>Get Task Change Log</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task/GetTaskChangeLog?task_id=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task/GetTaskChangeLog"
);

let params = {
    "task_id": "illo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task/GetTaskChangeLog</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_392ad4100f4bb6f077bb14b80ed0569e -->
<h1>TaskPlanController</h1>
<p>APIs</p>
<!-- START_8b978982e170c1369a1178cb854c3a53 -->
<h2>Get Task Plan Project</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task_plan/GetTaskPlanProject?status=distinctio&amp;group=aliquam&amp;employees=et&amp;jobs=illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task_plan/GetTaskPlanProject"
);

let params = {
    "status": "distinctio",
    "group": "aliquam",
    "employees": "et",
    "jobs": "illo",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task_plan/GetTaskPlanProject</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>employees</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>IntArray</td>
</tr>
</tbody>
</table>
<!-- END_8b978982e170c1369a1178cb854c3a53 -->
<!-- START_ff6f7226b1428d2d2f2eab29a251fd9b -->
<h2>Get Project Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task_plan/GetProjectTask?project_id=et&amp;group=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task_plan/GetProjectTask"
);

let params = {
    "project_id": "et",
    "group": "quibusdam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task_plan/GetProjectTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_ff6f7226b1428d2d2f2eab29a251fd9b -->
<!-- START_a179337a34e103f46e2ffc899a27c9dd -->
<h2>Update Episode Task Deadline</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/task_plan/UpdateEpisodeTaskDeadline?deadline=ut&amp;episode_task_id=ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/task_plan/UpdateEpisodeTaskDeadline"
);

let params = {
    "deadline": "ut",
    "episode_task_id": "ut",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/task_plan/UpdateEpisodeTaskDeadline</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>deadline</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>episode_task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_a179337a34e103f46e2ffc899a27c9dd -->
<h1>TazmeenTransferController</h1>
<p>APIs</p>
<!-- START_6e820093d6b338ed13cf2ba44bb8b7ad -->
<h2>Get User Device</h2>
<p>when change user this api call to get user device</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/tazmeen_transfer/GetUserDevice?employee_id=reiciendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/tazmeen_transfer/GetUserDevice"
);

let params = {
    "employee_id": "reiciendis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "text": "PC",
            "value": "PC"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/tazmeen_transfer/GetUserDevice</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>Employee id</td>
</tr>
</tbody>
</table>
<!-- END_6e820093d6b338ed13cf2ba44bb8b7ad -->
<!-- START_4401b554e0525d2e49360f6e7f2884ca -->
<h2>Get User Device</h2>
<p>when change user this api call to get user device</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/tazmeen_transfer/GetProgramTable?page=quibusdam&amp;employee_id=nobis&amp;device_id=eum&amp;date=velit&amp;table=quibusdam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/tazmeen_transfer/GetProgramTable</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>page</code></td>
<td>required</td>
<td>for pagination</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>Employee id</td>
</tr>
<tr>
<td><code>device_id</code></td>
<td>required</td>
<td>Device id.</td>
</tr>
<tr>
<td><code>date</code></td>
<td>required</td>
<td>.</td>
</tr>
<tr>
<td><code>table</code></td>
<td>required</td>
<td>this to detect from any table read</td>
</tr>
</tbody>
</table>
<!-- END_4401b554e0525d2e49360f6e7f2884ca -->
<h1>Team Controller</h1>
<p>APIs</p>
<!-- START_e87a639441129c834caa7a9090a61927 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/teams" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET teams</code></p>
<!-- END_e87a639441129c834caa7a9090a61927 -->
<!-- START_5bf959ceeb4f79492065ce588390623d -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/teams?name=et&amp;description=et&amp;leader_id=omnis&amp;color=porro&amp;substitute_id=facilis&amp;jobs=aut&amp;leader_substitutes=eveniet&amp;members=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>POST teams</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>description</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>leader_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>substitute_id</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>leader_substitutes</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>members</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_5bf959ceeb4f79492065ce588390623d -->
<!-- START_d07d65a0708d4e4bbde9b205c009f73e -->
<h2>edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/teams/1/edit?id=architecto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/teams/1/edit"
);

let params = {
    "id": "architecto",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET teams/{team}/edit</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_d07d65a0708d4e4bbde9b205c009f73e -->
<!-- START_ae0ed66e0f0aaebda534253fd407d38d -->
<h2>update</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/teams/1?id=ut&amp;name=vel&amp;description=consequuntur&amp;leader_id=aut&amp;color=reprehenderit&amp;substitute_id=qui&amp;jobs=qui&amp;leader_substitutes=sunt&amp;members=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT teams/{team}</code></p>
<p><code>PATCH teams/{team}</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>name</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>description</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>leader_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>color</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>substitute_id</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>leader_substitutes</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>members</code></td>
<td>required</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_ae0ed66e0f0aaebda534253fd407d38d -->
<!-- START_c02007476da9a001eb0582f0f092e2fe -->
<h2>Get Tree</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/hr/teams/GetTree?root=aliquam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/hr/teams/GetTree"
);

let params = {
    "root": "aliquam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET hr/teams/GetTree</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>root</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_c02007476da9a001eb0582f0f092e2fe -->
<h1>TechnicalReportController</h1>
<p>APIs</p>
<!-- START_291196a5727a4bf19a691cf6e32ef04c -->
<h2>Get Technical Report</h2>
<p>Under Developer</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/detail/GetTechnicalReport" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/detail/GetTechnicalReport</code></p>
<!-- END_291196a5727a4bf19a691cf6e32ef04c -->
<h1>TestController</h1>
<p>APIs</p>
<!-- START_24362feb742401494931004943628228 -->
<h2>test/test</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/test/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET test/test</code></p>
<!-- END_24362feb742401494931004943628228 -->
<!-- START_dfdc3af1dab94aad354a10ea1ad8596a -->
<h2>ClearCache</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/ClearCache" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET ClearCache</code></p>
<!-- END_dfdc3af1dab94aad354a10ea1ad8596a -->
<!-- START_5af6109fbe6b19088354ec09413db337 -->
<h2>CacheClear</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/CacheClear" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET CacheClear</code></p>
<!-- END_5af6109fbe6b19088354ec09413db337 -->
<!-- START_2fc11d3e5b5d351155bb00a03b9aed61 -->
<h2>DumpAutoload</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/DumpAutoload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET DumpAutoload</code></p>
<!-- END_2fc11d3e5b5d351155bb00a03b9aed61 -->
<h1>Vacation Controller</h1>
<p>APIs</p>
<!-- START_4ab3b3de4071b43592a40d5773557ac5 -->
<h2>index</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/vacations?selectedEmployee=sunt&amp;start=cum&amp;end=neque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/vacations"
);

let params = {
    "selectedEmployee": "sunt",
    "start": "cum",
    "end": "neque",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET vacations</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>selectedEmployee</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_4ab3b3de4071b43592a40d5773557ac5 -->
<!-- START_12e7f84e7671508231b5d66ced10126b -->
<h2>store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/vacations?employee_id=temporibus&amp;approved_at=iste&amp;start=quidem&amp;end=sunt&amp;duration=officia&amp;type=autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST vacations</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>approved_at</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>date</td>
</tr>
<tr>
<td><code>duration</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_12e7f84e7671508231b5d66ced10126b -->
<h1>WorkProgressController</h1>
<p>APIs</p>
<!-- START_44c1d9dd55973e68f82be416d60cf82e -->
<h2>Get Work Progress Project Details</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/WorkProgress/GetData?jobs=et&amp;projects=amet&amp;status=minima&amp;group=ullam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/WorkProgress/GetData"
);

let params = {
    "jobs": "et",
    "projects": "amet",
    "status": "minima",
    "group": "ullam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/WorkProgress/GetData</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>jobs</code></td>
<td>required</td>
<td>intArray</td>
</tr>
<tr>
<td><code>projects</code></td>
<td>required</td>
<td>intArray</td>
</tr>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>intArray</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_44c1d9dd55973e68f82be416d60cf82e -->
<!-- START_3c02e2c4e99baef571c99e99e88a0b5f -->
<h2>Get Work Progress Projects</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/WorkProgress/GetWorkProgressProjects?status=corporis&amp;group=aperiam&amp;employees=molestiae&amp;jobs=sit&amp;projects=accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/WorkProgress/GetWorkProgressProjects</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>employees</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>jobs</code></td>
<td>optional</td>
<td>IntArray</td>
</tr>
<tr>
<td><code>projects</code></td>
<td>optional</td>
<td>IntArray</td>
</tr>
</tbody>
</table>
<!-- END_3c02e2c4e99baef571c99e99e88a0b5f -->
<!-- START_801abd53c2a931db220c4ec26221f1cd -->
<h2>Get Work Progress Project Details</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/WorkProgress/GetWorkProgressProjectDetails?group=nemo&amp;project_id=nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/WorkProgress/GetWorkProgressProjectDetails"
);

let params = {
    "group": "nemo",
    "project_id": "nihil",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/WorkProgress/GetWorkProgressProjectDetails</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>group</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>project_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_801abd53c2a931db220c4ec26221f1cd -->
<!-- START_396b9f792af155d2dd2baa6f9b79a28e -->
<h2>Get Episode Job Tasks</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/production/WorkProgress/GetEpisodeJobTasks?episode_id=aut&amp;job_id=commodi&amp;state=omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/production/WorkProgress/GetEpisodeJobTasks"
);

let params = {
    "episode_id": "aut",
    "job_id": "commodi",
    "state": "omnis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [],
    "episode": {
        "episode_number": "165",
        "title": "Soz",
        "text": "165 - Soz"
    },
    "job": {
        "name": "TazmoCue"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET production/WorkProgress/GetEpisodeJobTasks</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>episode_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>state</code></td>
<td>optional</td>
<td>JsonObject</td>
</tr>
</tbody>
</table>
<!-- END_396b9f792af155d2dd2baa6f9b79a28e -->
<h1>Work Session Controller</h1>
<p>APIs</p>
<!-- START_34a87c2e2fc5812239dc05357165e330 -->
<h2>Start Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/main/work_session/StartSession?task_id=perferendis&amp;type=tenetur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/work_session/StartSession"
);

let params = {
    "task_id": "perferendis",
    "type": "tenetur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "task": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST main/work_session/StartSession</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_34a87c2e2fc5812239dc05357165e330 -->
<!-- START_e14a7d51657387eeb6b54c30804085b4 -->
<h2>Stop Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/main/work_session/StopSession?type=dolores&amp;note=delectus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/work_session/StopSession"
);

let params = {
    "type": "dolores",
    "note": "delectus",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST main/work_session/StopSession</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_e14a7d51657387eeb6b54c30804085b4 -->
<!-- START_311623dd80d9139566fdcf5d20a48f0d -->
<h2>Get Total Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/main/work_session/GetTotalSession" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": {
        "old_total_duration": "00:19:49",
        "running_duration": "00:00:03.000000",
        "total_duration": "00:19:52.000000"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST main/work_session/GetTotalSession</code></p>
<!-- END_311623dd80d9139566fdcf5d20a48f0d -->
<!-- START_4874425d101bc99decdecc77c7576200 -->
<h2>Get Task Changes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/GetTaskChanges" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "activity_log": [
        {
            "properties": "{\"new\":{\"deadline\":\"2021-06-22 16:35:00\",\"episode_id\":4621,\"id\":5306},\"old\":{}}",
            "description": "created",
            "id": 4217,
            "message": "012 - Thamarat",
            "updated_at": "2021-06-02 03:10:50"
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/GetTaskChanges</code></p>
<!-- END_4874425d101bc99decdecc77c7576200 -->
<!-- START_e649c854a32e67ed3ab0a3d02ed171bc -->
<h2>Set Task Changes Readed</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/SetTaskChangesReaded?task_ids=adipisci" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/work_session/SetTaskChangesReaded"
);

let params = {
    "task_ids": "adipisci",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/SetTaskChangesReaded</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_ids</code></td>
<td>required</td>
<td>int Array</td>
</tr>
</tbody>
</table>
<!-- END_e649c854a32e67ed3ab0a3d02ed171bc -->
<!-- START_7598e7863ff93945bb642fdc8d382bf5 -->
<h2>Finish Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/main/work_session/FinishTask?state_id=ut&amp;task_id=iusto&amp;finish_reason=aspernatur&amp;finish_note=nulla&amp;finish_info=eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST main/work_session/FinishTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>state_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>finish_reason</code></td>
<td>optional</td>
<td>int</td>
</tr>
<tr>
<td><code>finish_note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>finish_info</code></td>
<td>optional</td>
<td>JsonArray</td>
</tr>
</tbody>
</table>
<!-- END_7598e7863ff93945bb642fdc8d382bf5 -->
<!-- START_3f52ace4151763005572e0399bce4b31 -->
<h2>Check Session Alive</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/main/work_session/CheckSessionAlive?session_id=magni" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/main/work_session/CheckSessionAlive"
);

let params = {
    "session_id": "magni",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "running": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET main/work_session/CheckSessionAlive</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>session_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_3f52ace4151763005572e0399bce4b31 -->
<h1>WorkSessionMangeController</h1>
<p>APIs</p>
<!-- START_fbdefc2bb0c060068acd1faad36a21ea -->
<h2>Get Employee Sessions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/work_session_mange/GetEmployeeSessions?employee_id=architecto&amp;sessions_date=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/work_session_mange/GetEmployeeSessions"
);

let params = {
    "employee_id": "architecto",
    "sessions_date": "et",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/work_session_mange/GetEmployeeSessions</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>Employee id</td>
</tr>
<tr>
<td><code>sessions_date</code></td>
<td>required</td>
<td>date</td>
</tr>
</tbody>
</table>
<!-- END_fbdefc2bb0c060068acd1faad36a21ea -->
<!-- START_f50f4ca230393fc03b61ceb1408f4d7c -->
<h2>Get Task Sessions Detail</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/work_session_mange/GetTaskSessionsDetail?task_id=perspiciatis&amp;task_type=aut&amp;sessionDate=delectus&amp;employee_id=veniam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/work_session_mange/GetTaskSessionsDetail"
);

let params = {
    "task_id": "perspiciatis",
    "task_type": "aut",
    "sessionDate": "delectus",
    "employee_id": "veniam",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/work_session_mange/GetTaskSessionsDetail</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>task_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>task_type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>sessionDate</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_f50f4ca230393fc03b61ceb1408f4d7c -->
<!-- START_c20717578aed35cc14bea1d99d9abac8 -->
<h2>Update Work Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/work_session_mange/UpdateWorkSession?id=a&amp;automatically=necessitatibus&amp;legal=illum&amp;status=voluptas&amp;start=autem&amp;end=quibusdam&amp;note=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/work_session_mange/UpdateWorkSession</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>automatically</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>legal</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_c20717578aed35cc14bea1d99d9abac8 -->
<!-- START_60609cb19a4598f2a5e0ea938eeaff0f -->
<h2>Update Task Details</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/work_session_mange/UpdateTaskDetails?id=blanditiis&amp;finish_state_id=nisi&amp;finish_note=deleniti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/work_session_mange/UpdateTaskDetails"
);

let params = {
    "id": "blanditiis",
    "finish_state_id": "nisi",
    "finish_note": "deleniti",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/work_session_mange/UpdateTaskDetails</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>finish_state_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>finish_note</code></td>
<td>optional</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_60609cb19a4598f2a5e0ea938eeaff0f -->
<!-- START_15887360e2a5c2625134b04a9daa0c25 -->
<h2>Delete Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/work_session_mange/DeleteSession?id=fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/administration/work_session_mange/DeleteSession"
);

let params = {
    "id": "fugit",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/work_session_mange/DeleteSession</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
</tbody>
</table>
<!-- END_15887360e2a5c2625134b04a9daa0c25 -->
<!-- START_166c745a43adb0ee7a777e18bc4ec48d -->
<h2>Add Session To Task</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/work_session_mange/AddSessionToTask?sessionable_int=explicabo&amp;sessionable_type=perferendis&amp;employee_id=commodi&amp;start=maiores&amp;end=aut&amp;legal=porro&amp;note=et&amp;status=consequuntur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/work_session_mange/AddSessionToTask</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>sessionable_int</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>sessionable_type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>legal</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_166c745a43adb0ee7a777e18bc4ec48d -->
<!-- START_232b833c6f5af2f882e75c711b0db491 -->
<h2>Add Administration Session</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/work_session_mange/AddAdministrationSession?id=dicta&amp;employee_id=iusto&amp;job_id=cum&amp;legal=omnis&amp;status=dolore&amp;start=sequi&amp;end=optio&amp;sessionable_type=in&amp;job=sunt&amp;note=necessitatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/work_session_mange/AddAdministrationSession</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>employee_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>job_id</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>legal</code></td>
<td>required</td>
<td>int</td>
</tr>
<tr>
<td><code>status</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>start</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>end</code></td>
<td>required</td>
<td>datetime</td>
</tr>
<tr>
<td><code>sessionable_type</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>job</code></td>
<td>required</td>
<td>JsonObject</td>
</tr>
<tr>
<td><code>note</code></td>
<td>optional</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_232b833c6f5af2f882e75c711b0db491 -->
<h1>general</h1>
<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
<h2>_debugbar/open</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/open</code></p>
<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->
<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
<h2>Return Clockwork output</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/clockwork/{id}</code></p>
<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->
<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
<h2>_debugbar/telescope/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/telescope/{id}</code></p>
<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->
<!-- START_5f8a640000f5db43332951f0d77378c4 -->
<h2>Return the stylesheets for the Debugbar</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/assets/stylesheets</code></p>
<!-- END_5f8a640000f5db43332951f0d77378c4 -->
<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
<h2>Return the javascript for the Debugbar</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/assets/javascript</code></p>
<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->
<!-- START_0973671c4f56e7409202dc85c868d442 -->
<h2>Forget a cache key</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE _debugbar/cache/{key}/{tags?}</code></p>
<!-- END_0973671c4f56e7409202dc85c868d442 -->
<!-- START_ffeb21a323d661b8d5ed8072620cc36e -->
<h2>laravel-websockets</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/laravel-websockets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laravel-websockets</code></p>
<!-- END_ffeb21a323d661b8d5ed8072620cc36e -->
<!-- START_7a96267d047ecbef5cd21c3dd1691fe0 -->
<h2>laravel-websockets/api/{appId}/statistics</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/laravel-websockets/api/1/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laravel-websockets/api/{appId}/statistics</code></p>
<!-- END_7a96267d047ecbef5cd21c3dd1691fe0 -->
<!-- START_69dd61efc04363546d99d1d7cba7bf4c -->
<h2>laravel-websockets/auth</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/laravel-websockets/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laravel-websockets/auth</code></p>
<!-- END_69dd61efc04363546d99d1d7cba7bf4c -->
<!-- START_5f593177feb1276b604ea7c2cec73a03 -->
<h2>laravel-websockets/event</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/laravel-websockets/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laravel-websockets/event</code></p>
<!-- END_5f593177feb1276b604ea7c2cec73a03 -->
<!-- START_a114cbb106b4fbbabe00910c4c3fa19c -->
<h2>laravel-websockets/statistics</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/laravel-websockets/statistics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laravel-websockets/statistics</code></p>
<!-- END_a114cbb106b4fbbabe00910c4c3fa19c -->
<!-- START_a860c890b44558a758eaca7c13893ed6 -->
<h2>Invoke the controller method.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust</code></p>
<p><code>POST administration/laratrust</code></p>
<p><code>PUT administration/laratrust</code></p>
<p><code>PATCH administration/laratrust</code></p>
<p><code>DELETE administration/laratrust</code></p>
<p><code>OPTIONS administration/laratrust</code></p>
<!-- END_a860c890b44558a758eaca7c13893ed6 -->
<!-- START_5e5c7a39bd34b9b29eff8e2659bc3035 -->
<h2>administration/laratrust/permissions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/permissions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/permissions</code></p>
<!-- END_5e5c7a39bd34b9b29eff8e2659bc3035 -->
<!-- START_164bdd7cb02e92c1ca17a97465650644 -->
<h2>administration/laratrust/permissions/{permission}/edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/permissions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/permissions/{permission}/edit</code></p>
<!-- END_164bdd7cb02e92c1ca17a97465650644 -->
<!-- START_72b68bd0028c2077a78e043aea7fbb3f -->
<h2>administration/laratrust/permissions/{permission}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/administration/laratrust/permissions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT administration/laratrust/permissions/{permission}</code></p>
<p><code>PATCH administration/laratrust/permissions/{permission}</code></p>
<!-- END_72b68bd0028c2077a78e043aea7fbb3f -->
<!-- START_b84ae4818c5a2d1651a58feb1b843c79 -->
<h2>administration/laratrust/roles</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles</code></p>
<!-- END_b84ae4818c5a2d1651a58feb1b843c79 -->
<!-- START_3f4528b23f0c8564d4ef917ce6593009 -->
<h2>administration/laratrust/roles/create</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles/create</code></p>
<!-- END_3f4528b23f0c8564d4ef917ce6593009 -->
<!-- START_8edea55d39077e63b28d6a0e33d9cabe -->
<h2>administration/laratrust/roles</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/administration/laratrust/roles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST administration/laratrust/roles</code></p>
<!-- END_8edea55d39077e63b28d6a0e33d9cabe -->
<!-- START_d7eb035b19c81d98b4d02482b0952805 -->
<h2>administration/laratrust/roles/{role}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles/{role}</code></p>
<!-- END_d7eb035b19c81d98b4d02482b0952805 -->
<!-- START_0e0e0161f5eed9a9eb18a35094986e38 -->
<h2>administration/laratrust/roles/{role}/edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles/{role}/edit</code></p>
<!-- END_0e0e0161f5eed9a9eb18a35094986e38 -->
<!-- START_2d4b80fdf998eab01809618e6395ef8a -->
<h2>administration/laratrust/roles/{role}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT administration/laratrust/roles/{role}</code></p>
<p><code>PATCH administration/laratrust/roles/{role}</code></p>
<!-- END_2d4b80fdf998eab01809618e6395ef8a -->
<!-- START_7a9bf1ed44fc93af79ecd8e4fcaeb188 -->
<h2>administration/laratrust/roles/{role}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://localhost/administration/laratrust/roles/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE administration/laratrust/roles/{role}</code></p>
<!-- END_7a9bf1ed44fc93af79ecd8e4fcaeb188 -->
<!-- START_e974f6fd7c2c143e63788da4fb8d4079 -->
<h2>administration/laratrust/roles-assignment</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles-assignment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles-assignment</code></p>
<!-- END_e974f6fd7c2c143e63788da4fb8d4079 -->
<!-- START_4ed58bf4e3dd9fda19471b535c9345d6 -->
<h2>administration/laratrust/roles-assignment/{roles_assignment}/edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/administration/laratrust/roles-assignment/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET administration/laratrust/roles-assignment/{roles_assignment}/edit</code></p>
<!-- END_4ed58bf4e3dd9fda19471b535c9345d6 -->
<!-- START_fd289e64bc275e52586e09216e2397e0 -->
<h2>administration/laratrust/roles-assignment/{roles_assignment}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://localhost/administration/laratrust/roles-assignment/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT administration/laratrust/roles-assignment/{roles_assignment}</code></p>
<p><code>PATCH administration/laratrust/roles-assignment/{roles_assignment}</code></p>
<!-- END_fd289e64bc275e52586e09216e2397e0 -->
<!-- START_66df3678904adde969490f2278b8f47f -->
<h2>Authenticate the request for channel access.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/broadcasting/auth" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (403):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET broadcasting/auth</code></p>
<p><code>POST broadcasting/auth</code></p>
<!-- END_66df3678904adde969490f2278b8f47f -->
<!-- START_f3d7f0e5074a4649e53b6cfbbd348592 -->
<h2>api/tracker/period_check</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/api/tracker/period_check" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/tracker/period_check</code></p>
<!-- END_f3d7f0e5074a4649e53b6cfbbd348592 -->
<!-- START_66e08d3cc8222573018fed49e121e96d -->
<h2>Show the application&#039;s login form.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET login</code></p>
<!-- END_66e08d3cc8222573018fed49e121e96d -->
<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
<h2>Handle a login request to the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST login</code></p>
<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->
<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
<h2>Where to redirect users after login.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST logout</code></p>
<!-- END_e65925f23b9bc6b93d9356895f29f80c -->
<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
<h2>Show the application registration form.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET register</code></p>
<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
<!-- START_d7aad7b5ac127700500280d511a3db01 -->
<h2>Handle a registration request for the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST register</code></p>
<!-- END_d7aad7b5ac127700500280d511a3db01 -->
<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
<h2>Display the form to request a password reset link.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset</code></p>
<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->
<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
<h2>Send a reset link to the given user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/email</code></p>
<!-- END_feb40f06a93c80d742181b6ffb6b734e -->
<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
<h2>Display the password reset view for the given token.</h2>
<p>If no token is present, display the link request form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset/{token}</code></p>
<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->
<!-- START_cafb407b7a846b31491f97719bb15aef -->
<h2>Reset the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/reset</code></p>
<!-- END_cafb407b7a846b31491f97719bb15aef -->
<!-- START_b77aedc454e9471a35dcb175278ec997 -->
<h2>Display the password confirmation view.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/confirm</code></p>
<!-- END_b77aedc454e9471a35dcb175278ec997 -->
<!-- START_54462d3613f2262e741142161c0e6fea -->
<h2>Confirm the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/confirm</code></p>
<!-- END_54462d3613f2262e741142161c0e6fea -->
<!-- START_a854280a0a7dfb6d6b537abd31c9b3a0 -->
<h2>Start Authentication</h2>
<p>Not used yet</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/ConvertUserId" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/ConvertUserId</code></p>
<!-- END_a854280a0a7dfb6d6b537abd31c9b3a0 -->
<!-- START_f6929cb61fe506fefa8423ba0dd22807 -->
<h2>Start Authentication</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/StartAuthentication" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/StartAuthentication</code></p>
<!-- END_f6929cb61fe506fefa8423ba0dd22807 -->
<!-- START_1cd0932af682ecc7d803c145475d0d07 -->
<h2>get Notifications Count</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/notification/getNotificationsCount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "count": 5
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/notification/getNotificationsCount</code></p>
<!-- END_1cd0932af682ecc7d803c145475d0d07 -->
<!-- START_073515641bcc93b0e782a0412b41cf47 -->
<h2>get Notifications Content</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/notification/getNotificationsContent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/notification/getNotificationsContent</code></p>
<!-- END_073515641bcc93b0e782a0412b41cf47 -->
<!-- START_1b6bcd9376a058b83e127ebb52d07abd -->
<h2>set Fcm Token</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/services/notification/setFcmToken?token=in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/services/notification/setFcmToken"
);

let params = {
    "token": "in",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST services/notification/setFcmToken</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>token</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_1b6bcd9376a058b83e127ebb52d07abd -->
<!-- START_dfaf86659ae0b50f45d9415a048efba7 -->
<h2>services/notification/test</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/notification/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/notification/test</code></p>
<!-- END_dfaf86659ae0b50f45d9415a048efba7 -->
<!-- START_519f4a45a1b870753aae225b19ef25c2 -->
<h2>send Push Notification</h2>
<p>Php function</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/services/notification/sendPushNotification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET services/notification/sendPushNotification</code></p>
<!-- END_519f4a45a1b870753aae225b19ef25c2 -->
<!-- START_31cb3cdeef9b4a6eac24bed12c3c24a5 -->
<h2>Change Password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/services/setting/ChangePassword?old_password=alias&amp;new_password=qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/services/setting/ChangePassword"
);

let params = {
    "old_password": "alias",
    "new_password": "qui",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": "success"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST services/setting/ChangePassword</code></p>
<h4>Query Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>old_password</code></td>
<td>required</td>
<td>string</td>
</tr>
<tr>
<td><code>new_password</code></td>
<td>required</td>
<td>string</td>
</tr>
</tbody>
</table>
<!-- END_31cb3cdeef9b4a6eac24bed12c3c24a5 -->
<!-- START_bbf2a76cb645abb305511de723d24080 -->
<h2>upload_temp_files</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/upload_temp_files" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST upload_temp_files</code></p>
<!-- END_bbf2a76cb645abb305511de723d24080 -->
<!-- START_b6f3340c9c4bbbdafb5a9f7f76d16910 -->
<h2>delete_temp_file</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://localhost/delete_temp_file" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST delete_temp_file</code></p>
<!-- END_b6f3340c9c4bbbdafb5a9f7f76d16910 -->
<!-- START_47a3b9da6d16f8ca7f1b87d288ede816 -->
<h2>schedule/stop_twelve_session_hourly</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/schedule/stop_twelve_session_hourly" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET schedule/stop_twelve_session_hourly</code></p>
<!-- END_47a3b9da6d16f8ca7f1b87d288ede816 -->
<!-- START_10e663a10277e6532b105562b110605b -->
<h2>schedule/stop_eight_session_hourly</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://localhost/schedule/stop_eight_session_hourly" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET schedule/stop_eight_session_hourly</code></p>
<!-- END_10e663a10277e6532b105562b110605b -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>