<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <section>
        <header>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </header>
    </section>


    <main>
        <form action="post.php" method="post">
            <textarea name="quebuscas" id="quebuscas" cols="30" rows="10"></textarea>
            <input type="submit" value="Search">
        </form>
    </main>


    <div>
        <table>
            <thead>
                <tr class="bg-danger">
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                </tr>
            </thead>
            <tbody id="table">

            </tbody>
        </table>
    </div>

    <script>
        //https://jsonplaceholder.typicode.com/posts
        const cargarDatos = (data) => {
            let datos = '';
            data.forEach(element => {
                datos += `
                    <tr>
                        <td>${element.id}</td>
                        <td>${element.title}</td>
                        <td>${element.body}</td>
                    </tr>
                `;
            });

            document.getElementById('table').innerHTML = datos;
        }

        fetch('https://jsonplaceholder.typicode.com/posts')
            .then(response => response.json())
            .then(data => cargarDatos(data))
            .catch(error => console.log(error));

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>