<h1>This Create page...</h1>
<form action="{{route('posts.store')}}" method="POST">
    @csrf
<input type="text" name="title" placeholder="Enter Title..."><br><br>
<input type="text" name="body" placeholder="Enter body..."> <br><br>
<button type="submit">POST</button>
</form>