# jokes
Generate random jokes, with its own router!


## Installation
To install this `jokes` project (the easy way) you'll need Docker!

There's only 2 steps you need to do when you have Docker installed:

1. `docker build . -t jokes` 
2. `docker run --rm -d -p 80:80 jokes`

Make sure you do this in the root of this project, and you're all done!
Navigate to `localhost` and you'll be staring at the jokes project.

## Usage
There are 2 routes registered in the default application: `/` and `/api/jokes`.
The first routes which goes to index is basically just a page that displays a random joke and a button to shuffle them and refresh the page. The second route is an api that returns an array of jokes. The api can take in a count, like so: `localhost/api/jokes?count=3`.

```json
[
  {
    "question": "What do you call a cow with no legs?",
    "answer": "Ground beef."
  },
  {
    "question": "What is the difference between a snowman and a snowwoman?",
    "answer": "Snowballs."
  },
  {
    "question": "Where do animals go when their tails fall off?",
    "answer": "The retail store."
  }
]
```

Have fun!
