<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Project</title>
</head>
<body>
<h1>Create a new Project</h1>
<form action="/projects" method="post">
    @csrf
    <div class="foo">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="qux">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="40" rows="10"></textarea>
    </div>
    <div class="bar">
        <input type="submit" value="Create Project">
    </div>
</form>
</body>
</html>