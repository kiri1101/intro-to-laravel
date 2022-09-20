<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>

    <style>
        html {
            height: 100vh;
        }
        body {
            height: 100vh;
            display: grid;
            place-items: center;
            background-image: linear-gradient(to right, rgb(255, 115, 0), red);
        }
        section > div {
            border-style: solid;
            border-color: black;
            border-radius: 3px;
            padding: 3rem;
            color: black;
            background-color: rgba(128, 128, 128, 0.349);
            width: 32rem;
        }
        div > h1 {
            display: grid;
            place-items: center;
        }
        div {
            margin: 3px;
            padding: 5px;
        }
        div > form > input {
            height: 1.5rem;
            border-style: groove;
            border-radius: 4px;
        }
        div > form > button {
            padding: 3px;
            margin: 2px;
            height: 1.75rem;
            background-color: skyblue;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <section>
        <div>
            <h1>Your First Laravel App</h1>

            <div>
                @forelse ($posts as $post)
                <div style="border-style: solid; border-width: 2px; border-radius: 5px;">
                    <h2>Title: {{ $post->title }}</h2>
                    <p>
                        {{ $post->comments }}
                    </p>   
                </div>  
                @empty
                    <h2>Title: No Post</h2>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis, voluptate eligendi? Placeat expedita exercitationem quaerat ipsa ipsum libero ab, recusandae aut cum facilis velit, animi officia tempore! Perferendis, expedita veniam?
                    </p>
                @endforelse
            </div>

            <div>
                <form action="/store" method="post">
                    @csrf

                    <!-- /resources/views/post.blade.php -->                
                    <input id="title"
                        type="text"
                        name="title"
                        placeholder="Post Title"
                        class="@error('title') is-invalid @enderror"
                        required
                        />
                    
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!-- /resources/views/post.blade.php -->                
                    <input id="comments"
                        type="text"
                        name="comments"
                        placeholder="Post Comment"
                        class="@error('comments') is-invalid @enderror"
                        required
                        />
                    
                    @error('comments')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>