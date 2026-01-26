<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="EditCategory" method="post">

        <input type="text" id="searchTitle">
        <input type="hidden" name="id" id="categoryId">
        <input type="text" name="title" id="editTitle">

        <button type="button" id="searchBtn">Search</button>
        <button type="submit" name="EditCategory">Edit</button>
    </form>
</body>
<script>
    document.getElementById('searchBtn').addEventListener('click', () => {
        const title = document.getElementById('searchTitle').value;

        fetch('/category/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({ title })
        })
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                document.getElementById('categoryId').value = data.id;
                document.getElementById('editTitle').value = data.title;
            })
            .catch(err => console.error(err));
    });
</script>

</html>