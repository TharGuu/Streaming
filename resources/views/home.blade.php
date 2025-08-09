<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth

    <p> Welcome To Stream</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <div style="border : 3px solid black;">
        <h2>Comment Box</h2>
        <form action="/create-post" method="POST">
            @csrf
            <textarea name="body" placeholder="Comment"></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border : 3px solid black;">
        <h2> All Posts Comment</h2>
        @foreach($posts as $post)
        <div style="background-color:gray; padding:10px; margin:10px;">
            <br>
             <h3>{{$post->user->name ?? 'Unknown'}}</h3>
            </br>
             
            {{$post['body']}}
            
        </div>
        @endforeach
    </div>

    @else

    <div style="border : 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border : 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="name">
            <input name="loginpassword" type="password" placeholder="password">
            <button>Log in</button>
        </form>
    </div>


    @endauth



    
     
</body>
</html>