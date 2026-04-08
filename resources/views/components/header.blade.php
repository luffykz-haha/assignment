<head>
    <title>In code. there is only pain</title>
</head>
<body>
    <div id='header'>
        <h1>Website Name</h1>
        <input type="text" placeholder="Search...">
        <button type="button" class="button">Bookings</button>
        <button type="button" class="button">Log In</button>
    </div>
</body>

<style>
    body {
        margin: 0;
        background-color: 'white';
    }

    #header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        overflow: hidden;
        background-color: #9ccfff;
        padding: 10px;
        height: 110px;
    }

    #header input[type=text]{
        flex: 1;
        padding: 8px;
        border: none;
        margin-top: 12px;
        margin-right: 16px;
        font-size: 15px;
        max-width: 500px;
        border-radius: 20px;
    }

    .button {
        padding: 10px;
        font-size: 15px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        background-color: 'white';
    }
</style>