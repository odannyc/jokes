<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class="jumbotron">
            <div class="container">
                <h2><?= $joke['question'] ?></h2>
                <p><?= $joke['answer'] ?></p>
                <a href="/">
                    <button class="btn btn-primary">Shuffle</button>
                </a>
            </div>
        </div>
    </body>
</html>