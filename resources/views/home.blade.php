<style type="text/css">
h1 {
    color: #0F3979;
    font-family: sans-serif;
    font-size: 2em;
    margin-bottom: 0;
}

table {
    font-family: sans-serif;

}

th,
td {
    padding: .25em .5em;
    text-align: left;

    &:nth-child(2) {
        text-align: center;
    }
}

td {
    border: 1px solid #392390;
}

th {
    background-color: #0F3979;
    color: #fff;
}
</style>
<h1>{{ $indexing }}</h1>

<table class="zigzag">
    <thead>
        <tr>
            <th class="header">App</th>
            <th class="header">Modules</th>
            <th class="header">Action</th>
            <th class="header">Method</th>
            <th class="header">Endpoint</th>
            <th class="header">Data Type</th>
            <th class="header">Sampel Request</th>
            <th class="header">Sampel Response</th>
            <th class="header">Noted</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Monitoring Metrics</td>
            <td>Track</td>
            <td>Get View<br>Page</td>
            <td>GET</td>
            <td>
                <a href="{{ env('APP_URL') }}get/track/page/view">{{ env('APP_URL') }}get/track/page/view</a>
            </td>
            <td>JSON</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Monitoring Metrics</td>
            <td>Track</td>
            <td>Page View</td>
            <td>POST</td>
            <td>
                <a href="{{ env('APP_URL') }}post/track/page/view">{{ env('APP_URL') }}post/track/page/view</a>
            </td>
            <td>JSON</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>